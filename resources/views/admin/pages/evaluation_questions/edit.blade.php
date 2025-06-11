@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('evaluation_questions.evaluation_questions');
            $breadcrumbs = [
                ['label' => trans('Toolbar.home'), 'link' => ''],
                ['label' => trans('Toolbar.evaluation_questions'), 'link' => ''],
                ['label' => trans('Toolbar.edit'), 'link' => ''],
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
                <form action="{{ route('admin.evaluation_questions.update', $question->id) }}" method="post" id="edit_form">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ trans('evaluation_questions.edit') }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">{{ trans('evaluation_questions.type') }}</label>
                                                    <select name="type" id="type" class="form-control" required>
                                                        <option value="general" {{ old('type', $question->type) == 'general' ? 'selected' : '' }}>
                                                            {{ trans('evaluation_questions.general') }}
                                                        </option>
                                                        <option value="course_specific" {{ old('type', $question->type) == 'course_specific' ? 'selected' : '' }}>
                                                            {{ trans('evaluation_questions.course_specific') }}
                                                        </option>
                                                    </select>
                                                    @error('type')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-6 mb-3" id="course_field" style="display: none;">
                                                    <label class="form-label">{{ trans('evaluation_questions.course') }}</label>
                                                    <select name="course_id" id="course_id" class="form-control" >
                                                        <option value="">{{ trans('actions.choose') }}</option>
                                                        @foreach ($courses as $course)
                                                            <option value="{{ $course->id }}"
                                                                {{ old('course_id', $question->course_id) == $course->id ? 'selected' : '' }}>
                                                                {{ $course->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('course_id')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('evaluation_questions.question_en') }}</label>
                                                    <input type="text" name="question[en]" id="question_en"
                                                           class="form-control mb-2"
                                                           value="{{ old('question.en', $question->getTranslation('question','en') ?? '') }}" required/>
                                                    @error('question.en')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('evaluation_questions.question_ar') }}</label>
                                                    <input type="text" name="question[ar]" id="question_ar"
                                                           class="form-control mb-2"
                                                           value="{{ old('question.ar', $question->getTranslation('question','ar')?? '') }}" required/>
                                                    @error('question.ar')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-3">
                                                    <label class="form-label">{{ trans('evaluation_questions.answer_type') }}</label>
                                                    <select name="answer_type" id="answer_type" class="form-control mb-2" required>
                                                        <option value="text" {{ old('answer_type', $question->answer_type) == 'text' ? 'selected' : '' }}>
                                                            {{ trans('evaluation_questions.text') }}
                                                        </option>
                                                        <option value="rating_5" {{ old('answer_type', $question->answer_type) == 'rating_5' ? 'selected' : '' }}>
                                                            {{ trans('evaluation_questions.rating_5') }}
                                                        </option>
                                                        <option value="rating_10" {{ old('answer_type', $question->answer_type) == 'rating_10' ? 'selected' : '' }}>
                                                            {{ trans('evaluation_questions.rating_10') }}
                                                        </option>
                                                    </select>
                                                    @error('answer_type')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('evaluation_questions.is_required') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="is_required" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                               id="is_required" name="is_required" value="1"
                                                               {{ old('is_required', $question->is_required) ? 'checked' : '' }}>
                                                    </div>
                                                    @error('is_required')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('evaluation_questions.is_active') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="is_active" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                               id="is_active" name="is_active" value="1"
                                                               {{ old('is_active', $question->is_active) ? 'checked' : '' }}>
                                                    </div>
                                                    @error('is_active')
                                                    <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                                <span class="indicator-label">{{ trans('actions.update') }}</span>
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
            const isRequired = "{{ old('is_required', $question->is_required) }}";
            const isActive = "{{ old('is_active', $question->is_active) }}";

            document.getElementById('is_required').checked = isRequired == 1 ? true : false;
            document.getElementById('is_active').checked = isActive == 1 ? true : false;

            const typeSelect = document.getElementById('type');
            const courseField = document.getElementById('course_field');

            typeSelect.addEventListener('change', function() {
                if (this.value === 'course_specific') {
                    courseField.style.display = 'block';
                    document.getElementById('course_id').setAttribute('required', 'required');
                } else {
                    courseField.style.display = 'none';
                    document.getElementById('course_id').removeAttribute('required');
                }
            });

            if (typeSelect.value === 'course_specific') {
                typeSelect.dispatchEvent(new Event('change'));
            }
        });
    </script>
@endsection
