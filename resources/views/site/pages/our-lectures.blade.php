@extends('site.layouts.main')

@section('title', 'Our Lectures | Quraan')

@section('header_class', 'our-lectures-page')

@section('body_class', 'lectures-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/our-lectures.css') }}">
@endsection

@section('content')

    <section class="page-title centerd" style="
            background-image: url('{{ asset('front_assets/images/pages/our-lectures/page-title-bg.jpg') }}');
            ">
        <div class="container">
            <div class="content-box clearfix">
                <h1>our lectures</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>our lectures</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="our-courses page sec-bg-color">
        <div class="container">
            <div class="sec-title centerd">
                <h2>Our lectures</h2>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-2"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">30 minutes to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-3"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-2" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-2" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-4"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-3" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-3" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-5"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-4" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-4" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">500.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">6 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-6"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-5" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-5" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">1:30 for a lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-7"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-6" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-6" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for adults</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-8"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-7" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-7" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">4 students</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-9"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-8" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-8" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-10"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-9" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-9" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-11"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-10" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-10" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-12"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-11" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-11" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-13"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-12" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-12" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-14"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-13" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-13" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-15"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-14" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-14" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-16"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-15" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-15" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-17"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-16" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-16" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-2"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">30 minutes to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-3"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-2" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-2" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-4"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-3" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-3" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-5"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-4" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-4" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">500.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">6 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-6"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-5" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-5" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">1:30 for a lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-7"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-6" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-6" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for adults</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-8"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-7" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-7" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">4 students</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-9"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-8" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-8" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-10"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-9" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-9" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-11"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-10" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-10" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-12"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-11" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-11" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-13"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-12" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-12" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-14"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-13" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-13" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-15"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-14" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-14" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-16"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-15" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-15" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-17"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-16" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-16" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-2"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">30 minutes to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-3"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-2" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-2" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-4"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-3" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-3" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-5"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-4" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-4" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">500.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">6 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-6"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-5" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-5" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">1:30 for a lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-7"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-6" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-6" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for adults</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-8"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-7" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-7" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">4 students</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-9"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-8" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-8" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-10"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-9" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-9" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-11"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-10" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-10" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-12"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-11" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-11" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-13"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-12" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-12" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-14"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-13" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-13" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-15"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-14" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-14" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-16"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-15" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-15" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-17"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-16" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-16" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-2"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">30 minutes to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-3"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-2" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-2" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-4"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-3" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-3" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-5"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-4" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-4" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">500.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">6 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-6"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-5" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-5" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">1:30 for a lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-7"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-6" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-6" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for adults</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-8"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-7" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-7" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">4 students</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-9"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-8" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-8" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-10"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-9" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-9" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-11"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-10" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-10" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-12"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-11" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-11" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-13"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-12" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-12" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="..." />
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-14"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-13" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-13" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-15"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-14" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-14" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-16"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-15" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-15" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>
                                        <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-17"
                                            data-name="Line Color" xmlns="http://www.w3.org/2000/svg"
                                            class="icon line-color">
                                            <g id="SVGRepo_bgCarrier-16" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier-16" stroke-linecap="round"
                                                stroke-linejoin="round"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <polyline id="secondary" points="21 5 12 14 8 10"
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
                                        </svg>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="/course-details.html" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="row clearfix">
        <div class="col">
          <div class="show-all-lectures">
            <a href="/our-lectures.html" class="button">show all lectures</a>
          </div>
        </div>
      </div> -->
        </div>
    </section>
@endsection
