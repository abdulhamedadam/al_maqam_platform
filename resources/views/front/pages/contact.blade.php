@extends('front.layouts.main')

@section('title', 'Contact Us | Quraan')

@section('header_class', 'contact-us-page')

@section('body_class', 'contact-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/contact.css') }}">
@endsection

@section('content')

    <section class="page-title centerd"
        style="background-image: url('{{ asset('front_assets/images/pages/contact/islamic-contact-page-title.jpg') }}');">
        <div class="container">
            <div class="content-box clearfix">
                <h1>Contact Us</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Start Contact Section -->

    <section class="contact-section page">
        <div class="container">
            <div class="inner-container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 col-sm-12 inner-column">
                        <div class="inner-box">
                            <div class="sec-title light left">
                                <h5>Contact Us</h5>
                                <h2>We are honored to contact you</h2>
                            </div>
                            <!-- ///////////////////////////////////////////////////////// -->
                            <form action="mail.php" method="post" class="submit-form">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Full Name" required>
                                    <label for="name"></label>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Email address" required>
                                    <label for="email"></label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Enter Valid Phone Number" required>
                                    <label for="phone"></label>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Enter Subject" required>
                                    <label for="subject"></label>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" placeholder="Please Write Your Message"></textarea>
                                    <label for="message"></label>
                                </div>
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn style-one">send message</button>
                                </div>
                            </form>
                            <!-- ///////////////////////////////////////////////////////////// -->
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-12 col-sm-12 info-column">
                        <div class="info-inner">
                            <figure class="image-box"><img src="{{ asset('front_assets/images/pages/contact/cantact-page-bg.jpg') }}"
                                    alt="contact sec info-1">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
