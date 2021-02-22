@extends('layouts.frontend.app')
@push('title') Services @endpush
@section('content')
    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-14.png') }})"></div>
        <div class="pattern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-15.png') }})"></div>
        <div class="auto-container">
            <h2>Services</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                <li>Services</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Service Section Five -->
    @include('frontend.includes.service')
    <!-- End Service Section Five -->
    <br>
    <br>
    <br>
    <!-- Contact Info Section -->
    @include('frontend.includes.contact')
    <!-- End Contact Info Section -->
@endsection
