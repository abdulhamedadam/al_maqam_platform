@extends('front.layouts.main')

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
                    <h1>Course Details</h1>
                    <ul class="bread-crumb clearfix">
                        <li><a href="/">Home</a></li>
                        <li>Course Details</li>
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
                                <h2>MySQL Database : Beginner SQL Database Design</h2>
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
                            <div class="course-detelis-meta">
                                <div class="course-meta-wrapper border-line-meta">
                                    <div class="course-meta-img">
                                        <a href="teacher.html"><img src="src/images/sections/teachers/man-avatar.svg"
                                                alt="course-meta" /></a>
                                    </div>
                                    <div class="course-meta-text">
                                        <span>the instructor</span>
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
                                    <p>category</p>
                                    <span><a href="course.html">Quraan Science</a></span>
                                </div>
                            </div>
                            <div class="course-description pt-45 pb-30">
                                <div class="course-Description">
                                    <h4>Description</h4>
                                </div>
                                <p>
                                    This course has been designed by two professional Data
                                    Scientists so that we can share our knowledge and help you
                                    learn complex theory, algorithms, and coding libraries in a
                                    simple way. We will walk you step-by-step into the World of
                                    Machine Learning. With every tutorial, you will develop new
                                    skills and improve your understanding of this challenging
                                    yet lucrative sub-field of Data Science.
                                </p>
                            </div>
                            <div class="course-instructors">
                                <h3>instructors</h3>
                                <div class="instructors-heading">
                                    <div class="instructors-img w-img">
                                        <a href="teacher.html"><img src="src/images/sections/teachers/man-avatar.svg"
                                                alt="image not found" /></a>
                                    </div>
                                    <div class="instructors-body">
                                        <h5>
                                            <a href="teacher.html">Ahmed mahmoud</a>
                                        </h5>
                                        <span>Quraan Science</span>
                                        <div class="intructors-review">
                                            <i class="fas fa-star"></i>
                                            <span>4.7 (54 reviews)</span>
                                        </div>
                                        <div class="instructors-footer">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                <path
                                                    d="M64 0C28.7 0 0 28.7 0 64V352c0 35.3 28.7 64 64 64H240l-10.7 32H160c-17.7 0-32 14.3-32 32s14.3 32 32 32H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H346.7L336 416H512c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H64zM512 64V288H64V64H512z" />
                                            </svg>
                                            <span>3 Coursess</span>
                                            <i class="fas fa-users"></i>
                                            <!-- <i class="far fa-user-friends"></i> -->
                                            <span>100 Students</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="intructors-content">
                                    <p>
                                        Professionally, I come from the Data Science consulting
                                        space with experience in finance, retail, transport and
                                        other industries. I was trained by the best analytics
                                        mentors at Deloitte Australia and since starting on Udemy
                                        I have passed on my knowledge to spread around the world
                                    </p>
                                </div>
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
                                    <img class="course-img" src="{{ asset('front_assets/images/pages/course-detailes/course-img.jpg') }}"
                                        alt="image not found" />
                                </div>
                                <div class="course-video-price">
                                    <span>L£ 300.00</span>
                                </div>
                                <div class="course-video-body">
                                    <ul>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-filter"></i>
                                                <span>Level</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>kids & adults</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-computer"></i>
                                                <span>Lectures</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>8 Lectures</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-clock"></i>
                                                <span>Duration</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>30m / Lecture</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-menu-2"></i>
                                                <span>Category</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>Quraan Science</span>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="course-vide-icon">
                                                <i class="flaticon-global"></i>
                                                <span>Laguage</span>
                                            </div>
                                            <div class="video-corse-info">
                                                <span>arabic</span>
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
                                        <form>
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
                                        </form>
                                        <div class="order-button-payment mt-30">
                                            <button type="submit" class="edu-btn" style="text-transform: capitalize;">
                                                Pay now
                                            </button>
                                        </div>
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
