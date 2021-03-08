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
    <!-- Select2 css -->
    <link href="{{ asset('assets/panel/vertical/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Tagsinput css -->
    <link href="{{ asset('assets/panel/vertical/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/panel/vertical/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css') }}" rel="stylesheet" type="text/css" />
    <!-- Summernote css -->
    <link href="{{ asset('assets/panel/vertical/plugins/summernote/summernote-bs4.css') }}" rel="stylesheet" type="text/css">
    <!-- Code Mirror css -->
    <link href="{{ asset('assets/panel/vertical/plugins/code-mirror/codemirror.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/panel/vertical/plugins/code-mirror/hopscotch.css') }}" rel="stylesheet" type="text/css">
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
                    <form action="{{ route('account.income.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-xl-4 col-md-4">
                            <label>Customer </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="customer" id="customer" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option >Select</option>
                                @foreach($customers as $customer)
                                    <option @if(old('customer') == $customer->id) selected @endif value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                            @error('customer')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label> Service</label>
                            <select class="select2-single form-control select2-hidden-accessible" name="service" id="service" data-select2-id="2" tabindex="-2" aria-hidden="true">
                                <option>Select</option>
                                @foreach($services as $service)
                                    <option @if(old('service') == $service->id) selected @endif value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label> Product </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="product" id="product" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                <option>Select</option>
                                @foreach($products as $product)
                                    <option @if(old('product') == $product->id) selected @endif value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label>Message body <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="description" name="description">{{ old('description') }}</textarea>
                            @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label for="price">Price<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Price" value="{{ old('price') }}">
                            @error('price')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-4 col-md-4">
                            <label for="price">Paid amount<span class="text-danger">*</span></label>
                            <input type="number" class="form-control" id="paid_amount" placeholder="Paid amount" name="paid_amount" value="{{ old('paid_amount') }}">
                            @error('paid_amount')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-3 col-md-3">
                            <label>Payment method <span class="text-danger">*</span></label>
                            <select class="select2-single form-control select2-hidden-accessible" name="payment_method" id="payment_method" data-select2-id="4" tabindex="-1" aria-hidden="true">
                                <option>Select</option>
                                @foreach($offlinePaymentMethods as $offlinePaymentMethod)
                                    <option @if(old('payment_method') == $offlinePaymentMethod->id) selected @endif value="{{ $offlinePaymentMethod->id }}">{{ $offlinePaymentMethod->name }}</option>
                                @endforeach
                            </select>
                            @error('payment_method')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-1 col-md-1">
                            <label for="price">VAT</label>
                            <input type="number" class="form-control" id="vat" placeholder="VAT" name="vat" value="{{ old('vat') }}">
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12" id="income-save-btn">SAVE</button>
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
                                <th>#</th>
                                <th>Payment</th>
                                <th>Customer</th>
                                <th>Service product</th>
                                <th>Create</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Payment</th>
                                <th>Customer</th>
                                <th>Service product</th>
                                <th>Create</th>
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
    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/panel/vertical/plugins/select2/select2.min.js') }}"></script>
    <!-- Tagsinput js -->
    <script src="{{ asset('assets/panel/vertical/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/bootstrap-tagsinput/typeahead.bundle.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-form-select.js') }}"></script>
    <!-- Wysiwig js -->
    <script src="{{ asset('assets/panel/vertical/plugins/tinymce/tinymce.min.js') }}"></script>
    <!-- Summernote JS -->
    <script src="{{ asset('assets/panel/vertical/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- Code Mirror JS -->
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/codemirror.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/htmlmixed.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/css.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/javascript.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/plugins/code-mirror/xml.js') }}"></script>
    <script src="{{ asset('assets/panel/vertical/js/custom/custom-form-editor.js') }}"></script>
    <script>
        {{--$('#income-save-btn').click(function() {--}}
        {{--    console.log( $("[name='description']").val())--}}
        {{--    $.ajax({--}}
        {{--        url: "{{ route('account.income.store') }}",--}}
        {{--        type: "POST",--}}
        {{--        cache: false,--}}
        {{--        data:{--}}
        {{--            _token:'{{ csrf_token() }}',--}}
        {{--            customer: $('#customer').val(),--}}
        {{--            service: $('#service').val(),--}}
        {{--            product: $('#product').val(),--}}
        {{--            description: $('#tinymce-example').val(),--}}
        {{--            price: $('#price').val(),--}}
        {{--            paid_amount: $('#paid_amount').val(),--}}
        {{--            payment_method: $('#payment_method').val(),--}}
        {{--            vat: $('#vat').val(),--}}
        {{--        },--}}
        {{--        beforeSend: function (){--}}
        {{--            $('#income-save-btn').prop("disabled",true);--}}
        {{--        },--}}
        {{--        complete: function (){--}}
        {{--            $('#income-save-btn').prop("disabled",false);--}}
        {{--        },--}}
        {{--        success: function (data) {--}}
        {{--            if (data.type == 'success'){--}}
        {{--                $('#modal').modal('hide');--}}
        {{--                $('#modal-from').trigger("reset");--}}
        {{--                Swal.fire({--}}
        {{--                    position: 'top-end',--}}
        {{--                    icon: data.type,--}}
        {{--                    title: data.message,--}}
        {{--                    showConfirmButton: false,--}}
        {{--                    timer: 1500--}}
        {{--                });--}}
        {{--                setTimeout(function() {--}}
        {{--                    location.reload();--}}
        {{--                }, 800);//--}}
        {{--            }else{--}}
        {{--                Swal.fire({--}}
        {{--                    icon: data.type,--}}
        {{--                    title: 'Oops...',--}}
        {{--                    text: data.message,--}}
        {{--                    footer: 'Something went wrong!'--}}
        {{--                });--}}
        {{--            }--}}
        {{--        },--}}
        {{--        error: function (xhr) {--}}
        {{--            var errorMessage = '<div class="card bg-danger">\n' +--}}
        {{--                '                        <div class="card-body text-center p-5">\n' +--}}
        {{--                '                            <span class="text-white">';--}}
        {{--            $.each(xhr.responseJSON.errors, function(key,value) {--}}
        {{--                errorMessage +=(''+value+'<br>');--}}
        {{--            });--}}
        {{--            errorMessage +='</span>\n' +--}}
        {{--                '                        </div>\n' +--}}
        {{--                '                    </div>';--}}
        {{--            Swal.fire({--}}
        {{--                icon: 'error',--}}
        {{--                title: 'Oops...',--}}
        {{--                footer: errorMessage--}}
        {{--            });--}}
        {{--        },--}}
        {{--    });--}}
        {{--});--}}
        $(function() {
            $('#datatable').DataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('account.income.index') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'payment', name: 'payment' },
                    { data: 'customer', name: 'customer' },
                    { data: 'service_product', name: 'service_product' },
                    { data: 'create', name: 'create' },
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

