@extends('site.layouts.main')

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
                <h1>{{trans('contacts.contact_us')}}</h1>
                <ul class="bread-crumb clearfix">
                    <li><a href="/">{{ trans('header.Home') }}</a></li>
                    <li>{{trans('contacts.contact_us')}}</li>
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
                                <h5>{{trans('contacts.contact_us')}}</h5>
                                <h2>{{trans('contacts.contact_honor')}}</h2>
                            </div>
                            <!-- ///////////////////////////////////////////////////////// -->
                            <form action="{{route('user.contact.store')}}" method="post" class="submit-form">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="{{old('name')}}" placeholder="{{trans('contacts.name_enter')}}" required>
                                    <label for="name"></label>
                                </div>
                                @error('name')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="email" name="email" value="{{old('email')}}" placeholder="{{trans('contacts.email_enter')}}" required>
                                    <label for="email"></label>
                                </div>
                                @error('email')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" name="phone" value="{{old('phone')}}" placeholder="{{trans('contacts.phone_enter')}}" required>
                                    <label for="phone"></label>
                                </div>
                                @error('phone')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <input type="text" name="subject" value="{{old('subject')}}" placeholder="{{trans('contacts.subject_enter')}}" required>
                                    <label for="subject"></label>
                                </div>
                                @error('subject')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="form-group">
                                    <textarea name="message" placeholder="{{trans('contacts.message_enter')}}" required>{{old('message')}}</textarea>
                                    <label for="message"></label>
                                </div>
                                @error('message')
                                    <div class="invalid-feedback">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                                <div class="form-group message-btn">
                                    <button type="submit" class="theme-btn style-one">{{trans('contacts.send')}}</button>
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
