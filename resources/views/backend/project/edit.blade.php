@extends('layouts.backend.app')
@push('title')
    Edit project
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
                <h4 class="page-title">Edit project</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">Edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="javascript:0" class="btn btn-info addProjectStatusBtn">{{ __('Project Status') }}</a>
                    <a href="{{ route('project.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit project</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('project.update', $project) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-12">
                            <label>Invoice </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="invoice" id="invoice" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($invoices as $invoice)
                                    <option @if($project->invoice_id == $invoice->id) selected @endif value="{{ $invoice->id }}">{{ $invoice->invoice_id }}</option>
                                @endforeach
                            </select>
                            @error('invoice')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label> Project status </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="project_status" id="project_status" data-select2-id="3" tabindex="-3" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($project_statuses as $project_status)
                                    <option @if($project->status_id == $project_status->id) selected @endif value="{{ $project_status->id }}">{{ $project_status->name }}</option>
                                @endforeach
                            </select>
                            @error('project_status')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ $project->name }}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="project_id">Project id</label>
                            <input type="text" class="form-control" id="project_id" name="project_id" placeholder="Project id" value="{{ $project->project_id }}">
                            @error('project_id')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Description </label>
                            <textarea class="summernote-description" id="description" name="description">{!! $project->description !!}</textarea>
                            @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Agreement </label>
                            <textarea class="summernote-description" id="agreement" name="agreement">{!! $project->agreement !!}</textarea>
                            @error('agreement')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="image">Image</label>
                            <img  class="rounded-circle"  height="70px;" width="70px;" src="{{ asset($project->image ?? get_static_option('no_image')) }}" alt="">
                            <input accept="image/*" type="file" class="form-control" id="image" name="image">
                            @error('image')image
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12" id="income-save-btn">SAVE</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
    <!-- Modal -->
    <div class="modal fade" id="projectStatusModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Offline Payment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>

                    @foreach($project_statuses as $project_status)
                    <tr>
                        <td>{{  $project_status->name }}</td>
                        <td> <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('projectStatus.destroy', $project_status) }}"><i class="fa fa-trash"></i> </button></td>
                     </tr>
                    @endforeach
                </tfoot>
            </table>
            <form action="{{ route('projectStatus.store') }}" method="post" class="row" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                    @error('name')
                    <div class="alert alert-danger" role="alert">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-group col-12">
                    <button type="submit" class="btn btn-success mr-1 col-12" id="save-category">SAVE</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
@endsection
@push('script')

<script>
    $(document).ready(function () {
        $(".addProjectStatusBtn").click(function(){
            // show Modal
            $('#projectStatusModal').modal('show');
        });
    });
</script>
@endpush

