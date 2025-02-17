@extends('front.layouts.main')

@section('title', 'Our-Courses | Quraan')

@section('header_class', 'our-courses-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/our-courses.css') }}">
@endsection

@section('content')
    <section class="our-courses sec sec-bg-color">
        <div class="container">
            <div class="sec-title centerd">
                <h2>Our Courses</h2>
            </div>
            <div class="row clearfix">
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="course-title">
                                <h3 class="title-course"><a href="http://course-detail.html">course title</a></h3>
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">30 minutes to lecture</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>

                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="{{ route('course_details') }}" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="course-title">
                                <h3 class="title-course"><a href="http://course-detail.html">course title</a></h3>
                            </div>
                            <div class="card-body">
                                <bdi class="price">500.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">6 classes</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">1:30 for a lecture</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for adults</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">4 students</p>

                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="{{ route('course_details') }}" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="course-title">
                                <h3 class="title-course"><a href="http://course-detail.html">course title</a></h3>
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>

                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="{{ route('course_details') }}" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="course-block">
                        <div class="card course-card">
                            <div class="card-img">
                                <img src="{{ asset('front_assets/images/id/logo.jpg') }}" class="card-img-top" alt="...">
                            </div>
                            <div class="course-title">
                                <h3 class="title-course"><a href="http://course-detail.html">course title</a></h3>
                            </div>
                            <div class="card-body">
                                <bdi class="price">200.00 LE</bdi>
                                <ul class="card-items">
                                    <li class="card-item">
                                        <p class="li-title">4 classes</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">Half an hour to lecture</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">for kids</p>

                                    </li>
                                    <li class="card-item">
                                        <p class="li-title">one student</p>

                                    </li>
                                </ul>
                            </div>
                            <div class="card-btn">
                                <a href="{{ route('course_details') }}" class="card-link">join this lecture</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row clearfix">
                <div class="col">
                    <div class="show-all-lectures">
                        <a href="{{ route('our_lectures') }}" class="button">show all lectures</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
