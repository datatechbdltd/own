@extends('layouts.frontend2.app')
@push('title') Contact-us @endpush
@section('content')

    <!-- page-title area start -->
    <div class="page-title-area mg-bottom-105">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title">Contact Us </h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Contact-us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->

    <!-- contact area start -->
    <div class="contact-area pd-bottom-85">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section-title text-center">
                        <h5 class="subtitle">{{ get_static_option('contact_heading') }}</h5>
                        <h3 class="title">{{ get_static_option('contact_highlight') }}</h3>
                        <p>{{ get_static_option('contact_description') }}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact text-center bottom-left-radius-0">
                        <div class="icon">
                            <img src="{{ asset('assets/frontend2/img/icon/home.png') }}" alt="icon">
                        </div>
                        <h5>Our Head Office</h5>
                        <p>{{ get_static_option('company_address_district_country') }}
                            {{ get_static_option('company_address') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact text-center bottom-left-radius-0">
                        <div class="icon">
                            <img src="{{ asset('assets/frontend2/img/icon/envelope.png') }}" alt="icon">
                        </div>
                        <h5>E-mail</h5>
                        <p>{{ get_static_option('company_email') }}</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-contact text-center bottom-left-radius-0">
                        <div class="icon">
                            <img src="{{ asset('assets/frontend2/img/icon/phone.png') }}" alt="icon">
                        </div>
                        <h5>Phone</h5>
                        <p>{{ get_static_option('company_phone') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->

    <!-- contact-map area start -->
    <div class="main-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.0133007741124!2d90.36988341434908!3d23.78254069346602!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c1bb07d0e771%3A0x127069c31b3f2ad7!2sDATATECH%20BD%20LTD.!5e0!3m2!1sbn!2sbd!4v1615650025797!5m2!1sbn!2sbd"
                style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- contact-map area end -->
@endsection
