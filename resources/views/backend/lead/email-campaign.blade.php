@extends('layouts.backend.app')
@push('title')
    {{ __('Email Marketing') }}
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
                <h4 class="page-title">{{ __('Create Email campaign') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Email campaign') }}</li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('campaign.emailCampaign.create') }}" class="btn btn-primary">{{ __('Create New') }}</a>
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
                        <h5 class="card-title">Email campaign</h5>
                    </div>
                    <div class="card-body card-primary">
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Repeat</th>
                                    <th>Category</th>
                                    <th>Auto run at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Repeat</th>
                                    <th>Category</th>
                                    <th>Auto run at</th>
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
                ajax: '{!! route('campaign.emailCampaign.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'repeat', name: 'repeat' },
                    { data: 'category', name: 'category' },
                    { data: 'auto_run_at', name: 'auto_run_at' },
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

