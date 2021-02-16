@extends('layouts.backend.app')
@push('title')
    Website seo create
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
                <h4 class="page-title">Website seo create</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Website seo create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.seo.index') }}" class="btn btn-primary">Website seo list</a>
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
                        <h5 class="card-title">Basic Form</h5>
                    </div>
                    <div class="card-body">
                        <h6 class="card-subtitle">Here’s a quick example to demonstrate Bootstrap’s form styles. Keep reading for documentation on required classes, form layout, and more.</h6>
                        <form action="{{ route('website.seo.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                            <div class="form-group">
                                <label for="Text">Text :</label>
                                <textarea name="text" type="text" class="form-control" id="Text" placeholder="Password"></textarea>

                            </div>
                            <div class="form-group">
                                <label for="Status">Status :</label>
                                <select id="Status" class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                            </div>
                            <div class="form-group">
                                <label for="Icon">Icon :</label>
                                <input name="file" type="text" class="form-control" id="Icon" placeholder="Icon">

                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>





            <div class="col-lg-10">
                <form action="{{ route('website.seo.store') }}" method="post" enctype="multipart/form-data">
                    @csrf




                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <textarea name="text" id="Text"  rows="3"></textarea>
                            </div>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title"></h5>
                        </div>
                        <div class="card-body">

                        </div>
                        <div class="card-header">
                            <h5 class="card-title">Icon :</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <input type="file" required class="form-control" name="icon" id="Icon" placeholder="Icon">
                            </div>
                        </div>
                        <button  type="submit" class=" btn btn-success" >Submit</button>
                    </div>
                </form>
            </div>

            <!-- End col -->
        </div> <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush()

