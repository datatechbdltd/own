@extends('layouts.backend.app')
@push('title')
    Website counter
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
                <h4 class="page-title">Website counter  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website counter</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteCounter.create') }}" class="btn btn-primary">Create counter</a>
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
                                    <th scope="col">title</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($websiteCounters as $websiteCounter)
                                    <tr>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteCounter->image ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>{{ $websiteCounter->title }}</td>
                                        <td>{{ $websiteCounter->number }}</td>
                                        <td>{{ $websiteCounter->serial }}</td>
                                        <td>
                                            @if($websiteCounter->status == true)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('website.websiteCounter.edit', $websiteCounter->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i>Edit</a>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('website.websiteCounter.destroy', $websiteCounter) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

