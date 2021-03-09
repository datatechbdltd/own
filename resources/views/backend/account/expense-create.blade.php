@extends('layouts.backend.app')
@push('title')
    Create expense
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
                <h4 class="page-title">Create expense</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="javascript:0" class="btn btn-info addCategoryBtn">{{ __('Create Category') }}</a>
                    <a href="{{ route('account.expense.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create expense</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('account.expense.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>Expense category </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="expense_category" id="expense_category" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($expense_categorys as $expense_category)
                                    <option @if(old('expense_category') == $expense_category->id) selected @endif value="{{ $expense_category->id }}">{{ $expense_category->name }}</option>
                                @endforeach
                            </select>
                            @error('expense_category')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <hr class="bg-success">
                        </div>

                        <div class="form-group col-xl-6 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="name" value="{{ old('name') }}">
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="amount" value="{{ old('amount') }}">
                            @error('amount')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group col-12">
                            <label>Description <span class="text-danger">*</span></label>
                            <textarea class="summernote-description" id="description" name="description">{!! old('description') !!}</textarea>
                            @error('description')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-xl-6 col-md-6">
                            <label for="image">Image</label>
                            <input accept="image/*" type="file" class="form-control" id="image" name="image">
                            @error('image')
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
    <div class="modal fade" id="categoryAddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
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

                    @foreach($expense_categorys as $expense_category)
                    <tr>
                        <td>{{  $expense_category->name }}</td>
                        <td> <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('account.expenseCategory.destroy', $expense_category) }}"><i class="fa fa-trash"></i> </button></td>
                     </tr>
                    @endforeach


                </tfoot>
            </table>
            <form action="{{ route('account.expenseCategory.store') }}" method="post" class="row" enctype="multipart/form-data">
                @csrf

                <div class="form-group col-12">
                    <label for="name">Category Name</label>
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
        $(".addCategoryBtn").click(function(){
            // show Modal
            $('#categoryAddModal').modal('show');
        });
    });
</script>

@endpush

