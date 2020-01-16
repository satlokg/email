<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\Campaign;

class EndEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $campaign;
    public $emaile;
    public function __construct(Campaign $campaign,$emaile)
    {
        $this->campaign = $campaign;
        $this->emaile = $emaile;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email=$this->emaile;
        return $this->view('emails.sendemail',compact('campaign','email'))->subject($this->campaign->subject);
    }
}
