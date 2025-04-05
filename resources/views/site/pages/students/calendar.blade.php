@extends('site.layouts.main')

@section('title', 'Student Enrolled Courses | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
            margin-bottom: 20px;
        }
        .calendar-day {
            border: 1px solid #ddd;
            min-height: 300px;
            background-color: #f9f9f9;
        }

        .day-header {
            text-align: center;
            padding: 8px;
            background-color: #edf7ed;
            border-bottom: 1px solid #ddd;
        }

        .day-header h5 {
            margin: 0;
            font-weight: bold;
        }

        .day-content {
            padding: 5px;
            max-height: 500px;
            overflow-y: auto;
        }

        .section-title {
            font-weight: bold;
            margin: 8px 0 5px 0;
            padding-bottom: 3px;
            border-bottom: 1px solid #ddd;
        }

        .schedule-item {
            border-radius: 4px;
            padding: 8px;
            margin-bottom: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .schedule-item.booked {
            background-color: #e3f2fd;
            border-left: 3px solid #2196f3;
        }

        .schedule-item.available {
            background-color: #e8f5e9;
            border-left: 3px solid #4caf50;
        }

        .teacher-name {
            font-weight: bold;
            color: #2e7d32;
        }

        .student-name {
            color: #1565c0;
        }

        .course-name {
            font-weight: 500;
        }

        .schedule-time {
            font-size: 0.9rem;
            margin-top: 4px;
            color: #555;
        }

        .schedule-note {
            font-size: 0.85rem;
            font-style: italic;
            margin-top: 5px;
            color: #666;
        }

        .schedule-actions {
            margin-top: 5px;
            text-align: left;
        }

        .no-schedules {
            text-align: center;
            color: #6c757d;
            padding: 20px 0;
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
                            <div class="tab-pane fade active show" id="contact" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="calendar-grid">
                                                @foreach ($weekDays as $day => $dayData)
                                                    <div class="calendar-day">
                                                        <div class="day-header">
                                                            <h5>{{ $dayData['dayName'] }}</h5>
                                                        </div>

                                                        <div class="day-content">
                                                            @if ($dayData['student_schedules']->count() > 0)
                                                                <div class="section-title">
                                                                    {{ trans('calender.schedules') }}
                                                                </div>
                                                                @foreach ($dayData['student_schedules'] as $course)
                                                                    <div class="schedule-item booked">
                                                                        <div class="teacher-name">
                                                                            {{ trans('calender.teach') }}:
                                                                            {{ $course->teacher->name }}
                                                                        </div>
                                                                        <div class="course-name">
                                                                            {{ $course->course->name }}
                                                                        </div>
                                                                        <div class="schedule-time">
                                                                            {{ format_time_arabic($course->start_time) }} {{ trans('calender.to') }}
                                                                            {{ format_time_arabic($course->end_time) }}
                                                                        </div>
                                                                        <div class="schedule-actions" style="display: flex; justify-content: flex-end;">
                                                                            <a href="{{ route('user.get_course_details', [$course->course_id, $course->money_id]) }}"
                                                                                class="btn btn-sm btn-info">
                                                                                <i class="bi bi-eye"></i>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif

                                                            @if ($dayData['student_schedules']->count() == 0)
                                                                <div class="no-schedules">
                                                                    {{ trans('calender.no_schedules') }}
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
