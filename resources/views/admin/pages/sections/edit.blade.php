@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('sections.sections');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Sections', 'link' => ''],
                ['label' => 'Edit', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.sections.index')) }}

        </div>
    </div>
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form action="{{ route('admin.sections.update' , $section->id) }}" method="post" id="store_form"
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
                                                <h2>{{trans('sections.edit')}}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('sections.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2" value="{{ old('name.en' , $section->getTranslation('name','en')) }}" required />
                                                    @error('name.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('sections.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2" value="{{ old('name.ar' , $section->getTranslation('name','ar')) }}" required />
                                                    @error('name.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('sections.description_en') }}</label>
                                                    <textarea name="description[en]" id="description_en" class="form-control mb-2" rows="4" required>{{ old('description.en' , $section->getTranslation('description','en')) }}</textarea>
                                                    @error('description.en')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('sections.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar" class="form-control mb-2" rows="4" required>{{ old('description.ar' , $section->getTranslation('description','ar')) }}</textarea>
                                                    @error('description.ar')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('sections.status') }}</label>
                                                    <select name="status" id="status" class="form-control mb-2"
                                                        required>
                                                        <option value="1"
                                                            {{ old('status' , $section->status) == '1' ? 'selected' : '' }}>
                                                            {{ trans('sections.active') }}</option>
                                                        <option value="0"
                                                            {{ old('status' , $section->status) == '0' ? 'selected' : '' }}>
                                                            {{ trans('sections.inactive') }}</option>
                                                    </select>
                                                    @error('status')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
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
                                <span class="indicator-label">{{ trans('actions.save') }}</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
