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
    <title>Theta - Forgot Password</title>
    <!-- Fevicon -->
    <link rel="shortcut icon" href="{{ asset('assets/panel/vertical/images/favicon.ico') }}">
    <!-- Start CSS -->
    <link href="{{ asset('assets/panel/vertical/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/icons.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/css/style.css') }}" rel="stylesheet" type="text/css">
    <!-- End CSS -->
</head>
<body class="vertical-layout">
    <!-- Start Containerbar -->
    <div id="containerbar" class="containerbar authenticate-bg">
        <!-- Start Container -->
        <div class="container">
            <div class="auth-box forgot-password-box">
                <!-- Start row -->
                <div class="row no-gutters align-items-center justify-content-center">
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <div class="auth-box-left">
                            <div class="card">
                                <div class="card-body">
                                    <h4>Don't worry, we're here.</h4>
                                    <div class="auth-box-icon">
                                        <img src="assets/panel/vertical/images/authentication/auth-box-icon-forgot.svg" class="img-fluid" alt="auth-box-icon">
                                    </div>
                                    <div class="auth-box-logo">
                                        <img src="{{ asset(get_static_option('website_logo')) }}" class="img-fluid " alt="logo">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Start end -->
                    <!-- Start col -->
                    <div class="col-md-6 col-lg-5">
                        <!-- Start Auth Box -->
                        <div class="auth-box-right">
                            <div class="card">
                                <div class="card-body">
                                    <form action="#">
                                        <h4 class="text-primary mb-4">Forgot Password ?</h4>
                                        <p class="mb-4">Enter the email address below to receive reset password instructions.</p>
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" placeholder="Enter Email here" required>
                                        </div>
                                      <button type="submit" class="btn btn-success btn-lg btn-block font-18">Send Email</button>
                                    </form>
                                    <p class="mb-0 mt-3">Remember Password? <a href="{{url('/template/panel-vertical/user-login')}}">Log in</a></p>
                                </div>
                            </div>
                        </div>
                        <!-- End Auth Box -->
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
    <script src="{{ asset('assets/panel/vertical/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/detect.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/jquery.slimscroll.js') }}"></script>
    <!-- End js -->
</body>
</html>
