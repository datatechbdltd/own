@extends('layouts.backend.app')
@push('title')
    Contact details
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
                <h4 class="page-title">Contact details</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Contact details</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('userToAdminContactList') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Contact details</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('userToAdminContactListDetailsUpdate') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input type="hidden" name="contact_id" value="{{ $contact_details->id }}">
                            <input value="{{ $contact_details->name }}" type="text" name="name" readonly class="form-control" id="name" >
                            @error('name')
                            <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="phone">Phone </label>
                            <input value="{{ $contact_details->phone }}" type="text" name="phone" readonly class="form-control" id="phone" >
                            @error('phone')
                            <small id="phone" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="email">Email </label>
                            <input value="{{ $contact_details->email }}" type="text" name="email" readonly class="form-control" id="email" >
                            @error('email')
                            <small id="email" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6 col-xl-6">
                            <label for="is_process_complete">Is process complete</label>
                            <select id="is_process_complete" class="select2-single form-control select2-hidden-accessible" name="is_process_complete" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option @if($contact_details->is_process_complete == true ) selected @endif value="1">Completed</option>
                                <option @if($contact_details->is_process_complete == false ) selected @endif value="0">Incomplete</option>
                            </select>
                            @error('is_process_complete')
                            <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-12 col-xl-12">
                            <label for="message">{{ __('message')  }}</label>
                            <textarea type="text" class="form-control" id="message" name="message" readonly> {{ $contact_details->message }} </textarea>
                            @error('message')
                            <small id="message" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label>Discussion</label>
                            <textarea class="summernote-description" name="discussion">{!! $contact_details->discussion !!} </textarea>
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

