<meta charset="utf-8">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title> @stack('title') | {{ config('app.name') }}</title>
<!-- Stylesheets -->
<link href="{{ asset('assets/frontend/css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('assets/frontend/css/responsive.css') }}" rel="stylesheet">

<!-- Color Switcher Mockup -->
<link href="{{ asset('assets/frontend/css/color-switcher-design.css') }}" rel="stylesheet">

<link rel="icon" href="{{ asset(get_static_option('website_favicon') ?? get_static_option('no_image')) }}" type="image/x-icon">

<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
{!! get_static_option('custom_website_head_script') !!}
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
<!--====== AJAX ======-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

@stack('style')
