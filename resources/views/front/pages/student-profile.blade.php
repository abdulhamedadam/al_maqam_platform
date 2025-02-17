@extends('front.layouts.main')

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
                    <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}" alt="img not found" />
                </div>
                <div class="student-profile-author-text">
                    <span>Hello,</span>
                    <h3 class="student-profile-author-name">Ahmed Abdallah</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="student-profile-sidebar mb-30">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                    type="button" role="tab" aria-controls="home" aria-selected="true">
                                    <i class="fas fa-house"></i>
                                    <!-- <i class="fa-solid fa-gauge-high"></i> -->
                                    Dashboard
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
                                    type="button" role="tab" aria-controls="profile" aria-selected="false">
                                    <i class="fas fa-user"></i> My Profile
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact"
                                    type="button" role="tab" aria-controls="contact" aria-selected="false">
                                    <i class="fas fa-graduation-cap"></i> Enrolled Courses
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                    type="button" role="tab" aria-controls="reviews" aria-selected="false">
                                    <i class="fas fa-star"></i> Reviews
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="history-tab" data-bs-toggle="tab" data-bs-target="#history"
                                    type="button" role="tab" aria-controls="history" aria-selected="false">
                                    <i class="fas fa-cart-plus"></i> Order History
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="setting-tab" data-bs-toggle="tab" data-bs-target="#setting"
                                    type="button" role="tab" aria-controls="setting" aria-selected="false">
                                    <i class="fas fa-cog"></i> Settings
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="logout-tab" data-bs-toggle="tab" data-bs-target="#logout"
                                    type="button" role="tab" aria-controls="logout" aria-selected="false"
                                    onclick="window.location.href='login.html';">
                                    <i class="fas fa-sign-out-alt"></i> Logout
                                </button>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="student-profile-content">
                        <div class="tab-content" id="myTabContent">
                            <!-- Dashboard -->
                            <div class="tab-pane fade active show" id="home" role="tabpanel"
                                aria-labelledby="home-tab">
                                <h4 class="mb-25">Dashboard</h4>
                                <div class="student-profile-content-fact">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">
                                                        <svg id="layer2" xmlns="http://www.w3.org/2000/svg"
                                                            width="50.897" height="56.553" viewBox="0 0 50.897 56.553">
                                                            <path id="path3518"
                                                                d="M26.3.646,1.793,13.689a.834.834,0,0,0,.048,1.522L16.07,21.734h21.4L51.7,15.211a.834.834,0,0,0,.05-1.522L27.244.647a.9.9,0,0,0-.473-.117A1.023,1.023,0,0,0,26.3.646Z"
                                                                transform="translate(-1.323 -0.529)" fill="#5299d3">
                                                            </path>
                                                            <path id="path3534"
                                                                d="M16.66,2.911a35.363,35.363,0,0,0-7.55.718,9.782,9.782,0,0,0-2.456.841,3.065,3.065,0,0,0-.858.648,1.7,1.7,0,0,0-.451,1.106v7.4l-.077.893a17.977,17.977,0,0,1,22.781,0l-.077-.891v-7.4a1.7,1.7,0,0,0-.451-1.106,3.056,3.056,0,0,0-.856-.648,9.78,9.78,0,0,0-2.456-.841,35.363,35.363,0,0,0-7.55-.718Z"
                                                                transform="translate(8.788 5.574)" fill="#a0c7e7"></path>
                                                            <path id="path3604"
                                                                d="M9.111,3.629a9.782,9.782,0,0,0-2.456.841,3.065,3.065,0,0,0-.858.648,1.7,1.7,0,0,0-.451,1.106v7.4l-.077.893a17.891,17.891,0,0,1,1.962-1.388V6.225a1.7,1.7,0,0,1,.451-1.106A3.066,3.066,0,0,1,8.54,4.47,9.782,9.782,0,0,1,11,3.629a34,34,0,0,1,6.607-.7c-.316-.006-.62-.02-.943-.02a35.363,35.363,0,0,0-7.55.718Z"
                                                                transform="translate(8.788 5.574)" fill="#74addc"></path>
                                                            <path id="rect3599"
                                                                d="M18.372,4.5h1.885A14.107,14.107,0,0,1,34.395,18.636V33.67H4.233V18.636A14.107,14.107,0,0,1,18.372,4.5Z"
                                                                transform="translate(6.135 9.64)" fill="#356287"></path>
                                                            <path id="path3610"
                                                                d="M18.372,4.5A14.107,14.107,0,0,0,4.233,18.636V33.669H6.118V18.636A14.107,14.107,0,0,1,20.257,4.5Z"
                                                                transform="translate(6.135 9.64)" fill="#2c5170"></path>
                                                            <path id="path3506"
                                                                d="M15.317,11.649a14.343,14.343,0,0,0-13.2,14.545v1.451a.943.943,0,0,0,.939.946H46.418a.943.943,0,0,0,.939-.946V26.193a14.341,14.341,0,0,0-13.2-14.545H15.317Z"
                                                                transform="translate(0.711 27.962)" fill="#5299d3"></path>
                                                            <path id="path3508"
                                                                d="M7.827,9.922a.943.943,0,0,0-.948.939v8.909a.943.943,0,0,0,.948.939h9.42a.943.943,0,0,0,.946-.939V10.861a.943.943,0,0,0-.946-.939Z"
                                                                transform="translate(12.912 23.538)" fill="#fca">
                                                            </path>
                                                            <path id="path3510"
                                                                d="M7.827,9.922a.943.943,0,0,0-.948.939v2.723a9.605,9.605,0,0,0,11.314,0V10.861a.943.943,0,0,0-.946-.939Z"
                                                                transform="translate(12.913 23.538)" fill="#ffb889">
                                                            </path>
                                                            <path id="path3512"
                                                                d="M15.318,11.648a14.345,14.345,0,0,0-13.2,14.546v1.451a.943.943,0,0,0,.939.946H4.941A.943.943,0,0,1,4,27.645V26.194A14.345,14.345,0,0,1,17.2,11.648H15.318Z"
                                                                transform="translate(0.711 27.961)" fill="#3385c8"></path>
                                                            <path id="path3514"
                                                                d="M8.661,11.126,5.83,13.95a.943.943,0,0,0,0,1.329l6.6,6.6a.943.943,0,0,0,1.329,0l2.163-2.158,2.165,2.158a.943.943,0,0,0,1.329,0l6.6-6.6a.943.943,0,0,0,0-1.329L23.19,11.126a.942.942,0,0,0-1.337,0l-5.928,5.928L9.99,11.126a.933.933,0,0,0-1.329,0Z"
                                                                transform="translate(9.523 25.911)" fill="#a0c7e7"></path>
                                                            <path id="path3520"
                                                                d="M8.387,7.087a3.625,3.625,0,0,0-3.514,3.7A3.63,3.63,0,0,0,8.387,14.5a3.252,3.252,0,0,0,.808-.114c0-.007,0-.013,0-.02V7.189a3.341,3.341,0,0,0-.8-.1Z"
                                                                transform="translate(7.773 16.275)" fill="#ffb889"></path>
                                                            <path id="path3522"
                                                                d="M15.171,10.79A3.63,3.63,0,0,1,11.656,14.5a3.252,3.252,0,0,1-.808-.114c0-.007,0-.013,0-.02V7.189a3.341,3.341,0,0,1,.8-.1,3.625,3.625,0,0,1,3.514,3.7Z"
                                                                transform="translate(23.084 16.275)" fill="#fca">
                                                            </path>
                                                            <path id="path3528"
                                                                d="M13.067,5.316a.943.943,0,0,0-.954.933A3.829,3.829,0,0,1,8.28,10.055H6.7a.943.943,0,0,0-.939.939v4.732a9.637,9.637,0,0,0,19.273,0V10.994a.943.943,0,0,0-.939-.939h-5.54a4.624,4.624,0,0,1-4.571-3.938.943.943,0,0,0-.919-.8Z"
                                                                transform="translate(10.051 11.736)" fill="#fca">
                                                            </path>
                                                            <path id="path3530" d="M4.8,3.167l-1.887,1v13.16H4.8Z"
                                                                transform="translate(2.743 6.23)" fill="#eee"></path>
                                                            <path id="path3532"
                                                                d="M3.592,6.614a.943.943,0,0,0-.946.939v8.511a.943.943,0,0,0,.946.946H5.473a.943.943,0,0,0,.939-.946V7.553a.943.943,0,0,0-.939-.939Z"
                                                                transform="translate(2.067 15.063)" fill="#ffca28"></path>
                                                            <path id="path3537"
                                                                d="M3.592,6.614a.943.943,0,0,0-.946.939v8.512a.943.943,0,0,0,.946.946H5.473a.943.943,0,0,1-.943-.946V7.553a.943.943,0,0,1,.943-.939Z"
                                                                transform="translate(2.067 15.063)" fill="#ecb200"></path>
                                                            <path id="path3542"
                                                                d="M6.7,6.646a.943.943,0,0,0-.939.939v4.731a9.613,9.613,0,0,0,6.526,9.1,10.337,10.337,0,0,1-5.374-9.068V7.255a1.014,1.014,0,0,1,.206-.609Z"
                                                                transform="translate(10.051 15.145)" fill="#ffb889">
                                                            </path>
                                                            <g id="Group_2872" data-name="Group 2872"
                                                                transform="translate(11.311 50.9)">
                                                                <path id="path3544"
                                                                    d="M5.483,14.818A.943.943,0,0,0,4.5,15.84v4.62H6.379V15.84A.943.943,0,0,0,5.483,14.818Z"
                                                                    transform="translate(-4.498 -14.817)" fill="#3385c8">
                                                                </path>
                                                                <path id="path3547"
                                                                    d="M12.891,14.818a.943.943,0,0,0-.981,1.022v4.62h1.878V15.84a.943.943,0,0,0-.9-1.022Z"
                                                                    transform="translate(14.485 -14.817)" fill="#3385c8">
                                                                </path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="counter">5</span>
                                                        <p>Online Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">
                                                        <svg id="online-course" xmlns="http://www.w3.org/2000/svg"
                                                            width="51.549" height="56.553" viewBox="0 0 51.549 56.553">
                                                            <path id="Path_7050" data-name="Path 7050"
                                                                d="M220.4,404.2h8.315v8.63H220.4Z"
                                                                transform="translate(-198.783 -358.613)" fill="#726b93">
                                                            </path>
                                                            <path id="Path_7051" data-name="Path 7051"
                                                                d="M102.177,357.3v1.612a1.535,1.535,0,0,1-1.53,1.53H56.83a1.535,1.535,0,0,1-1.53-1.53V357.3Z"
                                                                transform="translate(-52.964 -317.19)" fill="#988fc4">
                                                            </path>
                                                            <path id="Path_7052" data-name="Path 7052"
                                                                d="M102.177,77.142v29.021H55.3V77.142a1.535,1.535,0,0,1,1.53-1.53h7.042l-.993.5a1.831,1.831,0,0,0-1.016,1.635,1.81,1.81,0,0,0,1.016,1.635l3.959,1.974v7.661a2.825,2.825,0,0,0,2.242,2.756,47.052,47.052,0,0,0,19.34,0,2.825,2.825,0,0,0,2.242-2.756V81.357l1.144-.572v7.521a1.168,1.168,0,0,0,2.336,0V79.617l.479-.245a1.831,1.831,0,0,0,1.016-1.635A1.81,1.81,0,0,0,94.621,76.1l-.993-.5h7.042A1.548,1.548,0,0,1,102.177,77.142Zm-6.563,25.132a1.171,1.171,0,0,0-1.168-1.168H70.634a1.168,1.168,0,1,0,0,2.336H94.446A1.164,1.164,0,0,0,95.614,102.274ZM83.468,96.656A1.171,1.171,0,0,0,82.3,95.488H70.622a1.168,1.168,0,0,0,0,2.336H82.3A1.157,1.157,0,0,0,83.468,96.656Zm-16.934,0a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,96.656Zm0,5.617a1.171,1.171,0,0,0-1.168-1.168H63.031a1.168,1.168,0,1,0,0,2.336h2.336A1.157,1.157,0,0,0,66.535,102.274Z"
                                                                transform="translate(-52.964 -68.389)" fill="#e3fbff">
                                                            </path>
                                                            <path id="Path_7053" data-name="Path 7053"
                                                                d="M193.229,134.9v6.493a.491.491,0,0,1-.374.479,44.718,44.718,0,0,1-18.382,0,.479.479,0,0,1-.374-.479V134.9l8.747,4.379a1.882,1.882,0,0,0,1.635,0Z"
                                                                transform="translate(-157.89 -120.763)" fill="#726b93">
                                                            </path>
                                                            <path id="Path_7054" data-name="Path 7054"
                                                                d="M164.718,41.349l-13.909,6.96L136.9,41.349,150.809,34.4Z"
                                                                transform="translate(-125.035 -32)" fill="#988fc4"></path>
                                                            <path id="Path_7055" data-name="Path 7055"
                                                                d="M86.849,22.6V55.571a3.87,3.87,0,0,1-3.866,3.866H67.568v8.63h4.158a1.168,1.168,0,1,1,0,2.336h-21.3a1.168,1.168,0,1,1,0-2.336h4.158v-8.63H39.166A3.87,3.87,0,0,1,35.3,55.571V22.6a3.87,3.87,0,0,1,3.866-3.866H50.879l9.378-4.695a1.83,1.83,0,0,1,1.635,0l9.378,4.683H82.983A3.88,3.88,0,0,1,86.849,22.6ZM84.513,55.571V53.96H37.636v1.612a1.535,1.535,0,0,0,1.53,1.53H82.983A1.528,1.528,0,0,0,84.513,55.571Zm0-3.947V22.6a1.535,1.535,0,0,0-1.53-1.53H75.941l.993.5A1.831,1.831,0,0,1,77.95,23.21a1.81,1.81,0,0,1-1.016,1.635l-.479.245v8.689a1.168,1.168,0,0,1-2.336,0V26.247l-1.144.572V34.48a2.813,2.813,0,0,1-2.242,2.756,47.533,47.533,0,0,1-9.67,1,47.533,47.533,0,0,1-9.67-1,2.825,2.825,0,0,1-2.242-2.756V26.819l-3.959-1.974a1.831,1.831,0,0,1-1.016-1.635,1.81,1.81,0,0,1,1.016-1.635l.993-.5H39.166a1.535,1.535,0,0,0-1.53,1.53V51.624ZM61.074,30.159,74.983,23.21,61.074,16.25,47.165,23.2Zm9.565,4.309V27.975l-8.747,4.379a1.882,1.882,0,0,1-1.635,0L51.51,27.975v6.493a.491.491,0,0,0,.374.479,44.718,44.718,0,0,0,18.382,0A.479.479,0,0,0,70.639,34.468Zm-5.407,33.6v-8.63H56.917v8.63Z"
                                                                transform="translate(-35.3 -13.85)"></path>
                                                            <path id="Path_7056" data-name="Path 7056"
                                                                d="M201.58,294a1.168,1.168,0,0,1,0,2.336H177.768a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-160.098 -261.283)"></path>
                                                            <path id="Path_7057" data-name="Path 7057"
                                                                d="M189.346,245.9a1.168,1.168,0,1,1,0,2.336H177.668a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-160.01 -218.8)"></path>
                                                            <path id="Path_7058" data-name="Path 7058"
                                                                d="M115,245.9a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-102.601 -218.8)"></path>
                                                            <path id="Path_7059" data-name="Path 7059"
                                                                d="M115,294a1.168,1.168,0,0,1,0,2.336h-2.336a1.168,1.168,0,0,1,0-2.336Z"
                                                                transform="translate(-102.601 -261.283)"></path>
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="counter">2</span>
                                                        <p>Active Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-6 col-md-4">
                                            <div class="counter-wrapper text-center mb-30">
                                                <div class="counter-icon">
                                                    <div class="counter-icon-wrap">
                                                        <svg width="64px" height="64px" viewBox="0 0 48 48"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                                stroke-linejoin="round"></g>
                                                            <g id="SVGRepo_iconCarrier">
                                                                <rect width="48" height="48" fill="white"
                                                                    fill-opacity="0.01"></rect>
                                                                <path d="M14 24L15.25 25.25M44 14L24 34L22.75 32.75"
                                                                    stroke="#0a4426" stroke-width="4"
                                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                                                <path d="M4 24L14 34L34 14" stroke="#0a4426"
                                                                    stroke-width="4" stroke-linecap="round"
                                                                    stroke-linejoin="round"></path>
                                                            </g>
                                                        </svg>
                                                    </div>
                                                    <div class="count-number">
                                                        <span class="counter">0</span>
                                                        <p>Completed Courses</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h4 class="mb-25">In Progress Courses</h4>
                                            <div class="inprogress-course mb-30">
                                                <div class="inprogress-course-img">
                                                    <a href="#"><img
                                                            src="{{ asset('front_assets/images/pages/student-profile/quran-img.jpg') }}"
                                                            alt="" /></a>
                                                </div>
                                                <div class="inprogress-course-text">
                                                    <div class="inprogress-course-rating">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <span>5.00</span>
                                                    </div>
                                                    <h4 class="inprogress-course-title">
                                                        <a href="course.html">holy quran</a>
                                                    </h4>
                                                    <div class="inprogress-course-lesson mb-15">
                                                        <span>Completed Lessons :</span>
                                                        <h6>
                                                            <span>07</span> of <span>10</span> lessons
                                                        </h6>
                                                    </div>
                                                    <div class="rating-row mb-10">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar1 wow fadeInLeft"
                                                                style="
                                  width: 70%;
                                  visibility: visible;
                                  animation-name: fadeInLeft;
                                ">
                                                            </div>
                                                        </div>
                                                        <div class="progress-tittle">
                                                            <h6><span>70%</span> Complete</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="inprogress-course mb-30">
                                                <div class="inprogress-course-img">
                                                    <a href="course.html"><img
                                                            src="{{ asset('front_assets/images/pages/student-profile/arabic-lang-bg-img.jpg') }}"
                                                            alt="" /></a>
                                                </div>
                                                <div class="inprogress-course-text">
                                                    <div class="inprogress-course-rating">
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <a href="#"><i class="fas fa-star"></i></a>
                                                        <span>5.00</span>
                                                    </div>
                                                    <h4 class="inprogress-course-title">
                                                        <a href="course.html">arabic language</a>
                                                    </h4>
                                                    <div class="inprogress-course-lesson mb-15">
                                                        <span>Completed Lessons :</span>
                                                        <h6>
                                                            <span>08</span> of <span>10</span> lessons
                                                        </h6>
                                                    </div>
                                                    <div class="rating-row mb-10">
                                                        <div class="progress">
                                                            <div class="progress-bar progress-bar1 wow fadeInLeft"
                                                                style="
                                  width: 80%;
                                  visibility: visible;
                                  animation-name: fadeInLeft;
                                ">
                                                            </div>
                                                        </div>
                                                        <div class="progress-tittle">
                                                            <h6><span>80%</span> Complete</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- My Profile -->
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
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
                            <!-- Enrolled Courses -->
                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
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
                            <!-- Reviews -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
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
                            <!-- Order History -->
                            <div class="tab-pane fade" id="history" role="tabpanel" aria-labelledby="history-tab">
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
                            <!-- Setting Tab -->
                            <div class="tab-pane fade" id="setting" role="tabpanel" aria-labelledby="setting-tab">
                                <h4 class="mb-25">Settings</h4>
                                <div class="student-profile-enroll">
                                    <ul class="nav mb-30" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link active" id="profileA-tab" data-bs-toggle="tab"
                                                data-bs-target="#profileA" type="button" role="tab"
                                                aria-controls="profileA" aria-selected="false">
                                                Profile
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="password-tab" data-bs-toggle="tab"
                                                data-bs-target="#password" type="button" role="tab"
                                                aria-controls="password" aria-selected="false">
                                                Password
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-link" id="completedA-tab" data-bs-toggle="tab"
                                                data-bs-target="#completedA" type="button" role="tab"
                                                aria-controls="completedA" aria-selected="false">
                                                Social
                                            </button>
                                        </li>
                                    </ul>
                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active" id="profileA" role="tabpanel"
                                            aria-labelledby="profileA-tab">
                                            <div class="student-profile-settings">
                                                <div class="student-profile-setting-img mb-40">
                                                    <div class="student-profile-setting-cover-img"
                                                        data-background="{{ asset('front_assets/images/sections/why-us-sec/pattern-bg.jpg') }}"
                                                        style="
                              background-image: url('{{ asset('front_assets/images/sections/why-us-sec/pattern-bg.jpg') }}');
                            ">
                                                    </div>
                                                    <div class="student-profile-setting-author-img">
                                                        <img src="{{ asset('front_assets/images/pages/student-profile/course-student.png') }}"
                                                            alt="" />
                                                    </div>
                                                </div>
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="FirstName">First Name</label>
                                                                <input id="FirstName" type="text"
                                                                    placeholder="First Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="LastName">Last Name</label>
                                                                <input id="LastName" type="text"
                                                                    placeholder="Last Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="User">User Name</label>
                                                                <input id="User" type="text"
                                                                    placeholder="User Name" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="Email">Email</label>
                                                                <input id="Email" type="email"
                                                                    placeholder="Email" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="Phone">Phone </label>
                                                                <input id="Phone" type="text"
                                                                    placeholder="Phone" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="Occupation">Occupation
                                                                </label>
                                                                <input id="Occupation" type="text"
                                                                    placeholder="Occupation " />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="contact-from-input mb-20">
                                                                <label htmlfor="Bio">Biography </label>
                                                                <textarea id="Bio" placeholder="Biography"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="cont-btn mb-20 mt-10">
                                                                <button type="button" class="cont-btn">
                                                                    Update Profile
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="password" role="tabpanel"
                                            aria-labelledby="password-tab">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlfor="Current">Current Password</label>
                                                            <input id="Current" type="password"
                                                                placeholder="Type password" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlfor="New">New Password</label>
                                                            <input id="New" type="password"
                                                                placeholder="Type password" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="contact-from-input mb-20">
                                                            <label htmlfor="Retype">Re-type New Password</label>
                                                            <input id="Retype" type="password"
                                                                placeholder="Type password" />
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="cont-btn mb-20 mt-10">
                                                            <button type="button" class="cont-btn">
                                                                Update Profile
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane fade" id="completedA" role="tabpanel"
                                            aria-labelledby="completedA-tab">
                                            <div class="student-social-profile-link">
                                                <span class="mb-20">Social Profile Link</span>
                                                <form action="#">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <input type="text"
                                                                    placeholder="Write Your Facebook URL" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <input type="text"
                                                                    placeholder="Write Your Twitter URL" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <input type="text"
                                                                    placeholder="Write Your Instagram URL" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="contact-from-input mb-20">
                                                                <input type="text"
                                                                    placeholder="Write Your Linkedin URL" />
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="cont-btn mb-20 mt-10">
                                                                <button type="button" class="cont-btn">
                                                                    Update Profile
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
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
