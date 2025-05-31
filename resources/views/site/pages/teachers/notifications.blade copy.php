{{-- @extends('site.layouts.main')

@section('title', 'Notifications | Quraan')

@section('header_class', 'teacher-page')

@section('body_class', 'teacher-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/teacher-profile.css') }}">
    <style>
        .notifications-header {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            font-size: 1.8rem;
            color: #333;
        }

        .notifications-container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            padding: 20px;
        }

        .notification-item {
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: all 0.3s ease;
        }

        .notification-item:hover {
            background-color: #f9f9f9;
        }

        .notification-item.unread {
            background-color: #f0f8ff;
            border-left: 4px solid #007bff;
        }

        .notification-title {
            font-weight: bold;
            font-size: 1.1rem;
            margin-bottom: 5px;
            color: #333;
        }

        .notification-message {
            color: #555;
            margin-bottom: 5px;
        }

        .notification-time {
            font-size: 0.85rem;
            color: #888;
        }

        .notification-actions {
            margin-top: 10px;
        }

        .mark-all-read {
            margin-bottom: 20px;
            text-align: right;
        }

        .empty-notifications {
            text-align: center;
            padding: 40px;
            color: #888;
        }

        .badge {
            font-size: 0.75rem;
            padding: 3px 6px;
            margin-left: 5px;
        }

        .notification-icon {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin-left: 15px;
            flex-shrink: 0;
        }

        .lecture-icon {
            background-color: #e3f2fd;
            color: #1976d2;
        }

        .reminder-icon {
            background-color: #fff8e1;
            color: #ff8f00;
        }

        .missed-icon {
            background-color: #ffebee;
            color: #d32f2f;
        }

        .completed-icon {
            background-color: #e8f5e9;
            color: #388e3c;
        }
    </style>
@endsection

@section('content')
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="teacher-profile-author pb-30">
                <div class="teacher-profile-author-img">
                    <img src="{{ asset('front_assets/images/pages/teacher-profile/teacher-profile.png') }}" alt="img not found" />
                </div>
                <div class="teacher-profile-author-text">
                    <span>{{ trans('profile.hello') }},</span>
                    <h3 class="teacher-profile-author-name">{{ auth('web')->user()->name }}</h3>
                </div>
            </div>
            <div class="row">
                @include('site.pages.teachers.teacher_sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="teacher-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="notifications" role="tabpanel" aria-labelledby="notifications-tab">
                                <div class="notifications-container">
                                    <h1 class="notifications-header">{{ trans('notifications.my_notifications') }}</h1>

                                    @if($notifications->count() > 0)
                                        <div class="mark-all-read">
                                            <form action="{{ route('user.teacher.notifications.mark_all_read') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    {{ trans('notifications.mark_all_as_read') }}
                                                </button>
                                            </form>
                                        </div>

                                        @foreach($notifications as $notification)
                                            <div class="notification-item {{ $notification->unread() ? 'unread' : '' }}">
                                                <div class="d-flex align-items-start">
                                                    <div class="notification-icon
                                                        @if(str_contains($notification->type, 'Reminder')) reminder-icon
                                                        @elseif(str_contains($notification->type, 'Missed')) missed-icon
                                                        @elseif(str_contains($notification->type, 'Completed') || str_contains($notification->type, 'Ended')) completed-icon
                                                        @else lecture-icon @endif">
                                                        <i class="fas
                                                            @if(str_contains($notification->type, 'Reminder')) fa-bell
                                                            @elseif(str_contains($notification->type, 'Missed')) fa-exclamation-triangle
                                                            @elseif(str_contains($notification->type, 'Completed') || str_contains($notification->type, 'Ended')) fa-check-circle
                                                            @else fa-chalkboard-teacher @endif"></i>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <div class="notification-title">
                                                            {{ $notification->data['title'] ?? $notification->type }}
                                                            @if($notification->unread())
                                                                <span class="badge bg-primary">{{ trans('notifications.new') }}</span>
                                                            @endif
                                                        </div>
                                                        <div class="notification-message">
                                                            {{ $notification->data['message'] ?? '' }}
                                                        </div>
                                                        <div class="notification-time">
                                                            {{ $notification->created_at->diffForHumans() }}
                                                        </div>
                                                        @if(isset($notification->data['appointment_id']))
                                                            <div class="notification-actions">
                                                                @if($notification->type === 'App\Notifications\StartLectureNotification')
                                                                    <form action="{{ route('user.teacher.start_lecture', $notification->data['appointment_id']) }}" method="POST" class="d-inline">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-sm btn-success">
                                                                            {{ trans('appointments.start_lecture') }}
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                                <form action="{{ route('user.teacher.notifications.mark_as_read', $notification->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-sm btn-outline-secondary">
                                                                        {{ trans('notifications.mark_as_read') }}
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        <div class="mt-4">
                                            {{ $notifications->links() }}
                                        </div>
                                    @else
                                        <div class="empty-notifications">
                                            <i class="far fa-bell fa-3x mb-3"></i>
                                            <h4>{{ trans('notifications.no_notifications') }}</h4>
                                            <p>{{ trans('notifications.no_notifications_message') }}</p>
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
        // Mark notification as read when clicked
        $('.notification-item').on('click', function() {
            const notificationId = $(this).find('form').data('notification-id');
            if (notificationId && $(this).hasClass('unread')) {
                $.ajax({
                    url: '/teacher/notifications/' + notificationId + '/mark-read',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function() {
                        location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection --}}

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

                                                switch($notificationType) {
                                                    case 'LectureReminderNotification':
                                                        $typeClass = 'type-reminder';
                                                        $typeLabel = trans('notifications.reminder');
                                                        $priority = 'medium';
                                                        break;
                                                    case 'StartLectureNotification':
                                                        $typeClass = 'type-start-lecture';
                                                        $typeLabel = trans('notifications.start_lecture');
                                                        $priority = 'high';
                                                        break;
                                                    case 'EndLectureReminderNotification':
                                                        $typeClass = 'type-end-reminder';
                                                        $typeLabel = trans('notifications.end_lecture_reminder');
                                                        $priority = 'high';
                                                        break;
                                                    case 'MissedLectureNotification':
                                                        $typeClass = 'type-missed';
                                                        $typeLabel = trans('notifications.missed_lecture');
                                                        $priority = 'high';
