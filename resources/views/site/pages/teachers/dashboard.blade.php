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

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
