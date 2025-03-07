@extends('site.layouts.main')

@section('title', 'Quraan | Quraan')

@section('content')
    <!-- Start Slider Section =============-->

    <section class="slider-section">
        <div class="main-carousel owl-theme owl-carousel owl-dots-none">

            @if($sliders->count() > 0)
                @foreach($sliders as $index => $slider)
                    <div class="slide-item">
                        <div class="overlay"></div>
                        <div class="image-layer"
                             style="background-image: url('{{ $slider->image ? asset('images/' . $slider->image) : asset('front_assets/images/sections/slider/s4.jpg') }}')"></div>
                        <div class="container">
                            <div class="content-box {{ $index % 2 == 0 ? '' : 'centerd' }}">
                                <h5>{{$slider->title}}</h5>
                                <h1>{!! str_replace(['<p>', '</p>'], ['', '<br>'], $slider->description) !!}</h1>

                                <div class="btn-box">
                                    <a href="contact.html" class="theme-btn">{{$slider->button_text}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
            <!-- Slide 01 -->
                <div class="slide-item">
                    <div class="overlay"></div>
                    <div class="image-layer" style="background-image: url(src/images/sections/slider/s4.jpg)"></div>
                    <div class="container">
                        <div class="content-box">
                            <h5>get on the right way</h5>
                            <h1>Financial Assistance<br>With True Purpose</h1>
                            <div class="btn-box">
                                <a href="contact.html" class="theme-btn">How Can We Help</a>
                                <a href="contact.html" class="user-btn"><i class="far fa-user"></i><span>Find a Consultant</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 02 -->
                <div class="slide-item">
                    <div class="overlay"></div>
                    <div class="image-layer" style="background-image: url(src/images/sections/slider/s5.jpg)"></div>
                    <div class="container">
                        <div class="content-box centerd">
                            <ul class="list-item">
                                <li>.&nbsp;<a>Experienced</a>&nbsp;.&nbsp;</li>
                                <li><a>Specialized</a>&nbsp;.&nbsp;</li>
                                <li><a>Professional</a>&nbsp;.&nbsp;</li>
                            </ul>
                            <h1>International Network To <br>Provide Assistance</h1>
                            <div class="btn-box">
                                <a href="contact.html" class="theme-btn m-0">How Can We Help</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Slide 03 -->
                <div class="slide-item">
                    <div class="overlay"></div>
                    <div class="image-layer" style="background-image: url(src/images/sections/slider/s6.jpg)"></div>
                    <div class="container">
                        <div class="content-box">
                            <h5>get on the right way</h5>
                            <h1>Boosting Relations & <br>Loyalty, Anytime</h1>
                            <div class="btn-box">
                                <a href="contact.html" class="theme-btn mr-10">How Can We Help</a>
                                <a href="contact.html" class="slide-item-btn puls">Find a Consultant</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </section>

    <!-- End Slider Section =============-->

    <!-- ************************************* -->

    <!-- Start Why Us Section =============-->

    <section class="why-us" style="
        background-image: url(/src/images/sections/why-us-sec/pattern-bg.jpg);
      ">
        <div class="container">
            <div class="sec-title">
                <h2>{{trans('site.why')}} <span>{{trans('site.Almaqam_Almahmoud')}}</span></h2>
            </div>
            <div class="row clearfix">
                @foreach ($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <div class="card-block">
                            <div class="card why-us-card">
                                <svg height="46" viewBox="0 0 46 46" width="46" xmlns="http://www.w3.org/2000/svg">
                                    <g data-name="icon accredited teachers" id="icon_accredited_teachers"
                                       transform="translate(-123 -782)">
                                        <rect data-name="Rectangle 1211" fill="#cf8b40" height="46" id="Rectangle_1211"
                                              opacity="0.35" rx="8" transform="translate(123 782)" width="46"></rect>
                                        <g id="teacher-giving-lecture" transform="translate(77.464 790.685)">
                                            <g data-name="Group 4177" id="Group_4177-1" transform="translate(58.011)">
                                                <g data-name="Group 4176" id="Group_4176">
                                                    <path
                                                        d="M79.056,193.3a18.309,18.309,0,0,0-2-7.241,9.074,9.074,0,0,0-3.541-4.357c-.035-.019-.215-.108-.274-.136l-2.047-.942-.983-.829-1.58,1.571.65,4.687-.742.2-.742-.2.65-4.687-1.58-1.571-.983.829-2.047.942c-.059.028-.239.116-.274.136a9.074,9.074,0,0,0-3.541,4.357,23.2,23.2,0,0,0-2,7.241c0,.041,0,.082,0,.123a2.12,2.12,0,0,0,2.18,2.049,1.733,1.733,0,0,0,.262-.02,5.109,5.109,0,0,0,1.6-.532l6.278,1.732.048.011h.007l.035.007a.777.777,0,0,0,.115.009.735.735,0,0,0,.111-.009.416.416,0,0,0,.045-.008l.049-.011,6.278-1.732a5.107,5.107,0,0,0,1.6.532,1.717,1.717,0,0,0,.262.02,2.12,2.12,0,0,0,2.18-2.049C79.061,193.378,79.056,193.337,79.056,193.3Zm-11.292,1.594-4.094-1.129a1.721,1.721,0,0,0-.876-2.724v-4.765l4.97,1.371v7.248Zm6.513-3.853a1.721,1.721,0,0,0-.876,2.724l-4.094,1.129v-7.248l4.97-1.371v4.765Z"
                                                        data-name="Path 708" fill="#cf8b40"
                                                        transform="translate(-58.011 -168.045)"></path>
                                                    <path
                                                        d="M149,11.747c2.072,0,4.853-2.589,4.9-6.931C153.931,1.8,152.5,0,149,0s-4.93,1.8-4.9,4.816C144.148,9.158,146.575,11.747,149,11.747Zm-.985-5.721c2.534.27,4.743-3.274,4.707-.1-.021,1.9-1.783,4.768-3.722,4.768-2.035,0-3.439-2.384-3.722-4.766C144.972,3.342,149.715,3.931,148.016,6.026Z"
                                                        data-name="Path 709" fill="#cf8b40" id="Path_709"
                                                        transform="translate(-138.476)"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <h3 class="card_title">{{$service->name}}</h3>
                                <p class="card-description">
                                    {!! $service->description !!}
                                </p>
                            </div>
                        </div>
                    </div>
                    @if($loop->iteration % 3 === 0)
            </div>
            <div class="row clearfix">
                @endif
                @endforeach
            </div>
        </div>
    </section>

    <!-- End Why Us Section =============-->

    <!-- ********************************** -->

    <section class="about-quran sec-bg-color">
        <div class="container">
            <div class="row clearfix">
                <div class="col-lg-7 col-md-12 col-sm-12 content-column">
                    <div id="content_block">
                        <div class="content-box">
                            <div class="sec-title right">
                                <h5>{{trans('site.About_almaqam_almahmoud')}}</h5>
                                <h2>{{$about_us->title}}</h2>
                            </div>
                            <div class="text">
                                <p>
                                    {{$about_us->description}}
                                </p>
                            </div>
                            <div class="tabs-box">
                                <div class="tab-btn-box">
                                    <ul class="tab-btns tab-buttons clearfix">
                                        <li class="tab-btn active-btn" data-tab="#tab-1">
                                            {{trans('site.our_mission')}}
                                        </li>
                                        <li class="tab-btn" data-tab="#tab-2">{{trans('site.our_experience')}}</li>
                                        <li class="tab-btn" data-tab="#tab-3">{{trans('site.our_vision')}}</li>
                                    </ul>
                                </div>
                                <div class="tabs-content">
                                    <div class="tab active-tab" id="tab-1">
                                        <div class="content-inner">
                                            <p>
                                                {{$about_us->our_mission}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab" id="tab-2">
                                        <div class="content-inner">
                                            <p>
                                                {{$about_us->our_experience}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="tab" id="tab-3">
                                        <div class="content-inner">
                                            <p>
                                                {{$about_us->our_vision}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 image-column">
                    <div id="image_block">
                        <div class="image-box">
                            <div class="pattern-layer"
                                 style="
                                     background-image: url'{{ $about_us->image ? asset('images/' . $about_us->image) : asset('front_assets/images/sections/about-quran/learn-quran.jpg') }}');
                                     ">
                            </div>
                            <figure class="image">
                                <img
                                    src="{{ $about_us->image ? asset('images/' . $about_us->image) : asset('front_assets/images/sections/about-quran/learn-quran.jpg') }}">
                            </figure>
                            <div class="content-box">
                                <i class="fas fa-quote-left"></i>
                                <h5>
                                    {{$about_us->notes}}

                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Start How To Join Section =============-->

    <section class="how-to-join centerd"
             style="
        background-image: url(/src/images/sections/how-to-join/parallax2.jpg);
      ">
        <div class="container">
            <div class="sec-title-two light">
                <h2>{{trans('site.how_to_join_us')}}</h2>
                <span></span>
            </div>
            <div class="join-steps">
                <ul class="steps-wrap text-center">
                    <li>
                        <div class="step-bx">
                            <i class="fas fa-hand-pointer"></i>
                            <h5>{{trans('site.choose_a_course')}}</h5>
                        </div>
                    </li>
                    <li>
                        <div class="step-bx">
                            <!-- <i class="fas fa-user-plus"></i> -->
                            <i class="fas fa-right-to-bracket"></i>
                            <h5 itemprop="headline">{{trans('site.register')}}</h5>
                        </div>
                    </li>
                    <li>
                        <div class="step-bx">
                            <i class="fa-solid fa-chalkboard-user"></i>
                            <h5 itemprop="headline">{{trans('site.choose_teacher')}}</h5>
                        </div>
                    </li>
                    <li>
                        <div class="step-bx">
                            <i class="fa-regular fa-calendar-days"></i>
                            <h5 itemprop="headline">{{trans('site.scheduling_classes')}}</h5>
                        </div>
                    </li>
                    <li>
                        <div class="step-bx">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <h5 itemprop="headline">{{trans('site.checkout')}}</h5>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- End How To Join Section Section =======-->

    <!-- Start Our Courses Section =============-->

    <section class="our-courses sec sec-bg-color">
        <div class="container">
            <div class="sec-title centerd">
                <h2>{{trans('site.our_lecture')}}</h2>
            </div>
            <div class="row clearfix">
                    @foreach ($courses as $course)
                        @foreach ($course->courseMoneys as $money)

                        <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="course-block">
                            <div class="card course-card">
                                <div class="card-img">
                                    <img src="{{$course->image ? asset('images/' . $course->image) : asset('front_assets/images/id/logo.jpg')}}" class="card-img-top" alt="...">

                                </div>
                                <div class="course-title">
                                    <h3 class="title-course"><a href="http://course-detail.html">{{$course->name}}</a></h3>
                                </div>
                                <div class="card-body">
                                    <bdi class="price">{{ $money->total_price }} {{trans('site.LE')}}</bdi>
                                    <ul class="card-items">
                                        <li class="card-item">
                                            <p class="li-title">{{ $money->num_of_lectures }} {{trans('site.classes')}}</p>
                                            <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-10" data-name="Line Color"
                                                 xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                                <g id="SVGRepo_bgCarrier-9" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier-9" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <polyline id="secondary" points="21 5 12 14 8 10" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></polyline>
                                                    <path id="primary" d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></path>
                                                </g>
                                            </svg>
                                        </li>
                                        <li class="card-item">
                                            <p class="li-title">{{ $money->num_of_minuts }} {{trans('site.min_to_lecture')}}</p>
                                            <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-11" data-name="Line Color"
                                                 xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                                <g id="SVGRepo_bgCarrier-10" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier-10" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <polyline id="secondary" points="21 5 12 14 8 10" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></polyline>
                                                    <path id="primary" d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></path>
                                                </g>
                                            </svg>
                                        </li>
                                        <li class="card-item">
                                            <p class="li-title">@if ($course->min_age && $course->max_age)
                                                    {{trans('site.for_kids')}}   ({{ $course->min_age }} - {{ $course->max_age }} {{trans('site.years')}})
                                                @else
                                                     {{trans('site.suitable_for_all_ages')}}
                                                @endif</p>
                                            <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-12" data-name="Line Color"
                                                 xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                                <g id="SVGRepo_bgCarrier-11" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier-11" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <polyline id="secondary" points="21 5 12 14 8 10" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></polyline>
                                                    <path id="primary" d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></path>
                                                </g>
                                            </svg>
                                        </li>
                                        <li class="card-item">
                                            <p class="li-title">
                                                @if ($money->for_group)
                                                    {{trans('site.group_class')}}   (Max {{ $money->max_in_group }} {{trans('site.students')}})
                                                @else
                                                    {{trans('site.one_student')}}
                                                @endif</p>
                                            <svg fill="#000000" viewBox="0 0 24 24" id="check-mark-circle-13" data-name="Line Color"
                                                 xmlns="http://www.w3.org/2000/svg" class="icon line-color">
                                                <g id="SVGRepo_bgCarrier-12" stroke-width="0"></g>
                                                <g id="SVGRepo_tracerCarrier-12" stroke-linecap="round" stroke-linejoin="round"></g>
                                                <g id="SVGRepo_iconCarrier">
                                                    <polyline id="secondary" points="21 5 12 14 8 10" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></polyline>
                                                    <path id="primary" d="M20.94,11A8.26,8.26,0,0,1,21,12a9,9,0,1,1-9-9,8.83,8.83,0,0,1,4,1" style="
                                  fill: none;
                                  stroke: #2cba35;
                                  stroke-linecap: round;
                                  stroke-linejoin: round;
                                  stroke-width: 2;
                                "></path>
                                                </g>
                                            </svg>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-btn">
                                    <a href="{{route('user.get_course_details',[$course->id,$money->id])}}" class="card-link">{{trans('site.join_this_lecture')}}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach

                    @endforeach
            </div>
            <div class="row clearfix">
                <div class="col">
                    <div class="show-all-lectures">
                        <a href="/our-lectures.html" class="button">{{trans('site.show_all_lectures')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Our Courses Section =============-->

    <!-- ========================================== -->

    <!-- Start Our Teacher Section =============-->

    <section class="our-teachers"
             style="
          background-image: url(/src/images/sections/why-us-sec/pattern-bg.jpg);
        ">
        <div class="container">
            <div class="sec-title centerd">
                <h2>{{trans('site.our_teachers')}}</h2>
            </div>
            <div class="row clearfix">
                @foreach ($teachers as $teacher)
                    <div class="col-12 col-lg-3 col-md-6 col-sm-6 col-xs-12 h-100">
                        <div class="teacher-card">
                            <div class="card card-teacher">
                                <a href="teacher.html" class="card-header">
                                    <img
                                        src="{{ asset($teacher->gender === 'm' ? 'front_assets/images/sections/teachers/man-avatar.svg' : 'front_assets/images/sections/teachers/woman-avatar.svg') }}"
                                        alt=""
                                        class="card-img">
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
                @endforeach
            </div>
            <div class="row clearfix">
                <div class="col">
                    <div class="show-all-teachers">
                        <a href="{{route('user.our_teachers')}}" class="button">{{trans('site.show_all_teacher')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Our Teacher Section =============-->
@endsection
