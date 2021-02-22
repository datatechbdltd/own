@extends('layouts.backend.app')
@push('title')
    Update SMS information
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Update SMS Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">SMS</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">SMS Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.smsUpdate') }}" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label>GPCMP Username <span class="text-danger">*</span></label>
                            <input type="text" name="username" required class="form-control"  placeholder="admin" value="{{ env('GPCMP_USERNAME') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>GPCMP Password <span class="text-danger">*</span></label>
                            <input type="text" name="password" required class="form-control"  placeholder="password" value="{{ env('GPCMP_PASSWORD') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>GPCMP Masking name<span class="text-danger">*</span></label>
                            <input type="text" name="masking" required class="form-control"  placeholder="Masking name" value="{{ env('GPCMP_MASKING') }}"/>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit GPCMP SMS configuration</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <form action="{{ route('setting.testSms') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Send test sms to make sure that your SMS settings is set correctly.</label>
                            <div class="input-group">
                                <input type="tel" required name="phone" value="{{ auth()->user()->phone }}" class="form-control" placeholder="Type your phone .. ">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">Test!</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

