@extends('layouts.frontend.app')

@section('content')

    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-14.png') }})"></div>
        <div class="pattern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-15.png') }})"></div>
        <div class="auto-container">
            <h2>Contact us</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                    <li>Contact us</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->

    <!-- Contact Page Section -->
    <section class="contact-page-section">
        <div class="auto-container">
            <div class="row clearfix">

                <!-- Form Form -->
                <div class="form-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">{{ get_static_option('contact_heading') }}</div>
                            <h2>{{ get_static_option('contact_highlight') }}</h2>
                        </div>
                        <!-- Default Form -->
                        <div class="default-form contact-form">
                            <form method="post" action=" {{ route('frontend.contactUsStore') }} ">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="name" value="{{ old('name') }}" placeholder="Name" required>
                                </div>

                                <div class="form-group">
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" required>
                                </div>

                                <div class="form-group">
                                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="Phone" required>
                                </div>

                                <div class="form-group">
                                    <textarea name="message" placeholder="I need a website for my company ...." required>{{ old('message') }}</textarea>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="theme-btn btn-style-four"><span class="txt">Send Message</span></button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

                <!-- Info Column -->
                <div class="info-column col-lg-6 col-md-12 col-sm-12">
                    <div class="inner-column">
                        <!-- Sec Title -->
                        <div class="sec-title">
                            <div class="title">{{ get_static_option('contact_heading') }}</div>
                            <h2>{{ get_static_option('contact_highlight') }}</h2>
                            <div class="text">{{ get_static_option('contact_description') }}</div>
                        </div>

                        <!-- Info List -->
                        <ul class="info-list">
                            <li>
                                <span class="icon flaticon-placeholder-4"></span>
                                <strong>{{ get_static_option('company_address_district_country') }}</strong>
                                {{ get_static_option('company_address') }}
                            </li>
                            <li>
                                <span class="icon flaticon-phone-call"></span>
                                <strong>{{ get_static_option('company_phone') }}</strong>
                                Give us a call
                            </li>
                            <li>
                                <span class="icon flaticon-stopwatch"></span>
                                <strong>{{ get_static_option('company_email') }}</strong>
                                Get in Touch
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Contact Page Section -->

    <!-- Map Section -->
    <section class="map-section">
        <!-- Map Boxed -->
        <div class="map-boxed">
            <!--Map Outer-->
            <div class="map-outer">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d805184.6331292129!2d144.49266890254142!3d-37.97123689954809!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad646b5d2ba4df7%3A0x4045675218ccd90!2sMelbourne%20VIC%2C%20Australia!5e0!3m2!1sen!2s!4v1574408946759!5m2!1sen!2s" allowfullscreen=""></iframe>
            </div>
        </div>
    </section>
    <!-- End Map Section -->
    <!-- Contact Info Section -->
    @include('frontend.includes.contact')
    <!-- End Contact Info Section -->
@endsection
