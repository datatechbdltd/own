@extends('layouts.backend.app')
@push('title')
    Website service
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
                <h4 class="page-title">Website service  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website service</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.WebsiteService.create') }}" class="btn btn-primary">Create service</a>
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
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Short description</th>
                                    <th scope="col">Long description</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($website_service as $data)
                                    <tr>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($data->icon ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->short_description }}</td>
                                        <td>{{ $data->long_description }}</td>
                                        <td>
                                            @if($data->is_active == true)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('website.WebsiteService.edit', $data->id) }}" class="btn btn-info mb-2"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger delete-btn" onclick="delete_function(this)" value="{{ route('website.WebsiteService.destroy',$data->id) }}">Delete</button>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Static service options</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('website.websiteServiceStaticOptionUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="level_title">Our service :</label>
                                <input value="{{ get_static_option('our_service') }}"  name="our_service" type="text" class="form-control" id="our_service">
                            </div>
                            <div class="form-group">
                                <label for="level_video_link">Service highlight :</label>
                                <input value="{{ get_static_option('service_highlight') }}"  name="service_highlight" type="text" class="form-control" id="service_highlight">
                            </div>
                            <div class="form-group">
                                <label for="seo_highlight">Service description :</label>
                                <textarea required name="service_description" type="text" class="form-control" id="service_description">{{ get_static_option('service_description') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="level_title">Service link :</label>
                                <input value="{{ get_static_option('service_link') }}"  name="service_link" type="text" class="form-control" id="service_link">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush()

