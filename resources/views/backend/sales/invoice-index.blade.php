@extends('layouts.backend.app')
@push('title')
    Invoice
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
                <h4 class="page-title"> Invoice</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Invoice</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('sales.invoice.create') }}" class="btn btn-primary">{{ __('Create') }}</a>
                </div>
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
                    <h5 class="card-title">Invoice</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Payment</th>
                                <th>Create</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Invoice</th>
                                <th>Customer</th>
                                <th>Payment</th>
                                <th>Create</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
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
                ajax: '{!! route('sales.invoice.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'customer', name: 'customer' },
                    { data: 'payment', name: 'payment' },
                    { data: 'create', name: 'create' },
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
        function copy_function(objButton){
            var url = objButton.value;

            var $temp = $("<input>");
            $("body").append($temp);

            $temp.val(url).select();
            document.execCommand("copy");
            $temp.remove();
            // $(this).html('Copied');

            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Text copied',
                showConfirmButton: false,
                timer: 1500
            })
        }
    </script>
@endpush

