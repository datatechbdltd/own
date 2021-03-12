@extends('layouts.frontend2.app')
@push('title') Proposal @endpush
@push('style')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/signature/signaturepad.css') }}">



<script src="{{ asset('assets/signature/signaturepad.js') }}"></script>
@endpush
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
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-facility media  bg-success">
                        <span class="number bg-danger"><b><i class="fa fa-star"></i></b></span>
                        <div class="facility-details media-body">
                            @if($proposal->customer)
                            <h5 class="text-white">{{ $proposal->customer->name }}</h5>
                            <b>{{ $proposal->customer->email }}</b><br>
                            <b>{{ $proposal->customer->phone }}</b>
                            @endif
                            @if($proposal->guest_email)
                            <h5 class="text-white">{{ $proposal->guest_email }}</h5>
                            @endif
                            @if($proposal->guest_phone)
                            <h5 class="text-white">{{ $proposal->guest_phone }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-facility media bg-warning">
                        <span class="number bg-danger"><b><i class="fa fa-star"></i></b></span>
                        <div class="facility-details media-body">
                            @if($proposal->product)
                            <h5>{{ $proposal->product->name ?? ''}}</h5>
                            <b>{{ $proposal->customer->title ?? '' }}</b><br>
                            @endif
                            @if($proposal->service)
                            <h5>{{ $proposal->service->name ?? ''}}</h5>
                            <b>{{ $proposal->customer->title ?? '' }}</b><br>
                            @endif
                            @if($proposal->budget)
                            <b>Budget: {{ $proposal->budget }}৳</b>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-danger">
            {!! $proposal->description  !!}
            <hr class="bg-danger">
            <div class="row">
                <div class="col-lg-12">
                    <div data-role="page">
                        <div data-role="popup" id="divPopUpSignContract">
                            <div class="ui-content popUpHeight">
                                <div id="div_signcontract" class="col-12">
                                    <canvas id="canvas">Canvas is not supported</canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <input id="btnSubmitSign" class="btn btn-basic" type="button" data-inline="true" data-mini="true" data-theme="b" value="Submit Sign" onclick="fun_submit()" />
                        <input id="btnClearSign" class="btn btn-basic" type="button" data-inline="true" data-mini="true" data-theme="b" value="Clear" onclick="init_Sign_Canvas()" />
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- contact area end -->
@endsection


@push('script')
@endpush
