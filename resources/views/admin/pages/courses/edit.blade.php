@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('courses.courses');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Courses', 'link' => ''],
                ['label' => 'Edit', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.courses.index')) }}

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
                <form action="{{ route('admin.courses.update', $course->id) }}" method="post" id="store_form"
                    class="form d-flex flex-column flex-lg-row">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{ trans('courses.edit') }}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.section_name') }}</label>
                                                    <select name="section_id" id="section_id" class="form-control mb-2"
                                                        required>
                                                        <option disabled selected value="">
                                                            {{ trans('actions.choose') }}</option>
                                                        @foreach ($sections as $section)
                                                            <option value="{{ $section->id }}"
                                                                {{ old('section_id', $course->section_id) == $section->id ? 'selected' : '' }}>
                                                                {{ $section->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('section_id')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2"
                                                        value="{{ old('name.en', $course->getTranslation('name', 'en')) }}"
                                                        required />
                                                    @error('name.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2"
                                                        value="{{ old('name.ar', $course->getTranslation('name', 'ar')) }}"
                                                        required />
                                                    @error('name.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.description_en') }}</label>
                                                    <textarea name="description[en]" id="description_en" class="form-control mb-2" rows="4" required>{{ old('description.en', $course->getTranslation('description', 'en')) }}</textarea>
                                                    @error('description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar" class="form-control mb-2" rows="4" required>{{ old('description.ar', $course->getTranslation('description', 'ar')) }}</textarea>
                                                    @error('description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_en') }}</label>
                                                    <input type="text" name="seo_head_keyword[en]"
                                                        id="seo_head_keyword_en" class="form-control mb-2"
                                                        value="{{ old('seo_head_keyword.en', $course->getTranslation('seo_head_keyword', 'en')) }}"
                                                        required />
                                                    @error('seo_head_keyword.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_keyword_ar') }}</label>
                                                    <input type="text" name="seo_head_keyword[ar]"
                                                        id="seo_head_keyword_ar" class="form-control mb-2"
                                                        value="{{ old('seo_head_keyword.ar', $course->getTranslation('seo_head_keyword', 'ar')) }}"
                                                        required />
                                                    @error('seo_head_keyword.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_en') }}</label>
                                                    <textarea name="seo_head_description[en]" id="seo_head_description_en" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.en', $course->getTranslation('seo_head_description', 'en')) }}</textarea>
                                                    @error('seo_head_description.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('courses.seo_head_description_ar') }}</label>
                                                    <textarea name="seo_head_description[ar]" id="seo_head_description_ar" class="form-control mb-2" rows="4"
                                                        required>{{ old('seo_head_description.ar', $course->getTranslation('seo_head_description', 'ar')) }}</textarea>
                                                    @error('seo_head_description.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.min_age') }}</label>
                                                    <input type="text" name="min_age" id="min_age"
                                                        class="form-control mb-2"
                                                        value="{{ old('min_age', $course->min_age) }}" required />
                                                    @error('min_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.max_age') }}</label>
                                                    <input type="text" name="max_age" id="max_age"
                                                        class="form-control mb-2"
                                                        value="{{ old('max_age', $course->max_age) }}" required />
                                                    @error('max_age')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.status') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="status" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="status" name="status" value="1"
                                                            {{ old('status', $course->status) == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('courses.unique') }}</label>
                                                    <div class="form-check form-switch">
                                                        <input type="hidden" name="unique" value="0">
                                                        <input class="form-check-input toggle-switch" type="checkbox"
                                                            id="unique" name="unique" value="1"
                                                            {{ old('unique', $course->unique) == 1 ? 'checked' : '' }}>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

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
