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
                @include('site.pages.students.student_sidebar')
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <!-- Order History -->
                            <div class="tab-pane fade active show" id="history" role="tabpanel" aria-labelledby="history-tab">
                                <h4 class="mb-25">Order History</h4>
                                <div class="student-profile-orders-wrapper">
                                    <div class="student-profile-orders">
                                        <div class="student-profile-order custom-height-80">
                                            <div class="student-profile-order-name">
                                                <span>Amma part memorization</span>
                                            </div>
                                            <div class="student-profile-order-price">
                                                <span>LE 200</span>
                                            </div>
                                            <div class="student-profile-order-status">
                                                <span>paid</span>
                                            </div>
                                            <div class="student-profile-order-method">
                                                <span>wallet</span>
                                            </div>
                                            <div class="student-profile-order-date">
                                                <span>02-06-2023</span>
                                            </div>
                                        </div>
                                        <div class="student-profile-order custom-height-80">
                                            <div class="student-profile-order-name">
                                                <span>arabic language</span>
                                            </div>
                                            <div class="student-profile-order-price">
                                                <span>LE 300</span>
                                            </div>
                                            <div class="student-profile-order-status">
                                                <span>paid</span>
                                            </div>
                                            <div class="student-profile-order-method">
                                                <span>visa / mastercard</span>
                                            </div>
                                            <div class="student-profile-order-date">
                                                <span>08-06-2023</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
