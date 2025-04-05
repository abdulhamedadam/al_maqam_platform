<?php


namespace App\Interfaces\Site;


interface AppointmentInterface
{
    public function getTodaysAppointments($role, $userId, $today);

    public function findAppointmentById($id);

    public function updateAppointmentStatus($id, $status);

    public function saveZoomMeeting($appointmentId, $meetingData, $zoomMeeting);

    public function getLatestZoomMeetingByAppointmentId($appointmentId);

}
