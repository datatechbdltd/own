@extends('layouts.backend.app')
@push('title')
    Edit service
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')
    <!-- Summernote css -->
    <link href="{{ asset('assets/panel/vertical/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css">
    <!-- Code Mirror css -->
    <link href="{{ asset('assets/panel/vertical/plugins/code-mirror/codemirror.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/plugins/code-mirror/hopscotch.css') }}" rel="stylesheet" type="text/css">
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Edit service</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteService.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit service</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('website.websiteService.update',$websiteService->id) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('patch')
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input value="{{ $websiteService->name }}" type="text" name="name" required class="form-control" id="name" >
                            @error('name')
                            <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6 col-xl-6">
                            <label for="Status">Status</label>
                            <select id="Status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option @if($websiteService->is_active == true) selected @endif value="1">Active</option>
                                <option @if($websiteService->is_active == false) selected @endif value="0">Inactive</option>
                            </select>
                            @error('status')
                            <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="short_description">{{ __('Short Description')  }}</label>
                            <textarea type="text" class="form-control" id="short_description" name="short_description" required> {{ $websiteService->short_description }}  </textarea>
                            @error('short_description')
                            <small id="short_description" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="url">Url <span class="text-danger">*</span></label>
                            <input value="{{ $websiteService->url }}" type="text" name="url" required class="form-control" id="url" >
                            @error('url')
                            <small id="url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <img height="80px;" width="80px;" src="{{ asset($websiteService->icon ?? get_static_option('no_image')) }}">
                            <label for="image">{{ __('Image')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            @error('image')
                            <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Long Description <span class="text-danger">*</span></label>
                            <textarea id="tinymce-example" name="long_description">{!! $websiteService->long_description !!}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <label>Agreement <span class="text-danger">*</span></label>
                            <textarea id="tinymce-example" name="agreement">{!! $websiteService->agreement !!}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Update now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
    <!-- Wysiwig js -->
    <script src="{{ asset('assets/panel/vertical/plugins/tinymce/tinymce.min.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('assets/panel/vertical/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Code Mirror JS -->
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/htmlmixed.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/css.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/javascript.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/xml.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-form-editor.js') }}"></script>
@endpush

