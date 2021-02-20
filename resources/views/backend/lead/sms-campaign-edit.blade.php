@extends('layouts.backend.app')
@push('title')
    Edit sms campaign
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
                <h4 class="page-title">Edit sms campaign</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">edit</a></li>
                    </ol>
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="widgetbar">
                    <a href="{{ route('campaign.smsCampaign.index') }}" class="btn btn-primary">{{ __('Back to list') }}</a>
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
                    <h5 class="card-title">Edit sms campaign</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('campaign.smsCampaign.update', $smsCampaign) }}" method="post" class="row" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-group col-md-6 col-xl-6">
                            <label for="category">Category <span class="text-danger">*</span></label>
                            <select name="category" required class="form-control" id="category">
                                <option value="" selected> Chose category</option>
                                @foreach($categories as $category)
                                <option @if($category->id == $smsCampaign->category_id) selected class="bg-success" @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Auto run at<span class="text-danger">*</span></label>
                            <div class="input-group-prepend form-group col-md-6 col-xl-6">
                                <div class="input-group-text">
                                    <input type="checkbox" aria-label="Checkbox for following text input" name="is_auto_run" value="1" @if($smsCampaign->auto_run_at) checked @endif>
                                </div>
                                <input type="time" class="form-control" name="auto_run_at" aria-label="Text input with checkbox" value="{{ $smsCampaign->auto_run_at }}">
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label>Message <span class="text-danger">*</span></label>
                            <textarea id="" rows="5" class="form-control" name="message" >{{ $smsCampaign->message }}</textarea>
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-warning mr-1 col-12">Update now</button>
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

