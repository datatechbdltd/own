@extends('layouts.backend.app')
@push('title')
    Create payment
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
                <h4 class="page-title">Create payment</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="javascript:0" class="btn btn-info addOfflinePaymentBtn">{{ __('Offline Payment Method') }}</a>
                    <a href="{{ route('sales.payment.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create payment</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('sales.payment.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-12">
                            <label>Select offline method </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="offline_payment_method" id="offline_payment_method" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($offline_payment_methods  as $offline_payment_method)
                                    <option @if(old('offline_payment_method') == $offline_payment_method->id) selected @endif value="{{ $offline_payment_method->id }}">{{ $offline_payment_method->name }}</option>
                                @endforeach
                            </select>
                            @error('offline_payment_method')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label>Select invoice </label>
                            <select class="select2-single form-control select2-hidden-accessible" name="invoice" id="invoice" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                <option value="">Select</option>
                                @foreach($invoices  as $invoice)
                                    <option @if(old('invoice') == $invoice->id) selected @endif value="{{ $invoice->id }}">{{ $invoice->invoice_id }}</option>
                                @endforeach
                            </select>
                            @error('offline_payment_method')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group col-12">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" placeholder="Amount" value="{{ old('amount') }}">
                            @error('amount')
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
    <div class="modal fade" id="offlinePaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>

                    @foreach($offline_payment_methods as $offline_payment_method)
                    <tr>
                        <td>{{  $offline_payment_method->name }}</td>
                        <td>{{  $offline_payment_method->description }}</td>
                        <td> <button class="btn btn-danger" onclick="delete_function(this)" value="{{ route('sales.offlinePaymentMethod.destroy', $offline_payment_method) }}"><i class="fa fa-trash"></i> </button></td>
                     </tr>
                    @endforeach


                </tfoot>
            </table>
            <form action="{{ route('sales.offlinePaymentMethod.store') }}" method="post" class="row" enctype="multipart/form-data">
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
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="4" class="col-12" placeholder="Description.." required>{{ old('description') }}</textarea>
                    @error('description')
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
        $(".addOfflinePaymentBtn").click(function(){
            // show Modal
            $('#offlinePaymentModal').modal('show');
        });
    });
</script>

@endpush

