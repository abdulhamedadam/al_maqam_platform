@extends('site.layouts.main')

@section('title', trans('notifications.teacher_notifications') . ' | Quraan')

@section('header_class', 'teacher-page')

@section('body_class', 'teacher-profile')

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

        .notifications-stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 30px;
            color: white;
            box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
            margin-top: 20px;
        }

        .stat-item {
            text-align: center;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 15px;
            backdrop-filter: blur(10px);
            transition: transform 0.3s ease;
        }

        .stat-item:hover {
            transform: translateY(-5px);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: bold;
            display: block;
        }

        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            margin-top: 5px;
        }

        .notification-filters {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        }

        .filter-tabs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            border-bottom: 2px solid #f8f9fa;
            padding-bottom: 15px;
            margin-bottom: 20px;
        }

        .filter-tab {
            background: #f8f9fa;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .filter-tab.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .filter-tab:hover:not(.active) {
            background: #e9ecef;
            transform: translateY(-2px);
        }

        .notifications-container {
            background: white;
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.08);
            min-height: 400px;
        }

        .notification-item {
            display: flex;
            align-items: flex-start;
            gap: 15px;
            padding: 20px;
            margin-bottom: 15px;
            border-radius: 12px;
            background: #fafbfc;
            border-left: 4px solid #dee2e6;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .notification-item:hover {
            transform: translateX(5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .notification-item.unread {
            background: #fff7ed;
            border-left-color: #f59e0b;
        }

        .notification-item.warning {
            border-left-color: #f59e0b;
        }

        .notification-item.success {
            border-left-color: #10b981;
        }

        .notification-item.info {
            border-left-color: #3b82f6;
        }

        .notification-item.danger {
            border-left-color: #ef4444;
        }

        .notification-item.secondary {
            border-left-color: #6b7280;
        }

        .notification-item.primary {
            border-left-color: #8b5cf6;
        }

        .notification-icon {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .notification-icon.warning {
            background: #fef3c7;
            color: #d97706;
        }

        .notification-icon.success {
            background: #d1fae5;
            color: #059669;
        }

        .notification-icon.info {
            background: #dbeafe;
            color: #2563eb;
        }

        .notification-icon.danger {
            background: #fee2e2;
            color: #dc2626;
        }

        .notification-icon.secondary {
            background: #f3f4f6;
            color: #4b5563;
        }

        .notification-icon.primary {
            background: #ede9fe;
            color: #7c3aed;
        }

        .notification-content {
            flex: 1;
        }

        .notification-title {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }

        .notification-message {
            color: #6b7280;
            line-height: 1.5;
            margin-bottom: 8px;
        }

        .notification-time {
            font-size: 0.85rem;
            color: #9ca3af;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .notification-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mark-read-btn {
            background: none;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            padding: 5px 10px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .mark-read-btn:hover {
            background: #f3f4f6;
        }

        .loading-spinner {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100px;
        }

        .spinner {
            width: 40px;
            height: 40px;
            border: 4px solid #f3f4f6;
            border-top: 4px solid #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: #6b7280;
        }

        .empty-state i {
            font-size: 4rem;
            margin-bottom: 20px;
            opacity: 0.5;
        }

        .pagination-container {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }

        .load-more-btn {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            border-radius: 25px;
            padding: 12px 30px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .load-more-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .load-more-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .mark-all-read-btn {
            background: #10b981;
            color: white;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
            margin-bottom: 20px;
        }

        .mark-all-read-btn:hover {
            background: #059669;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .filter-tabs {
                justify-content: center;
            }

            .filter-tab {
                font-size: 0.9rem;
                padding: 8px 15px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .notification-item {
                flex-direction: column;
                text-align: center;
                gap: 10px;
            }
        }
    </style>
@endsection

@section('content')
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="student-profile-author pb-30">
                <div class="student-profile-author-img">
                    <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}" alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <h4>{{ Auth::user()->name }}</h4>
                    <span>{{ trans('notifications.teacher_notifications') }}</span>
                </div>
            </div>

            <!-- Notifications Header -->
            <div class="notifications-header">
                <i class="fas fa-bell"></i>
                {{ trans('notifications.my_notifications') }}
            </div>

            <!-- Notifications Stats -->
            <div class="notifications-stats">
                <h3 class="text-center mb-3">{{ trans('notifications.notifications_overview') }}</h3>
                <div class="stats-grid">
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['total'] }}</span>
                        <div class="stat-label">{{ trans('notifications.total_notifications') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['unread'] }}</span>
                        <div class="stat-label">{{ trans('notifications.unread_notifications') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['lecture_reminders'] }}</span>
                        <div class="stat-label">{{ trans('notifications.lecture_reminders') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['start_lecture'] }}</span>
                        <div class="stat-label">{{ trans('notifications.start_lecture') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['end_lecture'] }}</span>
                        <div class="stat-label">{{ trans('notifications.end_lecture') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['missed_lectures'] }}</span>
                        <div class="stat-label">{{ trans('notifications.missed_lectures') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['auto_ended'] }}</span>
                        <div class="stat-label">{{ trans('notifications.auto_ended') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['tomorrow_lectures'] }}</span>
                        <div class="stat-label">{{ trans('notifications.tomorrow_lectures') }}</div>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">{{ $notificationStats['cancelled_appointments'] }}</span>
                        <div class="stat-label">{{ trans('notifications.cancelled_appointments') }}</div>
                    </div>
                </div>
            </div>

            <!-- Notification Filters -->
            <div class="notification-filters">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-type="all">
                        <i class="fas fa-list"></i>
                        {{ trans('notifications.all_notifications') }}
                    </button>
                    <button class="filter-tab" data-type="unread">
                        <i class="fas fa-envelope"></i>
                        {{ trans('notifications.unread') }}
                    </button>
                    <button class="filter-tab" data-type="lecture_reminders">
                        <i class="fas fa-clock"></i>
                        {{ trans('notifications.lecture_reminders') }}
                    </button>
                    <button class="filter-tab" data-type="start_lecture">
                        <i class="fas fa-play-circle"></i>
                        {{ trans('notifications.start_lecture') }}
                    </button>
                    <button class="filter-tab" data-type="end_lecture">
                        <i class="fas fa-stop-circle"></i>
                        {{ trans('notifications.end_lecture') }}
                    </button>
                    <button class="filter-tab" data-type="missed_lectures">
                        <i class="fas fa-exclamation-triangle"></i>
                        {{ trans('notifications.missed_lectures') }}
                    </button>
                    <button class="filter-tab" data-type="auto_ended">
                        <i class="fas fa-power-off"></i>
                        {{ trans('notifications.auto_ended') }}
                    </button>
                    <button class="filter-tab" data-type="tomorrow_lectures">
                        <i class="fas fa-calendar-alt"></i>
                        {{ trans('notifications.tomorrow_lectures') }}
                    </button>
                    <button class="filter-tab" data-type="cancelled_appointments">
                        <i class="fas fa-ban"></i>
                        {{ trans('notifications.cancelled_appointments') }}
                    </button>
                </div>

                <button class="mark-all-read-btn" id="markAllReadBtn">
                    <i class="fas fa-check-double"></i>
                    {{ trans('notifications.mark_all_as_read') }}
                </button>
            </div>

            <!-- Notifications Container -->
            <div class="notifications-container">
                <div id="notificationsLoader" class="loading-spinner" style="display: none;">
                    <div class="spinner"></div>
                </div>

                <div id="notificationsList">
                    <!-- Notifications will be loaded here via AJAX -->
                </div>

                <div class="pagination-container">
                    <button id="loadMoreBtn" class="load-more-btn" style="display: none;">
                        {{ trans('notifications.load_more') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    let currentFilter = 'all';
    let currentPage = 1;
    let totalPages = 1;
    let loading = false;

    // Load notifications on page load
    loadNotifications();

    // Filter tabs click event
    $('.filter-tab').click(function() {
        if (loading) return;

        $('.filter-tab').removeClass('active');
        $(this).addClass('active');
        currentFilter = $(this).data('type');
        currentPage = 1;
        loadNotifications(true);
    });

    // Load more button click event
    $('#loadMoreBtn').click(function() {
        if (loading || currentPage >= totalPages) return;
        currentPage++;
        loadNotifications(false);
    });

    // Mark all as read button
    $('#markAllReadBtn').click(function() {
        if (loading) return;
        markAllAsRead();
    });

    // Load notifications function
    function loadNotifications(replace = true) {
        loading = true;
        $('#notificationsLoader').show();

        if (replace) {
            $('#loadMoreBtn').hide();
        }

        $.ajax({
            url: '{{ route("user.teacher.notifications") }}',
            method: 'GET',
            data: {
                type: currentFilter,
                page: currentPage
            },
            success: function(response) {
                if (replace) {
                    $('#notificationsList').empty();
                }

                if (response.notifications.length === 0 && currentPage === 1) {
                    $('#notificationsList').html(`
                        <div class="empty-state">
                            <i class="fas fa-bell-slash"></i>
                            <h4>${'{{ trans("notifications.no_notifications") }}'}</h4>
                            <p>${'{{ trans("notifications.no_notifications_message") }}'}</p>
                        </div>
                    `);
                } else {
                    response.notifications.forEach(function(notification) {
                        $('#notificationsList').append(createNotificationItem(notification));
                    });
                }

                totalPages = response.pagination.last_page;

                if (response.pagination.has_more) {
                    $('#loadMoreBtn').show();
                } else {
                    $('#loadMoreBtn').hide();
                }

                // Add click events to new notifications
                $('.notification-item').off('click').on('click', function() {
                    const notificationId = $(this).data('id');
                    if (!$(this).hasClass('read')) {
                        markAsRead(notificationId, $(this));
                    }
                });

                $('.mark-read-btn').off('click').on('click', function(e) {
                    e.stopPropagation();
                    const notificationId = $(this).closest('.notification-item').data('id');
                    const notificationItem = $(this).closest('.notification-item');
                    markAsRead(notificationId, notificationItem);
                });
            },
            error: function() {
                console.error('Error loading notifications');
            },
            complete: function() {
                loading = false;
                $('#notificationsLoader').hide();
            }
        });
    }

    // Create notification item HTML
    function createNotificationItem(notification) {
        const readClass = notification.is_read ? 'read' : 'unread';
        const colorClass = notification.color;

        return `
            <div class="notification-item ${readClass} ${colorClass}" data-id="${notification.id}">
                <div class="notification-icon ${colorClass}">
                    <i class="fas ${notification.icon}"></i>
                </div>
                <div class="notification-content">
                    <div class="notification-title">${notification.title}</div>
                    <div class="notification-message">${notification.message}</div>
                    <div class="notification-time">
                        <i class="fas fa-clock"></i>
                        ${notification.created_at_human}
                    </div>
                </div>
                <div class="notification-actions">
                    ${!notification.is_read ? '<button class="mark-read-btn">' + '{{ trans("notifications.mark_as_read") }}' + '</button>' : ''}
                </div>
            </div>
        `;
    }

    // Mark notification as read
    function markAsRead(notificationId, element) {
        $.ajax({
            url: '{{ route("user.teacher.notifications.mark_read", ":id") }}'.replace(':id', notificationId),
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    element.removeClass('unread').addClass('read');
                    element.find('.mark-read-btn').remove();

                    // Update unread count in stats
                    const unreadStat = $('.stat-item').eq(1).find('.stat-number');
                    const currentUnread = parseInt(unreadStat.text());
                    if (currentUnread > 0) {
                        unreadStat.text(currentUnread - 1);
                    }
                }
            },
            error: function() {
                console.error('Error marking notification as read');
            }
        });
    }

    // Mark all as read
    function markAllAsRead() {
        $.ajax({
            url: '{{ route("user.teacher.notifications.mark_all_read") }}',
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                if (response.success) {
                    $('.notification-item.unread').removeClass('unread').addClass('read');
                    $('.mark-read-btn').remove();

                    // Update unread count to 0
                    $('.stat-item').eq(1).find('.stat-number').text('0');

                    // Show success message
                    alert(response.message);
                }
            },
            error: function() {
                console.error('Error marking all notifications as read');
            }
        });
    }
});
</script>
@endsection
