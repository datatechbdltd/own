@extends('layouts.backend.app')
@push('title')
    Website seo edit
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

@endpush

@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">Website seo edit</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Website seo edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteSeo.index') }}" class="btn btn-primary">Website seo list</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row offset-lg-1">
            <!-- Start col -->
            <div class="col-lg-10">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Seo edit</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('website.websiteSeo.update', $websiteSeo->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="Text">Text :</label>
                                <textarea required name="text" type="text" class="form-control" id="Text" placeholder="Text">{{ $websiteSeo->text }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="Status">Status :</label>
                                <select id="Status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option @if($websiteSeo->is_active == true) selected @endif value="1">Active</option>
                                    <option @if($websiteSeo->is_active == false) selected @endif value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <img width="80px;" height="80px;" src="{{ asset($websiteSeo->icon ?? get_static_option('no_image')) }}" alt="">
                                <label for="Icon">Icon :</label>
                                <input accept="image/*" name="icon" type="file" class="form-control" id="Icon" placeholder="Icon">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div> <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush()

