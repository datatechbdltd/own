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
                                    <th>Message</th>
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
                                    <th>Message</th>

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
                    <h5 class="modal-title" id="varying-modal-label">Lead District</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form">
                        <input type="hidden" id="hidden-id">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select id="category" class="form-control">
                                <option selected="">Choose...</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-form-label">Message:</label>
                            <textarea class="form-control" id="message" rows="5"></textarea>
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

        function edit(sms_campaign_id){
            $('.submit-btn').val('update');
            $('#hidden-id').val(sms_campaign_id)
            $('#modal').modal('show');
        };

        function sendMessage(sms_campaign_id){
           alert(sms_campaign_id);
        };

        $('.submit-btn').click(function() {
            var url, type = "";
            if ($(this).val() == 'add'){
                url = "{{ route('campaign.emailCampaign.store') }}";
                type= "POST"
            }else{
                url =  "/campaign/emailCampaign/"+$('#hidden-id').val();
                type = "PATCH";
            }
            $.ajax({
                url: url,
                type: type,
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    category: $('#category').val(),
                    message: $('#message').val(),
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
                    { data: 'message', name: 'message' },
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

