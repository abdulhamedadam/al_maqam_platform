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

        .evaluation-modal .modal-content {
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.2);
        }

        .evaluation-modal .modal-header {
            background-color: #f8f9fa;
            border-bottom: 1px solid #eaeaea;
            padding: 15px 20px;
            border-radius: 10px 10px 0 0;
        }

        .evaluation-modal .modal-title {
            font-weight: bold;
            color: #333;
        }

        .evaluation-modal .modal-body {
            padding: 20px;
        }

        .evaluation-question {
            background-color: #f9f9f9;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            border-right: 4px solid #6c757d;
            transition: all 0.3s ease;
        }

        .evaluation-question:hover {
            border-right-color: #007bff;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .evaluation-question.required {
            border-right-color: #dc3545;
        }

        .evaluation-question label {
            display: block;
            font-weight: 600;
            margin-bottom: 10px;
            color: #333;
        }

        .rating-container {
            direction: ltr;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 10px 0;
        }

        .rating-container.rtl {
            direction: rtl;
            text-align: right;
        }

        .rating-stars {
            display: inline-flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .rating-stars input {
            display: none;
        }

        .rating-stars label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ddd' d='M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 30px;
            transition: 0.3s;
        }

        .rating-5 .rating-stars label {
            width: 40px;
            height: 40px;
            background-size: 40px;
        }

        .rating-stars input:checked ~ label,
        .rating-stars label:hover,
        .rating-stars label:hover ~ label {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24'%3E%3Cpath fill='%23ffc107' d='M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2 9.19 8.63 2 9.24l5.46 4.73L5.82 21z'/%3E%3C/svg%3E");
        }

        .rating-value {
            font-size: 1.2rem;
            font-weight: bold;
            margin: 0 10px;
            min-width: 30px;
            text-align: center;
        }

        .required-marker {
            color: #dc3545;
            margin-right: 5px;
        }

        .question-text {
            font-size: 1.1rem;
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
                                                            @php
                                                                $now = \Carbon\Carbon::now();
                                                                $start = \Carbon\Carbon::parse($appointment->start_time);
                                                                $end = \Carbon\Carbon::parse($appointment->end_time);

                                                                $startMinus2Hours = $start->copy()->subHours(2);
                                                                $startMinus3Hours = $start->copy()->subHours(3);

                                                                $canStart = $appointment->status === 'scheduled'
                                                                            && $now->between($startMinus2Hours, $end);

                                                                $canCancel = $appointment->status === 'scheduled'
                                                                            && $now->lessThan($startMinus3Hours);

                                                                // @dd($now, $start, $end, $startMinus2Hours, $canStart, $canCancel);
                                                            @endphp
                                                            @if ($canStart)
                                                                <form action="{{ route('user.teacher.start_lecture', $appointment->id) }}" method="POST" class="d-inline">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-success">{{ trans('appointments.start_lecture') }}</button>
                                                                </form>
                                                            @endif

                                                            @if ($appointment->status === 'in_progress')
                                                                <button class="btn btn-danger btn-end-lecture"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#evaluationModal"
                                                                        data-appointment-id="{{ $appointment->id }}"
                                                                        data-course-id="{{ $appointment->course_id }}"
                                                                        data-student-name="{{ $appointment->student->name }}">
                                                                        {{ trans('appointments.end_lecture') }}
                                                                </button>
                                                            @endif

                                                            @if ($appointment->status === 'missed')
                                                                <button class="btn btn-danger" disabled>{{ trans('appointments.missed') }}</button>
                                                            @elseif ($appointment->status === 'ended')
                                                                <button class="btn btn-secondary" disabled>{{ trans('appointments.ended') }}</button>
                                                            @elseif ($appointment->status === 'cancelled')
                                                                <span class="badge bg-danger">{{ trans('appointments.cancelled') }}</span>
                                                            @elseif ($appointment->status === 'in_progress')
                                                                <span class="badge bg-success">{{ trans('appointments.in_progress') }}</span>
                                                            @elseif (!$canStart)
                                                                <button class="btn btn-secondary" disabled>{{ trans('appointments.not_started') }}</button>
                                                            @endif

                                                            @if ($appointment->status === 'scheduled')
                                                                @if ($canCancel)
                                                                    <button class="btn btn-warning btn-cancel-appointment mt-2"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#cancellationModal"
                                                                        data-appointment-id="{{ $appointment->id }}"
                                                                        data-course-name="{{ $appointment->course->name }}">
                                                                        {{ trans('appointments.cancel') }}
                                                                    </button>
                                                                @else
                                                                    <button class="btn btn-warning mt-2" disabled title="{{ trans('appointments.cannot_cancel') }}">
                                                                        {{ trans('appointments.cannot_cancel') }}
                                                                    </button>
                                                                @endif
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
                                                            @elseif ($appointment->status === 'cancelled')
                                                                <span class="text-muted text-danger">{{ trans('appointments.cancelled') }}</span>
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

    @php
        $isRtl = app()->getLocale() === 'ar';
    @endphp

    <div class="modal fade evaluation-modal {{ $isRtl ? 'rtl' : '' }}" id="evaluationModal" tabindex="-1" aria-labelledby="evaluationModalLabel" aria-hidden="true" dir="{{ $isRtl ? 'rtl' : 'ltr' }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header {{ $isRtl ? 'flex-row-reverse' : '' }}">
                    <h5 class="modal-title" id="evaluationModalLabel">
                        {{ trans('evaluation.evaluate_student') }}
                        <span id="studentName"></span>
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ trans('evaluation.close') }}"></button>
                </div>

                <form id="evaluationForm" action="" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="appointmentId" name="appointment_id" value="">

                        <div class="alert alert-info d-flex align-items-center">
                            <i class="fa fa-info-circle me-2"></i>
                            <div>{{ trans('evaluation.please_evaluate_student') }}</div>
                        </div>

                        <div id="evaluationQuestions" class="mt-4"></div>

                        {{-- <div class="form-group mt-4">
                            <label for="notes" class="form-label fw-bold">{{ trans('evaluation.additional_notes') }}</label>
                            <textarea class="form-control mt-2" id="notes" name="evaluation[notes]" rows="3" placeholder="{{ trans('evaluation.notes_placeholder') }}"></textarea>
                        </div> --}}
                        <div class="evaluation-question mt-4">
                            <label for="notes" class="question-text fw-bold">
                                {{ trans('evaluation.additional_notes') }}
                            </label>
                            <textarea class="form-control mt-2" id="notes" name="evaluation[notes]" rows="3" placeholder="{{ trans('evaluation.notes_placeholder') }}"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer {{ $isRtl ? 'justify-content-start' : 'justify-content-end' }}">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('evaluation.cancel') }}</button>
                        <button type="submit" class="btn btn-primary submit-evaluation">{{ trans('evaluation.submit_and_end_lecture') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade" id="cancellationModal" tabindex="-1" aria-labelledby="cancellationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancellationModalLabel">{{ trans('appointments.cancel_appointment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @php
                    $routeName = auth('web')->user()->role == 'teacher' ? 'user.teacher.cancel_appointment' : 'user.student.cancel_appointment';
                @endphp

                <form id="cancellationForm" action="{{ route($routeName, 0) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            {{ trans('appointments.cancellation_warning') }}
                        </div>

                        <p id="cancelCourseName" class="fw-bold text-center mb-3"></p>

                        <div class="form-group">
                            <label for="cancellationReason" class="form-label">{{ trans('appointments.cancellation_reason') }} <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="cancellationReason" name="reason" rows="4" required
                                placeholder="{{ trans('appointments.cancellation_reason_placeholder') }}"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('appointments.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('appointments.confirm_cancel') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}

    <div class="modal fade" id="cancellationModal" tabindex="-1" aria-labelledby="cancellationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cancellationModalLabel">{{ trans('appointments.cancel_appointment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                @php
                    $routeName = auth('web')->user()->role == 'teacher' ? 'user.teacher.cancel_appointment' : 'user.student.cancel_appointment';
                @endphp

                <form id="cancellationForm" action="{{ route($routeName, 0) }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="alert alert-warning">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            {{ trans('appointments.cancellation_warning') }}
                        </div>

                        <p id="cancelCourseName" class="fw-bold text-center mb-3"></p>

                        <div class="form-group">
                            <label for="cancellationReason" class="form-label">{{ trans('appointments.cancellation_reason') }} <span class="text-danger">*</span></label>
                            <textarea
                                class="form-control enhanced-textarea"
                                id="cancellationReason"
                                name="reason"
                                rows="4"
                                required
                                placeholder="{{ trans('appointments.cancellation_reason_placeholder') }}"
                                style="border: 2px solid #dee2e6; border-radius: 8px; padding: 12px; background-color: #fafafa; transition: all 0.3s ease;"
                                onfocus="this.style.borderColor='#007bff'; this.style.backgroundColor='#fff'; this.style.boxShadow='0 0 0 0.2rem rgba(0,123,255,.25)'"
                                onblur="this.style.borderColor='#dee2e6'; this.style.backgroundColor='#fafafa'; this.style.boxShadow='none'"
                            ></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ trans('appointments.close') }}</button>
                        <button type="submit" class="btn btn-danger">{{ trans('appointments.confirm_cancel') }}</button>
                    </div>
                </form>
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

        $('.btn-end-lecture').on('click', function() {
            const appointmentId = $(this).data('appointment-id');
            const courseId = $(this).data('course-id');
            const studentName = $(this).data('student-name');

            $('#appointmentId').val(appointmentId);
            $('#studentName').text(studentName);
            $('#evaluationForm').attr('action', '{{ route("user.teacher.end_lecture", "") }}/' + appointmentId);
            // console.log(appointmentId, courseId, studentName);

            loadEvaluationQuestions(courseId);
        });


        function loadEvaluationQuestions(courseId) {
            $.ajax({
                url: '{{ route("user.teacher.evaluation_questions") }}',
                method: 'GET',
                data: { course_id: courseId },
                success: function(questions) {
                    // console.log(questions);
                    renderEvaluationQuestions(questions);
                },
                error: function(error) {
                    console.error('Error loading evaluation questions:', error);
                    $('#evaluationQuestions').html(`
                        <div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle me-2"></i>
                            {{ trans('evaluation.failed_to_load_questions') }}
                        </div>
                    `);
                }
            });
        }

        const currentLang = "{{ app()->getLocale() }}";

        function renderEvaluationQuestions(questions) {
            if (!questions || questions.length === 0) {
                $('#evaluationQuestions').html(`
                    <div class="alert alert-warning">
                        <i class="fa fa-exclamation-triangle me-2"></i>
                        {{ trans('evaluation.no_questions_found') }}
                    </div>
                `);
                return;
            }

            let questionsHtml = '';

            questions.forEach(function(question) {

                const questionObj = typeof question.question === 'string' ? JSON.parse(question.question) : question.question;
                const questionText = questionObj[currentLang] || questionObj.en || Object.values(questionObj)[0]; // استخدام العربية أو الإنجليزية أو أي لغة متاحة

                const required = question.is_required ? 'required' : '';
                const requiredMark = question.is_required ? '<span class="required-marker">*</span>' : '';

                let answerHtml = '';

                switch (question.answer_type) {
                    case 'text':
                        answerHtml = `
                            <textarea class="form-control" name="evaluation[questions][${question.id}]" rows="3" ${required}></textarea>
                        `;
                        break;

                    case 'rating_5':
                        answerHtml = `
                            <div class="rating-container rating-5 ${currentLang === 'ar' ? 'rtl' : ''}">
                                <div class="rating-stars">
                                    ${createRatingStars(5, question.id)}
                                </div>
                                <div class="rating-value" id="rating-value-${question.id}">0</div>
                            </div>
                        `;
                        break;

                    case 'rating_10':
                        answerHtml = `
                            <div class="rating-container ${currentLang === 'ar' ? 'rtl' : ''}">
                                <div class="rating-stars">
                                    ${createRatingStars(10, question.id)}
                                </div>
                                <div class="rating-value" id="rating-value-${question.id}">0</div>
                            </div>
                        `;
                        break;
                }

                questionsHtml += `
                    <div class="evaluation-question ${question.is_required ? 'required' : ''}">
                        <label class="question-text">${requiredMark}${questionText}</label>
                        ${answerHtml}
                    </div>
                `;
            });

            $('#evaluationQuestions').html(questionsHtml);

            $('.rating-stars input').on('change', function() {
                const value = $(this).val();
                const questionId = $(this).attr('name').match(/\d+/)[0];
                $(`#rating-value-${questionId}`).text(value);
            });
        }

        function createRatingStars(count, questionId) {
            let stars = '';
            for (let i = count; i >= 1; i--) {
                stars += `
                    <input type="radio" id="star${i}-${questionId}" name="evaluation[questions][${questionId}]" value="${i}" ${i === 1 ? 'required' : ''}>
                    <label for="star${i}-${questionId}" title="${i} ${i === 1 ? '{{ trans("evaluation.star") }}' : '{{ trans("evaluation.stars") }}'}"></label>
                `;
            }
            return stars;
        }

        $('#evaluationForm').on('submit', function(e) {
            const form = $(this)[0];
            if (!form.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
                alert('{{ trans("evaluation.please_fill_required_fields") }}');
            }
            form.classList.add('was-validated');
        });

        $('.btn-cancel-appointment').on('click', function() {
            const appointmentId = $(this).data('appointment-id');
            const courseName = $(this).data('course-name');

            $('#cancelCourseName').text(courseName);

            const formAction = $('#cancellationForm').attr('action');
            const newAction = formAction.replace(/\/\d+\/cancel$/, '/' + appointmentId + '/cancel');
            $('#cancellationForm').attr('action', newAction);
            $('#cancellationReason').val('');
            console.log('Final Action URL:', newAction);
        });
    });
</script>
@endsection
