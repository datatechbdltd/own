@extends('layouts.backend.app')
@push('title')
    Create client
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
                <h4 class="page-title">Create client</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteClient.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create client</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('website.websiteClient.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input value="{{ old('name') }}" type="text" name="name" required class="form-control" id="name" >
                            @error('name')
                            <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="designation">Designation <span class="text-danger">*</span></label>
                            <input value="{{ old('designation') }}"  type="text" name="designation" required class="form-control" id="designation" >
                            @error('designation')
                            <small id="designation" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="title">Title <span class="text-danger">*</span></label>
                            <input value="{{ old('title') }}"  type="text" name="title" required class="form-control" id="title" >
                            @error('title')
                            <small id="title" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="description">{{ __('Description')  }}</label>
                            <textarea type="text" class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" required> {{ old('description') }} </textarea>
                            @error('description')
                            <small id="description" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6 col-xl-6">
                            <label for="Status">Status</label>
                            <select id="Status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                            @error('status')
                            <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-xl-6">
                            <label for="company_url">Company url <span class="text-danger">*</span></label>
                            <input  value="{{ old('company_url') }}"  type="text" name="company_url" required class="form-control" id="company_url" >
                            @error('company_url')
                            <small id="company_url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="serial">Serial <span class="text-danger">*</span></label>
                            <input  value="{{ old('serial') }}"  type="number" name="serial" required class="form-control" id="serial" >
                            @error('serial')
                            <small id="serial" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="image">{{ __('Image')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            @error('image')
                            <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="company_logo">{{ __('Company logo')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="company_logo" name="company_logo">
                            @error('company_logo')
                            <small id="company_logo" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Create now</button>
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

