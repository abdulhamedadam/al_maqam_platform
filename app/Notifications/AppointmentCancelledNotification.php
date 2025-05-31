<?php

namespace App\Notifications;

use App\Models\StudentCourse;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AppointmentCancelledNotification extends Notification
{
    use Queueable;

    protected $message;
    protected $appointment;
    protected $cancelledBy;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, StudentCourse $appointment, $cancelledBy)
    {
        $this->message = $message;
        $this->appointment = $appointment;
        $this->cancelledBy = $cancelledBy;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'appointment_id' => $this->appointment->id,
            'course_name' => $this->appointment->course->name ?? 'Unknown Course',
            'day' => $this->appointment->day,
            'start_time' => $this->appointment->start_time,
            'end_time' => $this->appointment->end_time,
            'cancelled_by' => $this->cancelledBy
        ];
    }
}
