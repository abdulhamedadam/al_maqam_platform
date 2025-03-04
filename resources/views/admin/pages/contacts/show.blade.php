@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('contacts.contacts');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Contacts', 'link' => ''],
                ['label' => 'Show', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.contacts.index')) }}

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
                                                <h2>{{trans('contacts.contact_details')}}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('contacts.name') }}</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control mb-2" value="{{ $contact->name }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('contacts.email') }}</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control mb-2" value="{{ $contact->email }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('contacts.phone') }}</label>
                                                    <input type="text" name="phone" id="phone"
                                                        class="form-control mb-2" value="{{ $contact->phone }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('contacts.subject') }}</label>
                                                    <input type="text" name="subject" id="subject"
                                                        class="form-control mb-2" value="{{ $contact->subject }}" disabled/>
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('contacts.message') }}</label>
                                                    <textarea name="message" id="message" class="form-control mb-2" rows="4" disabled>{{$contact->message}}</textarea>
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
