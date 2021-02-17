@extends('layouts.backend.app')
@push('title')
    {{ __('Edit website banner') }}
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')
    <!-- Color Picker css -->
    <link href="{{ asset('assets/panel/vertical/plugins/colorpicker/bootstrap-colorpicker.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Banner edit') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Website banner edit') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteBanner.index') }}" class="btn btn-primary">{{ __('Back') }}</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">{{ __('Edit website banner') }}</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.</h6>
                        <form action="{{ route('website.websiteBanner.update', $websiteBanner) }}" method="POST" enctype="multipart/form-data">
                            @csrf  @method('PATCH')
                            <div class="row">
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="title">{{ __('Title')  }}</label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ $websiteBanner->title }}"  placeholder="{{ __('Enter title') }}">
                                    @error('title')
                                    <small id="title" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="highlight">{{ __('Highlight')  }}</label>
                                    <input type="text" class="form-control" id="highlight" name="highlight" value="{{ $websiteBanner->highlight }}"  placeholder="{{ __('Enter highlight text') }}" required>
                                    @error('highlight')
                                    <small id="highlight" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="description">{{ __('Description')  }}</label>
                                    <textarea type="text" class="form-control" id="description" name="description" placeholder="{{ __('Enter description') }}" required> {{ $websiteBanner->description }} </textarea>
                                    @error('description')
                                    <small id="description" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="btn_url">{{ __('Button url')  }}</label>
                                    <input type="text" class="form-control" id="btn_url" name="btn_url" value="{{ $websiteBanner->btn_url }}"  placeholder="{{ __('Enter button url') }}">
                                    @error('btn_url')
                                    <small id="btn_url" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="video_url">{{ __('Video url')  }}</label>
                                    <input type="text" class="form-control" id="video_url" name="video_url" value="{{ $websiteBanner->video_url }}"  placeholder="{{ __('Video button url') }}">
                                    @error('video_url')
                                    <small id="video_url" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="color">{{ __('Color')  }}</label>
                                    <div id="initial-rgb-color" class="input-group" title="Using input value">
                                        <input type="text" class="form-control input-lg" id="color" name="color" value="{{ $websiteBanner->color }}"/>
                                        <span class="input-group-append">
                                        <span class="input-group-text colorpicker-input-addon"><i></i></span>
                                    </span>
                                    </div>
                                    @error('color')
                                    <small id="color" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="image">{{ __('Image')  }}</label>
                                    <input type="file" accept="image/*" class="form-control" id="image" name="image">
                                    @error('image')
                                    <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="serial">{{ __('Serial')  }}</label>
                                    <input type="number" class="form-control" id="serial" name="serial" value="{{ $websiteBanner->serial }}"  placeholder="{{ __('Enter serial') }}" required>
                                    @error('serial')
                                    <small id="serial" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-md-6 col-xl-4">
                                    <label for="status">{{ __('State') }}</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option @if($websiteBanner->is_active == true) selected @endif value="1">{{ __('Active') }}</option>
                                        <option @if($websiteBanner->is_active == false) selected @endif value="0">{{ __('Inactive') }}</option>
                                    </select>
                                    @error('status')
                                    <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <!-- Color Picker js -->
    <script src="{{ asset('assets/panel/vertical/plugins/colorpicker/bootstrap-colorpicker.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-form-colorpicker.js') }}"></script>
@endpush

