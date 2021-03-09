@extends('layouts.backend.app')
@push('title')
    Edit invoice
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
                <h4 class="page-title">Edit invoice</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('sales.invoice.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit invoice</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.invoice.update', $invoice) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12">
                            <label>Customer </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="customer" id="customer" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($customers as $customer)
                                    <option @if($invoice->customer_id == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="vat">Vat</label>
                            <input type="number" class="form-control" id="vat" name="vat" placeholder="Vat" value="{{ $invoice->other_vat }}">
                            @error('vat')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="price" value="{{ $invoice->other_price }}">
                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="description" name="description">{!! $invoice->other_note !!}</textarea>
                            @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                            <hr class="bg-danger">
                        </div>
                        <div class="form-group col-12">
                            <label> Product </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="product" id="product" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($products as $product)
                                    <option @if($invoice->product_id == $product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="product_vat">Product vat</label>
                            <input type="number" class="form-control" id="product_vat" name="product_vat" placeholder="Product vat" value="{{ $invoice->product_vat }}">
                            @error('product_vat')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="product_price">Product price</label>
                            <input type="number" class="form-control" id="product_price" name="product_price" placeholder="Product price" value="{{ $invoice->product_price }}">
                            @error('product_price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Product note <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="product_note" name="product_note">{!! $invoice->product_note !!}</textarea>
                            @error('product_note')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                            <hr class="bg-danger">
                        </div>
                        <div class="form-group col-12">
                            <label> Service</label>
                            <select class="select2-single form-control select2-hidden-accessible" name="service" id="service" data-select2-id="2" tabindex="-2" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($services as $service)
                                    <option @if($invoice->service_id == $service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="service_vat">Service vat</label>
                            <input type="number" class="form-control" id="service_vat" name="service_vat" placeholder="Service vat" value="{{ $invoice->service_vat }}">
                            @error('service_vat')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="service_price">Service price</label>
                            <input type="number" class="form-control" id="service_price" name="service_price" placeholder="Service price" value="{{ $invoice->service_price }}">
                            @error('service_price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Product note <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="product_note" name="product_note">{!! $invoice->product_note !!}</textarea>
                            @error('product_note')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
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

