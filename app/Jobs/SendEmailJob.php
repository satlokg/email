<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Mail\EndEmail;
use App\Models\Emailrespnce;
use Mail;
use Auth;

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
    public $listing_id;
    public function __construct($emails,$campaign,$listing_id)
    {
        $this->emails = $emails;
        $this->campaign = $campaign;
        $this->listing_id = $listing_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $res['error']=0;
        $res['success']=0;
        if($this->emails){
            foreach ($this->emails as $key => $value) { //dd($value);
                $mail= Mail::to($value)
                ->send(new EndEmail($this->campaign,$value->email));
                if (Mail::failures()) {
                    $res['error']=$res['error']+1;
                }else{
                    $res['success']=$res['success']+1;
                }
            }
            $res['campaign_id'] = $this->campaign->id;
            $res['listing_id'] = implode(",",$this->listing_id);
            $res['user_id'] = Auth::user()->id;
            $emailresp = Emailrespnce::create($res);
            
            //dd($res);
        }
    }
}
