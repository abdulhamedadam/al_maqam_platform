<?php


namespace App\Services\Site;


use App\Models\TeacherAccount;
use App\Repositories\Site\AppointmentRepository;
use App\Traits\ImageProcessing;
use Carbon\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

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

        return ['success' => 'Lecture has started successfully', 'meeting' => $zoomMeeting];
    }

    public function endLecture($appointmentId, $userId)
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
            try {
                $meeting = Zoom::meeting()->find($zoomMeeting->meeting_id);
                $meeting->endMeeting();
            } catch (\Exception $e) {
                return ['error' => 'Failed to end Zoom meeting: ' . $e->getMessage()];
            }
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
}
