<html>
<head>
<meta name="description" content="{!! $meta_description  ?? get_static_option('meta_description') !!}">
<meta name="author" content="{{ $meta_author ?? get_static_option('meta_author') ?? config('app.name') }}">
<meta property="og:image" content="{{ $meta_image ?? get_static_option('website_logo') ?? get_static_option('no_image')}}" />
<title> {{ __('Official Pad') }} | {{ config('app.name') }}</title>
    <link href="{{ asset('assets/pdf/css/style.css') }}" rel="stylesheet" type="text/css">
    <style>
        @page {
            header: page-header;
            footer: page-footer;
        }
    </style>
</head>
<body>
{{--  Head  --}}
<htmlpageheader name="page-header">
    <div style="text-align: center; width: 100%;" class="brand1">
        <b style="font-size: 10px; color:white">{{ __('Date:') }} &nbsp; {{ $company_pad->date }}</b>
    </div>
</htmlpageheader>
{{--  Company Identity  --}}
<div style="width: 100%; height: 0.5cm;">
    <table class="table">
        <tbody>
        <tr>
            <th style="width: 50%;"><a target="_blank" href="http://datatechbd.com/"><img src="{{ get_static_option('website_logo') }}" alt=""></a></th>
            <th style="width: 50%;">
                <table style="text-align: left;">
                    <tbody>
                    <tr>
                        <th  style="width: 30%;  text-align: left">Website</th>
                        <th  style="width: 50%;  text-align: left">datatechbd.com</th>
                    </tr>
                    <tr>
                        <th  style="width: 30%; text-align: left">Email</th>
                        <th  style="width: 50%; text-align: left">info@datatechbd.com</th>
                    </tr>
                    <tr>
                        <th  style="width: 30%; text-align: left">Phone</th>
                        <th  style="width: 50%; text-align: left">+880 1304-734623</th>
                    </tr>
                    </tbody>
                </table>
            </th>
        </tr>
        </tbody>
    </table>
    <p style="width: 100%; margin-top: -3px; text-align: center;" class="brand2"><a target="_blank" href="https://g.page/datatech-bd-ltd--dhaka?share" style="color: white; text-decoration: none; font-size: small; ">{{ 'Shawpno Neer, 272/Kha/3/F, West Agargaon, She-E-Bangla Nagar, Dhaka-1207' }}</a></p>
</div>
<div style="text-align: center; width: 100%;" class="brand1">
    <b style="font-size: 14px; color:white">{{ $company_pad->title }}</b>
</div>
{{--  Body  --}}
<div style="background-color: whitesmoke; width: 100%; height: 100%;">
    {!! $company_pad->description !!}
</div>
{{--  Foot and contact info  --}}
<htmlpagefooter name="page-footer">
    <div style="text-align: center; width: 100%;" class="brand1">
        <b style="font-size: 20px; color:white">{{ config('app.name') }}</b>
    </div>
</htmlpagefooter>
</body>
</html>
