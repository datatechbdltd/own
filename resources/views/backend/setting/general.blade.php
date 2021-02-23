@extends('layouts.backend.app')
@push('title')
    Update general information
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
                <h4 class="page-title">Update General Information</h4>
                <div class="breadcrumb-list">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#">General</a></li>
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
                    <h5 class="card-title">General Information</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('setting.generalUpdate') }}" enctype="multipart/form-data" method="post" class="row">
                        @csrf
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Reporting email <span class="text-danger">*</span></label>
                            <input type="text" name="reporting_email" required class="form-control"  value="{{ get_static_option('reporting_email') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Reporting phone<span class="text-danger">*</span></label>
                            <input type="text" name="reporting_phone" required class="form-control"   value="{{ get_static_option('reporting_phone') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company name<span class="text-danger">*</span></label>
                            <input type="text" name="company_name" required class="form-control"  value="{{ config('app.name') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company motto<span class="text-danger">*</span></label>
                            <input type="text" name="company_motto" required class="form-control"   value="{{ get_static_option('company_motto') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company email<span class="text-danger">*</span></label>
                            <input type="text" name="company_email" required class="form-control" value="{{ get_static_option('company_email') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company phone<span class="text-danger">*</span></label>
                            <input type="text" name="company_phone" required class="form-control"   value="{{ get_static_option('company_phone') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company address<span class="text-danger">*</span></label>
                            <input type="text" name="company_address" required class="form-control"   value="{{ get_static_option('company_address') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company address district country<span class="text-danger">*</span></label>
                            <input type="text" name="company_address_district_country" required class="form-control" value="{{ get_static_option('company_address_district_country') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Company website address<span class="text-danger">*</span></label>
                            <input type="text" name="company_website_address" required class="form-control"  value="{{ get_static_option('company_website_address') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Website footer credit<span class="text-danger">*</span></label>
                            <input type="text" name="website_footer_credit" required class="form-control"  value="{{ get_static_option('website_footer_credit') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6">
                            <label>Custom website head script</label>
                            <input type="text" name="custom_website_head_script"  class="form-control"  value="{{ get_static_option('custom_website_head_script') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Custom website foot script</label>
                            <input type="text" name="custom_website_foot_script"  class="form-control"  value="{{ get_static_option('custom_website_foot_script') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Is bulk import from website</label>
                            <input type="text" name="is_bulk_import_from_website"  class="form-control"  value="{{ get_static_option('is_bulk_import_from_website') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Is active website contact submission mail to visitor</label>
                            <input type="text" name="is_active_website_contact_submission_mail_to_visitor"  class="form-control"  value="{{ get_static_option('is_active_website_contact_submission_mail_to_visitor') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Is active website contact submission sms to visitor</label>
                            <input type="text" name="is_active_website_contact_submission_sms_to_visitor"  class="form-control"  value="{{ get_static_option('is_active_website_contact_submission_sms_to_visitor') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6">
                            <label>Is active website contact submission sms to office</label>
                            <input type="text" name="is_active_website_contact_submission_sms_to_office"  class="form-control"  value="{{ get_static_option('is_active_website_contact_submission_sms_to_office') }}"/>
                        </div>


                        <div class="form-group col-md-6 col-xl-6">
                            <img height="70px;" width="70px;" src="{{ get_static_option('website_logo') ?? get_static_option('no_image') }}" alt="">
                            <label>Website logo<span class="text-danger">*</span></label>
                            <input accept="image/*" type="file" name="website_logo" class="form-control"  />
                        </div>
                        <div class="form-group col-12">
                            <button type="submit" class="btn btn-primary mr-2">Submit general configuration</button>
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

