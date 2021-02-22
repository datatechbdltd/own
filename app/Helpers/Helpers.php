<?php

use App\Mail\EmailCampaignMail;
use App\Models\emailCampaign;
use App\Models\smsCampaign;
use App\Models\StaticOption;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use GuzzleHttp\Client;



if (!function_exists('random_code')){

    function set_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function get_static_option($key)
    {
        if (StaticOption::where('option_name', $key)->first()) {
            $return_val = StaticOption::where('option_name', $key)->first();
            return $return_val->option_value;
        }
        return null;
    }

    function update_static_option($key, $value)
    {
        if (!StaticOption::where('option_name', $key)->first()) {
            StaticOption::create([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        } else {
            StaticOption::where('option_name', $key)->update([
                'option_name' => $key,
                'option_value' => $value
            ]);
            return true;
        }
        return false;
    }

    function set_env_value(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);
        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);
                // If key does not exist, add it
                if (!$keyPosition || !$endOfLinePosition || !$oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (!file_put_contents($envFile, $str)) return false;
        return true;
    }

//
//    function test_smtp_mail($to)
//    {
//        $subject= 'SMTP Test';
//        $message= 'SMTP working fine';
//        $name = end('MAIL_FROM_NAME');
//        $from = end('MAIL_FROM_ADDRESS');
//        $headers = "From: " . $name . " \r\n";
//        $headers .= "Reply-To: <$from> \r\n";
//        $headers .= "Return-Path: " . ($from) . "\r\n";;
//        $headers .= "MIME-Version: 1.0\r\n";
//        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
//        $headers .= "X-Priority: 2\nX-MSmail-Priority: high";;
//        $headers .= "X-Mailer: PHP" . phpversion() . "\r\n";
//
//        if (mail($to, $subject, $message, $headers)) {
//            return true;
//        }else{
//            return false;
//        }
//    }

    function check_online_status($user_id){
        return Cache::has('is-online-'.$user_id);
    }

    //SMS sending
    function send_sms_from_campaign(smsCampaign $smsCampaign){
        $success = 0;
        $failed= 0;
        foreach ($smsCampaign->leadCategory->leads as $user){
            if (send_message($user->phone, $smsCampaign->message)){
                $success ++;
            }else{
                $failed++;
            }
        }
        $smsCampaign->repeat++;
        $smsCampaign->save();
        return '#campaign ID:'.$smsCampaign->id.' Successfully send:'.$success.' and failed:'.$failed.' out of:'.$smsCampaign->leadCategory->leads->count().' sms';
    }

    function send_message($number, $message){
        $client = new Client();
        $url = "https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2";
        $response = $client->post($url,[
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "username" => '"'.env('GPCMP_USERNAME').'"',
                "password" => '"'.env('GPCMP_PASSWORD').'"',
                "apicode" => "1",
                "msisdn" => $number,
                "countrycode" => "880",
                "cli" => '"'.env('GPCMP_MASKING').'"',
                "messagetype" => "3",
                "message" => $message,
                "messageid" => "0"
            ],
        ]);
        if ($response->getStatusCode() == 200){
            return true;
        }else{
            return false;
        }
    }

    //Email sending
    function send_email_from_campaign(emailCampaign $emailCampaign){
        $success = 0;
        $failed= 0;
        $error = '';
        foreach ($emailCampaign->leadCategory->leads as $user){
            if (send_email($user->email, $emailCampaign) == true){
                $success ++;
            }else{
                $failed++;
            }
        }
        $emailCampaign->repeat++;
        $emailCampaign->save();
        return '#campaign ID:'.$emailCampaign->id.' Successfully send:'.$success.' and failed:'.$failed.' out of:'.$emailCampaign->leadCategory->leads->count().' email'. $error;
    }

    function send_email($email, $emailCampaign){
        try {
            Mail::to($email)->send(new EmailCampaignMail($emailCampaign));
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }

    function lead_categories(){
       return \App\Models\LeadCategory::all();
    }


}
