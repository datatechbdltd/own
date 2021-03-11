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
                    <a href="{{ route('lead.lead.create') }}" class="btn btn-primary add-btn">{{ __('Create New') }}</a>
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
                <div class="card m-b-30 bg-danger">
                    <div class="card-header">
                        <h5 class="card-title">Leads Table</h5>
                    </div>
                    <div class="card-body card-primary">
                        <div class="row m-4">
                            <div class="col-6">
                                <button type="button" class="btn btn-info btn-lg btn-block select-all" value="">Select all</button>
                            </div>
                            <div class="col-6">
                                <button type="button" class="btn btn-danger btn-lg btn-block un-select-all" value="">Un select all</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>All</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company_name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                    {{-- data imported by ajax --}}
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>All</th>
                                    <th>Category</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Company name</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Select group</h5>
                    </div>
                    <div class="card-body row">
                        <div class="input-group m-3">
                            <input type="text" class="form-control bg-white text-dark" id="new-category-name" placeholder="New category name">
                            <div class="input-group-append">
                                <button class="btn btn-danger" type="button" id="add-category-btn">Add New</button>
                            </div>
                        </div>
                        @foreach (lead_categories() as $category)
                        <div class="input-group col-xl-4 col-md-4">
                            <button type="button" class="form-group btn btn-success btn-block selected-lead-category-change" value="{{  $category->id }}">{{  $category->name }} <b class="text-danger">({{  $category->leads->count() }})</b></button>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- End row -->
    </div>
    <!-- End Contentbar -->

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="varying-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="varying-modal-label">Change category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="modal-form">
                        <input type="hidden" id="hidden-value">
                        <select name="category" id="category" class="form-control">
                            {{--Insert by ajax--}}
                        </select>
                        <hr>
                        <button type="submit" class="btn btn-danger submit-btn form-control">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="PhoneNumberChangeModal" tabindex="-1" role="dialog" aria-labelledby="varying-modal-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="m-title">Change category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="phone-modal-form">
                        <input type="hidden" id="lead_id">
                        <div class="form-group mt-3">
                            <label for="phone" >Phone</label>
                            <input type="hidden" id="lead_id" name="lead_id"  class="form-control" />
                            <input type="text" id="phone" required name="phone"  class="form-control" />
                        </div>
                        <hr>
                        <button type="submit" class="btn btn-danger phone-submit-btn form-control">Submit</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $('.selected-lead-category-change').click(function (){
            var category_id = $(this).val();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change category !'
            }).then((result) => {
                if (result.isConfirmed) {
                    var ids = []
                    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].value != 'null'){
                            ids.push(checkboxes[i].value)
                        }
                    }
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('lead.leadCategoryUpdate') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: { leads: ids, category_id :category_id},
                        dataType: 'JSON',
                        beforeSend: function (){
                            $(".selected-lead-category-change").prop("disabled",true);
                        },
                        complete: function (){
                            $(".selected-lead-category-change").prop("disabled",false);
                        },
                        success: function (response) {
                            if (response.type == 'success'){
                                Swal.fire(
                                    'Updated!',
                                    'Your file has been updated.',
                                    'success'
                                ), setTimeout(function() {
                                    //your code to be executed after 1 second
                                    location.reload();
                                }, 500); //1 second
                            }else{
                                Swal.fire(
                                    'Updated!',
                                    response.message,
                                    response.type
                                )
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
                            })
                        },
                    })
                }
            })
        });

        $('#add-category-btn').click(function (){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, change category !'
            }).then((result) => {
                if (result.isConfirmed) {
                    var ids = []
                    var checkboxes = document.querySelectorAll('input[type=checkbox]:checked')
                    for (var i = 0; i < checkboxes.length; i++) {
                        if (checkboxes[i].value != 'null'){
                            ids.push(checkboxes[i].value)
                        }
                    }
                    $.ajax({
                        method: 'POST',
                        url: "{{ route('lead.leadCategoryAddWithLeads') }}",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        data: { leads: ids, category : $('#new-category-name').val()},
                        dataType: 'JSON',
                        beforeSend: function (){
                            $("#add-category-btn").prop("disabled",true);
                        },
                        complete: function (){
                            $("#add-category-btn").prop("disabled",false);
                        },
                        success: function (response) {
                            if (response.type == 'success'){
                                Swal.fire(
                                    'Updated!',
                                    'Your file has been updated.',
                                    'success'
                                )
                            }else{
                                Swal.fire(
                                    'Updated!',
                                    response.message,
                                    response.type
                                )
                            }setTimeout(function() {
                                //your code to be executed after 1 second
                                location.reload();
                            }, 500); //1 second
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
                            })
                        },
                    })
                }
            })
        });

        function SetPhone(lead,old_phone){
            $('#PhoneNumberChangeModal').modal('show')
            $('#m-title').text('Change Phone')
            $('#phone').val(old_phone)
            $('#lead_id').val(lead)
        }

        $('.phone-submit-btn').click(function() {
            $.ajax({
                url: 'lead/lead/change-phone',
                type: 'post',
                cache: false,
                data:{
                    _token:'{{ csrf_token() }}',
                    phone: $('#phone').val(),
                    lead:  $('#lead_id').val()
                },
                beforeSend: function (){
                    $('.phone-submit-btn').prop("disabled",true);
                },
                complete: function (){
                    $('.phone-submit-btn').prop("disabled",false);
                },
                success: function (data) {
                    if (data.type == 'success'){
                        $('#PhoneNumberChangeModal').modal('hide');
                        $('#phone-modal-form').trigger("reset");
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
                @if(Route::is('lead.lead.index'))
                ajax: '{!! route('lead.lead.index') !!}',
                @else
                ajax: '/lead/getByCategory/{!! $lead_category_id !!}',
                @endif
                columns: [
                    { data: 'All', name: 'All' },
                    { data: 'category', name: 'category' },
                    { data: 'name', name: 'name' },
                    { data: 'email', name: 'email' },
                    { data: 'phone', name: 'phone' },
                    { data: 'company_name', name: 'company_name' },
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
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
@endpush

