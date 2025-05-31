<?php

namespace App\Notifications;

use App\Models\StudentCourse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LectureNotification extends Notification
{
    use Queueable;

    public $appointment;
    public $type;
    public $message;

    public function __construct($message, StudentCourse $appointment, $type)
    {
        $this->appointment = $appointment;
        $this->type = $type;
        $this->message = $message;
    }

    public function via($notifiable)
    {
        return ['database'];
    }


    public function toDatabase($notifiable)
    {
        return [
            'appointment_id' => $this->appointment->id,
            'type' => $this->type,
            'message' => $this->message,
            'course_name' => $this->appointment->course->name,
            'start_time' => $this->appointment->start_time,
            'end_time' => $this->appointment->end_time,
            'zoom_link' => $this->appointment->zoom_meeting->join_url ?? null,
            'status' => $this->appointment->status,
        ];
    }
}
