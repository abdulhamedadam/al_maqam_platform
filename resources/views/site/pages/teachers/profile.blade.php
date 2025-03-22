@extends('site.layouts.main')

@section('title', 'Teacher Profile | Quraan')

@section('header_class', 'student-page')

@section('body_class', 'student-profile')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/student-profile.css') }}">
@endsection

@section('content')
    <div class="course-details-area pt-120 pb-100">
        <div class="container">
            <div class="student-profile-author pb-30">
                <div class="student-profile-author-img">
                    <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}"
                        alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <span>{{ trans('profile.hello') }},</span>
                    <h3 class="student-profile-author-name">{{ auth('web')->user()->name }}</h3>
                </div>
            </div>
            <div class="row">
                @include('site.pages.teachers.teacher_sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <!-- My Profile -->
                            <div class="tab-pane fade active show" id="profile" role="tabpanel"
                                aria-labelledby="profile-tab">
                                <h4 class="mb-25">My Profile</h4>
                                <ul class="student-profile-info">
                                    <li>
                                        <h5>{{ trans('profile.registration_date') }} :</h5>
                                        <span>{{ auth()->user()->created_at->format('F d, Y h:i a') }}</span>
                                    </li>
                                    <li>
                                        <h5>{{ trans('profile.name') }} :</h5>
                                        <span>{{ auth()->user()->name }}</span>
                                    </li>
                                    <li>
                                        <h5>{{ trans('profile.email') }} :</h5>
                                        <span>{{ auth()->user()->email }}</span>
                                    </li>
                                    <li>
                                        <h5>{{ trans('profile.phone') }} :</h5>
                                        <span>{{ auth()->user()->phone }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
