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
                    <img src="{{ asset('front_assets/images/pages/teacher-profile/course-teacher.png') }}"
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

                                    <!-- Filter Tabs - Teacher Specific -->
                                    <div class="filter-tabs">
                                        <button class="filter-tab active" data-filter="all">{{ trans('notifications.all') }}</button>
                                        <button class="filter-tab" data-filter="unread">{{ trans('notifications.unread') }}</button>
                                        <button class="filter-tab" data-filter="lecture_reminder">{{ trans('notifications.lecture_reminders') }}</button>
                                        <button class="filter-tab" data-filter="start_lecture">{{ trans('notifications.start_lecture') }}</button>
                                        <button class="filter-tab" data-filter="end_lecture_reminder">{{ trans('notifications.end_lecture_reminders') }}</button>
                                        <button class="filter-tab" data-filter="lecture_missed">{{ trans('notifications.missed_lectures') }}</button>
                                        <button class="filter-tab" data-filter="auto_ended_lecture">{{ trans('notifications.auto_ended_lectures') }}</button>
                                        <button class="filter-tab" data-filter="tomorrow_lecture">{{ trans('notifications.tomorrow_lectures') }}</button>
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

                                                // تحويل نوع الإشعار إلى النموذج المستخدم في التصفية
                                                $filterType = match($notificationType) {
                                                    'LectureReminderNotification' => 'lecture_reminder',
                                                    'StartLectureNotification' => 'start_lecture',
                                                    'EndLectureReminderNotification' => 'end_lecture_reminder',
                                                    'MissedLectureNotification' => 'lecture_missed',
                                                    'AutoEndedLectureNotification' => 'auto_ended_lecture',
                                                    'TomorrowLectureNotification' => 'tomorrow_lecture',
                                                    'AppointmentCancelledNotification' => 'cancelled',
                                                    default => strtolower(str_replace('Notification', '', $notificationType))
                                                };

                                                $iconClass = get_notification_icon($notificationType);
                                                $colorClass = 'type-' . get_notification_color($notificationType);
                                                $typeLabel = trans('notifications.' . Str::snake($notificationType));
                                            @endphp

                                            <div class="notification-item {{ $isUnread ? 'unread' : 'read' }}"
                                                data-type="{{ $filterType }}"
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
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-danger"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-danger"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-danger"></i>
                                                                                <strong>{{ trans('notifications.scheduled_time') }}:</strong>
                                                                                {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-calendar text-danger"></i>
                                                                                <strong>{{ trans('notifications.day') }}:</strong> {{ $data['day'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['cancelled_by']))
                                                                            <div>
                                                                                <i class="fa fa-user-times text-danger"></i>
                                                                                <strong>{{ trans('notifications.cancelled_by') }}:</strong> {{ $data['cancelled_by'] ?? 'Student' }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['reason']))
                                                                            <div>
                                                                                <i class="fa fa-comment-alt text-danger"></i>
                                                                                <strong>{{ trans('notifications.cancellation_reason') }}:</strong> {{ $data['reason'] }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @case('LectureReminderNotification')
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-info"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-info"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']) && isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-info"></i>
                                                                                <strong>{{ trans('notifications.scheduled_for') }}:</strong>
                                                                                {{ $data['day'] }}, {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if($notificationType === 'LectureReminderNotification' && isset($data['reminder_minutes']))
                                                                            <div class="text-warning">
                                                                                <i class="fa fa-bell"></i>
                                                                                <strong>{{ trans('notifications.reminder_time') }}:</strong>
                                                                                {{ $data['reminder_minutes'] }} {{ trans('notifications.minutes_before') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @case('StartLectureNotification')
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-success"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-success"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-success"></i>
                                                                                <strong>{{ trans('notifications.lecture_time') }}:</strong>
                                                                                {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-calendar text-success"></i>
                                                                                <strong>{{ trans('notifications.day') }}:</strong> {{ $data['day'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['zoom_link']))
                                                                            <div>
                                                                                <i class="fa fa-video text-success"></i>
                                                                                <a href="{{ $data['zoom_link'] }}" target="_blank" class="btn btn-sm btn-primary">
                                                                                    <i class="fa fa-sign-in-alt"></i> {{ trans('notifications.start_lecture') }}
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @case('EndLectureReminderNotification')
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-warning"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-warning"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-warning"></i>
                                                                                <strong>{{ trans('notifications.lecture_time') }}:</strong>
                                                                                {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-calendar text-warning"></i>
                                                                                <strong>{{ trans('notifications.day') }}:</strong> {{ $data['day'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['remaining_minutes']))
                                                                            <div class="text-danger">
                                                                                <i class="fa fa-exclamation-circle"></i>
                                                                                <strong>{{ trans('notifications.remaining_time') }}:</strong>
                                                                                {{ $data['remaining_minutes'] }} {{ trans('notifications.minutes') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @case('MissedLectureNotification')
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-danger"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-danger"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-calendar text-danger"></i>
                                                                                <strong>{{ trans('notifications.missed_on') }}:</strong> {{ $data['day'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-danger"></i>
                                                                                <strong>{{ trans('notifications.scheduled_time') }}:</strong>
                                                                                {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['reason']))
                                                                            <div>
                                                                                <i class="fa fa-comment-alt text-danger"></i>
                                                                                <strong>{{ trans('notifications.missed_reason') }}:</strong> {{ $data['reason'] }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @case('AutoEndedLectureNotification')
                                                                    <div class="d-flex flex-column gap-2">
                                                                        @if(isset($data['student_name']))
                                                                            <div>
                                                                                <i class="fa fa-user text-primary"></i>
                                                                                <strong>{{ trans('notifications.student') }}:</strong> {{ $data['student_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['course_name']))
                                                                            <div>
                                                                                <i class="fa fa-book text-primary"></i>
                                                                                <strong>{{ trans('notifications.course') }}:</strong> {{ $data['course_name'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['start_time']) && isset($data['end_time']))
                                                                            <div>
                                                                                <i class="fa fa-clock text-primary"></i>
                                                                                <strong>{{ trans('notifications.lecture_duration') }}:</strong>
                                                                                {{ format_time_arabic($data['start_time']) }} - {{ format_time_arabic($data['end_time']) }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['day']))
                                                                            <div>
                                                                                <i class="fa fa-calendar text-primary"></i>
                                                                                <strong>{{ trans('notifications.day') }}:</strong> {{ $data['day'] }}
                                                                            </div>
                                                                        @endif
                                                                        @if(isset($data['overtime_minutes']))
                                                                            <div class="text-warning">
                                                                                <i class="fa fa-exclamation-triangle"></i>
                                                                                <strong>{{ trans('notifications.auto_ended_after') }}:</strong>
                                                                                {{ $data['overtime_minutes'] }} {{ trans('notifications.minutes_overtime') }}
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                    @break

                                                                @default
                                                                    @if(isset($data['appointment']))
                                                                        <div class="d-flex flex-column gap-2">
                                                                            @if(isset($data['appointment']['student_name']))
                                                                                <div>
                                                                                    <i class="fa fa-user"></i>
                                                                                    <strong>{{ trans('notifications.student') }}:</strong> {{ $data['appointment']['student_name'] }}
                                                                                </div>
                                                                            @endif
                                                                            @if(isset($data['appointment']['course_name']))
                                                                                <div>
                                                                                    <i class="fa fa-book"></i>
                                                                                    <strong>{{ trans('notifications.course') }}:</strong> {{ $data['appointment']['course_name'] }}
                                                                                </div>
                                                                            @endif
                                                                            @if(isset($data['appointment']['start_time']) && isset($data['appointment']['end_time']))
                                                                                <div>
                                                                                    <i class="fa fa-clock"></i>
                                                                                    <strong>{{ trans('notifications.time') }}:</strong>
                                                                                    {{ format_time_arabic($data['appointment']['start_time']) }} -
                                                                                    {{ format_time_arabic($data['appointment']['end_time']) }}
                                                                                </div>
                                                                            @endif
                                                                        </div>
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
                                                <p>{{ trans('notifications.no_notifications_teacher_desc') }}</p>
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
        // Filter functionality for teacher notifications
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
                case 'lecture_reminder':
                    $('.notification-item[data-type="lecture_reminder"]').show();
                    hasVisibleItems = $('.notification-item[data-type="lecture_reminder"]').length > 0;
                    break;
                case 'start_lecture':
                    $('.notification-item[data-type="start_lecture"]').show();
                    hasVisibleItems = $('.notification-item[data-type="start_lecture"]').length > 0;
                    break;
                case 'end_lecture_reminder':
                    $('.notification-item[data-type="end_lecture_reminder"]').show();
                    hasVisibleItems = $('.notification-item[data-type="end_lecture_reminder"]').length > 0;
                    break;
                case 'lecture_missed':
                    $('.notification-item[data-type="lecture_missed"]').show();
                    hasVisibleItems = $('.notification-item[data-type="lecture_missed"]').length > 0;
                    break;
                case 'auto_ended_lecture':
                    $('.notification-item[data-type="auto_ended_lecture"]').show();
                    hasVisibleItems = $('.notification-item[data-type="auto_ended_lecture"]').length > 0;
                    break;
                case 'tomorrow_lecture':
                    $('.notification-item[data-type="tomorrow_lecture"]').show();
                    hasVisibleItems = $('.notification-item[data-type="tomorrow_lecture"]').length > 0;
                    break;
                case 'cancelled':
                    $('.notification-item[data-type="cancelled"]').show();
                    hasVisibleItems = $('.notification-item[data-type="cancelled"]').length > 0;
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
