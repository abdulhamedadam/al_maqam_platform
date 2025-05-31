@extends('site.layouts.main')

@section('title', 'Teacher Notifications | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
    <style>
        .notifications-header {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            font-size: 1.8rem;
            color: #333;
        }

        .notifications-table {
            width: 100%;
            border-collapse: collapse;
        }

        .notifications-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: right;
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        .notifications-table td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: right;
        }

        .notifications-table th,
        .notifications-table td {
            text-align: center;
            vertical-align: middle;
        }

        .notification-item {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .notification-item:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .notification-item.unread {
            border-left: 4px solid #007bff;
            background: #f8f9ff;
        }

        .notification-item.read {
            border-left: 4px solid #6c757d;
            background: #f8f9fa;
        }

        .notification-header {
            padding: 15px 20px;
            border-bottom: 1px solid #e3e6f0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .notification-title {
            font-weight: bold;
            color: #2c3e50;
            font-size: 1.1rem;
            margin: 0;
        }

        .notification-time {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .notification-body {
            padding: 15px 20px;
        }

        .notification-message {
            color: #495057;
            line-height: 1.6;
            margin-bottom: 10px;
        }

        .notification-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 10px;
            border-top: 1px solid #e9ecef;
            margin-top: 10px;
        }

        .notification-type {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .type-reminder {
            background-color: #fff3cd;
            color: #856404;
        }

        .type-start-lecture {
            background-color: #d1ecf1;
            color: #0c5460;
        }

        .type-end-reminder {
            background-color: #f8d7da;
            color: #721c24;
        }

        .type-missed {
            background-color: #f8d7da;
            color: #721c24;
        }

        .type-auto-ended {
            background-color: #e2e3e5;
            color: #383d41;
        }

        .type-tomorrow {
            background-color: #cce5ff;
            color: #004085;
        }

        .type-student-joined {
            background-color: #d4edda;
            color: #155724;
        }

        .type-student-left {
            background-color: #ffeaa7;
            color: #856404;
        }

        .type-new-appointment {
            background-color: #e1f5fe;
            color: #01579b;
        }

        .type-appointment-cancelled {
            background-color: #ffcdd2;
            color: #c62828;
        }

        .mark-read-btn {
            background: none;
            border: none;
            color: #007bff;
            cursor: pointer;
            font-size: 0.9rem;
            padding: 5px 10px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .mark-read-btn:hover {
            background-color: #e9ecef;
            color: #0056b3;
        }

        .notification-actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }

        .filter-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
            border-bottom: 1px solid #dee2e6;
            flex-wrap: wrap;
        }

        .filter-tab {
            padding: 12px 20px;
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
            white-space: nowrap;
        }

        .filter-tab.active {
            color: #007bff;
            border-bottom-color: #007bff;
        }

        .filter-tab:hover {
            color: #007bff;
            background-color: #f8f9fa;
        }

        .notifications-stats {
            display: flex;
            justify-content: center;
            gap: 30px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .stat-item {
            text-align: center;
            padding: 15px 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            min-width: 120px;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            display: block;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .btn-mark-all-read {
            background-color: #28a745;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
            margin-bottom: 20px;
        }

        .btn-mark-all-read:hover {
            background-color: #218838;
        }

        .priority-indicator {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
            margin-left: 8px;
        }

        .priority-high {
            background-color: #dc3545;
        }

        .priority-medium {
            background-color: #ffc107;
        }

        .priority-low {
            background-color: #28a745;
        }

        .empty-state, .empty-state.filtered-empty {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
            display: none;
        }

        .empty-state i, .empty-state.filtered-empty i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .empty-state:not(.filtered-empty) {
            display: block;
        }

        @media (max-width: 768px) {
            .filter-tabs {
                flex-direction: column;
                align-items: center;
            }

            .filter-tab {
                margin-bottom: 5px;
            }

            .notifications-stats {
                flex-direction: column;
                align-items: center;
            }
        }
    </style>
@endsection

@section('content')
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="student-profile-author pb-30">
                <div class="student-profile-author-img">
                    <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}"
                        alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <span>{{ trans('profile.hello') }},</span>
                    <h3 class="student-profile-author-name">{{ auth('web')->user()->name }}</h3>
                </div>
            </div>
            <div class="row">
                @include('site.pages.teachers.teacher_sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="notifications" role="tabpanel"
                                aria-labelledby="notifications-tab">
                                <div class="container notifications-container">
                                    <h1 class="text-center notifications-header">{{ trans('notifications.my_notifications') }}</h1>

                                    <!-- Notifications Stats -->
                                    <div class="notifications-stats">
                                        <div class="stat-item">
                                            <span class="stat-number">{{ $notifications->where('read_at', null)->count() }}</span>
                                            <span class="stat-label">{{ trans('notifications.unread') }}</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number">{{ $notifications->where('read_at', '!=', null)->count() }}</span>
                                            <span class="stat-label">{{ trans('notifications.read') }}</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number">{{ $notifications->count() }}</span>
                                            <span class="stat-label">{{ trans('notifications.total') }}</span>
                                        </div>
                                    </div>

                                    <!-- Filter Tabs -->
                                    <div class="filter-tabs">
                                        <button class="filter-tab active" data-filter="all">{{ trans('notifications.all') }}</button>
                                        <button class="filter-tab" data-filter="unread">{{ trans('notifications.unread') }}</button>
                                        <button class="filter-tab" data-filter="reminders">{{ trans('notifications.reminders') }}</button>
                                        <button class="filter-tab" data-filter="start_lecture">{{ trans('notifications.start_lecture') }}</button>
                                        <button class="filter-tab" data-filter="end_lecture">{{ trans('notifications.end_lecture') }}</button>
                                        <button class="filter-tab" data-filter="student_activity">{{ trans('notifications.student_activity') }}</button>
                                        <button class="filter-tab" data-filter="appointments">{{ trans('notifications.appointments') }}</button>
                                        <button class="filter-tab" data-filter="missed">{{ trans('notifications.missed_lectures') }}</button>
                                    </div>

                                    <!-- Mark All as Read Button -->
                                    @if($notifications->where('read_at', null)->count() > 0)
                                        <div class="text-center mb-4">
                                            <button class="btn-mark-all-read" onclick="markAllAsRead()">
                                                <i class="fa fa-check-double"></i> {{ trans('notifications.mark_all_read') }}
                                            </button>
                                        </div>
                                    @endif

                                    <!-- Notifications List -->
                                    <div class="notifications-list">
                                        @forelse($notifications as $notification)
                                            @php
                                                $data = $notification->data;
                                                $isUnread = is_null($notification->read_at);
                                                $notificationType = class_basename($notification->type);

                                                $typeClass = 'type-reminder';
                                                $typeLabel = trans('notifications.reminder');
                                                $priority = 'medium';
                                                $iconClass = 'fa fa-bell';

                                                switch($notificationType) {
                                                    case 'LectureReminderNotification':
                                                        $typeClass = 'type-reminder';
                                                        $typeLabel = trans('notifications.lecture_reminder');
                                                        $priority = 'medium';
                                                        $iconClass = 'fa fa-clock';
                                                        break;
                                                    case 'StartLectureNotification':
                                                        $typeClass = 'type-start-lecture';
                                                        $typeLabel = trans('notifications.start_lecture');
                                                        $priority = 'high';
                                                        $iconClass = 'fa fa-play-circle';
                                                        break;
                                                    case 'EndLectureReminderNotification':
                                                        $typeClass = 'type-end-reminder';
                                                        $typeLabel = trans('notifications.end_lecture_reminder');
                                                        $priority = 'high';
                                                        $iconClass = 'fa fa-stop-circle';
                                                        break;
                                                    case 'MissedLectureNotification':
                                                        $typeClass = 'type-missed';
                                                        $typeLabel = trans('notifications.missed_lecture');
                                                        $priority = 'high';
                                                        $iconClass = 'fa fa-exclamation-triangle';
                                                        break;
                                                    case 'TomorrowLectureNotification':
                                                        $typeClass = 'type-tomorrow';
                                                        $typeLabel = trans('notifications.tomorrow_lecture');
                                                        $priority = 'medium';
                                                        $iconClass = 'fa fa-calendar-alt';
                                                        break;
                                                    case 'StudentJoinedLectureNotification':
                                                        $typeClass = 'type-student-joined';
                                                        $typeLabel = trans('notifications.student_joined');
                                                        $priority = 'low';
                                                        $iconClass = 'fa fa-user-plus';
                                                        break;
                                                    case 'StudentLeftLectureNotification':
                                                        $typeClass = 'type-student-left';
                                                        $typeLabel = trans('notifications.student_left');
                                                        $priority = 'low';
                                                        $iconClass = 'fa fa-user-minus';
                                                        break;
                                                    case 'NewAppointmentNotification':
                                                        $typeClass = 'type-new-appointment';
                                                        $typeLabel = trans('notifications.new_appointment');
                                                        $priority = 'high';
                                                        $iconClass = 'fa fa-calendar-plus';
                                                        break;
                                                    case 'AppointmentCancelledNotification':
                                                        $typeClass = 'type-appointment-cancelled';
                                                        $typeLabel = trans('notifications.appointment_cancelled');
                                                        $priority = 'high';
                                                        $iconClass = 'fa fa-calendar-times';
                                                        break;
                                                    case 'AutoEndedLectureNotification':
                                                        $typeClass = 'type-auto-ended';
                                                        $typeLabel = trans('notifications.auto_ended_lecture');
                                                        $priority = 'medium';
                                                        $iconClass = 'fa fa-clock';
                                                        break;
                                                    default:
                                                        $typeClass = 'type-reminder';
                                                        $typeLabel = trans('notifications.notification');
                                                        $priority = 'medium';
                                                        $iconClass = 'fa fa-bell';
                                                }
                                            @endphp

                                            <div class="notification-item {{ $isUnread ? 'unread' : 'read' }}"
                                                data-type="{{ strtolower(str_replace('Notification', '', $notificationType)) }}"
                                                data-read="{{ $isUnread ? 'unread' : 'read' }}">
                                                <div class="notification-header">
                                                    <h5 class="notification-title">
                                                        @if($isUnread)
                                                            <i class="fa fa-circle text-primary" style="font-size: 0.5rem; margin-left: 8px;"></i>
                                                        @endif
                                                        <i class="{{ $iconClass }} me-2"></i> {{ $typeLabel }}
                                                        <span class="priority-indicator priority-{{ $priority }}"></span>
                                                    </h5>
                                                    <span class="notification-time">
                                                        {{ $notification->created_at->diffForHumans() }}
                                                    </span>
                                                </div>

                                                <div class="notification-body">
                                                    <div class="notification-message">
                                                        {{ $data['message'] ?? trans('notifications.no_message') }}
                                                    </div>

                                                    <div class="notification-details mt-2 p-2 bg-light rounded">
                                                        <small class="text-muted">
                                                            @switch($notificationType)
                                                                @case('LectureReminderNotification')
                                                                @case('TomorrowLectureNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.scheduled_for') }}:</strong> {{ $data['day'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.time') }}:</strong>
                                                                    {{ isset($data['start_time']) ? format_time_arabic($data['start_time']) : 'N/A' }} -
                                                                    {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}
                                                                    @break

                                                                @case('StartLectureNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.started_at') }}:</strong> {{ isset($data['start_time']) ? format_time_arabic($data['start_time']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.ends_at') }}:</strong> {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}<br>
                                                                    @if(isset($data['zoom_link']))
                                                                        <strong>{{ trans('notifications.zoom_link') }}:</strong>
                                                                        <a href="{{ $data['zoom_link'] }}" target="_blank">{{ trans('notifications.join_lecture') }}</a>
                                                                    @endif
                                                                    @break

                                                                @case('EndLectureReminderNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.ending_at') }}:</strong> {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.overtime') }}:</strong> {{ $data['overtime_minutes'] ?? 0 }} {{ trans('notifications.minutes') }}
                                                                    @break

                                                                @case('MissedLectureNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.missed_on') }}:</strong> {{ $data['day'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.scheduled_time') }}:</strong>
                                                                    {{ isset($data['start_time']) ? format_time_arabic($data['start_time']) : 'N/A' }} -
                                                                    {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}
                                                                    @break

                                                                @case('StudentJoinedLectureNotification')
                                                                    <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.joined_at') }}:</strong> {{ isset($data['joined_at']) ? format_time_arabic($data['joined_at']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}
                                                                    @break

                                                                @case('StudentLeftLectureNotification')
                                                                    <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.left_at') }}:</strong> {{ isset($data['left_at']) ? format_time_arabic($data['left_at']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.duration') }}:</strong> {{ $data['duration'] ?? 'N/A' }} {{ trans('notifications.minutes') }}
                                                                    @break

                                                                @case('NewAppointmentNotification')
                                                                    <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.scheduled_for') }}:</strong> {{ $data['day'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.time') }}:</strong>
                                                                    {{ isset($data['start_time']) ? format_time_arabic($data['start_time']) : 'N/A' }} -
                                                                    {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}
                                                                    @break

                                                                @case('AppointmentCancelledNotification')
                                                                    <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.was_scheduled_for') }}:</strong> {{ $data['day'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.cancelled_by') }}:</strong> {{ $data['cancelled_by'] ?? 'Student' }}
                                                                    @break

                                                                @case('AutoEndedLectureNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.ended_at') }}:</strong> {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.overtime') }}:</strong> {{ $data['overtime_minutes'] ?? 0 }} {{ trans('notifications.minutes') }}
                                                                    @break

                                                                @default
                                                                    @if(isset($data['appointment']))
                                                                        <strong>{{ trans('notifications.student') }}:</strong> {{ $data['appointment']['student_name'] ?? 'N/A' }}<br>
                                                                        <strong>{{ trans('notifications.course') }}:</strong> {{ $data['appointment']['course_name'] ?? 'N/A' }}<br>
                                                                        <strong>{{ trans('notifications.time') }}:</strong>
                                                                        {{ isset($data['appointment']['start_time']) ? format_time_arabic($data['appointment']['start_time']) : 'N/A' }} -
                                                                        {{ isset($data['appointment']['end_time']) ? format_time_arabic($data['appointment']['end_time']) : 'N/A' }}
                                                                    @endif
                                                            @endswitch
                                                        </small>
                                                    </div>

                                                    <div class="notification-meta">
                                                        <span class="notification-type {{ $typeClass }}">
                                                            <i class="{{ $iconClass }} me-1"></i> {{ $typeLabel }}
                                                        </span>
                                                        <div class="notification-actions">
                                                            @if($isUnread)
                                                                <button class="mark-read-btn" onclick="markAsRead('{{ $notification->id }}')">
                                                                    <i class="fa fa-check"></i> {{ trans('notifications.mark_read') }}
                                                                </button>
                                                            @endif
                                                            <small class="text-muted">
                                                                {{ $notification->created_at->format('M d, Y H:i') }}
                                                            </small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-state">
                                                <i class="fa fa-bell-slash"></i>
                                                <h4>{{ trans('notifications.no_notifications') }}</h4>
                                                <p>{{ trans('notifications.no_notifications_desc') }}</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <div class="empty-state filtered-empty" style="display: none;">
                                        <i class="fa fa-bell-slash"></i>
                                        <h4>{{ trans('notifications.no_notifications_for_filter') }}</h4>
                                        <p>{{ trans('notifications.try_different_filter') }}</p>
                                    </div>

                                    <!-- Pagination -->
                                    @if($notifications->hasPages())
                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $notifications->links() }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        // Filter functionality
        $('.filter-tab').on('click', function() {
            $('.filter-tab').removeClass('active');
            $(this).addClass('active');

            const filter = $(this).data('filter');
            filterNotifications(filter);
        });

        function filterNotifications(filter) {
            let hasVisibleItems = false;
            $('.notification-item').hide();

            switch(filter) {
                case 'all':
                    $('.notification-item').show();
                    hasVisibleItems = $('.notification-item').length > 0;
                    break;
                case 'unread':
                    $('.notification-item[data-read="unread"]').show();
                    hasVisibleItems = $('.notification-item[data-read="unread"]').length > 0;
                    break;
                case 'reminders':
                    $('.notification-item[data-type*="reminder"], .notification-item[data-type*="tomorrow"]').show();
                    hasVisibleItems = ($('.notification-item[data-type*="reminder"]').length +
                                    $('.notification-item[data-type*="tomorrow"]').length) > 0;
                    break;
                case 'start_lecture':
                    $('.notification-item[data-type*="startlecture"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="startlecture"]').length > 0;
                    break;
                case 'end_lecture':
                    $('.notification-item[data-type*="endlecture"], .notification-item[data-type*="autoended"]').show();
                    hasVisibleItems = ($('.notification-item[data-type*="endlecture"]').length +
                                    $('.notification-item[data-type*="autoended"]').length) > 0;
                    break;
                case 'student_activity':
                    $('.notification-item[data-type*="studentjoined"], .notification-item[data-type*="studentleft"]').show();
                    hasVisibleItems = ($('.notification-item[data-type*="studentjoined"]').length +
                                    $('.notification-item[data-type*="studentleft"]').length) > 0;
                    break;
                case 'appointments':
                    $('.notification-item[data-type*="appointment"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="appointment"]').length > 0;
                    break;
                case 'missed':
                    $('.notification-item[data-type*="missed"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="missed"]').length > 0;
                    break;
            }

            // Handle empty states
            if (hasVisibleItems) {
                $('.empty-state').hide();
            } else {
                if (filter === 'all' && $('.notification-item').length === 0) {
                    $('.empty-state:not(.filtered-empty)').show();
                } else {
                    $('.empty-state.filtered-empty').show();
                }
            }
        }
    });

    // Mark notification as read
    function markAsRead(notificationId) {
        $.ajax({
            url: '/notifications/' + notificationId + '/mark-as-read',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Update the notification item
                    const notificationItem = $('[data-notification-id="' + notificationId + '"]');
                    notificationItem.removeClass('unread').addClass('read');
                    notificationItem.attr('data-read', 'read');

                    // Remove the unread indicator and mark as read button
                    notificationItem.find('.fa-circle').remove();
                    notificationItem.find('.mark-read-btn').remove();

                    // Update stats
                    updateNotificationStats();

                    // Show success message
                    showToast('success', response.message || 'Notification marked as read');
                } else {
                    showToast('error', response.message || 'Failed to mark notification as read');
                }
            },
            error: function(xhr, status, error) {
                showToast('error', 'An error occurred while marking notification as read');
            }
        });
    }

    // Mark all notifications as read
    function markAllAsRead() {
        if (!confirm('Are you sure you want to mark all notifications as read?')) {
            return;
        }

        $.ajax({
            url: '/notifications/mark-all-as-read',
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    // Update all notification items
                    $('.notification-item.unread').removeClass('unread').addClass('read');
                    $('.notification-item').attr('data-read', 'read');

                    // Remove all unread indicators and mark as read buttons
                    $('.notification-item .fa-circle').remove();
                    $('.notification-item .mark-read-btn').remove();

                    // Hide the mark all as read button
                    $('.btn-mark-all-read').parent().hide();

                    // Update stats
                    updateNotificationStats();

                    // Show success message
                    showToast('success', response.message || 'All notifications marked as read');
                } else {
                    showToast('error', response.message || 'Failed to mark all notifications as read');
                }
            },
            error: function(xhr, status, error) {
                showToast('error', 'An error occurred while marking all notifications as read');
            }
        });
    }

    // Update notification stats
    function updateNotificationStats() {
        const unreadCount = $('.notification-item[data-read="unread"]').length;
        const readCount = $('.notification-item[data-read="read"]').length;
        const totalCount = $('.notification-item').length;

        $('.stat-number').eq(0).text(unreadCount);
        $('.stat-number').eq(1).text(readCount);
        $('.stat-number').eq(2).text(totalCount);
    }

    // Show toast message
    function showToast(type, message) {
        // You can implement your own toast notification system here
        // For now, using alert as a placeholder
        if (type === 'success') {
            alert('Success: ' + message);
        } else {
            alert('Error: ' + message);
        }
    }
</script>
@endsection
