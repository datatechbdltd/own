<?php

namespace App\Http\Controllers;

use App\Mail\TestSmtp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class SettingController extends Controller
{
    public function getSmtpPage(){
        return view('backend.setting.smtp');
    }

    public function getGeneralPage(){
        return view('backend.setting.general');
    }

    public function generalUpdate(Request $request){
        $request->validate([
            'frontend_style' => 'required',
            'reporting_email' => 'nullable|min:3',
            'reporting_phone' => 'nullable|min:3',
            'company_name' => 'nullable|min:3',
            'company_motto' => 'nullable|min:3',
            'company_email' => 'nullable|min:3',
            'company_phone' => 'nullable|min:3',
            'company_address' => 'nullable|min:3',
            'company_address_district_country' => 'nullable|min:3',
            'company_website_address' => 'nullable|min:3',
            'website_footer_credit' => 'nullable|min:3',

            'footer_text' => 'nullable|min:3',
            'subscribe_text' => 'nullable|min:3',

            'company_facebook_link' => 'nullable|min:3',
            'company_linkedin_link' => 'nullable|min:3',
            'company_twitter_link' => 'nullable|min:3',
            'company_github_link' => 'nullable|min:3',
            'company_instagram_link' => 'nullable|min:3',
            'company_whatsapp_link' => 'nullable|min:3',

            'custom_website_head_script' => 'nullable|min:3',
            'custom_website_foot_script' => 'nullable|min:3',

            'is_bulk_import_from_website' => 'nullable',
            'is_active_website_contact_submission_mail_to_visitor' => 'nullable',
            'is_active_website_contact_submission_sms_to_visitor' => 'nullable',
            'is_active_website_contact_submission_sms_to_office' => 'nullable',

            'website_logo' => 'nullable|image',
            'website_favicon' => 'nullable|image',
        ]);
        try {

            update_static_option('frontend_style', $request->frontend_style);
            update_static_option('reporting_email', $request->reporting_email);
            update_static_option('reporting_phone', $request->reporting_phone);
            update_static_option('footer_text', $request->footer_text);
            update_static_option('subscribe_text', $request->subscribe_text);

            update_static_option('company_facebook_link', $request->company_facebook_link);
            update_static_option('company_linkedin_link', $request->company_linkedin_link);
            update_static_option('company_twitter_link', $request->company_twitter_link);
            update_static_option('company_github_link', $request->company_github_link);
            update_static_option('company_instagram_link', $request->company_instagram_link);
            update_static_option('company_whatsapp_link', $request->company_whatsapp_link);

//            update_static_option('company_name', $request->company_name);
            update_static_option('company_motto', $request->company_motto);
            update_static_option('company_email', $request->company_email);
            update_static_option('company_phone', $request->company_phone);
            update_static_option('company_address', $request->company_address);
            update_static_option('company_address_district_country', $request->company_address_district_country);
            update_static_option('company_website_address', $request->company_website_address);
            update_static_option('website_footer_credit', $request->website_footer_credit);
            update_static_option('call_to_action', $request->call_to_action);
            update_static_option('call_to_action_highlight', $request->call_to_action_highlight);

            update_static_option('custom_website_head_script', $request->custom_website_head_script);
            update_static_option('custom_website_foot_script', $request->custom_website_foot_script);
            update_static_option('is_bulk_import_from_website', $request->is_bulk_import_from_website);
            update_static_option('is_active_website_contact_submission_mail_to_visitor', $request->is_active_website_contact_submission_mail_to_visitor);
            update_static_option('is_active_website_contact_submission_sms_to_visitor', $request->is_active_website_contact_submission_sms_to_visitor);
            update_static_option('is_active_website_contact_submission_sms_to_office', $request->is_active_website_contact_submission_sms_to_office);


            if($request->hasFile('website_logo')){
                if (get_static_option('website_logo') != null)
                    File::delete(public_path(get_static_option('website_logo'))); //Old image delete
                $image             = $request->file('website_logo');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('website_logo',$folder_path.$image_new_name);
            }
            if($request->hasFile('website_favicon')){
                if (get_static_option('website_favicon') != null)
                    File::delete(public_path(get_static_option('website_favicon'))); //Old image delete
                $image             = $request->file('website_favicon');
                $folder_path       = 'uploads/images/website/';
                $image_new_name    = Str::random(20).'-'.now()->timestamp.'.'.$image->getClientOriginalExtension();
                //resize and save to server
                Image::make($image->getRealPath())->save($folder_path.$image_new_name);
                update_static_option('website_favicon',$folder_path.$image_new_name);
            }
            //.env App name
            $env_val['APP_NAME'] = !empty($request->company_name) ? $request->company_name : 'YOUR_APP_NAME';
            set_env_value([
                'APP_NAME' => '"'.$env_val['APP_NAME'].'"',
            ]);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return back()->withToastSuccess( 'Updated successfully');
    }

    public function smtpUpdate(Request $request){
        $request->validate([
            'host' => 'required',
            'port' => 'required',
            'username' => 'required',
            'password' => 'required',
            'encryption' => 'required',
            'from_name' => 'required',
            'from_email' => 'required'
        ]);
        try {
            $env_val['MAIL_HOST'] = !empty($request->host) ? $request->host : 'YOUR_SMTP_MAIL_HOST';
            $env_val['MAIL_PORT'] = !empty($request->port) ? $request->port : 'YOUR_SMTP_MAIL_POST';
            $env_val['MAIL_USERNAME'] = !empty($request->username) ? $request->username : 'YOUR_SMTP_MAIL_USERNAME';
            $env_val['MAIL_PASSWORD'] = !empty($request->password) ? $request->password : 'YOUR_SMTP_MAIL_USERNAME_PASSWORD';
            $env_val['MAIL_ENCRYPTION'] = !empty($request->encryption) ? $request->encryption : 'YOUR_SMTP_MAIL_ENCRYPTION';
            $env_val['MAIL_FROM_NAME'] = !empty($request->from_name) ? $request->from_name : 'YOUR_SMTP_FROM_NAME';
            $env_val['MAIL_FROM_ADDRESS'] = !empty($request->from_email) ? $request->from_email : 'YOUR_MAIL_FROM_ADDRESS';

            set_env_value([
                'MAIL_HOST' => '"'.$env_val['MAIL_HOST'].'"',
                'MAIL_PORT' =>  '"'.$env_val['MAIL_PORT'].'"',
                'MAIL_USERNAME' => '"'.$env_val['MAIL_USERNAME'].'"',
                'MAIL_PASSWORD' => '"'.$env_val['MAIL_PASSWORD'].'"',
                'MAIL_ENCRYPTION' => '"'.$env_val['MAIL_ENCRYPTION'].'"',
                'MAIL_FROM_NAME' => '"'.$env_val['MAIL_FROM_NAME'].'"',
                'MAIL_FROM_ADDRESS' => '"'.$env_val['MAIL_FROM_ADDRESS'].'"'
            ]);
            return redirect()->back()->withSuccess('Successfully SMTP updated!');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
        }
    }

    public function testSmtp(Request $request){
        $request->validate([
            'email' => 'required|email'
        ]);
        try {
            Mail::to($request->email)->send(new TestSmtp());
            return back()->withSuccess('Successfully mail sent.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    //SMS
    public function getSMSPage(){
        return view('backend.setting.sms');
    }

    public function gpcmpSmsUpdate(Request $request){
        $request->validate([
            'gpcmp_username' => 'required',
            'gpcmp_password' => 'required',
            'gpcmp_masking' => 'required'
        ]);
        try {
            $env_val['GPCMP_USERNAME'] = !empty($request->gpcmp_username) ? $request->gpcmp_username : 'YOUR_GPCMP_USERNAME';
            $env_val['GPCMP_PASSWORD'] = !empty($request->gpcmp_password) ? $request->gpcmp_password : 'YOUR_GPCMP_PASSWORD';
            $env_val['GPCMP_MASKING'] = !empty($request->gpcmp_masking) ? $request->gpcmp_masking : 'YOUR_GPCMP_MASKING';

            set_env_value([
                'GPCMP_USERNAME' => '"'.$env_val['GPCMP_USERNAME'].'"',
                'GPCMP_PASSWORD' =>  '"'.$env_val['GPCMP_PASSWORD'].'"',
                'GPCMP_MASKING' => '"'.$env_val['GPCMP_MASKING'].'"',
            ]);
            return redirect()->back()->withSuccess('Successfully GPCMP SMS configuration updated!');
        }catch (\Exception $exception){
            return redirect()->back()->withErrors('Something going wrong. Error:'.$exception->getMessage());
        }
    }

    public function testGpcmpSms(Request $request){
        $request->validate([
            'gpcmp_phone' => 'required'
        ]);
        try {
            send_message($request->gpcmp_phone, 'Configuration, SMS working good.');
            return back()->withSuccess('Successfully SMS sent.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }

    public function getContactSettingPage(){
        return view('backend.setting.contact');
    }

    public function contactPageInfoUpdate(Request $request){
        $request->validate([
            'contact_heading' => 'nullable|min:3',
            'contact_highlight' => 'nullable|min:3',
            'contact_description' => 'nullable|min:3',
        ]);
        try {
            update_static_option('contact_heading', $request->contact_heading);
            update_static_option('contact_highlight', $request->contact_highlight);
            update_static_option('contact_description', $request->contact_description);
        }catch (\Exception $exception){
            return back()->withErrors( 'Something went wrong !'.$exception->getMessage());
        }
        return back()->withToastSuccess( 'Updated successfully');
    }
}
