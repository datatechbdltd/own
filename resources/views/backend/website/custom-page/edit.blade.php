@extends('layouts.backend.app')
@push('title')
    Edit custom Page
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
                <h4 class="page-title">Edit {{ $customPage->name }} page</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#"> {{ $customPage->name }}</a></li>
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
                    <h5 class="card-title">Create service</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('website.customPage.update',  $customPage) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" required class="form-control" id="name" value="{{ $customPage->name }}">
                            @error('name')
                            <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Title <span class="text-danger">*</span></label>
                            <input type="text" name="title" required class="form-control" id="title" value="{{ $customPage->title }}">
                            @error('title')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-3 col-xl-3">
                            <label for="serial">Serial <span class="text-danger">*</span></label>
                            <input type="number" name="serial" required class="form-control" id="serial" value="{{ $customPage->serial }}">
                            @error('serial')
                            <small class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-3 col-xl-3">
                            <label for="status">Status <span class="text-danger">*</span></label>
                            <select id="status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="1" @if($customPage->status == 1) selected @endif>Active</option>
                                <option value="0"  @if($customPage->status == 0) selected @endif>Inactive</option>
                            </select>
                            @error('status')
                            <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="image">{{ __('Image')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            @error('image')
                            <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                            <img height="80px;" width="80px;" class="rounded-circle" src="{{ asset($customPage->image ?? get_static_option('no_image')) }}">
                        </div>

                        <div class="form-group col-12">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" name="description">{!! $customPage->description !!}</textarea>
                            @error('description')
                            <small id="image" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
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

