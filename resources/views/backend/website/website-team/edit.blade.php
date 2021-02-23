@extends('layouts.backend.app')
@push('title')
    Edit team
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
                <h4 class="page-title">Edit team</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteTeam.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit team</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('website.websiteTeam.update', $websiteTeam) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('Patch')
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="name">Name <span class="text-danger">*</span></label>
                            <input value="{{ $websiteTeam->name }}" type="text" name="name" required class="form-control" id="name" >
                            @error('name')
                            <small id="name" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group  col-md-6 col-xl-6">
                            <label for="Status">Status</label>
                            <select id="Status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option @if($websiteTeam->status == true) selected @endif value="1">Active</option>
                                <option @if($websiteTeam->status == false) selected @endif value="0">Inactive</option>
                            </select>
                            @error('status')
                            <small id="status" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 col-xl-6">
                            <label for="designation">Designation</label>
                            <input value="{{ $websiteTeam->designation }}" type="text" name="designation" required class="form-control" id="designation" >
                            @error('designation')
                            <small id="url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="facebook_link">Facebook link</label>
                            <input value="{{ $websiteTeam->facebook_link }}" type="text" name="facebook_link"  class="form-control" id="facebook_link" >
                            @error('facebook_link')
                            <small id="url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="twitter_link">Twitter link </label>
                            <input value="{{ $websiteTeam->twitter_link }}" type="text" name="twitter_link"  class="form-control" id="twitter_link" >
                            @error('twitter_link')
                            <small id="url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="github_link">Github link </label>
                            <input value="{{ $websiteTeam->github_link }}" type="text" name="github_link"  class="form-control" id="github_link" >
                            @error('github_link')
                            <small  class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="linkedin_link">Linkedin link </label>
                            <input value="{{ $websiteTeam->linkedin_link }}" type="text" name="linkedin_link"  class="form-control" id="linkedin_link" >
                            @error('linkedin_link')
                            <small id="url" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="serial">Serial </label>
                            <input value="{{ $websiteTeam->serial }}" type="number" name="serial" required class="form-control" id="serial" >
                            @error('serial')
                            <small id="serial" class="form-text text-muted text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <img width="70px;" height="70px;" class="rounded-circle" src="{{ asset($websiteTeam->image ?? get_static_option('no_image')) }}" alt="">
                            <label for="image">{{ __('Image 365*425 no-background')  }}</label>
                            <input type="file" accept="image/*" class="form-control" id="image" name="image">
                            @error('image')
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

@endpush

