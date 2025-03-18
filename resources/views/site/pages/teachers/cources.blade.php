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
                            <!-- Enrolled Courses -->
                            <div class="tab-pane fade active show" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                <h4 class="mb-25">Enrolled Courses</h4>
                                <div class="student-profile-enroll">
                                    <ul class="nav mb-30" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="enrolled-tab" data-bs-toggle="tab"
                                                data-bs-target="#enrolled" type="button" role="tab"
                                                aria-controls="enrolled" aria-selected="false">
                                                Enrolled Courses (5)
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="active-tab" data-bs-toggle="tab"
                                                data-bs-target="#active" type="button" role="tab"
                                                aria-controls="active" aria-selected="false">
                                                Active Courses (2)
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="completed-tab" data-bs-toggle="tab"
                                                data-bs-target="#completed" type="button" role="tab"
                                                aria-controls="completed" aria-selected="false">
                                                Completed Courses (0)
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="enrolled" role="tabpanel"
                                            aria-labelledby="enrolled-tab">
                                            <div class="student-profile-enrolled-course">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-3"><a
                                                                                href="course.html">holy quran</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>Amma part memorization</h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>
                                                                                Level : <span>kids, adult</span>
                                                                            </h5>
                                                                            <p>
                                                                                Memorizing Juz Amma starting from
                                                                                Surat Al-Naba’ to Surat Al-Nas
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>12 lessons
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>30 minutes per lesson
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>kids & adults
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>4 students
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-.0"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_002" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$147.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Amma part
                                                                            memorization</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Mohamed</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-3"><a
                                                                                href="course.html">holy quran</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>Amma part memorization</h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>
                                                                                Level : <span>kids, adult</span>
                                                                            </h5>
                                                                            <p>
                                                                                Memorizing Juz Amma starting from
                                                                                Surat Al-Naba’ to Surat Al-Nas
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>12 lessons
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>30 minutes per lesson
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>kids & adults
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>4 students
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-.0"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_002" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$147.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Amma part
                                                                            memorization</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Mohamed</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-3"><a
                                                                                href="course.html">holy quran</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>Amma part memorization</h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>
                                                                                Level : <span>kids, adult</span>
                                                                            </h5>
                                                                            <p>
                                                                                Memorizing Juz Amma starting from
                                                                                Surat Al-Naba’ to Surat Al-Nas
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>12 lessons
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>30 minutes per lesson
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>kids & adults
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>4 students
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-.0"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_002" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$147.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Amma part
                                                                            memorization</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Mohamed</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-3"><a
                                                                                href="course.html">holy quran</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>Amma part memorization</h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>
                                                                                Level : <span>kids, adult</span>
                                                                            </h5>
                                                                            <p>
                                                                                Memorizing Juz Amma starting from
                                                                                Surat Al-Naba’ to Surat Al-Nas
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>12 lessons
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>30 minutes per lesson
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>kids & adults
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>4 students
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-.0"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_002" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$147.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Amma part
                                                                            memorization</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Mohamed</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-3"><a
                                                                                href="course.html">holy quran</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>Amma part memorization</h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>
                                                                                Level : <span>kids, adult</span>
                                                                            </h5>
                                                                            <p>
                                                                                Memorizing Juz Amma starting from
                                                                                Surat Al-Naba’ to Surat Al-Nas
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>12 lessons
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>30 minutes per lesson
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>kids & adults
                                                                                </li>
                                                                                <li>
                                                                                    <svg fill="#000000"
                                                                                        viewBox="0 0 24 24"
                                                                                        id="check-mark-circle-6"
                                                                                        data-name="Line Color"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        class="icon line-color">
                                                                                        <g id="SVGRepo_bgCarrier-5"
                                                                                            stroke-width="0"></g>
                                                                                        <g id="SVGRepo_tracerCarrier-5"
                                                                                            stroke-linecap="round"
                                                                                            stroke-linejoin="round"></g>
                                                                                        <g id="SVGRepo_iconCarrier">
                                                                                            <polyline id="secondary"
                                                                                                points="21 5 12 14 8 10"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </polyline>
                                                                                            <path id="primary"
                                                                                                d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1"
                                                                                                style="
                                                  fill: none;
                                                  stroke: #2cba35;
                                                  stroke-linecap: round;
                                                  stroke-linejoin: round;
                                                  stroke-width: 2;
                                                ">
                                                                                            </path>
                                                                                        </g>
                                                                                    </svg>4 students
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-.0"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_002" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$147.00</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Amma part
                                                                            memorization</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Mohamed</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="active" role="tabpanel"
                                            aria-labelledby="active-tab">
                                            <div class="student-profile-enrolled-course">
                                                <div class="row">
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/arabic-lang-bg-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-2"><a
                                                                                href="course.html">Life Style</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>
                                                                                Become a Super Human: Naturally &amp;
                                                                                Safely Boost Testosterone
                                                                            </h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>Level : <span>Beginner</span></h5>
                                                                            <p>
                                                                                Knowledge is power. Information is
                                                                                liberating. Education is the premise
                                                                                of progress, in every society, in
                                                                                every family
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Scratch
                                                                                    to HTML
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Learn
                                                                                    how to code in Python
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Unlimited
                                                                                    backend database creation
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Adobe XD
                                                                                    Tutorials
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-666"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_10765" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>$48.00</span>
                                                                        <del>$24.50</del>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Become a Super Human:
                                                                            Naturally &amp;
                                                                            Safely Boost Testosterone</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="teacher.html"><i
                                                                                class="fas fa-user"></i>Edyal
                                                                            Romel</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-4 col-lg-6 col-md-6">
                                                        <div class="course-wrapper-2 mb-30">
                                                            <div class="student-course-img">
                                                                <img src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                                    alt="course-img" />
                                                            </div>
                                                            <div class="course-cart">
                                                                <div class="course-info-wrapper">
                                                                    <div class="cart-info-body">
                                                                        <span class="category-color category-color-1"><a
                                                                                href="course.html">Development</a></span>
                                                                        <a href="course-details.html">
                                                                            <h3>
                                                                                Python and Django Full Stack Web
                                                                                Developer Bootcamp
                                                                            </h3>
                                                                        </a>
                                                                        <div class="cart-lavel">
                                                                            <h5>Level : <span>Beginner</span></h5>
                                                                            <p>
                                                                                Knowledge is power. Information is
                                                                                liberating. Education is the premise
                                                                                of progress, in every society, in
                                                                                every family
                                                                            </p>
                                                                        </div>
                                                                        <div class="info-cart-text">
                                                                            <ul>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Scratch
                                                                                    to HTML
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Learn
                                                                                    how to code in Python
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Unlimited
                                                                                    backend database creation
                                                                                </li>
                                                                                <li>
                                                                                    <i class="far fa-check"></i>Adobe XD
                                                                                    Tutorials
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                        <div class="course-action">
                                                                            <a href="course-details.html"
                                                                                class="view-details-btn">View Details</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="student-course-footer">
                                                                <div class="student-course-linkter">
                                                                    <div class="course-lessons">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                            width="16.471" height="16.471"
                                                                            viewBox="0 0 16.471 16.471">
                                                                            <g id="blackboard-633"
                                                                                transform="translate(-0.008)">
                                                                                <path id="Path_1000" data-name="Path 101"
                                                                                    d="M16,1.222H8.726V.483a.483.483,0,1,0-.965,0v.74H.491A.483.483,0,0,0,.008,1.7V13.517A.483.483,0,0,0,.491,14H5.24L4.23,15.748a.483.483,0,1,0,.836.483L6.354,14H7.761v1.99a.483.483,0,0,0,.965,0V14h1.407l1.288,2.231a.483.483,0,1,0,.836-.483L11.247,14H16a.483.483,0,0,0,.483-.483V1.7A.483.483,0,0,0,16,1.222Zm-.483.965v8.905H.973V2.187Zm0,10.847H.973v-.976H15.514Z"
                                                                                    fill="#575757"></path>
                                                                            </g>
                                                                        </svg>
                                                                        <span class="ml-8">12 Lessons</span>
                                                                    </div>
                                                                    <div class="portfolio-price">
                                                                        <span>FREE</span>
                                                                    </div>
                                                                </div>
                                                                <div class="student-course-text">
                                                                    <h3>
                                                                        <a href="course-details.html">Python and Django
                                                                            Full Stack Web
                                                                            Developer Bootcamp</a>
                                                                    </h3>
                                                                </div>
                                                                <div class="portfolio-user">
                                                                    <div class="user-icon">
                                                                        <a href="3"><i
                                                                                class="fas fa-user"></i>Junior
                                                                            Lucy</a>
                                                                    </div>
                                                                    <div class="course-icon">
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fas fa-star"></i>
                                                                        <i class="fal fas fa-star"></i>
                                                                        <span>(25)</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="completed" role="tabpanel"
                                            aria-labelledby="completed-tab">
                                            <div class="student-profile-enrolled-course">
                                                <p>No course completed yet.</p>
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
