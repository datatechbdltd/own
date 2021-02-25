@extends('layouts.backend.app')
@push('title')
    SMS communication
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
                <h4 class="page-title"> SMS communication</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">sms</a></li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbbar -->
    <!-- Start Contentbar -->
    <div class="contentbar">
        <!-- Start row -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title text-white">Send SMS from official server</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('communication.sendSms') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>Receiver phone number <span class="text-danger">*</span></label>
                            <input type="number" class="form-control col-12" minlength="11" maxlength="11" placeholder="01304 ......" name="phone" value="{{ old('phone') }}" required>
                            @error('phone')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label>Message body <span class="text-danger">*</span></label>
                            <textarea name="message" id="" cols="30" rows="10" class="col-12" placeholder="Write a SMS" required>{{ old('message') }}</textarea>
                            @error('message')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Send now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Message history</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="display table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Sender</th>
                                <th>Message</th>
                                <th>Number</th>
                                <th>Created</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Sender</th>
                                <th>Message</th>
                                <th>Number</th>
                                <th>Created</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End col -->
        <div class="col-md-12 col-lg-12 col-xl-6">
            <div class="card m-b-30">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="card-title mb-0">Latest Order</h5>
                        </div>
                        <div class="col-6">
                            <ul class="list-inline-group text-right mb-0 pl-0">
                                <li class="list-inline-item">
                                    <div class="form-group mb-0 amount-spent-select">
                                        <select class="form-control" id="formControlSelectOrder">
                                            <option>All</option>
                                            <option>Last Week</option>
                                            <option>Last Month</option>
                                        </select>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row">#1</th>
                                <td><img src="assets/panel/vertical/images/users/men.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Andrew Henryson</td>
                                <td>08-04-2019</td>
                                <td>$2,695</td>
                            </tr>
                            <tr>
                                <th scope="row">#2</th>
                                <td><img src="assets/panel/vertical/images/users/women.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Daniel Christopher</td>
                                <td>28-03-2019</td>
                                <td>$1,509</td>
                            </tr>
                            <tr>
                                <th scope="row">#3</th>
                                <td><img src="assets/panel/vertical/images/users/boy.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Alexander Joshua</td>
                                <td>24-03-2019</td>
                                <td>$3,598</td>
                            </tr>
                            <tr>
                                <th scope="row">#4</th>
                                <td><img src="assets/panel/vertical/images/users/girl.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Michael Alexander</td>
                                <td>15-03-2019</td>
                                <td>$786</td>
                            </tr>
                            <tr>
                                <th scope="row">#5</th>
                                <td><img src="assets/panel/vertical/images/users/men.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Samuel William</td>
                                <td>25-02-2019</td>
                                <td>$659</td>
                            </tr>
                            <tr>
                                <th scope="row">#6</th>
                                <td><img src="assets/panel/vertical/images/users/women.svg" class="img-fluid" width="35" alt="customer"></td>
                                <td>Anthony Smith</td>
                                <td>15-01-2019</td>
                                <td>$1,245</td>
                            </tr>
                            <tr>
                                <th scope="row">#7</th>
                                <td><img src="assets/panel/vertical/images/users/boy.svg" class="img-fluid" width="35" alt="men"></td>
                                <td>John Terry</td>
                                <td>29-12-2018</td>
                                <td>$3,695</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                ajax: '{!! route('communication.getSmsSenderPage') !!}',
                columns: [
                    @if(auth()->user()->hasRole('admin'))
                    { data: 'sender', name: 'sender' },
                    @endif
                    { data: 'message', name: 'message' },
                    { data: 'number', name: 'number' },
                    { data: 'created_at', name: 'created_at' },
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
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@endpush

