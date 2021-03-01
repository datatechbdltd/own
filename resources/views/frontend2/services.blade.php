@extends('layouts.frontend2.app')
@push('title') Home @endpush
@section('content')
    <!-- page-title area start -->
    <div class="page-title-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <h3 class="title">Services </h3>
                </div>
                <div class="col-md-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Services</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->
    <div class="shape-4" style="background-image: url({{ asset('assets/frontend2/img/shape/4.png') }});">
        <!-- service area start -->
    @include('frontend2.includes.service')
    <!-- service area end -->
    </div>

@endsection
