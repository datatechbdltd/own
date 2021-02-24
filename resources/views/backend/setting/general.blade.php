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
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Reporting email <span class="text-danger">*</span></label>
                            <input type="text" name="reporting_email"  class="form-control"  value="{{ get_static_option('reporting_email') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Reporting phone<span class="text-danger">*</span></label>
                            <input type="text" name="reporting_phone"  class="form-control"   value="{{ get_static_option('reporting_phone') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company name<span class="text-danger">*</span></label>
                            <input type="text" name="company_name"  class="form-control"  value="{{ config('app.name') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company motto<span class="text-danger">*</span></label>
                            <input type="text" name="company_motto"  class="form-control"   value="{{ get_static_option('company_motto') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company email<span class="text-danger">*</span></label>
                            <input type="text" name="company_email"  class="form-control" value="{{ get_static_option('company_email') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company phone<span class="text-danger">*</span></label>
                            <input type="text" name="company_phone"  class="form-control"   value="{{ get_static_option('company_phone') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company address<span class="text-danger">*</span></label>
                            <input type="text" name="company_address"  class="form-control"   value="{{ get_static_option('company_address') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company address district country<span class="text-danger">*</span></label>
                            <input type="text" name="company_address_district_country"  class="form-control" value="{{ get_static_option('company_address_district_country') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company website address<span class="text-danger">*</span></label>
                            <input type="text" name="company_website_address"  class="form-control"  value="{{ get_static_option('company_website_address') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Website footer credit<span class="text-danger">*</span></label>
                            <input type="text" name="website_footer_credit"  class="form-control"  value="{{ get_static_option('website_footer_credit') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                           <label>Custom website head script</label>
                           <textarea type="text" name="custom_website_head_script"  class="form-control" rows="10"/>{{ get_static_option('custom_website_head_script') }}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Custom website foot script</label>
                            <textarea type="text" name="custom_website_foot_script"  class="form-control" rows="10"/>{{ get_static_option('custom_website_foot_script') }}</textarea>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company facebook link</label>
                            <input type="text" name="company_facebook_link"  class="form-control"  value="{{ get_static_option('company_facebook_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company linkedin link</label>
                            <input type="text" name="company_linkedin_link"  class="form-control"  value="{{ get_static_option('company_linkedin_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company twitter link</label>
                            <input type="text" name="company_twitter_link"  class="form-control"  value="{{ get_static_option('company_twitter_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company github link</label>
                            <input type="text" name="company_github_link"  class="form-control"  value="{{ get_static_option('company_github_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company instagram link</label>
                            <input type="text" name="company_instagram_link"  class="form-control"  value="{{ get_static_option('company_instagram_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Company whatsapp link</label>
                            <input type="text" name="company_whatsapp_link"  class="form-control"  value="{{ get_static_option('company_whatsapp_link') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Call to action</label>
                            <input type="text" name="call_to_action"  class="form-control"  value="{{ get_static_option('call_to_action') }}"/>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Call to action highlight</label>
                            <input type="text" name="call_to_action_highlight"  class="form-control"  value="{{ get_static_option('call_to_action_highlight') }}"/>
                        </div>

                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Is bulk import from website</label>
                            <select class="form-control"   name="is_bulk_import_from_website" id="is_bulk_import_from_website">
                                <option @if(get_static_option('is_bulk_import_from_website') == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(get_static_option('is_bulk_import_from_website') == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Is active website contact submission mail to visitor</label>
                            <select class="form-control"   name="is_active_website_contact_submission_mail_to_visitor" id="is_active_website_contact_submission_mail_to_visitor">
                                <option @if(get_static_option('is_active_website_contact_submission_mail_to_visitor') == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(get_static_option('is_active_website_contact_submission_mail_to_visitor') == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Is active website contact submission sms to visitor</label>
                            <select class="form-control"   name="is_active_website_contact_submission_sms_to_visitor" id="is_active_website_contact_submission_sms_to_visitor">
                                <option @if(get_static_option('is_active_website_contact_submission_sms_to_visitor') == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(get_static_option('is_active_website_contact_submission_sms_to_visitor') == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Is active website contact submission sms to office</label>
                            <select class="form-control"   name="is_active_website_contact_submission_sms_to_office" id="is_active_website_contact_submission_sms_to_office">
                                <option @if(get_static_option('is_active_website_contact_submission_sms_to_office') == 'yes') selected @endif value="yes">Yes</option>
                                <option @if(get_static_option('is_active_website_contact_submission_sms_to_office') == 'no') selected @endif value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Footer text</label>
                            <textarea  rows="10" type="text" name="footer_text"  class="form-control" >{{ get_static_option('footer_text') }}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <label>Subscribe text</label>
                            <textarea  rows="10" type="text" name="subscribe_text"  class="form-control" >{{ get_static_option('subscribe_text') }}</textarea>
                        </div>


                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle" height="70px;" width="70px;" src="{{ get_static_option('website_logo') ?? get_static_option('no_image') }}" alt="">
                            <label>Website logo </label>
                            <input accept="image/*" type="file" name="website_logo" class="form-control"  />
                        </div>
                        <div class="form-group col-md-6 col-xl-6 mt-4 border border-danger">
                            <img class="rounded-circle"  height="70px;" width="70px;" src="{{ get_static_option('website_favicon') ?? get_static_option('no_image') }}" alt="">
                            <label>Website favicon </label>
                            <input accept="image/*" type="file" name="website_favicon" class="form-control"  />
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

