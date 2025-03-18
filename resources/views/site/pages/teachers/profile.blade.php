@extends('site.layouts.main')

@section('title', 'Student Profile | Quraan')

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
                                        <h5>Registration Date :</h5>
                                        <span>October 15, 2022 10:30 am</span>
                                    </li>
                                    <li>
                                        <h5>First Name :</h5>
                                        <span>Sheref</span>
                                    </li>
                                    <li>
                                        <h5>Last Name :</h5>
                                        <span>Hatem</span>
                                    </li>
                                    <li>
                                        <h5>Username :</h5>
                                        <span>sheref</span>
                                    </li>
                                    <li>
                                        <h5>Email :</h5>
                                        <span>sheref@domain.com</span>
                                    </li>
                                    <li>
                                        <h5>Phone :</h5>
                                        <span>+201234567890</span>
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
