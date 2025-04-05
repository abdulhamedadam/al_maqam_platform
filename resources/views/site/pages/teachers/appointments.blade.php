@extends('site.layouts.main')

@section('title', 'Student Enrolled Courses | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
    <style>
        .appointments-header {
            text-align: center;
            margin: 20px 0;
            font-weight: bold;
            font-size: 1.8rem;
            color: #333;
        }

        .appointments-table {
            width: 100%;
            border-collapse: collapse;
        }

        .appointments-table th {
            background-color: #f8f9fa;
            font-weight: bold;
            text-align: right;
            padding: 12px;
            border: 1px solid #dee2e6;
        }

        .appointments-table td {
            padding: 12px;
            border: 1px solid #dee2e6;
            text-align: right;
        }

        .btn-start-lecture {
            background-color: #28a745;
            color: white;
            padding: 1px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-start-lecture:hover {
            background-color: #218838;
        }

        .btn-end-lecture {
            background-color: #dc3545;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-end-lecture:hover {
            background-color: #c82333;
        }
        .appointments-table th,
        .appointments-table td {
            text-align: center;
            vertical-align: middle;
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
                            <div class="tab-pane fade active show" id="contact" role="tabpanel"
                                aria-labelledby="contact-tab">
                                <div class="container appointments-container">
                                    <h1 class="text-center appointments-header">{{ trans('appointments.today_appointments') }}</h1>
                                    <div class="table-responsive">
                                        <table class="table appointments-table">
                                            <thead>
                                                <tr>
                                                    <th>{{ trans('appointments.student_name') }}</th>
                                                    <th>{{ trans('appointments.course_name') }}</th>
                                                    <th>{{ trans('appointments.section_name') }}</th>
                                                    <th>{{ trans('appointments.day') }}</th>
                                                    <th>{{ trans('appointments.time') }}</th>
                                                    <th>{{ trans('appointments.status') }}</th>
                                                    <th>{{ trans('appointments.actions') }}</th>
                                                    <th>{{ trans('appointments.meeting_details') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($appointments as $appointment)
                                                    <tr>
                                                        <td>{{ $appointment->student->name }}</td>
                                                        <td>{{ $appointment->course->name }}</td>
                                                        <td>{{ $appointment->course->section->name }}</td>
                                                        <td>{{ trans('days.' . strtolower($appointment->day)) }}</td>
                                                        <td>
                                                            {{ format_time_arabic($appointment->start_time) }}
                                                            {{ trans('appointments.to') }}
                                                            {{ format_time_arabic($appointment->end_time) }}
                                                        </td>
                                                        <td>
                                                            @php
                                                                $now = \Carbon\Carbon::now();
                                                                $start = \Carbon\Carbon::parse(
                                                                    $appointment->start_time,
                                                                );
                                                                $end = \Carbon\Carbon::parse($appointment->end_time);
                                                            @endphp

                                                            {{-- @if ($now->between($start, $end))
                                                                <span class="badge bg-success">{{ trans('appointments.in_progress') }}</span>
                                                            @elseif ($now->lt($start))
                                                                <span class="badge bg-warning">{{ trans('appointments.coming') }}</span>
                                                            @else
                                                                <span class="badge bg-secondary">{{ trans('appointments.ended') }}</span>
                                                            @endif --}}
                                                            @if ($appointment->status === 'scheduled')
                                                                <span class="badge bg-warning">{{ trans('appointments.scheduled') }}</span>
                                                            @elseif ($appointment->status === 'in_progress')
                                                                <span class="badge bg-success">{{ trans('appointments.in_progress') }}</span>
                                                            @elseif ($appointment->status === 'missed')
                                                                <span class="badge bg-danger">{{ trans('appointments.missed') }}</span>
                                                            @else
                                                                <span class="badge bg-secondary">{{ trans('appointments.ended') }}</span>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($appointment->status === 'scheduled' && $now->between($start->subHours(2), $end))
                                                                <form action="{{ route('user.teacher.start_lecture', $appointment->id) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">{{ trans('appointments.start_lecture') }}</button>
                                                                </form>
                                                            @elseif ($appointment->status === 'in_progress')
                                                                <form action="{{ route('user.teacher.end_lecture', $appointment->id) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-danger">{{ trans('appointments.end_lecture') }}</button>
                                                                </form>
                                                            @elseif ($appointment->status === 'missed')
                                                                <button class="btn btn-danger" disabled>{{ trans('appointments.missed') }}</button>
                                                            @elseif ($appointment->status === 'ended')
                                                                <button class="btn btn-secondary" disabled>{{ trans('appointments.ended') }}</button>
                                                            @else
                                                                <button class="btn btn-secondary" disabled>{{ trans('appointments.not_started') }}</button>
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($appointment->status === 'in_progress')
                                                                <button class="btn btn-info view-meeting-btn" data-bs-toggle="modal" data-bs-target="#meetingModal"
                                                                    data-meeting-id="{{ $appointment->zoom_meeting->meeting_id ?? 'N/A' }}"
                                                                    data-meeting-url="{{ $appointment->zoom_meeting->join_url ?? 'N/A' }}"
                                                                    data-meeting-pass="{{ $appointment->zoom_meeting->password ?? 'N/A' }}">
                                                                    <i class="fa fa-eye"></i>
                                                                </button>
                                                            @elseif ($appointment->status === 'ended')
                                                                <span class="text-muted">{{ trans('appointments.not_ended') }}</span>
                                                            @else
                                                                <span class="text-muted">{{ trans('appointments.not_started') }}</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="meetingModalLabel">{{ trans('appointments.meeting_details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>{{ trans('appointments.meeting_id') }}:</strong> <span id="modalMeetingId"></span></p>
                    <p><strong>{{ trans('appointments.meeting_url') }}:</strong> <a href="#" id="modalMeetingUrl" target="_blank"></a></p>
                    <p><strong>{{ trans('appointments.meeting_password') }}:</strong> <span id="modalMeetingPass"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('appointments.close') }}</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="meetingModal" tabindex="-1" aria-labelledby="meetingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="meetingModalLabel">{{ trans('appointments.meeting_details') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="mt-2"><strong>{{ trans('appointments.meeting_id') }}:</strong> <span id="modalMeetingId">N/A</span></p>
                    <p class="mt-2"><strong>{{ trans('appointments.meeting_password') }}:</strong> <span id="modalMeetingPass">N/A</span></p>
                    <p class="d-flex align-items-center gap-2 mt-2">
                        <strong>{{ trans('appointments.meeting_url') }}:</strong>
                        <a id="modalMeetingUrl" href="#" target="_blank"
                            class="btn btn-success rounded-pill px-4 py-2 d-flex align-items-center gap-2">
                            <i class="fa fa-video"></i> {{ trans('appointments.join_meeting') }}
                        </a>
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('appointments.close') }}</button>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('.view-meeting-btn').on('click', function() {
            let meetingId = $(this).data('meeting-id') || 'N/A';
            let meetingUrl = $(this).data('meeting-url') || '#';
            let meetingPass = $(this).data('meeting-pass') || 'N/A';

            $('#modalMeetingId').text(meetingId);
            $('#modalMeetingPass').text(meetingPass);
            $('#modalMeetingUrl').attr('href', meetingUrl).text(meetingUrl === '#' ? 'N/A' : 'Join Meeting');
        });
    });
</script>
@endsection
