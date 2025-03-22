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
                            <!-- Reviews -->
                            <div class="tab-pane fade active show" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <h4 class="mb-25">Reviews</h4>
                                <div class="student-profile-reviews">
                                    <div class="student-profile-reviews-item mb-30">
                                        <div class="student-profile-reviews-course-title">
                                            <h5>Amma part memorization</h5>
                                        </div>
                                        <div class="student-profile-reviews-text">
                                            <div class="student-profile-reviews-text-wrap mb-20">
                                                <div class="student-profile-review-icon">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </div>
                                                <div class="student-profile-review-update">
                                                    <button type="button" class="student-profile-review-update-btn">
                                                        <i class="far fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="student-profile-review-update-btn">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="student-profile-review-content">
                                                <p>best course best teacher, thank you.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="student-profile-reviews-item mb-30">
                                        <div class="student-profile-reviews-course-title">
                                            <h5>Arabic language</h5>
                                        </div>
                                        <div class="student-profile-reviews-text">
                                            <div class="student-profile-reviews-text-wrap mb-20">
                                                <div class="student-profile-review-icon">
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                </div>
                                                <div class="student-profile-review-update">
                                                    <button type="button" class="student-profile-review-update-btn">
                                                        <i class="far fa-edit"></i> Edit
                                                    </button>
                                                    <button type="button" class="student-profile-review-update-btn">
                                                        <i class="far fa-trash-alt"></i> Delete
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="student-profile-review-content">
                                                <p>best course best teacher, thank you.</p>
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
