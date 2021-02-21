<?php

namespace App\Http\Controllers;

use App\Mail\CampaignReportMail;
use App\Models\emailCampaign;
use App\Models\smsCampaign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CronJobController extends Controller
{
    public function auto_job(){
        $smsCampaigns = smsCampaign::where('auto_run_at', Carbon::now()->format('h:m'))->get();
        $emailCampaigns = emailCampaign::where('auto_run_at', Carbon::now()->format('h:m'))->get();

        $sms_responses = array();
        foreach ($smsCampaigns as $smsCampaign){
            $sms_responses[] = send_sms_from_campaign($smsCampaign);
        }

        $email_responses = array();
        foreach ($emailCampaigns as $emailCampaign){
            $email_responses[] = send_email_from_campaign($emailCampaign);
        }

        Mail::to(get_static_option('reporting_email'))->send(new CampaignReportMail($sms_responses, $email_responses));
    }
}
