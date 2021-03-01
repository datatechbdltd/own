@extends('layouts.backend.app')
@push('title')
    Update contact page information
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
                <h4 class="page-title">Update contact page information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">contact page</a></li>
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
                    <h5 class="card-title">Contact page information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.contactPageInfoUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Contact heading</label>
                            <input value="{{ get_static_option('contact_heading') }}" type="text" name="contact_heading"  class="form-control" rows="10"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Contact highlight</label>
                            <input  value="{{ get_static_option('contact_highlight') }}"  type="text" name="contact_highlight"  class="form-control" rows="10"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Contact description</label>
                            <input  value="{{ get_static_option('contact_description') }}"  type="text" name="contact_description"  class="form-control" rows="10"/>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit contact page info</button>
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

