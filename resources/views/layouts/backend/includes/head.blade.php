<base href="{{ url('/') }}">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Theta is a bootstrap & laravel admin dashboard template">
        <meta name="keywords" content="admin, admin dashboard, admin panel, admin template, analytics, bootstrap 4, crm, laravel admin, responsive, sass support, ui kits">
        <meta name="author" content="Themesbox17">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> @stack('title') | {{ config('app.name') }}</title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/panel/vertical/images/favicon.ico') }}">
        <!-- Start CSS -->
        @stack('style')
        <link href="{{ asset('assets/panel/vertical/plugins/switchery/switchery.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/panel/vertical/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/panel/vertical/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/panel/vertical/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/panel/vertical/css/style.css') }}" rel="stylesheet" type="text/css">
        <!-- End CSS -->
        <!--====== AJAX ======-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
