@extends('site.layouts.main')

@section('title', 'My Cancellations | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
    <style>
        .cancellations-header {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            font-size: 1.8rem;
            color: #333;
        }

        .cancellation-item {
            background: #fff;
            border: 1px solid #e3e6f0;
            border-radius: 8px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .cancellation-item:hover {
            box-shadow: 0 4px 8px rgba(0,0,0,0.15);
            transform: translateY(-2px);
        }

        .cancellation-header {
            padding: 15px 20px;
            border-bottom: 1px solid #e3e6f0;
            background-color: #f8f9fa;
            border-radius: 8px 8px 0 0;
        }

        .cancellation-title {
            font-weight: bold;
            color: #2c3e50;
            font-size: 1.1rem;
            margin: 0;
        }

        .cancellation-body {
            padding: 15px 20px;
        }

        .cancellation-details {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .detail-item i {
            width: 20px;
            color: #6c757d;
        }

        .detail-label {
            font-weight: 600;
            color: #495057;
            min-width: 120px;
        }

        .detail-value {
            color: #6c757d;
        }

        .cancellation-reason {
            margin-top: 15px;
            padding: 15px;
            background-color: #fff3cd;
            border-radius: 6px;
            border-right: 4px solid #ffc107;
        }

        .reason-label {
            font-weight: 600;
            color: #856404;
            margin-bottom: 5px;
        }

        .reason-text {
            color: #856404;
            line-height: 1.5;
        }

        .cancellation-meta {
            padding: 10px 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #e3e6f0;
            border-radius: 0 0 8px 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cancellation-date {
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

        .stats-container {
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
            color: #dc3545;
            display: block;
        }

        .stat-label {
            color: #6c757d;
            font-size: 0.9rem;
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
                            <div class="tab-pane fade active show" id="cancellations" role="tabpanel">
                                <div class="container">
                                    <h1 class="text-center cancellations-header">{{ trans('cancellations.my_cancellations') }}</h1>

                                    <!-- Stats -->
                                    <div class="stats-container">
                                        <div class="stat-item">
                                            <span class="stat-number">{{ $cancellations->total() }}</span>
                                            <span class="stat-label">{{ trans('cancellations.total_cancellations') }}</span>
                                        </div>
                                        <div class="stat-item">
                                            <span class="stat-number">{{ $cancellations->where('created_at', '>=', now()->subDays(30))->count() }}</span>
                                            <span class="stat-label">{{ trans('cancellations.last_30_days') }}</span>
                                        </div>
                                    </div>

                                    <!-- Cancellations List -->
                                    <div class="cancellations-list">
                                        @forelse($cancellations as $cancellation)
                                            <div class="cancellation-item">
                                                <div class="cancellation-header">
                                                    <h5 class="cancellation-title">
                                                        <i class="fa fa-calendar-times text-danger me-2"></i>
                                                        {{ trans('cancellations.cancelled_appointment') }}
                                                    </h5>
                                                </div>

                                                <div class="cancellation-body">
                                                    <div class="cancellation-details">
                                                        @if($cancellation->appointment->course)
                                                            <div class="detail-item">
                                                                <i class="fa fa-book"></i>
                                                                <span class="detail-label">{{ trans('cancellations.course') }}:</span>
                                                                <span class="detail-value">{{ $cancellation->appointment->course->name }}</span>
                                                            </div>
                                                        @endif

                                                        @if($cancellation->appointment->teacher)
                                                            <div class="detail-item">
                                                                <i class="fa fa-user"></i>
                                                                <span class="detail-label">{{ trans('cancellations.teacher') }}:</span>
                                                                <span class="detail-value">{{ $cancellation->appointment->teacher->name }}</span>
                                                            </div>
                                                        @endif

                                                        <div class="detail-item">
                                                            <i class="fa fa-calendar"></i>
                                                            <span class="detail-label">{{ trans('cancellations.day') }}:</span>
                                                            <span class="detail-value">{{ $cancellation->appointment->day }}</span>
                                                        </div>

                                                        <div class="detail-item">
                                                            <i class="fa fa-clock"></i>
                                                            <span class="detail-label">{{ trans('cancellations.time') }}:</span>
                                                            <span class="detail-value">
                                                                {{ format_time_arabic($cancellation->appointment->start_time) }} -
                                                                {{ format_time_arabic($cancellation->appointment->end_time) }}
                                                            </span>
                                                        </div>
                                                    </div>

                                                    <div class="cancellation-reason">
                                                        <div class="reason-label">
                                                            <i class="fa fa-comment-alt me-2"></i>
                                                            {{ trans('cancellations.cancellation_reason') }}:
                                                        </div>
                                                        <div class="reason-text">
                                                            {{ $cancellation->reason }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="cancellation-meta">
                                                    <div class="cancellation-date">
                                                        <i class="fa fa-clock me-2"></i>
                                                        {{ $cancellation->created_at->format('Y-m-d H:i') }}
                                                        ({{ $cancellation->created_at->diffForHumans() }})
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <div class="empty-state">
                                                <i class="fa fa-calendar-times"></i>
                                                <h4>{{ trans('cancellations.no_cancellations') }}</h4>
                                                <p>{{ trans('cancellations.no_cancellations_desc') }}</p>
                                            </div>
                                        @endforelse
                                    </div>

                                    <!-- Pagination -->
                                    @if($cancellations->hasPages())
                                        <div class="d-flex justify-content-center mt-4">
                                            {{ $cancellations->links() }}
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
