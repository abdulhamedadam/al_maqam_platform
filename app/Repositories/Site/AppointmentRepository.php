<?php


namespace App\Repositories\Site;


use App\Interfaces\Site\AppointmentInterface;
use App\Models\Course;
use App\Models\StudentCourse;
use App\Models\ZoomMeeting;

class AppointmentRepository implements AppointmentInterface
{
    public function getTodaysAppointments($role, $userId, $today)
    {
        if ($role === 'teacher') {
            return StudentCourse::where('teacher_id', $userId)
                ->where('day', $today)
                ->orderBy('start_time')
                ->with('student', 'course', 'zoom_meeting')
                ->get();
        }

        if ($role === 'student') {
            return StudentCourse::where('student_id', $userId)
                ->where('day', $today)
                ->orderBy('start_time')
                ->with('teacher', 'course', 'zoom_meeting')
                ->get();
        }

        return StudentCourse::where('day', $today)
            ->orderBy('start_time')
            ->with('teacher', 'student', 'course')
            ->get();
    }

    public function findAppointmentById($id)
    {
        return StudentCourse::findOrFail($id);
    }

    public function updateAppointmentStatus($id, $status)
    {
        return StudentCourse::where('id', $id)->update(['status' => $status]);
    }

    public function saveZoomMeeting($appointmentId, $meetingData, $zoomMeeting)
    {

        $data['appointment_id'] = $appointmentId;
        $data['topic'] = $meetingData['topic'];
        $data['meeting_id'] = $zoomMeeting->id;
        $data['join_url'] = $zoomMeeting->join_url;
        $data['password'] = $meetingData['password'];
        $data['start_time'] = now();
        $data['duration'] = $meetingData['duration'];

        return ZoomMeeting::create($data);
    }

    public function getLatestZoomMeetingByAppointmentId($appointmentId)
    {
        return ZoomMeeting::where('appointment_id', $appointmentId)
            ->latest()
            ->first();
    }
}
