@extends('admin.layouts.master')
@section('toolbar')
    <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
        @php
            $title = trans('students.students');
            $breadcrumbs = [
                ['label' => 'Home', 'link' => ''],
                ['label' => 'Students', 'link' => ''],
                ['label' => 'Create', 'link' => ''],
            ];

            PageTitle($title, $breadcrumbs);
        @endphp

        <div class="d-flex align-items-center gap-2 gap-lg-3">

            {{ BackButton(route('admin.students.index')) }}

        </div>
    </div>
@endsection

@section('content')

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <form action="{{ route('admin.students.store') }}" method="post" id="store_form"
                    class="form d-flex flex-column flex-lg-row">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                                <div class="d-flex flex-column gap-7 gap-lg-10">
                                    <div class="card card-flush py-4">
                                        <div class="card-header">
                                            <div class="card-title">
                                                <h2>{{trans('students.create')}}</h2>
                                            </div>
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.name') }}</label>
                                                    <input type="text" name="name" id="name"
                                                        class="form-control mb-2" value="{{ old('name') }}" required />
                                                    @error('name')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.email') }}</label>
                                                    <input type="email" name="email" id="email"
                                                        class="form-control mb-2" value="{{ old('email') }}" required />
                                                    @error('email')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.password') }}</label>
                                                    <input type="password" name="password" id="password"
                                                        class="form-control mb-2" required />
                                                    @error('password')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label
                                                        class="form-label">{{ trans('students.password_confirmation') }}</label>
                                                    <input type="password" name="password_confirmation"
                                                        id="password_confirmation" class="form-control mb-2" required />
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.phone') }}</label>
                                                    <input type="text" name="phone" id="phone"
                                                        class="form-control mb-2" value="{{ old('phone') }}" required />
                                                    @error('phone')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.birthday') }}</label>
                                                    <input type="date" name="birthday" id="birthday"
                                                        class="form-control mb-2" value="{{ old('birthday') }}" required />
                                                    @error('birthday')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="d-flex flex-wrap gap-5">
                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.gender') }}</label>
                                                    <select name="gender" id="gender" class="form-control mb-2"
                                                        required>
                                                        <option disabled selected value="">{{ trans('actions.choose') }}</option>
                                                        <option value="m"
                                                            {{ old('gender') == 'm' ? 'selected' : '' }}>
                                                            {{ trans('users.male') }}</option>
                                                        <option value="f"
                                                            {{ old('gender') == 'f' ? 'selected' : '' }}>
                                                            {{ trans('users.female') }}</option>
                                                    </select>
                                                    @error('gender')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="fv-row w-100 flex-md-root">
                                                    <label class="form-label">{{ trans('students.country') }}</label>
                                                    <input type="text" name="country" id="country"
                                                        class="form-control mb-2" value="{{ old('country') }}" required />
                                                    @error('country')
                                                        <span class="invalid-feedback d-block"
                                                            role="alert">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="fv-row w-100">
                                                <label class="form-label">{{ trans('students.state') }}</label>
                                                <input type="text" name="state" id="state"
                                                    class="form-control mb-2" value="{{ old('state') }}" required />
                                                @error('state')
                                                    <span class="invalid-feedback d-block"
                                                        role="alert">{{ $message }}</span>
                                                @enderror
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
