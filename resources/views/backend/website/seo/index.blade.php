@extends('layouts.backend.app')
@push('title')
   Website seo
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
                <h4 class="page-title">Website seo  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website seo</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteSeo.create') }}" class="btn btn-primary">Create Seo</a>
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
                                    <th scope="col">Text</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($website_seos as $data)
                                    <tr>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($data->icon ?? get_static_option('no_image')) }}" alt="Icon">

                                        </td>
                                        <td>{{ $data->text }}</td>
                                        <td>
                                            @if($data->is_active == true)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('website.websiteSeo.edit', $data->id) }}" class="btn btn-info mb-2"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger delete-btn" onclick="delete_function(this)" value="{{ route('website.websiteSeo.destroy',$data->id) }}">Delete</button>

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
                        <h5 class="card-title">Static Seo options</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('website.websiteSeoStaticOptionUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="level_title">Level title :</label>
                                <input value="{{ get_static_option('level_title') }}"  name="level_title" type="text" class="form-control" id="level_title">
                            </div>
                            <div class="form-group">
                                <label for="level_video_link">Level video link :</label>
                                <input value="{{ get_static_option('level_video_link') }}"  name="level_video_link" type="text" class="form-control" id="level_video_link">
                            </div>
                            <div class="form-group">
                                <img width="80px;" height="80px;" src="{{ get_static_option('level_image') ?? get_static_option('no_image') }}" alt="">
                                <label for="level_image">Level image :</label>
                                <input accept="image/*" name="level_image" type="file" class="form-control" id="level_image">
                            </div>
                            <div class="form-group">
                                <label for="who_we_are">Who we are :</label>
                                <input value="{{ get_static_option('who_we_are') }}" name="who_we_are" type="text" class="form-control" id="who_we_are">
                            </div>
                            <div class="form-group">
                                <label for="seo_highlight">Seo highlight :</label>
                                <textarea name="seo_highlight" type="text" class="form-control" id="seo_highlight">{{ get_static_option('seo_highlight') }}</textarea>

                            </div>
                            <div class="form-group">
                                <label for="seo_description">Seo description :</label>
                                <textarea name="seo_description" type="text" class="form-control" id="seo_description">{{ get_static_option('seo_description') }}</textarea>

                            </div>
                            <div class="form-group">
                                <img width="80px;" height="80px;" src="{{ get_static_option('seo_image') ?? get_static_option('no_image') }}" alt="">
                                <label for="Icon">Image :</label>
                                <input accept="image/*" name="seo_image" type="file" class="form-control" id="image">
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

