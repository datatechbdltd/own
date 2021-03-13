<base href="{{ url('/') }}">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="keywords" content="{{ $meta_keywords  ?? get_static_option('meta_keywords')}}">
<meta name="description" content="{!! $meta_description  ?? get_static_option('meta_description') !!}">
<meta name="author" content="{{ $meta_author ?? get_static_option('meta_author') ?? config('app.name') }}">
<meta property="og:image" content="{{ $meta_image ?? get_static_option('website_logo') ?? get_static_option('no_image')}}" />
<title> @stack('title') | {{ config('app.name') }}</title>
<link rel=icon href="{{ asset(get_static_option('website_favicon') ?? get_static_option('no_image')) }}" sizes="20x20" type="image/png">
<!-- Vendor Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/vendor.css') }}">
<!-- animate -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/animate.css') }}">
<!-- owl carousel -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/owl.carousel.min.css') }}">
<!-- lineawesome -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/line-awesome.min.css') }}">
<!-- magnific popup -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/magnific-popup.css') }}">
<!-- slick carousel -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/slick.css') }}">
<!-- signin Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/signin.cs') }}s">
<!-- Main Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/style.css') }}">
<!-- responsive Stylesheet -->
<link rel="stylesheet" href="{{ asset('assets/frontend2/css/responsive.css') }}">
<!--====== Custom script ======-->
{!! get_static_option('custom_website_head_script') !!}
<!--====== AJAX ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

@stack('style')

<style>
    .banner-v3-area:after {
        position: absolute;
        left: 0;
        top: 0;
         {{--background: url({{ asset('assets/frontend2/img/banner/bg-2.png') }});--}}
        background-image: -webkit-gradient(linear, left top, right top, from(rgb(27, 20, 100)), to(rgb(194, 53, 48)));
        background-image: -webkit-linear-gradient(left, rgb(27, 20, 100), rgb(194, 53, 48));
        background-image: -o-linear-gradient(left, rgb(27, 20, 100), rgb(194, 53, 48));
        background-image: linear-gradient(to right, rgb(27, 20, 100), rgb(194, 53, 48));
        content: '';
        width: 100%;
        height: 100%;
        z-index: -1; }
    .btn-basic{
        background-image: -webkit-gradient(linear, left top, right top, from(rgb(27, 20, 100)), to(rgb(194, 53, 48)));
    }
</style>
