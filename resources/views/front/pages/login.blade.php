@extends('front.layouts.main')

@section('title', 'Login | Quraan')

@section('header_class', 'join-us-page')

@section('body_class', 'join-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/join-us.css') }}">
@endsection

@section('content')
    {{-- <section class="register-style join-us-page"
        style="background-image: url('{{ asset('front_assets/images/pages/join-login/mecca.jpg') }}')">
        <div class="container">
            <div class="col-xl-8 col-lg-12 col-md-12 inner-column">
                <div class="sec-title left light">
                    <h5>Login</h5>
                    <h2>Login to your account</h2>
                </div>
                <form method="POST" action="{{ route('user.store_login') }}" id="contact-form" class="default-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email address*" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="password" name="password" placeholder="Enter Password" required>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button class="theme-btn style-one" type="submit">
                                Login
                            </button>
                        </div>
                        <div class="reset-password">
                            <div class="container">
                                <!-- <a href="#" data-target="#pwdModal" data-toggle="modal">Forgot my password</a> -->
                            </div>
                            <h2 class="forget-password">Forget Password ? <a
                                    href="{{ route('user.reset_password') }}">&nbsp;
                                    &nbsp;Reset Password</a> </h2>
                            <h2 class="create-account">not have an account ?
                                <a href="{{ route('user.join_us') }}">create your account now</a>
                            </h2>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section> --}}
    <section class="register-style join-us-page"
        style="background-image: url('{{ asset('front_assets/images/pages/join-login/mecca.jpg') }}')">
        <div class="container">
            <div class="col-xl-8 col-lg-12 col-md-12 inner-column">
                <div class="sec-title left light">
                    <h5>Login</h5>
                    <h2>Login to your account</h2>
                </div>
                <form method="POST" action="{{ route('user.store_login') }}" class="default-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="Email address*" value="{{ old('email') }}"
                                required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="password" name="password" placeholder="Enter Password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button class="theme-btn style-one" type="submit">
                                Login
                            </button>
                        </div>
                        <div class="reset-password">
                            <div class="container">
                                <!-- <a href="#" data-target="#pwdModal" data-toggle="modal">Forgot my password</a> -->
                            </div>
                            <h2 class="forget-password">Forget Password ? <a href="{{ route('user.reset_password') }}">
                                    Reset Password</a> </h2>
                            <h2 class="create-account">not have an account ?
                                <a href="{{ route('user.join_us') }}">create your account now</a>
                            </h2>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
