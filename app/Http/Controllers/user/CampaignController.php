<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Server;
use App\Models\Emaillist;
use Auth;
use App\Mail\EndEmail;
use Illuminate\Support\Facades\Mail;
use Config;
class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function campaign(){
        return view('user.campaign.campaign');
    }

    public function campaignPost(Request $r){ //dd($r->all());
        $campaign = new Campaign();
        $campaign->subject= $r->subject;
        $campaign->templates=$r->editor1;
        $campaign->user_id=Auth::user()->id;
        $campaign->save();
        if($campaign){
            $notification = array(
                        'message' => 'Templates Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Templates not Aded', 
                        'alert-type' => 'error'
                    );
        }
         return redirect()->route('campaign.detail',['id'=>encrypt($campaign->id,'vipra')])->with($notification);
    }

    public function campaignDesplay($id=null){
    	$campaign = Campaign::find(decrypt($id,'vipra')); //dd($campaign);
    	$servers = Server::all();//dd($campaign);
        return view('user.campaign.detail', compact('campaign','servers'));
    }
    public function campaignList(){
    	$campaigns = Campaign::where('user_id', Auth::user()->id)->get(); //dd($campaigns);
        return view('user.campaign.list', compact('campaigns'));
    }

    public function sendEmail(Request $r){  //dd(array_values($r->mailList));
    	$campaign = Campaign::find($r->campaign_id);
    	$server = Server::find($r->servers);
    	$emails = Emaillist::whereIn('listing_id',$r->mailList)->get()->toArray();
    	if($server){
    	Config::set('mail.driver', $server->driver); 
    	Config::set('mail.host', $server->hostname);
    	Config::set('mail.port', $server->port);
    	Config::set('mail.username', $server->username);
    	Config::set('mail.password', $server->password);
    	Config::set('mail.encryption', $server->encryption);
    	}
    	  $mail= Mail::to($r->user())
		    ->bcc($emails)
		    ->send(new EndEmail($campaign));
        dd($mail);
        if($campaign){
            $notification = array(
                        'message' => 'Email Send', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Email not Send', 
                        'alert-type' => 'error'
                    );
        }
         return redirect()->route('campaign.detail',['id'=>encrypt($campaign->id,'vipra')])->with($notification);
    }
}
