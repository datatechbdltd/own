@extends('layouts.backend.app')
@push('title')
    Create proposal
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
                <h4 class="page-title">Create proposal</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('sales.proposal.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create proposal</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.proposal.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-xl-4 col-md-4">
                            <label>Customer </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="customer" id="customer" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($customers as $customer)
                                    <option @if(old('customer') == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label> Service</label>
                            <select class="select2-single form-control select2-hidden-accessible" name="service" id="service" data-select2-id="2" tabindex="-2" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($services as $service)
                                    <option @if(old('service') == $service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label> Product </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="product" id="product" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($products as $product)
                                    <option @if(old('product') == $product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label for="guest_email">Guest email</label>
                            <input type="email" class="form-control" id="guest_email" name="guest_email" placeholder="Guest email" value="{{ old('guest_email') }}">
                            @error('guest_email')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label for="guest_phone">Guest phone</label>
                            <input type="text" class="form-control" id="guest_phone" name="guest_phone" placeholder="Guest phone" value="{{ old('guest_phone') }}">
                            @error('guest_phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label for="budget">Budget</label>
                            <input type="number" class="form-control" id="budget" name="budget" placeholder="budget" value="{{ old('budget') }}">
                            @error('budget')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="description" name="description">{!! old('description') !!}</textarea>
                            @error('description')
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



@endpush

