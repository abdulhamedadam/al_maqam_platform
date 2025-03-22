<?php use Illuminate\Support\Facades\Route;

?>
<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
     data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{ route('admin.dashboard') }}">
            <img alt="Logo"
                 src="{{ asset(!empty($mainData->image) ? $mainData->image : 'assets/media/logos/default-dark.svg') }}"
                 class="h-50px app-sidebar-logo-default"/>
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle" class="app-sidebar-toggle btn btn-icon btn-sm h-30px w-30px rotate"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                     xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                          d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                          fill="currentColor"/>
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor"/>
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
             data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
             data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention fw-semibold px-3" id="#kt_app_sidebar_menu"
                 data-kt-menu="true" data-kt-menu-expand="false">

                @can('view_dashboard')
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs(['admin.dashboard']) ? 'active' : '' }}"
                           href="{{ route('admin.dashboard') }}">
                            <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                                <i class="bi bi-speedometer2 text-danger fs-5"></i>
                            </span>
                            <span class="menu-title">{{ trans('sidebar.dashboard') }}</span>
                        </a>
                    </div>
                @endcan

                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.settings_management') }}</span>
                    </div>

                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.branches', 'admin.siteData', 'admin.governorates', 'admin.areas']) ? 'active' : '' }}"
                       href="{{ route('admin.siteData') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-sliders text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('sidebar.general_settings') }}</span>
                    </a>
                </div>


                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.roles.index']) ? 'active' : '' }}"
                       href="{{ route('admin.roles.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-shield-lock text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('sidebar.roles') }}</span>
                    </a>
                </div>
                <hr class="w-100 border border-success">
                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.calendar') }}</span>
                    </div>
                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.calendar.index']) ? 'active' : '' }}"
                        href="{{ route('admin.calendar.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-calendar text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('sidebar.calendar') }}</span>
                    </a>
                </div>
                <hr class="w-100 border border-success">
                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.students_management') }}</span>
                    </div>

                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.students.index']) ? 'active' : '' }}"
                       href="{{ route('admin.students.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-person text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('students.students') }}</span>
                    </a>
                </div>


                <hr class="w-100 border border-success">
                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.teacher_management') }}</span>
                    </div>

                </div>
                @php
                    use App\Enums\TeacherStatus;
                @endphp

                @foreach (TeacherStatus::labels() as $value => $label)
                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs('admin.teachers.index') && request('status') == $value ? 'active' : '' }}"
                           href="{{ route('admin.teachers.index', ['status' => $value]) }}">
                            <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                                <i class="bi bi-person text-danger fs-5"></i>
                            </span>
                            <span class="menu-title">{{ $label }}</span>
                        </a>
                    </div>
                @endforeach
                <hr class="w-100 border border-success">
                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.sections_and_sections_management') }}</span>
                    </div>

                </div>
                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.sections.index']) ? 'active' : '' }}"
                       href="{{ route('admin.sections.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-folder text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('sections.sections') }}</span>
                    </a>
                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.courses.index']) ? 'active' : '' }}"
                       href="{{ route('admin.courses.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-mortarboard text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('courses.courses') }}</span>
                    </a>
                </div>
                <hr class="w-100 border border-success">
                <div class="menu-item ">
                    <div class="menu-content">
                        <span
                            class="fw-bold text-uppercase fs-7 text-success">{{ trans('sidebar.site_management') }}</span>
                    </div>

                </div>

                <div class="menu-item">
                    <a class="menu-link {{ request()->routeIs(['admin.services.index']) ? 'active' : '' }}"
                       href="{{ route('admin.services.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                            <i class="bi bi-tools text-danger fs-5"></i>
                        </span>
                        <span class="menu-title">{{ trans('sidebar.services') }}</span>
                    </a>
                </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs(['admin.sliders.index']) ? 'active' : '' }}"
                           href="{{ route('admin.sliders.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                           <i class="bi bi-image text-danger fs-5"></i>
                        </span>
                            <span class="menu-title">{{ trans('sidebar.sliders') }}</span>
                        </a>
                    </div>

                    <div class="menu-item">
                        <a class="menu-link {{ request()->routeIs(['admin.about_us.index']) ? 'active' : '' }}"
                           href="{{ route('admin.about_us.index') }}">
                        <span class="svg-icon svg-icon-2" style="margin-left: 5px">
                           <i class="bi bi-info-circle text-danger fs-5"></i>
                        </span>
                            <span class="menu-title">{{ trans('sidebar.about_us') }}</span>
                        </a>
                    </div>

            </div>
        </div>
    </div>
    <!--end::sidebar menu-->

</div>
