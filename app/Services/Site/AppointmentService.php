<?php


namespace App\Services\Site;

use App\Models\Admin;
use App\Models\StudentCourse;
use App\Models\StudentEvaluation;
use App\Models\TeacherAccount;
use App\Notifications\LectureCompletedNotification;
use App\Providers\AppServiceProvider;
use App\Repositories\Site\AppointmentRepository;
use App\Traits\ImageProcessing;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use MacsiDigital\Zoom\Facades\Zoom;
use App\Models\AppointmentCancellation;
use App\Notifications\AppointmentCancelledNotification;

class AppointmentService
{
    use ImageProcessing;

    protected $appointmentRepository;

    public function __construct(AppointmentRepository $appointmentRepository)
    {
        $this->appointmentRepository = $appointmentRepository;
    }

    public function getTodaysAppointments($role, $userId)
    {
        // $today = Carbon::now()->format('l');
        $today = 'Saturday';
        return $this->appointmentRepository->getTodaysAppointments($role, $userId, $today);
    }

    public function startLecture($appointmentId, $userId)
    {
        $appointment = $this->appointmentRepository->findAppointmentById($appointmentId);

        if ($userId !== $appointment->teacher_id) {
            return ['error' => 'You are not authorized to start this lecture'];
        }

        $durationInHours = $appointment->money->num_of_minutes / 60;

        $teacherAccount = TeacherAccount::firstOrCreate(
            ['teacher_id' => $appointment->teacher_id],
            ['hourly_rate' => 20]
        );

        $teacherAccount->increment('total_hours', $durationInHours);
        $earned = $durationInHours * $teacherAccount->hourly_rate;
        $teacherAccount->increment('total_earnings', $earned);
        $teacherAccount->save();


        if ($appointment->status === 'in_progress') {
            return ['error' => 'Lecture is already in progress'];
        }

        $zoomMeeting = $this->createZoomMeeting($appointment);

        $this->appointmentRepository->updateAppointmentStatus($appointmentId, 'in_progress');

        $appServiceProvider = app(AppServiceProvider::class);
        $appServiceProvider->notifyLectureStarted($appointment);

        return ['success' => 'Lecture has started successfully', 'meeting' => $zoomMeeting];
    }

    public function endLecture($appointmentId, $userId, $evaluationData = null)
    {
        $appointment = $this->appointmentRepository->findAppointmentById($appointmentId);

        if ($userId !== $appointment->teacher_id) {
            return ['error' => 'You are not authorized to end this lecture'];
        }

        if ($appointment->status !== 'in_progress') {
            return ['error' => 'Lecture is not in progress'];
        }

        $zoomMeeting = $this->appointmentRepository->getLatestZoomMeetingByAppointmentId($appointmentId);
        if ($zoomMeeting) {
            // try {
            //     $meeting = Zoom::meeting()->find($zoomMeeting->meeting_id);
            //     $meeting->endMeeting();
            // } catch (\Exception $e) {
            //     return ['error' => 'Failed to end Zoom meeting: ' . $e->getMessage()];
            // }
            try {
                $meeting = Zoom::meeting()->find($zoomMeeting->meeting_id);

                if (!$meeting) {
                    Log::error("Zoom meeting not found in Zoom API: {$zoomMeeting->meeting_id}");
                    return ['error' => 'Zoom meeting not found in Zoom system'];
                }

                if ($meeting->status === 'finished') {
                    Log::info("Zoom meeting already ended: {$zoomMeeting->meeting_id}");
                    return ['info' => 'Zoom meeting was already ended'];
                }

                $meeting->endMeeting();
                Log::info("Successfully ended Zoom meeting: {$zoomMeeting->meeting_id}");

                $this->notifyLectureCompleted($appointment);

                return ['success' => 'Zoom meeting ended successfully'];

            } catch (\Exception $e) {
                Log::error("Failed to end Zoom meeting: " . $e->getMessage(), [
                    'meeting_id' => $zoomMeeting->meeting_id ?? null,
                    'appointment_id' => $appointmentId
                ]);

                return ['error' => 'Failed to end Zoom meeting: ' . $e->getMessage()];
            }
        }

        if ($evaluationData && isset($evaluationData['questions'])) {
            $this->saveEvaluation($appointment, $evaluationData);
        }

        $this->appointmentRepository->updateAppointmentStatus($appointmentId, 'ended');

        return ['success' => 'Lecture has ended successfully'];
    }

    private function createZoomMeeting($appointment)
    {
        $startTime = Carbon::parse($appointment->start_time);
        $isAppointmentTimePassed = now()->greaterThan($startTime);

        $meetingStartTime = $isAppointmentTimePassed
            ? now()->toIso8601String()
            : $startTime->toIso8601String();

        $meetingData = [
            'topic' => "Quran Lesson - {$appointment->course->name}",
            'duration' => 40,
            'password' => substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6),
            'start_time' => $meetingStartTime,
            'timezone' => config('app.timezone'),
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'join_before_host' => $isAppointmentTimePassed,
                'mute_upon_entry' => true,
                'waiting_room' => !$isAppointmentTimePassed,
                'approval_type' => 0,
                'audio' => 'both',
                'auto_recording' => 'none',
                'enable_early_join' => false,
            ]
        ];

        $user = Zoom::user()->first();
        $zoomMeeting = $user->meetings()->create($meetingData);

        return $this->appointmentRepository->saveZoomMeeting($appointment->id, $meetingData, $zoomMeeting);
    }

    protected function saveEvaluation($appointment, $evaluationData)
    {
        $answers = [];

        foreach ($evaluationData['questions'] as $questionId => $answer) {
            // $answers[] = [
            //     'question_id' => $questionId,
            //     'answer' => $answer,
            // ];
            $answers[$questionId] = $answer;
        }

        StudentEvaluation::create([
            'appointment_id' => $appointment->id,
            'student_id' => $appointment->student_id,
            'teacher_id' => $appointment->teacher_id,
            'answers' => json_encode($answers),
            'notes' => $evaluationData['notes'] ?? null,
        ]);
    }

    private function notifyLectureCompleted(StudentCourse $appointment)
    {
        try {
            $teacher = $appointment->teacher;
            $student = $appointment->student;
            $admins = $this->getAdmins();

            $message = "Lecture has been completed by the teacher";

            if ($student) {
                $student->notify(new LectureCompletedNotification($message, $appointment));
            }

            foreach ($admins as $admin) {
                $admin->notify(new LectureCompletedNotification($message, $appointment));
            }

            Log::info("Notified about lecture completion for lecture ID: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("Error notifying lecture completion: " . $e->getMessage());
        }
    }

    private function getAdmins()
    {
        return Admin::all();
    }

    // public function cancelAppointment($appointmentId, $user)
    // {
    //     $appointment = $this->appointmentRepository->findAppointmentById($appointmentId);

    //     if (!in_array($user->role, ['teacher', 'student'])) {
    //         return ['error' => 'Unauthorized'];
    //     }
    //     if ($appointment->status !== 'scheduled') {
    //         return ['error' => 'Cannot cancel this appointment'];
    //     }

    //     if (AppointmentCancellation::where('appointment_id', $appointmentId)->exists()) {
    //         return ['error' => 'Already cancelled'];
    //     }

    //     $cancellation = AppointmentCancellation::create([
    //         'appointment_id' => $appointmentId,
    //         'cancelled_by_id' => $user->id,
    //         'cancelled_by_type' => $user->role,
    //         'reason' => request('reason'),
    //     ]);


    //     $this->appointmentRepository->updateAppointmentStatus($appointmentId, 'cancelled');
    //     $appointment->update(['cancelled_at' => now()]);

    //     $admins = $this->getAdmins();
    //     $student = $appointment->student;
    //     $teacher = $appointment->teacher;

    //     if ($user->role === 'teacher') {
    //         if ($student) $student->notify(new AppointmentCancelledNotification($appointment, $cancellation->reason, $user));
    //     } else {
    //         if ($teacher) $teacher->notify(new AppointmentCancelledNotification($appointment, $cancellation->reason, $user));
    //     }
    //     foreach ($admins as $admin) {
    //         $admin->notify(new AppointmentCancelledNotification($appointment, $cancellation->reason, $user));
    //     }

    //     return ['success' => __('appointments.cancelled_successfully')];
    // }
    public function cancelAppointment($appointmentId, $userId, $userType, $reason)
    {
        if (!$this->appointmentRepository->canCancelAppointment($appointmentId, $userId, $userType)) {
            return [
                'error' => 'Cannot cancel this appointment. Cancellations must be made at least 3 hours before the appointment.'
            ];
        }

        $appointment = $this->appointmentRepository->findAppointmentById($appointmentId);

        $cancellation = $this->appointmentRepository->cancelAppointment($appointmentId, $userId, $userType, $reason);

        if ($cancellation) {
            $this->notifyAppointmentCancelled($appointment, $userId, $userType, $reason);
            return ['success' => 'Appointment cancelled successfully'];
        }

        return ['error' => 'Failed to cancel appointment'];
    }

    private function notifyAppointmentCancelled(StudentCourse $appointment, $userId, $userType, $reason)
    {
        try {
            $cancelledBy = null;

            if ($userType === 'teacher') {
                $cancelledBy = $appointment->teacher;
                $notifyUser = $appointment->student;
                $message = "Teacher has cancelled the lecture: {$reason}";
            } else {
                $cancelledBy = $appointment->student;
                $notifyUser = $appointment->teacher;
                $message = "Student has cancelled the lecture: {$reason}";
            }

            if ($notifyUser) {
                $notifyUser->notify(new AppointmentCancelledNotification($message, $appointment, $cancelledBy->name));
            }

            $admins = $this->getAdmins();
            foreach ($admins as $admin) {
                $admin->notify(new AppointmentCancelledNotification($message, $appointment, $cancelledBy->name));
            }

            Log::info("Notified about appointment cancellation for appointment ID: {$appointment->id}");
        } catch (\Exception $e) {
            Log::error("Error notifying appointment cancellation: " . $e->getMessage());
        }
    }

}
