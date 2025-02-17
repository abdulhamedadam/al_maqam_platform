<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <title>Quraan | Quraan</title> --}}
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="robots" content="index, follow">
    <meta name="robots" content="max-snippet:50, max-image-preview:large">
    <meta name="robots" content="max-video-preview:-1">
    <meta name="googlebot" content="index">
    <meta name="google-site-verification" content="...">
    <meta name="yandex-verification" content="...">
    <meta name="msvalidate.01" content="...">

    <link rel="canonical" href="...">

    <meta property="og:site_name" content="Consulty">
    <meta property="og:url" content="...">
    <meta property="og:locale" content="en_US">
    <meta property="og:description" content="">
    <meta property="og:title" content="">
    <meta property="og:type" content="website">
    <meta property="og:image" content="">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="">
    <meta name="twitter:image" content="">
    <meta name="twitter:description" content="">

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('front_assets/images/id/favicon.ico') }}" type="image/x-icon') }}">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/icofont.min.css') }}">
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/owl.theme.default.min.css') }}">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/bootstrap.min.css') }}">
    <!-- Bootstrap Datepicker -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/jquery-ui.css') }}">
    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/jquery.fancybox.min.css') }}">
    <!-- Animate -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/libs/animate.css') }}">
    <!-- Template Style -->
    <link rel="stylesheet" href="{{ asset('front_assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front_assets/css/responsive.css') }}">

    @yield('css')
</head>

<body class="boxed_wrapper @yield('body_class') ltr">

    @include('front.includes.header')

    @yield('content')

    @include('front.includes.footer')

    <!-- jequery Libraries -->
    <script src="{{ asset('front_assets/js/libs/jquery.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/wow.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.appear.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.countTo.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/scrollbar.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/nav-tool.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/TweenMax.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/circle-progress.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('front_assets/js/libs/jquery.ajaxchimp.js') }}"></script>

    <!-- Template script -->
    <script src="{{ asset('front_assets/js/script.js') }}"></script>

    @yield('js')
</body>

</html>
