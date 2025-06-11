@extends('site.layouts.main')

@section('title', 'Student Notifications | Quraan')

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

        .type-lecture-started {
            background-color: #d4edda;
            color: #155724;
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

        .type-cancelled {
            background-color: #f5c6cb;
            color: #721c24;
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
        }

        .filter-tab {
            padding: 12px 24px;
            background: none;
            border: none;
            color: #6c757d;
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            font-weight: 500;
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
        }

        .stat-item {
            text-align: center;
            padding: 15px 25px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
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

        .empty-state, .empty-state.filtered-empty {
            text-align: center;
            padding: 60px 20px;
            color: #6c757d;
            display: none; /* Start hidden */
        }

        .empty-state i, .empty-state.filtered-empty i {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #dee2e6;
        }

        .empty-state:not(.filtered-empty) {
            display: block;
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
                @include('site.pages.students.student_sidebar')
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
                                        <button class="filter-tab" data-filter="lecture_updates">{{ trans('notifications.lecture_updates') }}</button>
                                        <button class="filter-tab" data-filter="missed">{{ trans('notifications.missed_lectures') }}</button>
                                        <button class="filter-tab" data-filter="cancelled">{{ trans('notifications.cancelled_lectures') }}</button>
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

                                                $iconClass = get_notification_icon($notificationType);
                                                $colorClass = 'type-' . get_notification_color($notificationType);
                                                $typeLabel = trans('notifications.' . Str::snake($notificationType));
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
                                                                @case('AppointmentCancelledNotification')
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.scheduled_time') }}:</strong>
                                                                    {{ isset($data['start_time']) ? format_time_arabic($data['start_time']) : 'N/A' }} -
                                                                    {{ isset($data['end_time']) ? format_time_arabic($data['end_time']) : 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.cancelled_by') }}:</strong> {{ $data['cancelled_by'] ?? 'System' }}
                                                                    @break

                                                                @case('AutoEndedLectureNotification')
                                                                @case('EndLectureNotification')
                                                                    <strong>{{ trans('notifications.teacher') }}:</strong> {{ $data['teacher_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.duration') }}:</strong>
                                                                    {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}<br>
                                                                    @if($notificationType === 'AutoEndedLectureNotification')
                                                                        <strong>{{ trans('notifications.overtime') }}:</strong> {{ $data['overtime_minutes'] }} minutes
                                                                    @endif
                                                                    @break

                                                                @case('EndLectureReminderNotification')
                                                                    <strong>{{ trans('notifications.ending_soon') }}:</strong>
                                                                    {{ format_time_arabic($data['end_time']) }} ({{ $data['overtime_minutes'] }} minutes)<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}
                                                                    @break

                                                                @case('LectureStartedNotification')
                                                                    <strong>{{ trans('notifications.teacher') }}:</strong> {{ $data['teacher_name'] ?? 'N/A' }}<br>
                                                                    <strong>{{ trans('notifications.started_at') }}:</strong> {{ format_time_arabic($data['start_time']) }}<br>
                                                                    <strong>{{ trans('notifications.ends_at') }}:</strong> {{ format_time_arabic($data['end_time']) }}
                                                                    @break

                                                                @case('StartLectureNotification')
                                                                    <strong>{{ trans('notifications.join_now') }}:</strong>
                                                                    @if(isset($data['zoom_link']))
                                                                        <a href="{{ $data['zoom_link'] }}" target="_blank">{{ trans('notifications.zoom_link') }}</a><br>
                                                                    @else
                                                                        {{ trans('notifications.no_link_available') }}<br>
                                                                    @endif
                                                                    <strong>{{ trans('notifications.time') }}:</strong>
                                                                    {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}<br>
                                                                    <strong>{{ trans('notifications.teacher') }}:</strong> {{ $data['teacher_name'] ?? 'N/A' }}
                                                                    @break

                                                                @case('LectureReminderNotification')
                                                                @case('TomorrowLectureNotification')
                                                                    <strong>{{ trans('notifications.scheduled_for') }}:</strong> {{ $data['day'] }},
                                                                    {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}<br>
                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] ?? 'N/A' }}
                                                                    @break

                                                                @case('MissedLectureNotification')
                                                                    <strong>{{ trans('notifications.missed_on') }}:</strong> {{ $data['day'] }}<br>
                                                                    <strong>{{ trans('notifications.scheduled_time') }}:</strong>
                                                                    {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}<br>
                                                                    <strong>{{ trans('notifications.teacher') }}:</strong> {{ $data['teacher_name'] ?? 'N/A' }}
                                                                    @break

                                                                @default
                                                                    @if(isset($data['appointment']))
                                                                        <strong>{{ trans('notifications.teacher') }}:</strong> {{ $data['appointment']['teacher_name'] ?? 'N/A' }}<br>
                                                                        <strong>{{ trans('notifications.course') }}:</strong> {{ $data['appointment']['course_name'] ?? 'N/A' }}<br>
                                                                        <strong>{{ trans('notifications.time') }}:</strong>
                                                                        {{ isset($data['appointment']['start_time']) ? format_time_arabic($data['appointment']['start_time']) : 'N/A' }} -
                                                                        {{ isset($data['appointment']['end_time']) ? format_time_arabic($data['appointment']['end_time']) : 'N/A' }}
                                                                    @endif
                                                            @endswitch
                                                        </small>
                                                    </div>

                                                    <div class="notification-meta">
                                                        <span class="notification-type {{ $colorClass }}">
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
                    $('.notification-item[data-type*="reminder"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="reminder"]').length > 0;
                    break;
                case 'lecture_updates':
                    $('.notification-item[data-type*="started"], .notification-item[data-type*="ended"]').show();
                    hasVisibleItems = ($('.notification-item[data-type*="started"]').length +
                                    $('.notification-item[data-type*="ended"]').length) > 0;
                    break;
                case 'missed':
                    $('.notification-item[data-type*="missed"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="missed"]').length > 0;
                    break;
                case 'cancelled':
                    $('.notification-item[data-type*="appointmentcancelled"]').show();
                    hasVisibleItems = $('.notification-item[data-type*="appointmentcancelled"]').length > 0;
                    break;
            }

            if (hasVisibleItems) {
                $('.empty-state.filtered-empty').hide();
                $('.empty-state:not(.filtered-empty)').hide();
            } else {
                if (filter === 'all' && $('.notification-item').length === 0) {
                    $('.empty-state:not(.filtered-empty)').show();
                    $('.empty-state.filtered-empty').hide();
                } else {
                    $('.empty-state.filtered-empty').show();
                    $('.empty-state:not(.filtered-empty)').hide();
                }
            }
        }

    });

    function markAsRead(notificationId) {
        $.ajax({
            url: '{{ route("user.notifications.mark_read", "") }}/' + notificationId,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            },
            error: function(xhr) {
                console.error('Error marking notification as read:', xhr);
                alert('{{ trans("notifications.error_marking_read") }}');
            }
        });
    }

    function markAllAsRead() {
        if(!confirm('{{ trans("notifications.confirm_mark_all_read") }}')) {
            return;
        }

        $.ajax({
            url: '{{ route("user.notifications.mark_all_read") }}',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if(response.success) {
                    location.reload();
                }
            },
            error: function(xhr) {
                console.error('Error marking all notifications as read:', xhr);
                alert('{{ trans("notifications.error_marking_all_read") }}');
            }
        });
    }
</script>
@endsection
