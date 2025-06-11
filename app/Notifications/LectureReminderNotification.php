<?php

namespace App\Notifications;

use App\Models\StudentCourse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LectureReminderNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $appointment;


    /**
     * Create a new notification instance.
     */
    public function __construct($message, StudentCourse $appointment)
    {
        $this->message = $message;
        $this->appointment = $appointment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'message' => $this->message,
            'appointment_id' => $this->appointment->id,
            'type' => 'lecture_reminder',
            'start_time' => $this->appointment->start_time,
            'end_time' => $this->appointment->end_time,
            'day' => $this->appointment->day,
        ];
    }
}
