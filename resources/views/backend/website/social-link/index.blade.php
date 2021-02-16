@extends('layouts.backend.app')
@push('title')
Social links
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
            <h4 class="page-title">Social link  table</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="javascript:0">Scial links</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <a href="{{ route('website.socialLink.create') }}" class="btn btn-primary">Create link</a>
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
            <div class="card-header">
                <h5 class="card-title">Basic Table</h5>
            </div>
            <div class="card-body">
                <h6 class="card-subtitle">Just add the base class  <code>.table</code> and
                    <code>&lt;table&gt;</code>.</h6>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Url</th>
                            <th scope="col">Icon</th>
                            <th scope="col">name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($social_links as $link)
                                <tr>
                                    <th>{{ $link->url }}</th>
                                    <td>
                                        <img width="70px;" height="70px;" src="{{ asset($link->icon ?? get_static_option('no_image')) }}" alt="Icon">

                                    </td>
                                    <td>{{ $link->name }}</td>
                                    <td>
                                        @if($link->is_active == true)
                                            <span class="badge badge-success">Active</span>

                                        @else
                                            <span class="badge badge-danger">Inactive</span>
                                        @endif
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
</div>
<!-- End row -->
</div>
<!-- End Contentbar -->
@endsection
@push('script')

@endpush()

