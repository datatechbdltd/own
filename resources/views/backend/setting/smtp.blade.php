@extends('layouts.backend.app')
@push('title')
    Update SMTP information
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
                <h4 class="page-title">Update SMTP Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">SMTP</a></li>
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
                    <h5 class="card-title">SMTP Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.smtpUpdate') }}" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Email host <span class="text-danger">*</span></label>
                            <input type="text" name="host" required class="form-control"  placeholder="domain.com" value="{{ env('MAIL_HOST') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Email port <span class="text-danger">*</span></label>
                            <input type="text" name="port" required class="form-control"  placeholder="465" value="{{ env('MAIL_PORT') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Email username <span class="text-danger">*</span></label>
                            <input type="test" name="username" required class="form-control"  placeholder="mail@domain.com" value="{{ env('MAIL_USERNAME') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Email password <span class="text-danger">*</span></label>
                            <input type="text" name="password" required class="form-control"  placeholder="your smtp password" value="{{ env('MAIL_PASSWORD') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="encryption">Mail encryption <span class="text-danger">*</span></label>
                            <select name="encryption" required class="form-control" id="encryption">
                                <option @if(env('MAIL_ENCRYPTION') == 'ssl') selected @endif value="ssl">ssl</option>
                                <option @if(env('MAIL_ENCRYPTION') == 'tls') selected @endif value="tls">tls</option>
                                <option @if(env('MAIL_ENCRYPTION') == 'none') selected @endif value="none">none</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>From name<span class="text-danger">*</span></label>
                            <input type="text" name="from_name" required class="form-control"  placeholder="brand name" value="{{ env('MAIL_FROM_NAME') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>From email<span class="text-danger">*</span></label>
                            <input type="email" name="from_email" required class="form-control"  placeholder="mail@domain.com" value="{{ env('MAIL_FROM_ADDRESS') }}"/>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit SMTP configuration</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Send test email to make sure that your SMTP settings is set correctly.</label>
                            <div class="input-group">
                                <input type="email" required name="email" value="{{ auth()->user()->email }}" class="form-control" placeholder="Type your email .. ">
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

