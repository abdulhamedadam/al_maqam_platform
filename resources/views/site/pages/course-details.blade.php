@extends('site.layouts.main')

@section('title', 'Course Details | Quraan')

@section('header_class', 'course-details-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/course-details.css') }}">
@endsection

@section('content')

    <main>
        <section class="page-title centerd"
            style="
          background-image: url('{{ asset('front_assets/images/pages/contact/islamic-contact-page-title.jpg') }});
        ">
            <div class="container">
                <div class="content-box clearfix">
                    <h1>{{ trans('site.CourseDetails') }}</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">{{ trans('site.Home') }}</a></li>
                        <li>{{ trans('site.CourseDetails') }}</li>
                    </ul>
                </div>
            </div>
        </section>
        <!-- hero-area-end -->
        <!-- course-details-area-start -->
        <section class="course-detalis-area pb-90">
            <div class="container">
                <div class="row">
                    <div class="col-xxl-8 col-xl-8">
                        <div class="course-detalis-wrapper mb-30">
                            <div class="course-heading mb-20">
                                <h2>{{ $course->name }}</h2>
                                <div class="course-star">
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <ul>
                                        <li><i class="fal fas fa-star"></i></li>
                                    </ul>
                                    <span>(254 reviews)</span>
                                </div>
                            </div>
                            {{-- <div class="course-detelis-meta">
                                <div class="course-meta-wrapper border-line-meta">
                                    <div class="course-meta-img">
                                        <a href="teacher.html"><img
                                                src="{{ asset('front_assets/images/sections/teachers/man-avatar.svg') }}"
                                                alt="course-meta" /></a>
                                    </div>
                                    <div class="course-meta-text">
                                        <span>{{ trans('site.the_instructor') }}</span>
                                        <h6>
                                            <a href="teacher.html">Ahmed Mahmoud</a>
                                        </h6>
                                    </div>
                                </div>
                                <div class="course-Enroll border-line-meta">
                                    <p>Total Enrolled</p>
                                    <span>5,420</span>
                                </div>
                                <div class="course-update border-line-meta">
                                    <p>Last Update</p>
                                    <span>01 January 2022 </span>
                                </div>
                                <div class="course-category">
                                    <p>{{ trans('site.category') }}</p>
                                    <span><a href="course.html">{{ optional($course->section)->name }}</a></span>
                                </div>
                            </div> --}}
                            <div class="course-description pt-45 pb-30">
                                <div class="course-Description">
                                    <h4>{{ trans('site.description') }}</h4>
                                </div>
                                <p>
                                    {{ strip_tags($course->description) }}

                                </p>
                            </div>
                            <div class="course-instructors">
                                <form id="scheduleForm" method="POST">
                                    @csrf
                                    <input type="hidden" name="course_id" id="course_id"
                                                value="{{ $course->id }}">
                                    <input type="hidden" name="money_id" id="money_id" value="{{ $money->id }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="day"
                                                    class="form-label fw-bold text-dark">{{ trans('teachers.day') }}</label>
                                                <select name="day" id="day"
                                                    class="form-select border-dark fw-bold" required>
                                                    <option value="Saturday"
                                                        {{ old('day') == 'Saturday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.saturday') }}</option>
                                                    <option value="Sunday" {{ old('day') == 'Sunday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.sunday') }}</option>
                                                    <option value="Monday" {{ old('day') == 'Monday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.monday') }}</option>
                                                    <option value="Tuesday"
                                                        {{ old('day') == 'Tuesday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.tuesday') }}</option>
                                                    <option value="Wednesday"
                                                        {{ old('day') == 'Wednesday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.wednesday') }}</option>
                                                    <option value="Thursday"
                                                        {{ old('day') == 'Thursday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.thursday') }}</option>
                                                    <option value="Friday" {{ old('day') == 'Friday' ? 'selected' : '' }}>
                                                        {{ trans('teachers.friday') }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="start_time"
                                                    class="form-label fw-bold text-dark">{{ trans('teachers.start_time') }}</label>
                                                <input name="start_time" id="start_time" type="time"
                                                    class="form-control border border-dark fw-bold"
                                                    value="{{ old('start_time') }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="end_time"
                                                    class="form-label fw-bold text-dark">{{ trans('teachers.end_time') }}</label>
                                                <input name="end_time" id="end_time" type="time"
                                                    class="form-control border border-dark fw-bold"
                                                    value="{{ old('end_time') }}" required />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button type="button" id="searchTeachers"
                                                class="btn btn-primary">{{ trans('teachers.search') }}</button>
                                        </div>
                                    </div>
                                </form>

                                <div id="teacherSelection" class="mt-4" style="display: none;">
                                    <h5 class="fw-bold mb-3">{{ trans('teachers.choose_teacher') }}</h5>
                                    <div id="teachersContainer" class="mt-4"></div>
                                </div>
                                {{-- <div class="mt-4 mb-4">
                                    <label for="teacher"
                                        class="form-label fw-bold text-dark">{{ trans('teachers.select_teacher') }}</label>
                                    <select id="teacher" name="teacher_id" class="form-select border-dark fw-bold">
                                        <option value="" disabled selected>{{ trans('teachers.choose_teacher') }}
                                        </option>
                                    </select>
                                </div> --}}
                                {{-- <div class="intructors-content">
                                    <p>
                                        Professionally, I come from the Data Science consulting
                                        space with experience in finance, retail, transport and
                                        other industries. I was trained by the best analytics
                                        mentors at Deloitte Australia and since starting on Udemy
                                        I have passed on my knowledge to spread around the world
                                    </p>
                                </div> --}}
                            </div>
                            <div class="student-feedback pt-45">
                                <h3>Student Feedback</h3>
                                <div class="row">
                                    <div class="col-xl-3">
                                        <div class="reating-point mb-30">
                                            <div class="rating-point-wrapper text-center">
                                                <h2>4.7</h2>
                                                <div class="rating-star">
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <span>5785 Rating</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-9">
                                        <div class="student-reating-bar">
                                            <div class="reating-bar-wrapper">
                                                <div class="rating-row mb-10">
                                                    <div class="rating-star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                                            style="width: 98%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100" data-wow-duration="1s"
                                                            data-wow-delay="0.5s"></div>
                                                    </div>
                                                    <div class="progress-tittle">
                                                        <span>98%</span>
                                                    </div>
                                                </div>
                                                <div class="rating-row mb-10">
                                                    <div class="rating-star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                                            style="width: 78%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100" data-wow-duration="1s"
                                                            data-wow-delay="0.5s"></div>
                                                    </div>
                                                    <div class="progress-tittle">
                                                        <span>78%</span>
                                                    </div>
                                                </div>
                                                <div class="rating-row mb-10">
                                                    <div class="rating-star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                                            style="width: 55%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100" data-wow-duration="1s"
                                                            data-wow-delay="0.5s"></div>
                                                    </div>
                                                    <div class="progress-tittle">
                                                        <span>55%</span>
                                                    </div>
                                                </div>
                                                <div class="rating-row mb-10">
                                                    <div class="rating-star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                                            style="width: 60%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100" data-wow-duration="1s"
                                                            data-wow-delay="0.5s"></div>
                                                    </div>
                                                    <div class="progress-tittle">
                                                        <span>60%</span>
                                                    </div>
                                                </div>
                                                <div class="rating-row mb-10">
                                                    <div class="rating-star">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                        <i class="fal fas fa-star"></i>
                                                    </div>
                                                    <div class="progress">
                                                        <div class="progress-bar wow fadeInLeft" role="progressbar"
                                                            style="width: 10%" aria-valuenow="25" aria-valuemin="0"
                                                            aria-valuemax="100" data-wow-duration="1s"
                                                            data-wow-delay="0.5s"></div>
                                                    </div>
                                                    <div class="progress-tittle">
                                                        <span>10%</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="course-detalis-reviews pt-15">
                                <div class="course-detalis-reviews-tittle">
                                    <h3>Reviews</h3>
                                </div>
                                <div class="course-review-item mb-30">
                                    <div class="course-reviews-img">
                                        <a href="#"><img src="src/images/sections/teachers/woman-avatar.svg"
                                                class="rounded-circle" width="100" height="100px"
                                                alt="image not found" /></a>
                                    </div>
                                    <div class="course-review-list">
                                        <h5><a href="#" class="name">amina</a></h5>
                                        <div class="course-start-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>55 min ago</span>
                                        </div>
                                        <p>
                                            Very clean and organized with easy to follow tutorials,
                                            Exercises, and solutions. This course does start from
                                            the beginning with very little knowledge and gives a
                                            great overview of common tools used for data science and
                                            progresses into more complex concepts and ideas.
                                        </p>
                                    </div>
                                </div>
                                <div class="course-review-item mb-30">
                                    <div class="course-reviews-img">
                                        <a href="#"><img src="src/images/sections/teachers/woman-avatar.svg"
                                                class="rounded-circle" width="100" height="100px"
                                                alt="image not found" /></a>
                                    </div>
                                    <div class="course-review-list">
                                        <h5><a href="#" class="name">khdija</a></h5>
                                        <div class="course-start-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>45 min ago</span>
                                        </div>
                                        <p>
                                            The course is good at explaining very basic intuition of
                                            the concepts. It will get you scratching the surface so
                                            to say. where this course is unique is the
                                            implementation methods are so well defined Thank you to
                                            the team !.
                                        </p>
                                    </div>
                                </div>
                                <div class="course-review-item mb-30">
                                    <div class="course-reviews-img">
                                        <a href="#"><img src="src/images/pages/course-detailes/review-img.jpg"
                                                alt="image not found" class="rounded-circle" width="100"
                                                height="100px" /></a>
                                    </div>
                                    <div class="course-review-list">
                                        <h5><a href="#" class="name">abd alrahman ahmed</a></h5>
                                        <div class="course-start-icon">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <span>30 min ago</span>
                                        </div>
                                        <p>
                                            This course is amazing..! I started this course as a
                                            beginner and learnt a lot. Instructors are great. Query
                                            handling can be improved.Overall very happy with the
                                            course.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12">
                                <div class="course-review-btn">
                                    <a id="show-review-box" class="edu-btn" href="javascript:void(0)">Write a Review</a>
                                    <div id="review-box" class="review-comment mt-45">
                                        <div class="comment-title mb-20">
                                            <p>
                                                Your email address will not be published. Required
                                                fields are marked *
                                            </p>
                                        </div>
                                        <div class="comment-rating mb-20">
                                            <span>Overall ratings</span>

                                            <!-- <ul>
                                                                                                  <li>
                                                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                    <a href="#"><i class="fas fa-star"></i></a>
                                                                                                  </li>
                                                                                                  <li>
                                                                                                    <a href="#"><i class="fal fas fa-star"></i></a>
                                                                                                  </li>
                                                                                                </ul> -->

                                            <div class="rate">
                                                <input type="radio" id="star5" name="rate" value="5" />
                                                <label for="star5" title="5 stars">5 stars</label>
                                                <input type="radio" id="star4" name="rate" value="4" />
                                                <label for="star4" title="4 stars">4 stars</label>
                                                <input type="radio" id="star3" name="rate" value="3" />
                                                <label for="star3" title="3 stars">3 stars</label>
                                                <input type="radio" id="star2" name="rate" value="2" />
                                                <label for="star2" title="2 stars">2 stars</label>
                                                <input type="radio" id="star1" name="rate" value="1" />
                                                <label for="star1" title="1 star">1 star</label>
                                            </div>

                                        </div>
                                        <div class="comment-input-box mb-15">
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-xxl-12">
                                                        <textarea placeholder="Your review" class="comment-input comment-textarea mb-20"></textarea>
                                                    </div>
                                                    <div class="col-xxl-6">
                                                        <div class="comment-input mb-20">
                                                            <input type="text" placeholder="Your Name" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6">
                                                        <div class="comment-input mb-20">
                                                            <input type="email" placeholder="Your Email" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-12">
                                                        <div class="comment-submit">
                                                            <button type="submit" class="edu-btn">
                                                                Submit
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
                    <div class="col-xxl-4 col-xl-4 col-lg-8 col-md-8">
                        <div class="course-video-widget">
                            <div class="course-widget-wrapper mb-30">
                                <div class="course-video-thumb w-img">
                                    <img class="course-img"
                                        src="{{ $course->image ? asset('images/' . $course->image) : asset('front_assets/images/pages/course-detailes/course-img.jpg') }}"
                                        alt="image not found" />
                                </div>
                                <div class="course-video-price">
                                    <span>{{ trans('site.LE') }} {{ $money->total_price }}</span>
                                </div>
                                <div class="course-video-body">
                                    <ul>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-filter"></i>
                                                <span>{{ trans('site.Level') }} </span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>>
                                                    @if ($course->min_age && $course->max_age)
                                                        {{ trans('site.for_kids') }} ({{ $course->min_age }} -
                                                        {{ $course->max_age }} {{ trans('site.years') }})
                                                    @else
                                                        {{ trans('site.suitable_for_all_ages') }}
                                                    @endif
                                                </span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-computer"></i>
                                                <span>{{ trans('site.Lectures') }}</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>{{ $money->num_of_lectures }} {{ trans('site.classes') }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-clock"></i>
                                                <span>{{ trans('site.Duration') }}</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>{{ $money->num_of_minuts }}m / {{ trans('site.Lecture') }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-menu-2"></i>
                                                <span>{{ trans('site.Category') }}</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>{{ optional($course->section)->name }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-global"></i>
                                                <span>{{ trans('site.Laguage') }}</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>{{ trans('site.arabic') }}</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="icofont-calendar"></i>
                                                <span>schedule</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>2.00 pm to 4.00 pm</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <!-- ======================================== -->

                                <div class="coupon-accordion">
                                    <!-- ACCORDION START -->
                                    <h3>
                                        Have a coupon? <br />
                                        <span id="showcoupon">Click here to enter your code</span>
                                    </h3>
                                    <div id="checkout_coupon" class="coupon-checkout-content">
                                        <div class="coupon-info">
                                            <form action="#">
                                                <p class="checkout-coupon">
                                                    <input type="text" placeholder="Coupon Code" />
                                                    <button class="edu-btn mb-20" type="submit">
                                                        Apply Coupon
                                                    </button>
                                                </p>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- ACCORDION END -->
                                </div>

                                <!-- ========================================= -->

                                <div class="your-order mb-30">
                                    <h3>total</h3>
                                    <div class="your-order-table table-responsive">
                                        <table>
                                            <tbody>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <strong class="product-quantity">
                                                            Subtotal</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">L£ 300.00</span>
                                                    </td>
                                                </tr>
                                                <tr class="cart_item">
                                                    <td class="product-name">
                                                        <strong class="product-discount">
                                                            discount value</strong>
                                                    </td>
                                                    <td class="product-total">
                                                        <span class="amount">L£ 0.00</span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal total</th>
                                                    <td><span class="amount">L£ 300.00</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Order Total</th>
                                                    <td>
                                                        <strong><span class="amount">L£ 300.00</span></strong>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                    <div class="payment-method">
                                        <h2 class="payment-title mt-30 mb-30">
                                            choose payment method
                                        </h2>
                                        <form action="{{ route('user.store_pay_course') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="teacher_id" id="payment_teacher_id"
                                                value="">
                                            <input type="hidden" name="course_id" id="payment_course_id"
                                                value="{{ $course->id }}">
                                            <input type="hidden" name="day" id="payment_day" value="">
                                            <input type="hidden" name="start_time" id="payment_start_time"
                                                value="">
                                            <input type="hidden" name="end_time" id="payment_end_time" value="">
                                            <input type="hidden" name="money_id" value="{{ $money->id }}">
                                            <div class="row clearfix">
                                                <div class="col-6">
                                                    <label>
                                                        <input type="radio" name="payment" value="fawry" />
                                                        <img src="{{ asset('front_assets/images/pages/course-detailes/payment-methods/fawry.png') }}"
                                                            alt="Fawry" class="payment-methods-img" />
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>
                                                        <input type="radio" name="payment" value="Aman" />
                                                        <img src="{{ asset('front_assets/images/pages/course-detailes/payment-methods/aman.png') }}"
                                                            alt="Aman" class="payment-methods-img" />
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>
                                                        <input type="radio" name="payment" value="mastercard-visa" />
                                                        <img src="{{ asset('front_assets/images/pages/course-detailes/payment-methods/mastercard-visapng.png') }}"
                                                            alt="mastercard-visa" class="payment-methods-img" />
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>
                                                        <input type="radio" name="payment" value="mobile_wallet" />
                                                        <img src="{{ asset('front_assets/images/pages/course-detailes/payment-methods/mobile_wallet.png') }}"
                                                            alt="mobile_wallet" class="payment-methods-img" />
                                                    </label>
                                                </div>
                                                <div class="col-6">
                                                    <label>
                                                        <input type="radio" name="payment" value="bank-transfer" />
                                                        <img src="{{ asset('front_assets/images/pages/course-detailes/payment-methods/bank-transfer.png') }}"
                                                            alt="bank-transfer" class="payment-methods-img" />
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="order-button-payment mt-30">
                                                <button type="submit" class="edu-btn"
                                                    style="text-transform: capitalize;">
                                                    {{ trans('courses.pay_now') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <!-- ========================================= -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    {{-- <script>
        var translations = {
            choose_teacher: "{{ trans('teachers.choose_teacher') }}"
        };
        $(document).ready(function() {
            $('#searchTeachers').on('click', function() {
                var day = $('#day').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();

                $.ajax({
                    url: "{{ route('user.available_schedule') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        day: day,
                        start_time: start_time,
                        end_time: end_time
                    },
                    success: function(response) {
                        console.log(response.schedules);
                        $('#teacher').empty().append(
                            '<option value="" disabled selected>Choose teacher</option>');
                        $.each(response.schedules, function(key, schedule) {
                            $('#teacher').append(`
                                    <option value="${schedule.teacher.id}" data-day="${schedule.day}"
                                        data-start_time="${schedule.start_time}" data-end_time="${schedule.end_time}"
                                        class="text-gray-700">
                                        ${schedule.teacher.name} | 🕒 ${schedule.start_time} - ${schedule.end_time}
                                    </option>
                                `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });
        });

        $('#teacher').on('change', function() {
            var selectedOption = $(this).find(":selected");
            $('#payment_teacher_id').val(selectedOption.val());
            $('#payment_day').val(selectedOption.data('day'));
            $('#payment_start_time').val(selectedOption.data('start_time'));
            $('#payment_end_time').val(selectedOption.data('end_time'));
        });
    </script> --}}

    <script>
        var translations = {
            choose_teacher: "{{ trans('teachers.choose_teacher') }}"
        };

        $(document).ready(function() {
            $('#searchTeachers').on('click', function() {
                var day = $('#day').val();
                var start_time = $('#start_time').val();
                var end_time = $('#end_time').val();
                var course_id = $('#course_id').val();
                var money_id = $('#money_id').val();
                var fallbackImage = "{{ asset('front_assets/images/sections/teachers/man-avatar.svg') }}";
                $.ajax({
                    url: "{{ route('user.available_schedule') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        day: day,
                        start_time: start_time,
                        end_time: end_time,
                        course_id: course_id,
                        money_id: money_id
                    },
                    success: function(response) {
                        // console.log(response.schedules);
                        $('#teachersContainer').empty();

                        if (response.schedules.length === 0) {
                            $('#teacherSelection').hide();
                            alert('No teachers available for the selected schedule.');
                        }

                        $.each(response.schedules, function(key, schedule) {
                            let formattedStartTime = formatTime(schedule.start_time);
                            let formattedEndTime = formatTime(schedule.end_time);
                            $('#teacherSelection').show();
                            $('#teachersContainer').append(`
                                <label class="course-detelis-meta teacher-option">
                                    <div class="course-meta-wrapper border-line-meta">
                                        <div class="course-meta-img">
                                            <a href="teacher.html">
                                                <img src="${schedule.teacher.image || fallbackImage}" alt="teacher-avatar" />
                                            </a>
                                        </div>
                                        <div class="course-meta-text">
                                            <span>The Instructor</span>
                                            <h6>
                                                <a href="teacher.html">${schedule.teacher.name}</a>
                                            </h6>
                                        </div>
                                    </div>
                                    <div class="course-Enroll border-line-meta">
                                        <p>Total Enrolled</p>
                                        <span>${schedule.teacher.total_enrolled ?? 0}</span>
                                    </div>
                                    <div class="course-update border-line-meta">
                                        <p>Schedule</p>
                                        <span>${schedule.day} | 🕒 ${formattedStartTime} - ${formattedEndTime}</span>
                                    </div>
                                    <div class="course-update border-line-meta">
                                        <p>Action</p>
                                        <input type="radio" name="teacher_id" value="${schedule.teacher.id}"
                                            data-day="${schedule.day}" data-start_time="${schedule.start_time}"
                                            data-end_time="${schedule.end_time}" class="teacher-radio" style="width: 15px; height: 15px; transform: scale(1.5);" required />
                                    </div>
                                </label>
                            `);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.log(xhr.responseText);
                    }
                });
            });

            $(document).on('change', '.teacher-radio', function() {
                var selectedOption = $(this);
                $('#payment_teacher_id').val(selectedOption.val());
                $('#payment_day').val(selectedOption.data('day'));
                $('#payment_start_time').val(selectedOption.data('start_time'));
                $('#payment_end_time').val(selectedOption.data('end_time'));
            });

            function formatTime(time) {
                if (!time) return '';
                let [hours, minutes] = time.split(':');
                let date = new Date();
                date.setHours(hours);
                date.setMinutes(minutes);
                return date.toLocaleTimeString('en-US', {
                    hour: '2-digit',
                    minute: '2-digit',
                    hour12: true
                });
            }
        });
    </script>
@endsection
