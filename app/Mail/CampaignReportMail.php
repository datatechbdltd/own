<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CampaignReportMail extends Mailable
{
    use Queueable, SerializesModels;
    public $sms_responses, $email_responses;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($sms_responses, $email_responses)
    {
        $this->sms_responses = $sms_responses;
        $this->email_responses = $email_responses;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.campaign-report');
    }
}
