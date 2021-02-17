@extends('layouts.backend.app')
@push('title')
    {{ __('Lead thana') }}
@endpush
@push('meta-description')

@endpush
@push('meta-image')

@endpush
@push('style')

    <!-- DataTables css -->
<link href="{{ asset('assets/panel/vertical/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/panel/vertical/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
<!-- Responsive Datatable css -->
<link href="{{ asset('assets/panel/vertical/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endpush

@section('rightbar-content')
    <!-- Start Breadcrumbbar -->
    <div class="breadcrumbbar">
        <div class="row align-items-center">
            <div class="col-md-8 col-lg-8">
                <h4 class="page-title">{{ __('Create lead thana') }}</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">{{ config('app.name') }}</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ __('Dashboard') }}</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ __('Lead thana create') }}</li>
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
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Thana Table</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="default-datatable" class="display table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Leads</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($thanas as $thana)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td class="name">{{ $thana->name }}</td>
                                    <td class="description">{{ $thana->description }}</td>
                                    <td>{{ $thana->leads->count() ?? '0' }}</td>
                                    <td>
                                        <input type="hidden" class="id" value="{{ $thana->id }}">
                                        <button type="submit" class="btn btn-warning edit-btn">Edit</button>
                                        <button type="submit" class="btn btn-danger" onclick="delete_function(this)" value="{{ route('lead.leadThana.destroy', $thana) }}">Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Leads</th>
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
        <!-- End row -->
    </div>
    <!-- End Contentbar -->
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="varying-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varying-modal-label">Lead Thana</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form">
                        <input type="hidden" id="hidden-id">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name:</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Description:</label>
                            <textarea class="form-control" id="description"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary submit-btn">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.add-btn').click(function() {
            $('#modal-form').trigger("reset");
            $('.submit-btn').val('add');
            $('#modal').modal('show');
        });

        $('.edit-btn').click(function() {
            $('.submit-btn').val('update');
            $('#hidden-id').val($(this).parent().parent().find('.id').val())
            $('#name').val($(this).parent().parent().find('.name').text())
            $('#description').val($(this).parent().parent().find('.description').text())
            $('#modal').modal('show');
        });

        $('.submit-btn').click(function() {
            var url, type = "";
            if ($(this).val() == 'add'){
                url = "{{ route('lead.leadThana.store') }}";
                type= "POST"
            }else{
                url =  "/lead/leadThana/"+$('#hidden-id').val();
                type = "PATCH";
            }
            $.ajax({
                url: url,
                type: type,
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    name: $('#name').val(),
                    description: $('#description').val(),
                },
                beforeSend: function (){
                    $('.submit-btn').prop("disabled",true);
                },
                complete: function (){
                    $('.submit-btn').prop("disabled",false);
                },
                success: function (data) {
                    if (data.type == 'success'){
                        $('#modal').modal('hide');
                        $('#modal-from').trigger("reset");
                        Swal.fire({
                            position: 'top-end',
                            icon: data.type,
                            title: data.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 800);//
                    }else{
                        Swal.fire({
                            icon: data.type,
                            title: 'Oops...',
                            text: data.message,
                            footer: 'Something went wrong!'
                        });
                    }
                },
                error: function (xhr) {
                    var errorMessage = '<div class="card bg-danger">\n' +
                        '                        <div class="card-body text-center p-5">\n' +
                        '                            <span class="text-white">';
                    $.each(xhr.responseJSON.errors, function(key,value) {
                        errorMessage +=(''+value+'<br>');
                    });
                    errorMessage +='</span>\n' +
                        '                        </div>\n' +
                        '                    </div>';
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        footer: errorMessage
                    });
                },
            });
        });


    </script>
    <!-- Datatable js -->
<script src="{{ asset('assets/panel/vertical/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/panel/vertical/js/custom/custom-table-datatable.js') }}"></script>
@endpush

