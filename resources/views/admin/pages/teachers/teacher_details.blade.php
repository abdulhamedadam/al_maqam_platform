<div class="d-flex flex-wrap flex-sm-nowrap  mb-6">
    <!--begin: Pic-->

    <div class="me-7 mb-4">
        <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
            @if (!empty($all_data->image) && file_exists(public_path('images/' . $all_data->talab_image)))
                <img src="{{ asset('images/' . $all_data->image) }}" alt="image" />
            @else
                <img src="{{ asset('images/logo.png') }}" alt="" />
            @endif
            <div
                class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
            </div>
        </div>
    </div>

    <div class="flex-grow-1">

        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">

            <div class="d-flex flex-column">

                <div class="d-flex align-items-center mb-2">
                    <a href="#"
                        class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">{{ $all_data->name }}</a>
                    <a href="#">
                        <i class="bi bi-patch-check fs-1 text-primary"></i>
                    </a>

                </div>

                <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                        <i class="bi bi-telephone fs-4 me-1"></i> {{ $all_data->phone }}
                    </a>
                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary me-5 mb-2">
                        <i class="bi bi-geo-alt fs-4 me-1"></i> {{ $all_data->country }} {{ $all_data->state }}
                    </a>
                    <a href="#" class="d-flex align-items-center text-gray-500 text-hover-primary mb-2">
                        <i class="bi bi-envelope fs-4 me-1"></i> {{ $all_data->email }}
                    </a>
                </div>

                <!--end::Info-->
            </div>
            <!--end::User-->
            <!--begin::Actions-->
            <div class="d-flex my-4">
                <a href="{{ route('admin.teachers.index', ['status' => 1]) }}" class="btn btn-sm btn-light me-2"
                    id="kt_user_follow_button">
                    <i class="ki-duotone ki-check fs-3 d-none"></i>
                    <span class="indicator-label">{{ trans('teachers.back') }}</span>
                    <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>

                </a>


            </div>
            <!--end::Actions-->
        </div>
        <!--end::Title-->
        <!--begin::Stats-->
        <div class="d-flex flex-wrap flex-stack">
            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-grow-1 pe-8">
                <!--begin::Stats-->
                <div class="d-flex flex-wrap">
                    <!--begin::Stat-->


                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <i class="bi bi-arrow-down-circle fs-3 text-danger me-2"></i>
                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="500">500</div>
                        </div>
                        <div class="fw-semibold fs-6 text-gray-500">{{ trans('teachers.cources') }}</div>
                    </div>

                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <!--begin::Number-->
                        <div class="d-flex align-items-center">
                            <i class="bi bi-cash-coin fs-3 text-success me-2"></i>
                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="500"
                                data-kt-countup-prefix="$">
                                500</div>
                        </div>
                        <div class="fw-semibold fs-6 text-gray-500">{{ trans('teachers.students') }}</div>
                    </div>

                    <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-check-circle fs-3 text-success me-2"></i>
                            <div class="fs-2 fw-bold" data-kt-countup="true" data-kt-countup-value="500"
                                data-kt-countup-prefix="$">
                                500</div>
                        </div>
                        <div class="fw-semibold fs-6 text-gray-500">{{ trans('teachers.ratings') }}</div>
                    </div>

                    {{-- <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-6 mb-3">
                        <div class="d-flex align-items-center">
                            <i class="bi bi-exclamation-circle fs-3 text-warning me-2"></i>
                            <div class="fs-2 fw-bold" data-kt-countup="true"
                                data-kt-countup-value="" data-kt-countup-prefix="$">
                                </div>
                        </div>
                        <div class="fw-semibold fs-6 text-gray-500">{{ trans('teachers.') }}</div>
                    </div> --}}



                </div>

            </div>

        </div>

    </div>

</div>
