@extends('layouts.backend.app')
@push('title')
   Visitor list
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
                <h4 class="page-title"> Visitor list</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="javascript:0"> Visitor list</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">

            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Asset list</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ip</th>
                                <th>iso_code</th>
                                <th>country</th>
                                <th>city</th>
                                <th>state</th>
                                <th>state_name</th>
                                <th>postal_code</th>
                                <th>lat</th>
                                <th>lon</th>
                                <th>timexone</th>
                                <th>continent</th>
                                <th>currency</th>
                                <th>default</th>
                                <th>cached</th>
                                <th>browser</th>
                                <th>device</th>
                                <th>os</th>
                                <th>Created</th>
                                <th>Url</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>ip</th>
                                <th>iso_code</th>
                                <th>country</th>
                                <th>city</th>
                                <th>state</th>
                                <th>state_name</th>
                                <th>postal_code</th>
                                <th>lat</th>
                                <th>lon</th>
                                <th>timexone</th>
                                <th>continent</th>
                                <th>currency</th>
                                <th>default</th>
                                <th>cached</th>
                                <th>browser</th>
                                <th>device</th>
                                <th>os</th>
                                <th>Created</th>
                                <th>Url</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script>
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('visitorInfo.index') !!}',
                columns: [
                    { data: 'ip', name: 'ip' },
                    { data: 'iso_code', name: 'iso_code' },
                    { data: 'country', name: 'country' },
                    { data: 'city', name: 'city' },
                    { data: 'state', name: 'state' },
                    { data: 'state_name', name: 'state_name' },
                    { data: 'postal_code', name: 'postal_code' },
                    { data: 'lat', name: 'lat' },
                    { data: 'lon', name: 'lon' },
                    { data: 'timexone', name: 'timexone' },
                    { data: 'continent', name: 'continent' },
                    { data: 'currency', name: 'currency' },
                    { data: 'default', name: 'default' },
                    { data: 'cached', name: 'cached' },
                    { data: 'browser', name: 'browser' },
                    { data: 'device', name: 'device' },
                    { data: 'os', name: 'os' },
                    { data: 'create', name: 'create' },
                    { data: 'url', name: 'url' },
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


@endpush

