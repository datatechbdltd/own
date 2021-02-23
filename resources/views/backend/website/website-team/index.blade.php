@extends('layouts.backend.app')
@push('title')
    Website team
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
                <h4 class="page-title">Website team  table</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website team</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('website.websiteTeam.create') }}" class="btn btn-primary">Create team</a>
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
                                    <th scope="col">Name</th>
                                    <th scope="col">Designation</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Serial</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($websiteTeams as $websiteTeam)
                                    <tr>
                                        <td>{{ $websiteTeam->name }}</td>
                                        <td>{{ $websiteTeam->designation }}</td>
                                        <td>
                                            <img width="70px;" height="70px;" src="{{ asset($websiteTeam->image ?? get_static_option('no_image')) }}" alt="Image">
                                        </td>
                                        <td>{{ $websiteTeam->serial }}</td>
                                        <td>
                                            @if($websiteTeam->status == true)
                                                <span class="badge badge-success">Active</span>

                                            @else
                                                <span class="badge badge-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('website.websiteTeam.edit', $websiteTeam->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                            <button class="text-white btn btn-danger " onclick="delete_function(this)" value="{{ route('website.websiteTeam.destroy', $websiteTeam) }}">Delete</button>
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
                        <h5 class="card-title">Static team options</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('website.websiteTeamStaticOptionUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="team_title">Team title :</label>
                                <input value="{{ get_static_option('team_title') }}"  name="team_title" type="text" class="form-control" id="team_title">
                            </div>
                            <div class="form-group">
                                <label for="team_highlight">Team highlight :</label>
                                <input value="{{ get_static_option('team_highlight') }}"  name="team_highlight" type="text" class="form-control" id="team_highlight">
                            </div>
                            <div class="form-group">
                                <label for="team_description">Team description :</label>
                                <textarea required name="team_description" type="text" class="form-control" id="team_description">{{ get_static_option('team_description') }}</textarea>
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

@endpush

