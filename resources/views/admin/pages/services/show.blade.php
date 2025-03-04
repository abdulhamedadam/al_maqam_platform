@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('services.services');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Services', 'link' => ''],
                ['label' => 'Show', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.services.index')) }}

        </div>
    </div>
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form id="store_form"
                    class="form d-flex flex-column flex-lg-row">
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{trans('services.show')}}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.name_en') }}</label>
                                                    <input type="text" name="name[en]" id="name_en"
                                                        class="form-control mb-2" value="{{ $service->getTranslation('name','en') }}" disabled />
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.name_ar') }}</label>
                                                    <input type="text" name="name[ar]" id="name_ar"
                                                        class="form-control mb-2" value="{{ $service->getTranslation('name','ar') }}" disabled />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.description_en') }}</label>
                                                    <div class="form-control mb-2" style="height: auto;">
                                                        {!! $service->getTranslation('description','en') !!}
                                                    </div>
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.description_ar') }}</label>
                                                    <div class="form-control mb-2" style="height: auto;">
                                                        {!! $service->getTranslation('description','ar') !!}
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5 mb-3 mt-3">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_title_en') }}</label>
                                                    <input type="text" name="meta_title[en]" id="meta_title_en"
                                                        class="form-control mb-2" value="{{ $service->getTranslation('meta_title','en') }}" disabled />
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_title_ar') }}</label>
                                                    <input type="text" name="meta_title[ar]" id="meta_title_ar"
                                                        class="form-control mb-2" value="{{ $service->getTranslation('meta_title','ar') }}" disabled />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_description_en') }}</label>
                                                    <div class="form-control mb-2" style="height: auto;">
                                                        {!! $service->getTranslation('meta_description','en') !!}
                                                    </div>
                                                </div>
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('services.meta_description_ar') }}</label>
                                                    <div class="form-control mb-2" style="height: auto;">
                                                        {!! $service->getTranslation('meta_description','ar') !!}
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop
