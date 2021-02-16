@extends('layouts.backend.app')
@push('title')

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
                <h4 class="page-title">Social link create</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Social link create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.socialLink.index') }}" class="btn btn-primary">Link list</a>
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
                <form action="{{ route('website.socialLink.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Url :</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <input required type="text" class="form-control" name="url" id="Url" placeholder="Url">
                            </div>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title">Name :</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-0">
                                <input required type="text" class="form-control" name="name" id="Name" placeholder="Name">
                            </div>
                        </div>
                        <div class="card-header">
                            <h5 class="card-title">Status :</h5>
                        </div>
                        <div class="card-body">
                            <select class="select2-single form-control select2-hidden-accessible" name="status" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                            </select>
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

