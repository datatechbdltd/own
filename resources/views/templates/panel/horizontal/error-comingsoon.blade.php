<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Theta is a premium responsive admin dashboard template with great features.">
    <meta name="keywords" content="responsive, admin template, dashboard template, bootstrap 4, laravel, ui kits, ecommerce, web app, crm, cms, html, sass support, scss">
    <meta name="author" content="Themesbox">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Theta - Comingsoon</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/panel/horizontal/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/panel/horizontal/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/horizontal/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/horizontal/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/horizontal/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box error-box">
                <!-- Start row -->
                 <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-8 col-lg-6">
                        <div class="text-center">
                            <img src="assets/panel/horizontal/images/logo.svg" class="img-fluid error-logo" alt="logo">
                            <img src="assets/panel/horizontal/images/error/coming-soon.svg" class="img-fluid error-image" alt="coming soon">
                            <h4 class="error-subtitle mb-4">Website is under construction.</h4>
                            <p class="mb-4">We will be back shortly. Thank you for your patience.</p>
                            <div class="counter-box">
                                <div id="counter"></div>
                            </div>
                        </div>
                    </div>
                    <!-- End col -->
                </div>
                <!-- End row -->
            </div>
        </div>
        <!-- End Container -->
    </div>
    <!-- End Containerbar -->
    <!-- Start JS -->
    <script src="{{ asset('assets/panel/horizontal/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/detect.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/jquery.slimscroll.js') }}"></script>
    <!-- Countdown js -->
    <script src="{{ asset('assets/panel/horizontal/plugins/jquery-countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/panel/horizontal/js/custom/custom-comingsoon.js') }}"></script>
    <!-- End js -->
</body>
</html>
