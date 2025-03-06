@extends('site.layouts.main')

@section('title', 'Our Teachers | Quraan')

@section('header_class', 'our-teachers-page')

@section('body_class', 'teachers-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/our-teachers.css') }}">
@endsection

@section('content')

    <section class="page-title centerd" style="background-image: url('{{ asset('front_assets/images/pages/our-lectures/page-title-bg.jpg') }}');">
        <div class="container">
            <div class="content-box clearfix">
                <h1>our teachers</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>our teachers</li>
                </ul>
            </div>
        </div>
    </section>

    <section class="our-teachers page sec-bg-color">
        <!-- Start Our Teacher Section =============-->

        <div class="container">
            <div class="sec-title centerd">
                <h2>Our Teachers</h2>
            </div>
            <div class="row clearfix">
                @foreach ($teachers as $teacher)
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 h-100">
                        <div class="teacher-card">
                            <div class="card card-teacher">
                                <a href="teacher.html" class="card-header">
                                    <img src="{{ asset($teacher->gender === 'm' ? 'front_assets/images/sections/teachers/man-avatar.svg' : 'front_assets/images/sections/teachers/woman-avatar.svg') }}" alt="" class="card-img">
                                </a>
                                <div class="card-body">
                                    <a href="teacher.html" class="teacher-name">{{$teacher->name}}</a>
                                    <h5 class="country">{{$teacher->country}}</h5>
                                    <section class="specialty">
                                        <span class="specialty-title">languages:</span>
                                        <span class="teacher-specialty tags lang">arabic</span>
                                    </section>
                                    <section class="specialty">
                                        <span class="specialty-title">teachs:</span>
                                        @foreach (json_decode($teacher->teacher->teaching_subjects, true) ?? [] as $subject)
                                            <a class="teacher-specialty tags">{{ str_replace('_', ' ', $subject) }}</a>
                                        @endforeach
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($loop->iteration % 4 === 0)
                        </div><div class="row clearfix">
                    @endif

                @endforeach
            </div>
        </div>

        <!-- End Our Teacher Section =============-->
    </section>
@endsection
