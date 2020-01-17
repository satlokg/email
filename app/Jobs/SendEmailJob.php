<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EndEmail;
use Mail;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public $emails;
    public $campaign;
    public function __construct($emails,$campaign)
    {
        $this->emails=$emails;
        $this->campaign=$campaign;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if($this->emails){
            foreach ($this->emails as $key => $value) { //dd($value);
                $mail= Mail::to($value)
                ->send(new EndEmail($this->campaign,$value->email));
            }
        }
    }
}
