<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Server;
use App\Models\Emaillist;
use Auth;
use App\Mail\EndEmail;
use App\Jobs\SendEmailJob;
use App\Models\Emailrespnce;
use App\Models\File;
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
         $this->validate($r, [
                'file' => 'mimes:html',
        ]);
          $campaign = new Campaign();
        if($r->hasfile('file'))
         {
            $file = $r->file('file');
              $destinationPath = public_path('files'); //dd($destinationPath);
              $filepath =$destinationPath.'/'. File::sanitize($file->getClientOriginalName());
              $fileinfo = pathinfo(File::generateFilenameBlade($filepath));
              $imageName= $fileinfo['basename'];
              $file->move($destinationPath,$imageName);
              $campaign->template_url=$imageName;
         }else{
              $campaign->templates=$r->editor1;
         }
       
        $campaign->subject= $r->subject;
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
    	$emails = Emaillist::whereIn('listing_id',$r->mailList)->where('status',1)->get();
    	if($server){
            if($server->driver == 'smtp'){
            	Config::set('mail.driver', $server->driver); 
            	Config::set('mail.host', $server->hostname);
            	Config::set('mail.port', $server->port);
            	Config::set('mail.username', $server->username);
            	Config::set('mail.password', $server->password);
            	Config::set('mail.encryption', $server->encryption);
            	Config::set('mail.from.name', $r->name);
            	Config::set('mail.from.address', $r->from);
            }
            if($server->driver == 'ses'){
                Config::set('services.ses.key', $server->driver); 
                Config::set('services.ses.secret', $server->driver); 
                Config::set('services.ses.region', $server->driver); 
                }
        }

        $res = dispatch(new SendEmailJob($emails,$campaign,$r->mailList));
        // $res = Emailrespnce::where('campaign_id',$campaign->id)->last();
        // return view('user.campaign.resp', compact('res'));
    	// if($emails){
        //     foreach ($emails as $key => $value) { //dd($value);
        //         $mail= Mail::to($value)
        //         ->send(new EndEmail($campaign,$value->email));
        //             }
        //         }
        //dd($mail);
        if($res){
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
         return redirect()->route('campaign.sendin.detail')->with($notification);
    }

    public function sendingEmail(){
        $res = Emailrespnce::where('user_id',Auth::user()->id)
        ->orderBy('id','desc')
        ->get();
        return view('user.campaign.resp', compact('res'));
    }
}
