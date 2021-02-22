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
            'website_logo' => 'nullable|image',
        ]);
        try {
            update_static_option('reporting_email', $request->reporting_email);
            update_static_option('reporting_phone', $request->reporting_phone);

            update_static_option('company_name', $request->company_name);
            update_static_option('company_motto', $request->company_motto);
            update_static_option('company_email', $request->company_email);
            update_static_option('company_phone', $request->company_phone);
            update_static_option('company_address', $request->company_address);
            update_static_option('company_address_district_country', $request->company_address_district_country);
            update_static_option('company_website_address', $request->company_website_address);
            update_static_option('website_footer_credit', $request->website_footer_credit);

            update_static_option('website_logo', $request->website_logo);

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
            send_message($request->phone, 'Configuration, SMS working good.');
            return back()->withSuccess('Successfully SMS sent.');
        }catch (\Exception $exception){
            return back()->withErrors('Something going wrong. '.$exception->getMessage());
        }
    }
}
