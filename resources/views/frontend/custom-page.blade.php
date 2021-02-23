@extends('layouts.frontend.app')
@push('title') {{ $customPage->name }} @endpush
@section('content')
    <!--Page Title-->
    <section class="page-title">
        <div class="pattern-layer-one" style="background-image: url({{ asset('assets/frontend/images/background/pattern-14.png') }})"></div>
        <div class="pattern-layer-two" style="background-image: url({{ asset('assets/frontend/images/background/pattern-15.png') }})"></div>
        <div class="auto-container">
            <h2>Services</h2>
            <ul class="page-breadcrumb">
                <li><a href="{{ url('/') }}">home</a></li>
                <li>{{ $customPage->name }}</li>
            </ul>
        </div>
    </section>
    <!--End Page Title-->
    <!-- Page description -->
    <section class="shop-single-section">
        <div class="auto-container">
            {!! $customPage->description !!}
        </div>
    </section>
    <!-- End Page description -->

    <!-- Call To Action Section -->
    @include('frontend.includes.call-to-action')
    <!-- End Call To Action Section -->
    
    <!-- Contact Info Section -->
    @include('frontend.includes.contact')
    <!-- End Contact Info Section -->
@endsection
