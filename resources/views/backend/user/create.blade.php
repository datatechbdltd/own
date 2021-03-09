@extends('layouts.backend.app')
@push('title')
    Create user
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
                <h4 class="page-title">Create user</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('user.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create user</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('user.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label> User type </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="user_status" id="user_status" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                <option value="">Select</option>

                                    <option @if(old('user_status') == 'customer') selected @endif value="customer">Customer</option>
                                    <option @if(old('user_status') == 'marketer') selected @endif value="marketer">Marketer</option>
                                    <option @if(old('user_status') == 'employee') selected @endif value="employee">Employee</option>
                                    <option @if(old('user_status') == 'admin') selected @endif value="employee">Admin</option>

                            </select>
                            @error('user_status')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">
                            @error('email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="phone">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" value="{{ old('phone') }}">
                            @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Password" value="{{ old('password') }}">
                            @error('password')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12" id="income-save-btn">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

<script>
    $(document).ready(function () {

    });
</script>
@endpush

