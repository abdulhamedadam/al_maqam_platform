@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('evaluation_questions.evaluation_questions');
            $breadcrumbs = [
                ['label' => trans('Toolbar.home'), 'link' => ''],
                ['label' => trans('Toolbar.evaluation_questions'), 'link' => ''],
                ['label' => trans('Toolbar.create'), 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">
            {{ BackButton(route('admin.evaluation_questions.index')) }}
        </div>
    </div>
@endsection

@section('css')
    <style>
        .form-check-input {
            width: 3rem;
            height: 1.5rem;
            background-color: #ccc;
            border: none;
            cursor: pointer;
        }
        .form-check-input:checked {
            background-color: #28a745;
        }
    </style>
@endsection

@section('content')
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form action="{{ route('admin.evaluation_questions.store') }}" method="post" id="store_form">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">

                                    <template id="question_template">
                                        <div class="card card-flush py-4 question-item" data-index="0">
                                            <div class="card-header">
                                                <div class="card-title">
                                                    <h2>{{ trans('evaluation_questions.question') }} <span class="question-number">1</span></h2>
                                                </div>
                                                <div class="card-toolbar">
                                                    <button type="button" class="btn btn-sm btn-icon btn-danger remove-question">
                                                        <i class="bi bi-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="card-body pt-0">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ trans('evaluation_questions.type') }}</label>
                                                        <select name="questions[0][type]" class="form-control question-type" required>
                                                            <option value="general">{{ trans('evaluation_questions.general') }}</option>
                                                            <option value="course_specific">{{ trans('evaluation_questions.course_specific') }}</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6 mb-3 course-field" style="display: none;">
                                                        <label class="form-label">{{ trans('evaluation_questions.course') }}</label>
                                                        <select name="questions[0][course_id]" class="form-control course-select">
                                                            <option value="">{{ trans('actions.choose') }}</option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-wrap gap-5">
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <label class="form-label">{{ trans('evaluation_questions.question_en') }}</label>
                                                        <input type="text" name="questions[0][question][en]" class="form-control mb-2" required/>
                                                    </div>
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <label class="form-label">{{ trans('evaluation_questions.question_ar') }}</label>
                                                        <input type="text" name="questions[0][question][ar]" class="form-control mb-2" required/>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label class="form-label">{{ trans('evaluation_questions.answer_type') }}</label>
                                                        <select name="questions[0][answer_type]" class="form-control mb-2" required>
                                                            <option value="text">{{ trans('evaluation_questions.text') }}</option>
                                                            <option value="rating_5">{{ trans('evaluation_questions.rating_5') }}</option>
                                                            <option value="rating_10">{{ trans('evaluation_questions.rating_10') }}</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="d-flex flex-wrap gap-5">
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <label class="form-label">{{ trans('evaluation_questions.is_required') }}</label>
                                                        <div class="form-check form-switch">
                                                            <input type="hidden" name="questions[0][is_required]" value="0">
                                                            <input class="form-check-input toggle-switch" type="checkbox"
                                                                    name="questions[0][is_required]" value="1" checked>
                                                        </div>
                                                    </div>
                                                    <div class="fv-row w-100 flex-md-root">
                                                        <label class="form-label">{{ trans('evaluation_questions.is_active') }}</label>
                                                        <div class="form-check form-switch">
                                                            <input type="hidden" name="questions[0][is_active]" value="0">
                                                            <input class="form-check-input toggle-switch" type="checkbox"
                                                                    name="questions[0][is_active]" value="1" checked>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>

                                    <div id="questions_container"></div>

                                    <div class="text-end mb-3">
                                        <button type="button" id="add_question" class="btn btn-success">
                                            <i class="bi bi-plus-circle"></i> {{ trans('evaluation_questions.add_question') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">{{ trans('actions.save') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let questionIndex = 0;
            const questionsContainer = document.getElementById('questions_container');
            const questionTemplate = document.getElementById('question_template');

            addQuestion();

            document.getElementById('add_question').addEventListener('click', addQuestion);

            document.addEventListener('click', function(e) {
                if (e.target.classList.contains('remove-question') ||
                    e.target.closest('.remove-question')) {
                    const questionItems = document.querySelectorAll('.question-item');
                    if (questionItems.length <= 1) {
                        alert('يجب أن يحتوي النموذج على سؤال واحد على الأقل.');
                        return;
                    }
                    const questionItem = e.target.closest('.question-item');
                    questionItem.remove();
                    updateQuestionNumbers();
                }
            });

            document.addEventListener('change', function(e) {
                if (e.target.classList.contains('question-type')) {
                    const questionItem = e.target.closest('.question-item');
                    const courseField = questionItem.querySelector('.course-field');
                    const courseSelect = questionItem.querySelector('.course-select');

                    if (e.target.value === 'course_specific') {
                        courseField.style.display = 'block';
                        courseSelect.setAttribute('required', 'required');
                    } else {
                        courseField.style.display = 'none';
                        courseSelect.removeAttribute('required');
                    }
                }
            });

            function addQuestion() {
                questionIndex++;
                const newQuestion = questionTemplate.content.cloneNode(true);
                const questionItem = newQuestion.querySelector('.question-item');

                questionItem.dataset.index = questionIndex;
                questionItem.querySelector('.question-number').textContent = questionIndex;

                const inputs = questionItem.querySelectorAll('[name]');
                inputs.forEach(input => {
                    const name = input.getAttribute('name').replace(/questions\[\d+\]/g, `questions[${questionIndex}]`);
                    input.setAttribute('name', name);
                });

                questionsContainer.appendChild(newQuestion);
            }

            function updateQuestionNumbers() {
                const questions = document.querySelectorAll('.question-item');
                questions.forEach((question, index) => {
                    question.querySelector('.question-number').textContent = index + 1;
                });
            }
        });
    </script>
@endsection
