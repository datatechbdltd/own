<?php

namespace App\Mail;

use App\Models\emailCampaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailCampaignMail extends Mailable
{
    use Queueable, SerializesModels;

    public $emailCampaign;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(emailCampaign $emailCampaign)
    {
        $this->emailCampaign = $emailCampaign;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.email-campaign')->with("emailCampaign", $this->emailCampaign);
    }
}
