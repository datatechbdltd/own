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
                <h4 class="page-title">Website service  counter</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0">Website service counter</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Static counter options</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('website.websiteCounterUpdate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="level_title">Real members :</label>
                                <input value="{{ get_static_option('real_members') }}"  name="real_members" type="text" class="form-control" id="real_members">
                            </div>
                            <div class="form-group">
                                <label for="level_video_link">Counter highlight :</label>
                                <input value="{{ get_static_option('counter_highlight') }}"  name="counter_highlight" type="text" class="form-control" id="counter_highlight">
                            </div>
                            <div class="form-group">
                                <label for="seo_highlight">Counter description :</label>
                                <textarea required name="counter_description" type="text" class="form-control" id="counter_description">{{ get_static_option('counter_description') }}</textarea>
                            </div>

                            <div class="form-group">
                                <img width="70px;" height="70px;" src="{{ asset(get_static_option('counter_image') ?? get_static_option('no_image')) }}">
                                <label for="level_title">Counter image</label>
                                <input  accept="image/*"   name="counter_image"  type="file" class="form-control" id="counter_image">
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="level_title">Active Clients</label>
                                        <input value="{{ get_static_option('active_clients') }}"  name="active_clients" type="text" class="form-control" id="active_clients">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Active Clients Number</label>
                                        <input value="{{ get_static_option('active_clients_number') }}"  name="active_clients_number" type="text" class="form-control" id="active_clients_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Team advisors</label>
                                        <input value="{{ get_static_option('team_advisors') }}"  name="team_advisors" type="text" class="form-control" id="team_advisors">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Team advisors number</label>
                                        <input value="{{ get_static_option('team_advisors_number') }}"  name="team_advisors_number" type="text" class="form-control" id="team_advisors_number">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="level_title">Projects done</label>
                                        <input value="{{ get_static_option('projects_done') }}"  name="projects_done" type="text" class="form-control" id="projects_done">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Projects done number</label>
                                        <input value="{{ get_static_option('projects_done_number') }}"  name="projects_done_number" type="text" class="form-control" id="projects_done_number">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Glorious years</label>
                                        <input value="{{ get_static_option('glorious_years') }}"  name="glorious_years" type="text" class="form-control" id="glorious_years">
                                    </div>
                                    <div class="form-group">
                                        <label for="level_title">Glorious years number</label>
                                        <input value="{{ get_static_option('glorious_years_number') }}"  name="glorious_years_number" type="text" class="form-control" id="glorious_years_number">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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

