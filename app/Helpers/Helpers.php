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


    //SMS campaign
    function send_sms_from_campaign(smsCampaign $smsCampaign){
       $raw_data = $smsCampaign->leadCategory->smsLeads->pluck('phone');
       $search  = array('-', '+', ' ', '.', '\n');
       $replace = array('');
       $clear_data = explode( ',', str_replace($search, $replace, $raw_data)); //use explode for string to array format back;

        $client = new Client(); //Http client
        $url = "https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2";
        $response = $client->post($url,[
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                 "username" => env('GPCMP_USERNAME'),
                 "password" => env('GPCMP_PASSWORD'),
                 "apicode"=> "6",
                 "msisdn"=>$clear_data,
                 "countrycode"=> "880",
                 "cli" => env('GPCMP_MASKING'),
                 "messagetype"=> "3",
                 "message" => "$smsCampaign->message",
                 "messageid"=> "0",
            ],
        ]);

        $response = json_decode($response->getBody(), true);  //$response['statusCode'] or $response['message']
        if ($response['statusCode']  == 200){
            $smsCampaign->repeat++;
            $smsCampaign->save();
        }
        return '#campaign ID:'.$smsCampaign->id.' Response: '. $response['message'];
    }

    //Email campaign
    function send_email_from_campaign(emailCampaign $emailCampaign){
        $success = 0;
        $failed= 0;
        $error = '';
        foreach ($emailCampaign->leadCategory->emailLeads as $user){
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

    //send message
    function send_message($number, $message){
        $client = new Client(); //Http client
        $url = "https://gpcmp.grameenphone.com/ecmapigw/webresources/ecmapigw.v2";
        $response = $client->post($url,[
            'headers' => ['Content-type' => 'application/json'],
            'json' => [
                "username" => env('GPCMP_USERNAME'),
                "password" => env('GPCMP_PASSWORD'),
                "apicode" => "1",
                "msisdn" => "$number",
                "countrycode" => "880",
                "cli" => env('GPCMP_MASKING'),
                "messagetype" => "3",
                "message" => "$message",
                "messageid" => "0"
            ],
        ]);

        $response = json_decode($response->getBody(), true);  //$response['statusCode'] or $response['message']
        if ($response['statusCode']  == 200){
            $sms_history = new \App\Models\SmsHistory();
            if (auth()->check()){
                $sms_history->sender_id = auth()->user()->id;
            }
            $sms_history->number = $number;
            $sms_history->message = $message;
            $sms_history->save();
            return true;
        }else{
            return $response['message'];
        }
    }

    //send email
    function send_email($email, $emailCampaign){
        $email_history = new \App\Models\EmailHistory();
        if (auth()->check()){
            $email_history->sender_id = auth()->user()->id;
        }
        $email_history->email = $email;
        $email_history->message = $emailCampaign->message;
        try {
            Mail::to($email)->send(new EmailCampaignMail($emailCampaign));
            $email_history->save();
            return true;
        }catch (\Exception $exception){
            return false;
        }
    }

    function lead_categories(){
       return \App\Models\LeadCategory::all();
    }

    function custom_pages(){
       return \App\Models\CustomPage::all();
    }

    function active_custom_pages(){
       return \App\Models\CustomPage::where('status', true)->orderBy('serial', 'asc')->get();
    }

    function offline_payment_methods(){
       return \App\Models\OfflinePaymentMethod::all();
    }

    function website_contacts(){
       return \App\Models\WebsiteContact::all();
    }
}
