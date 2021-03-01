@extends('layouts.backend.app')
@push('title')
    Website client
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
                <h4 class="page-title">Website client  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website client</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteClient.create') }}" class="btn btn-primary">Create client</a>
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
                                    <th scope="col">Image</th>
                                    <th scope="col">Company logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($websiteClients as $websiteClient)
                                    <tr>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteClient->image ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteClient->company_logo ?? get_static_option('no_image')) }}" alt="Icon">
                                        </td>
                                        <td>{{ $websiteClient->name }}</td>
                                        <td>{{ $websiteClient->designation }}</td>
                                        <td>{{ $websiteClient->serial }}</td>
                                        <td>
                                            @if($websiteClient->is_active == true)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('website.websiteClient.edit', $websiteClient->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('website.websiteClient.destroy', $websiteClient) }}">Delete</button>
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

