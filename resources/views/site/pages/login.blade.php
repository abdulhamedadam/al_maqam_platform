@extends('site.layouts.main')

@section('title', trans('login.Login') . ' | ' . trans('login.Quraan'))

@section('header_class', 'join-us-page')

@section('body_class', 'join-page')

@section('css')
    <link rel="stylesheet" href="{{ asset('front_assets/css/inc/join-us.css') }}">
@endsection

@section('content')
    <section class="register-style join-us-page"
        style="background-image: url('{{ asset('front_assets/images/pages/join-login/mecca.jpg') }}')">
        <div class="container">
            <div class="col-xl-8 col-lg-12 col-md-12 inner-column">
                <div class="sec-title left light">
                    <h5>{{ trans('login.Login') }}</h5>
                    <h2>{{ trans('login.Login to your account') }}</h2>
                </div>
                <form method="POST" action="{{ route('user.store_login') }}" class="default-form">
                    @csrf
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="email" name="email" placeholder="{{ trans('login.email_address*') }}"
                                value="{{ old('email') }}" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group">
                            <input type="password" name="password" placeholder="{{ trans('login.enter_password') }}"
                                required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn">
                            <button class="theme-btn style-one" type="submit">
                                {{ trans('login.Login') }}
                            </button>
                        </div>
                        <div class="reset-password">
                            <div class="container">
                                <!-- <a href="#" data-target="#pwdModal" data-toggle="modal">Forgot my password</a> -->
                            </div>
                            <h2 class="forget-password">{{ trans('login.forget_password') }} <a
                                    href="{{ route('user.reset_password') }}">
                                    {{ trans('login.reset_password') }}</a> </h2>
                            <h2 class="create-account">{{ trans('login.not_have_an_account') }}
                                <a href="{{ route('user.join_us') }}">{{ trans('login.create_account_now') }}</a>
                            </h2>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
