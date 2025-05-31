<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    // public function index()
    // {
    //     $user = Auth::guard('web')->user();

    //     $notificationStats = [
    //         'total' => $user->notifications()->count(),
    //         'unread' => $user->unreadNotifications()->count(),
    //         'lecture_reminders' => $user->notifications()
    //             ->where('type', 'App\Notifications\LectureReminderNotification')
    //             ->count(),
    //         'lecture_started' => $user->notifications()
    //             ->where('type', 'App\Notifications\LectureStartedNotification')
    //             ->count(),
    //         'missed_lectures' => $user->notifications()
    //             ->where('type', 'App\Notifications\MissedLectureNotification')
    //             ->count(),
    //         'auto_ended' => $user->notifications()
    //             ->where('type', 'App\Notifications\AutoEndedLectureNotification')
    //             ->count(),
    //         'tomorrow_lectures' => $user->notifications()
    //             ->where('type', 'App\Notifications\TomorrowLectureNotification')
    //             ->count(),
    //         'cancelled_appointments' => $user->notifications()
    //             ->where('type', 'App\Notifications\AppointmentCancelledNotification')
    //             ->count(),
    //     ];

    //     return view('site.pages.students.notifications', compact('notificationStats'));
    // }

    // public function getNotifications(Request $request)
    // {
    //     $user = Auth::guard('web')->user();
    //     $type = $request->get('type', 'all');
    //     $page = $request->get('page', 1);
    //     $perPage = 15;

    //     $query = $user->notifications()->orderBy('created_at', 'desc');

    //     if ($type !== 'all') {
    //         $notificationTypes = [
    //             'lecture_reminders' => 'App\Notifications\LectureReminderNotification',
    //             'lecture_started' => 'App\Notifications\LectureStartedNotification',
    //             'missed_lectures' => 'App\Notifications\MissedLectureNotification',
    //             'auto_ended' => 'App\Notifications\AutoEndedLectureNotification',
    //             'tomorrow_lectures' => 'App\Notifications\TomorrowLectureNotification',
    //             'cancelled_appointments' => 'App\Notifications\AppointmentCancelledNotification',
    //             'unread' => null
    //         ];

    //         if ($type === 'unread') {
    //             $query->whereNull('read_at');
    //         } elseif (isset($notificationTypes[$type])) {
    //             $query->where('type', $notificationTypes[$type]);
    //         }
    //     }

    //     $notifications = $query->paginate($perPage, ['*'], 'page', $page);

    //     $formattedNotifications = $notifications->map(function ($notification) {
    //         return [
    //             'id' => $notification->id,
    //             'type' => $this->getNotificationType($notification->type),
    //             'title' => $this->getNotificationTitle($notification),
    //             'message' => $this->getNotificationMessage($notification),
    //             'data' => $notification->data,
    //             'read_at' => $notification->read_at,
    //             'created_at' => $notification->created_at,
    //             'created_at_human' => $notification->created_at->diffForHumans(),
    //             'is_read' => !is_null($notification->read_at),
    //             'icon' => $this->getNotificationIcon($notification->type),
    //             'color' => $this->getNotificationColor($notification->type),
    //         ];
    //     });

    //     return response()->json([
    //         'notifications' => $formattedNotifications,
    //         'pagination' => [
    //             'current_page' => $notifications->currentPage(),
    //             'last_page' => $notifications->lastPage(),
    //             'per_page' => $notifications->perPage(),
    //             'total' => $notifications->total(),
    //             'has_more' => $notifications->hasMorePages()
    //         ]
    //     ]);
    // }

    // public function markAsRead($id)
    // {
    //     $user = Auth::guard('web')->user();
    //     $notification = $user->notifications()->find($id);

    //     if ($notification) {
    //         $notification->markAsRead();
    //         return response()->json(['success' => true, 'message' => trans('notifications.marked_as_read')]);
    //     }

    //     return response()->json(['success' => false, 'message' => trans('notifications.notification_not_found')], 404);
    // }

    // public function markAllAsRead()
    // {
    //     $user = Auth::guard('web')->user();
    //     $user->unreadNotifications()->update(['read_at' => now()]);

    //     return response()->json(['success' => true, 'message' => trans('notifications.all_marked_as_read')]);
    // }

    // private function getNotificationType($type)
    // {
    //     $types = [
    //         'App\Notifications\LectureReminderNotification' => 'lecture_reminder',
    //         'App\Notifications\LectureStartedNotification' => 'lecture_started',
    //         'App\Notifications\MissedLectureNotification' => 'missed_lecture',
    //         'App\Notifications\AutoEndedLectureNotification' => 'auto_ended',
    //         'App\Notifications\TomorrowLectureNotification' => 'tomorrow_lecture',
    //         'App\Notifications\AppointmentCancelledNotification' => 'cancelled_appointment',
    //     ];

    //     return $types[$type] ?? 'general';
    // }

    // private function getNotificationTitle($notification)
    // {
    //     $titles = [
    //         'App\Notifications\LectureReminderNotification' => trans('notifications.lecture_reminder'),
    //         'App\Notifications\LectureStartedNotification' => trans('notifications.lecture_started'),
    //         'App\Notifications\MissedLectureNotification' => trans('notifications.missed_lecture'),
    //         'App\Notifications\AutoEndedLectureNotification' => trans('notifications.auto_ended_lecture'),
    //         'App\Notifications\TomorrowLectureNotification' => trans('notifications.tomorrow_lecture'),
    //         'App\Notifications\AppointmentCancelledNotification' => trans('notifications.appointment_cancelled'),
    //     ];

    //     return $titles[$notification->type] ?? trans('notifications.general_notification');
    // }

    // private function getNotificationMessage($notification)
    // {
    //     if (isset($notification->data['message'])) {
    //         return $notification->data['message'];
    //     }

    //     $messages = [
    //         'App\Notifications\LectureReminderNotification' => trans('notifications.you_have_lecture_soon'),
    //         'App\Notifications\LectureStartedNotification' => trans('notifications.teacher_started_lecture'),
    //         'App\Notifications\MissedLectureNotification' => trans('notifications.lecture_was_missed'),
    //         'App\Notifications\AutoEndedLectureNotification' => trans('notifications.lecture_auto_ended'),
    //         'App\Notifications\TomorrowLectureNotification' => trans('notifications.you_have_lecture_tomorrow'),
    //         'App\Notifications\AppointmentCancelledNotification' => trans('notifications.appointment_was_cancelled'),
    //     ];

    //     return $messages[$notification->type] ?? trans('notifications.new_notification');
    // }

    // private function getNotificationIcon($type)
    // {
    //     $icons = [
    //         'App\Notifications\LectureReminderNotification' => 'fa-clock',
    //         'App\Notifications\LectureStartedNotification' => 'fa-play-circle',
    //         'App\Notifications\MissedLectureNotification' => 'fa-exclamation-triangle',
    //         'App\Notifications\AutoEndedLectureNotification' => 'fa-power-off',
    //         'App\Notifications\TomorrowLectureNotification' => 'fa-calendar-alt',
    //         'App\Notifications\AppointmentCancelledNotification' => 'fa-ban',
    //     ];

    //     return $icons[$type] ?? 'fa-bell';
    // }

    // private function getNotificationColor($type)
    // {
    //     $colors = [
    //         'App\Notifications\LectureReminderNotification' => 'warning',
    //         'App\Notifications\LectureStartedNotification' => 'success',
    //         'App\Notifications\MissedLectureNotification' => 'danger',
    //         'App\Notifications\AutoEndedLectureNotification' => 'secondary',
    //         'App\Notifications\TomorrowLectureNotification' => 'primary',
    //         'App\Notifications\AppointmentCancelledNotification' => 'danger',
    //     ];

    //     return $colors[$type] ?? 'light';
    // }
    public function index(Request $request)
    {
        $user = Auth::guard('web')->user();
        $role = auth('web')->user()->role;

        $notifications = $user->notifications()
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        // dd($notifications);
        return view("site.pages.{$role}s.notifications", compact('notifications'));
        // return view('site.pages.notifications', compact('notifications'));
    }

    /**
     * Mark a specific notification as read
     */
    public function markAsRead(Request $request, $notificationId)
    {
        try {
            $user = Auth::guard('web')->user();

            $notification = $user->notifications()
                ->where('id', $notificationId)
                ->first();

            if (!$notification) {
                return response()->json([
                    'success' => false,
                    'message' => trans('notifications.notification_not_found')
                ], 404);
            }

            if (is_null($notification->read_at)) {
                $notification->markAsRead();
            }

            return response()->json([
                'success' => true,
                'message' => trans('notifications.marked_as_read')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('notifications.error_marking_read')
            ], 500);
        }
    }

    /**
     * Mark all notifications as read
     */
    public function markAllAsRead(Request $request)
    {
        try {
            $user = Auth::guard('web')->user();

            $user->unreadNotifications->markAsRead();

            return response()->json([
                'success' => true,
                'message' => trans('notifications.all_marked_as_read')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('notifications.error_marking_all_read')
            ], 500);
        }
    }

    /**
     * Get notification counts for AJAX requests
     */
    public function getCounts(Request $request)
    {
        try {
            $user = Auth::guard('web')->user();

            $unreadCount = $user->unreadNotifications->count();
            $readCount = $user->readNotifications->count();
            $totalCount = $user->notifications->count();

            return response()->json([
                'success' => true,
                'data' => [
                    'unread' => $unreadCount,
                    'read' => $readCount,
                    'total' => $totalCount
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching notification counts'
            ], 500);
        }
    }

    /**
     * Delete a notification
     */
    public function destroy(Request $request, $notificationId)
    {
        try {
            $user = Auth::guard('web')->user();

            $notification = $user->notifications()
                ->where('id', $notificationId)
                ->first();

            if (!$notification) {
                return response()->json([
                    'success' => false,
                    'message' => trans('notifications.notification_not_found')
                ], 404);
            }

            $notification->delete();

            return response()->json([
                'success' => true,
                'message' => trans('notifications.notification_deleted')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('notifications.error_deleting')
            ], 500);
        }
    }

    /**
     * Clear all notifications
     */
    public function clearAll(Request $request)
    {
        try {
            $user = Auth::guard('web')->user();

            $user->notifications()->delete();

            return response()->json([
                'success' => true,
                'message' => trans('notifications.all_notifications_cleared')
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => trans('notifications.error_clearing_all')
            ], 500);
        }
    }
}
