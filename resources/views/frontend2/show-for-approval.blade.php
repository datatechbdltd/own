@extends('layouts.frontend2.app')
@push('title') Proposal @endpush
@section('content')

    <!-- page-title area start -->
    <div class="page-title-area mg-bottom-105">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title">Proposal </h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Proposal</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- page-title area end -->

    <!-- contact area start -->
    <div class="contact-area pd-bottom-85">
        <div class="container">
            {!! $proposal->description  !!}
        </div>
    </div>
    <!-- contact area end -->
@endsection
