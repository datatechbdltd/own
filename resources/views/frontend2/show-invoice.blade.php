@extends('layouts.frontend2.app')
@push('title') Invoice @endpush
@section('content')
    <!-- page-title area start -->
    <div class="page-title-area mg-bottom-105">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <h3 class="title">Invoice# {{ $invoice->invoice_id }} </h3>
                </div>
                <div class="col-sm-6 text-center align-self-center">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Invoice</li>

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
                            @if($invoice->customer)
                            <h5 class="text-white">{{ $invoice->customer->name }}</h5>
                            <b>{{ $invoice->customer->email }}</b><br>
                            <b>{{ $invoice->customer->phone }}</b>
                            @endif
                            @if($invoice->guest_email)
                            <h5 class="text-white">{{ $invoice->guest_email }}</h5>
                            @endif
                            @if($invoice->guest_phone)
                            <h5 class="text-white">{{ $invoice->guest_phone }}</h5>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-facility media bg-warning">
                        <span class="number bg-danger"><b><i class="fa fa-star"></i></b></span>
                        <div class="facility-details media-body">
                            @if($invoice->product)
                            <h5>{{ $invoice->product->name ?? ''}}</h5>
                            @endif
                            @if($invoice->service)
                            <h5>{{ $invoice->service->name ?? ''}}</h5>
                            @endif
                            <b>Price: {{ $invoice->other_price + $invoice->service_price + $invoice->product_price }}৳</b>
                            <br>
                            <b>Paid: {{ $invoice->payments->sum('amount') }}৳</b>
                            <br>
                            <b>Due: {{ $invoice->other_price + $invoice->service_price + $invoice->product_price - $invoice->payments->sum('amount') }}৳</b>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="bg-danger">
            <div class="col-12">
                {!! $invoice->other_note  !!}
                {!! $invoice->service_note  !!}
                {!! $invoice->product_note  !!}
                <br>
                <br>
                <a class="btn btn-basic top-right-radius-0 m-8" href="{{ route('pdf.invoiceDownload', $invoice->slug) }}">Download Invoice</a>
                <br>
                <br>
            </div>
            <div class="col-lg-12">
                <div class="single-facility media bg-danger">
                    <div class="facility-details text-center media-body">
                        @if($invoice->other_price + $invoice->service_price + $invoice->product_price - $invoice->payments->sum('amount') > 0)
                        <h5 class="text-white">{{ __('Please clear your due amount:')}} {{ $invoice->other_price + $invoice->service_price + $invoice->product_price - $invoice->payments->sum('amount') }}  BDT <br> </h5>
                        @foreach(offline_payment_methods() as $offline_method)
                        <h5>{{ $offline_method->name }}: {{ $offline_method->description }}</h5>
                        @endforeach
                        @else
                        <h5 class="text-white">{{ __('Thank you for due payment clear')}}</h5>
                        @endif
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
    <!-- contact area end -->
@endsection
