@extends('layouts.backend.app')
@push('title')
{{ __('Website banner') }}
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
                <h4 class="page-title">{{ __('Banner') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Website banner') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteBanner.create') }}" class="btn btn-primary">{{ __('Add new banner') }}</a>
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
           @foreach($banners as $banner)
                <div class="col-md-6 col-lg-6 col-xl-3">
                    <div class="card m-b-30">
                        <img class="card-img-top" src="{{ $banner->image ?? get_static_option('no_image') }}" alt="Card image cap">
                        <div class="card-body text-center" style="background-color: {{ $banner->color }}">
                            <h5 class="card-title font-12">{{ $banner->title }}</h5>
                            <h5 class="card-title font-18">{{ $banner->highlight }}</h5>
                            <p class="card-text mb-3">{{ $banner->description }}</p>
                            <a href="{{ $banner->btn_url }}" class="btn btn-primary" target="_blank">{{ __('BUTTON') }}</a>
                            <a href="{{ $banner->video_url }}" class="btn btn-success" target="_blank">{{ __('VIDEO') }}</a>
                            <a href="{{ route('website.websiteBanner.edit', $banner) }}" class="btn btn-warning">{{ __('EDIT') }}</a>
                            <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('website.websiteBanner.destroy', $banner) }}">{{ __('DELETE') }}</button>
                        </div>
                    </div>
                </div>
           @endforeach
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

