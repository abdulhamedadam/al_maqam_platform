<!-- =========== **************** =============== -->

<!-- Start Search-Popup -->

<div id="search-popup" class="search-popup">
    <div class="close-search"><i class="fas fa-times-circle"></i></div>
    <div class="popup-inner">
        <div class="overlay"></div>
        <div class="search-form">
            <form method="post" action="/">
                <div class="form-group">
                    <fieldset>
                        <input type="search" class="form-control" name="search-input" value=""
                            placeholder="{{ trans('header.Search Here') }}" required>
                        <input type="submit" value="{{ trans('header.Search Now!') }}" class="theme-btn">
                    </fieldset>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- End Search-Popup -->

<!-- =========== **************** =============== -->

<!-- Start Header -->

<header class="main-header page @yield('header_class')">
    <div class="bottom-header">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <div class="logo-box">
                        <figure class="logo">
                            <a href="{{ route('user.home') }}">
                                <img src="{{ asset('front_assets/images/id/logo-jpg.jpg') }}" alt="dark-logo">
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-6 col-md-9 col-lg-10">
                    <div class="menu-area">
                        <!-- Start Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler page">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <!-- End Mobile Navigation Toggler -->
                        <nav class="main-menu navbar-expand-md me-auto navbar-light">
                            <div class="collapse navbar-collapse show" id="navbarSupportedContent">
                                <ul class="navigation">
                                    <li><a href="{{ route('user.home') }}">{{ trans('header.Home') }}</a></li>
                                    <li><a
                                            href="{{ route('user.our_lectures') }}">{{ trans('header.Our Lectures') }}</a>
                                    </li>
                                    <li><a
                                            href="{{ route('user.our_teachers') }}">{{ trans('header.Our Teachers') }}</a>
                                    </li>
                                    <li><a href="{{ route('user.contact.show') }}">{{ trans('header.Contact') }}</a>
                                    </li>
                                    {{-- <li class="sign-in"><a
                                            href="{{ route('user.login') }}">{{ trans('header.Login') }}</a></li>
                                    <li class="sign-up"><a
                                            href="{{ route('user.join_us') }}">{{ trans('header.Join Us') }}</a></li> --}}
                                    {{-- <div class="page_direction">
                                        <div class="demo-rtl direction_switch">
                                            <button class="rtl">
                                                Arabic
                                                <img src="{{ asset('front_assets/images/flags/egypt.svg') }}"
                                                    alt="" class="flag egy-flag">
                                            </button>
                                        </div>
                                        <div class="demo-ltr direction_switch">
                                            <button class="ltr">
                                                <img src="{{ asset('front_assets/images/flags/U.S.A.-Flag.svg') }}"
                                                    alt="" class="flag usa-flag">
                                                English
                                            </button>
                                        </div>
                                    </div> --}}
                                    <div class="page_direction">
                                        @php
                                            $supportedLocales = LaravelLocalization::getSupportedLocales();
                                        @endphp

                                        @if (isset($supportedLocales['ar']))
                                            <div class="demo-rtl direction_switch">
                                                <a rel="alternate" hreflang="ar"
                                                    href="{{ LaravelLocalization::getLocalizedURL('ar', null, [], true) }}">
                                                    <button class="rtl">
                                                        {{ $supportedLocales['ar']['native'] }}
                                                        <img src="{{ asset('front_assets/images/flags/egypt.svg') }}"
                                                            alt="{{ $supportedLocales['ar']['native'] }}"
                                                            class="flag egy-flag">
                                                    </button>
                                                </a>
                                            </div>
                                        @endif

                                        @if (isset($supportedLocales['en']))
                                            <div class="demo-ltr direction_switch">
                                                <a rel="alternate" hreflang="en"
                                                    href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">
                                                    <button class="ltr">
                                                        <img src="{{ asset('front_assets/images/flags/U.S.A.-Flag.svg') }}"
                                                            alt="{{ $supportedLocales['en']['native'] }}"
                                                            class="flag usa-flag">
                                                        {{ $supportedLocales['en']['native'] }}
                                                    </button>
                                                </a>
                                            </div>
                                        @endif
                                    </div>
                                    <!-- page-direction end -->
                                </ul>
                            </div>
                        </nav>
                        <div class="menu-right-content">
                            <div class="search-btn">
                                <button type="button" class="search-toggler">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                            <div class="btn-box">
                                @auth('web')
                                    @if (auth('web')->user()->role === 'student')
                                        <a href="{{ route('user.student_profile') }}"
                                            class="theme-btn m-3">{{ auth('web')->user()->name }} Dashboard</a>
                                    @elseif(auth('web')->user()->role === 'teacher')
                                        <a href="{{ route('user.teacher_profile') }}"
                                            class="theme-btn m-3">{{ auth('web')->user()->name }} Dashboard</a>
                                    @endif
                                    <form method="POST" action="{{ route('user.logout') }}">
                                        @csrf
                                        <button type="submit" class="theme-btn">Logout</button>
                                    </form>
                                @else
                                    <a href="{{ route('user.login') }}" class="login theme-btn">Login</a>
                                    <a href="{{ route('user.join_us') }}" class="join theme-btn">Join Now</a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Start Sticky Header-->
    <div class="sticky-header">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-3">
                    <div class="logo-box">
                        <figure class="logo">
                            <a href="{{ route('user.home') }}"><img
                                    src="{{ asset('front_assets/images/id/logo-jpg.jpg') }}" alt="dark-logo"></a>
                        </figure>
                    </div>
                </div>
                <div class="col-6 col-md-9">
                    <div class="menu-area">
                        <!-- Start Mobile Navigation Toggler -->
                        <div class="mobile-nav-toggler">
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                            <i class="icon-bar"></i>
                        </div>
                        <!-- End Mobile Navigation Toggler -->
                        <nav class="main-menu">
                            <!--Keep This Empty / Menu will come through Javascript-->
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Sticky Header -->
</header>

<!-- End Header -->

<!-- =========== **************** =============== -->

<!-- Mobile Menu  -->

<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    <nav class="menu-box">
        <div class="nav-logo">
            <a href="{{ route('user.home') }}"><img src="{{ asset('front_assets/images/id/logo-jpg.jpg') }}"
                    alt="light-logo" title=""></a>
        </div>
        <div class="menu-outer">
            <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
        </div>
        <div class="social-links">
            <ul class="">
                <li>
                    <a href="/"><span class="fab fa-twitter"></span></a>
                </li>
                <li>
                    <a href="/"><span class="fab fa-facebook-square"></span></a>
                </li>
                <li>
                    <a href="/"><span class="fab fa-pinterest-p"></span></a>
                </li>
                <li>
                    <a href="/"><span class="fab fa-instagram"></span></a>
                </li>
                <li>
                    <a href="/"><span class="fab fa-youtube"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<!-- End Mobile Menu -->

<!-- =========== **************** =============== -->
