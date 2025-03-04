@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('services.services');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Services', 'link' => ''],
                ['label' => 'Edit', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.services.index')) }}

        </div>
    </div>
@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css">
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form action="{{ route('admin.services.update' , $service->id) }}" method="post" id="store_form"
                    class="form d-flex flex-column flex-lg-row" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{trans('services.edit')}}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2" value="{{ old('name.en' , $service->getTranslation('name','en')) }}" required />
                                                    @error('name.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2" value="{{ old('name.ar' , $service->getTranslation('name','ar')) }}" required />
                                                    @error('name.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.description_en') }}</label>
                                                    <textarea name="description[en]" id="description_en" class="form-control mb-2 summernote" rows="4" required>{{ old('description.en' , $service->getTranslation('description','en')) }}</textarea>
                                                    @error('description.en')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.description_ar') }}</label>
                                                    <textarea name="description[ar]" id="description_ar" class="form-control mb-2 summernote" rows="4" required>{{ old('description.ar' , $service->getTranslation('description','ar')) }}</textarea>
                                                    @error('description.ar')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5 mb-3 mt-3">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_title_en') }}</label>
                                                    <input type="text" name="meta_title[en]" id="meta_title_en"
                                                        class="form-control mb-2" value="{{ old('meta_title.en' , $service->getTranslation('meta_title','en')) }}" required />
                                                    @error('meta_title.en')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_title_ar') }}</label>
                                                    <input type="text" name="meta_title[ar]" id="meta_title_ar"
                                                        class="form-control mb-2" value="{{ old('meta_title.ar' , $service->getTranslation('meta_title','ar')) }}" required />
                                                    @error('meta_title.ar')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_description_en') }}</label>
                                                    <textarea name="meta_description[en]" id="meta_description_en" class="form-control mb-2 summernote" rows="4" required>{{ old('meta_description.en' , $service->getTranslation('meta_description','en')) }}</textarea>
                                                    @error('meta_description.en')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_description_ar') }}</label>
                                                    <textarea name="meta_description[ar]" id="meta_description_ar" class="form-control mb-2 summernote" rows="4" required>{{ old('meta_description.ar' , $service->getTranslation('meta_description','ar')) }}</textarea>
                                                    @error('meta_description.ar')
                                                        <span class="invalid-feedback d-block" role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap mb-3 mt-3">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.icon') }}</label>
                                                    <input type="file" name="icon" id="icon"
                                                        class="form-control mb-2 icon"/>
                                                    @error('icon')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.image') }}</label>
                                                    <input type="file" name="image" id="image"
                                                        class="form-control mb-2 image"/>
                                                    @error('image')
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                minHeight: 200,
                maxHeight: 500,
                focus: true
            });
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.icon').dropify({
            messages: {
                'default': 'Drop icon here',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
    <script>
        $('.image').dropify({
            messages: {
                'default': 'Drop image here',
                'replace': 'Drag and drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    </script>
@endsection
