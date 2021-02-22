@extends('layouts.backend.app')
@push('title')
    Create Lead
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
                <h4 class="page-title">Create lead</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">create</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('lead.lead.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Create email campaign</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('lead.lead.store') }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select name="category" required class="form-control" id="category">
                                <option value="" selected> Chose category</option>
                                @foreach($categories as $category)
                                <option @if(old('category') == $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-success mr-1 col-12">Create now</button>
                        </div>
                    </form>
                    <hr>
                    <hr>
                    <form action="{{ route('frontend.importLead') }}" method="POST" enctype="multipart/form-data" class="text-center">
                        @csrf
                        <div class="form-group col">
                            <level><b class="text-danger">Chose import file (.xlsx)</b> <i><a href="{{ url('/'. get_static_option('sample_leads_with_category')) }}">Sample file</a></i></level>
                            <br>
                            <input type="file" accept=".xlsx" name="file">
                            @error('file')
                            <div class="text-danger"><b>{{ $message }}</b></div>
                            @enderror
                        </div>
                        <div class="form-group col">
                            <button type="submit" class="btn btn-danger mr-1 col-12">Import now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Contentbar -->
@endsection
@push('script')

@endpush

