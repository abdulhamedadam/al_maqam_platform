@extends('admin.layouts.master')
@section('css')
<style>
    body {
        direction: rtl;
        text-align: right;
    }

    .calendar-grid {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 5px;
        margin-bottom: 20px;
    }

    .calendar-day {
        border: 1px solid #ddd;
        min-height: 150px;
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
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
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
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('Toolbar.calendar');
            $breadcrumbs = [
                    ['label' => trans('Toolbar.home'), 'link' =>''],
                    ['label' => trans('Toolbar.calendar'), 'link' => ''],
                ];

            PageTitle($title, $breadcrumbs);
        @endphp

    </div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row mb-3">
        <div class="col-md-12 text-center">
            <h2>{{ trans('calender.all_teachers_courses') }}</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="calendar-grid">
                @foreach($weekDays as $day => $dayData)
                <div class="calendar-day">
                    <div class="day-header">
                        <h5>{{ $dayData['dayName'] }}</h5>
                    </div>

                    <div class="day-content">
                        @if($dayData['booked_schedules']->count() > 0)
                            <div class="section-title">{{ trans('calender.booked_schedules') }}</div>
                            @foreach($dayData['booked_schedules'] as $course)
                                <div class="schedule-item booked">
                                    <div class="teacher-name">{{ trans('calender.teacher') }}: {{ $course->teacher->name }}</div>
                                    <div class="student-name">{{ trans('calender.student') }}: {{ $course->student->name }}</div>
                                    <div class="course-name">{{ $course->course->name }}</div>
                                    <div class="schedule-time">{{ format_time_arabic($course->start_time) }} - {{ format_time_arabic($course->end_time) }}</div>
                                    <div class="schedule-actions">
                                        <a href="{{ route('user.get_course_details', [$course->course_id, $course->money_id]) }}" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        @if($dayData['available_schedules']->count() > 0)
                            <div class="section-title">{{ trans('calender.available_schedules') }}</div>
                            @foreach($dayData['available_schedules'] as $schedule)
                                <div class="schedule-item available">
                                    <div class="teacher-name">{{ trans('calender.teacher') }}: {{ $schedule->teacher->name }}</div>
                                    <div class="schedule-time">{{ format_time_arabic($schedule->start_time) }} - {{ format_time_arabic($schedule->end_time) }}</div>
                                    @if($schedule->note)
                                        <div class="schedule-note">{{ $schedule->note }}</div>
                                    @endif
                                </div>
                            @endforeach
                        @endif

                        @if($dayData['booked_schedules']->count() == 0 && $dayData['available_schedules']->count() == 0)
                            <div class="no-schedules">{{ trans('calender.no_available_schedules') }}</div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection
