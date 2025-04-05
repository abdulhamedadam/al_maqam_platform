<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\StudentCourse;
use App\Models\ZoomMeeting;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use MacsiDigital\Zoom\Facades\Zoom;

class AppointmentController1 extends Controller
{
    public function todaysAppointments()
    {
        // $today = Carbon::now()->format('l');
        $data['currentTime'] = Carbon::now()->format('H:i:s');
        $today = 'Saturday';
        // dd($today);
        if (auth()->user()->role === 'teacher') {
            $teacherId = auth()->id();

            $data['appointments'] = StudentCourse::where('teacher_id', $teacherId)
                ->where('day', $today)
                ->orderBy('start_time')
                ->with('student', 'course', 'zoom_meeting')
                ->get();
            // dd($data);
            return view('site.pages.teachers.appointments', $data);
        }

        elseif (auth()->user()->role === 'student') {
            $studentId = auth()->id();

            $data['appointments'] = StudentCourse::where('student_id', $studentId)
                ->where('day', $today)
                ->orderBy('start_time')
                ->with('teacher', 'course', 'zoom_meeting')
                ->get();
            // dd($data);
            return view('site.pages.students.appointments', $data);
        }

        else {
            $data['appointments'] = StudentCourse::where('day', $today)
                ->orderBy('start_time')
                ->with('teacher', 'student', 'course')
                ->get();
            // dd($data);
            return view('admin.pages.appointments.index', $data);
        }
    }

    public function startLecture($id)
    {
        $appointment = StudentCourse::findOrFail($id);

        if (auth()->id() !== $appointment->teacher_id) {
            return back()->with('error', 'You are not authorized to start this lecture');
        }

        if ($appointment->status === 'in_progress') {
            return back()->with('error', 'Lecture is already in progress');
        }

        $zoomMeeting = $this->createZoomMeeting($appointment);

        $appointment->update([
            'status' => 'in_progress'
        ]);

        // return view('appointments.lecture', compact('appointment', 'zoomMeeting'));
        return back()->with('success', 'Lecture has started successfully');

    }

    private function createZoomMeeting($appointment)
    {
        $user = Zoom::user()->first();
        $meetingData = [
            'topic' => "Quran Lesson - {$appointment->course->name}",
            'duration' => 60,
            'password' => substr(str_shuffle("0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 6),
            'start_time' => Carbon::now()->format('Y-m-d\TH:i:s'),
            'timezone' => config('app.timezone'),
            'settings' => [
                'host_video' => true,
                'participant_video' => true,
                'join_before_host' => true,
                'mute_upon_entry' => true,
                'waiting_room' => false,
                'approval_type' => 0,
                'audio' => 'both',
                'auto_recording' => 'none'
            ]
        ];

        $zoomMeeting = $user->meetings()->create($meetingData);

        $meeting = new ZoomMeeting();
        $meeting->appointment_id = $appointment->id;
        $meeting->topic = $meetingData['topic'];
        $meeting->meeting_id = $zoomMeeting->id;
        $meeting->join_url = $zoomMeeting->join_url;
        $meeting->password = $meetingData['password'];
        $meeting->start_time = Carbon::now()->format('Y-m-d H:i:s');
        $meeting->duration = $meetingData['duration'];
        $meeting->save();

        return $meeting;
    }

    public function endLecture($id)
    {
        $appointment = StudentCourse::findOrFail($id);

        if (auth()->id() !== $appointment->teacher_id) {
            return back()->with('error', 'You are not authorized to end this lecture');
        }

        if ($appointment->status !== 'in_progress') {
            return back()->with('error', 'Lecture is not in progress');
        }

        $zoomMeeting = ZoomMeeting::where('appointment_id', $appointment->id)
            ->latest()
            ->first();

        if ($zoomMeeting) {
            try {
                $meeting = Zoom::meeting()->find($zoomMeeting->meeting_id);
                $meeting->endMeeting();
            } catch (\Exception $e) {
                return back()->with('error', 'Failed to end Zoom meeting: ' . $e->getMessage());
            }
        }

        $appointment->update([
            'status' => 'ended'
        ]);

        return back()->with('success', 'Lecture has ended successfully');
    }
}
