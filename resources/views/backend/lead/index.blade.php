@extends('layouts.backend.app')
@push('title')
    {{ __('All leads') }}
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
@endpush

@section('content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Create lead') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Lead create') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="javascript:0" class="btn btn-primary add-btn">{{ __('Create New') }}</a>
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
                <div class="card m-b-30 bg-info">
                    <div class="card-header">
                        <h5 class="card-title">Leads Table</h5>
                    </div>
                    <div class="card-body card-primary">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
                                <tr>

{{--                                    <th>add_by_id</th>--}}
{{--                                    <th>update_by_id</th>--}}
{{--                                    <th>category_id</th>--}}
{{--                                    <th>service_id</th>--}}
{{--                                    <th>district_id</th>--}}
{{--                                    <th>thana_id</th>--}}
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
{{--                                    <th>date_of_birth</th>--}}
{{--                                    <th>gender</th>--}}
{{--                                    <th>is_married</th>--}}
                                    <th>company_name</th>
{{--                                    <th>profession</th>--}}
{{--                                    <th>address</th>--}}
{{--                                    <th>company_website</th>--}}
{{--                                    <th>company_facebook_page</th>--}}
{{--                                    <th>description</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Updated At</th>--}}
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>

                                    {{--                                    <th>add_by_id</th>--}}
                                    {{--                                    <th>update_by_id</th>--}}
                                    {{--                                    <th>category_id</th>--}}
                                    {{--                                    <th>service_id</th>--}}
                                    {{--                                    <th>district_id</th>--}}
                                    {{--                                    <th>thana_id</th>--}}
                                    <th>name</th>
                                    <th>email</th>
                                    <th>phone</th>
                                    {{--                                    <th>date_of_birth</th>--}}
                                    {{--                                    <th>gender</th>--}}
                                    {{--                                    <th>is_married</th>--}}
                                    <th>company_name</th>
                                    {{--                                    <th>profession</th>--}}
                                    {{--                                    <th>address</th>--}}
                                    {{--                                    <th>company_website</th>--}}
                                    {{--                                    <th>company_facebook_page</th>--}}
                                    {{--                                    <th>description</th>--}}
{{--                                    <th>Created At</th>--}}
{{--                                    <th>Updated At</th>--}}
{{--                                    <th>Action</th>--}}
                                </tr>
                                </tfoot>
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
    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('lead.lead.index') !!}',
                columns: [
                    // { data: 'id', name: 'id' },
                    // { data: 'add_by_id', name: 'add_by_id' },
                    // { data: 'update_by_id', name: 'update_by_id' },
                    // { data: 'category_id', name: 'category_id' },
                    // { data: 'service_id', name: 'service_id' },
                    // { data: 'district_id', name: 'district_id' },
                    // { data: 'thana_id', name: 'thana_id' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    // { data: 'date_of_birth', name: 'date_of_birth' },
                    // { data: 'gender', name: 'gender' },
                    // { data: 'is_married', name: 'is_married' },
                    { data: 'company_name', name: 'company_name' },
                    // { data: 'profession', name: 'profession' },
                    // { data: 'address', name: 'address' },
                    // { data: 'company_website', name: 'company_website' },
                    // { data: 'company_facebook_page', name: 'company_facebook_page' },
                    // { data: 'description', name: 'description' },
                    // { data: 'created_at', name: 'created_at' },
                    // { data: 'updated_at', name: 'updated_at' },
                    { data: 'action', name: 'action' },
                ], initComplete: function () {
                    this.api().columns().every(function () {
                        var column = this;
                        var input = document.createElement("input");
                        $(input).appendTo($(column.footer()).empty())
                            .on('change', function () {
                                column.search($(this).val(), false, false, true).draw();
                            });
                    });
                }
            });
        });
    </script>
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>>
@endpush

