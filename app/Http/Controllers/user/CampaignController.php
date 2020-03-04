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
use App\Models\Listing;
use App\Models\File;
use App\Models\Team;
use App\Models\Client;
use Illuminate\Support\Facades\Mail;
use App\User;
use Config;
class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('contributor')->only('campaignPost','campaign');
    }

    public function campaign(){
        $users = User::user()->get(); 
        $teams = Team::user()->get();
        return view('user.campaign.campaign', compact('users','teams'));
    }

    public function campaignPost(Request $r){ //dd($r->all());
         $this->validate($r, [
                'file' => 'mimes:html',
        ]);
          $campaign = new Campaign();
        if($r->hasfile('file'))
         {
            $file = $r->file('file');
             
              $destinationPath = str_replace("public","resources/views/emails",public_path());
              //dd($destinationPath);
              $filepath =$destinationPath.'/'. File::sanitize($file->getClientOriginalName());

              $fileinfo = pathinfo(File::generateFilenameBlade($filepath));
              $imageName= $fileinfo['basename'];
              $file->move($destinationPath,$imageName);
              $campaign->template_url=$imageName;
         }else{
              $campaign->templates=$r->editor1;
         }
         $ids = $r->user;
         if(Auth::user()->admin_id != null){
                array_push($ids,Auth::user()->admin_id);
         }else{
                array_push($ids,Auth::user()->id);
         }
         
       
        $campaign->subject= $r->subject;
        $campaign->user_id=Auth::user()->id;
        $campaign->save();
        $campaign->users()->sync($ids);
        $campaign->teams()->sync($r->team);
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
    	$servers = Server::server()->get();//dd($campaign);
        $listings = Listing::listing()->get();

///////////////mail list/////////////
        foreach(Auth::user()->teams as $team){
            $list[] = $team->listings;
           
        }
        
        if(isset($list)){
            foreach($list as $lst){
            $listing_object[] = $lst->filter(function($item) {
                    return $item;
                })->first();
            }
        }

            $listing_object[]= Auth::user()->listings->filter(function($item) {
                    return $item;
                })->first();
            $listing_object = array_filter($listing_object);
            if($listing_object){
                $allowListing=(new \Illuminate\Database\Eloquent\Collection($listing_object))->unique();
            }else{
                $allowListing=[];
            }
            
            //dd($allowListing);
////////////smtp server list//////////        
        foreach(Auth::user()->teams as $team){
            $serve[] = $team->servers;
           
        }
        if(isset($serve)){
            foreach($serve as $srv){
            $server_objects[] = $srv->filter(function($item) {
                    return $item;
                })->first();
            }
        }
            $server_objects[]= Auth::user()->servers->filter(function($item) {
                    return $item;
                })->first();
            $server_objects = array_filter($server_objects);
            $allowServer=(new \Illuminate\Database\Eloquent\Collection($server_objects))->unique();
       
        

//////// Client server list//////////
        foreach(Auth::user()->teams as $team){
            $clnts[] = $team->clients;
        }
        if(isset($clnts)){
        foreach($clnts as $clnt){
        $client_object[] = $clnt->filter(function($item) {
                return $item;
            })->first();
        }
    }
        $client_object[]= Auth::user()->clients->filter(function($item) {
                return $item;
            })->first();
        $client_object = array_filter($client_object);
        $allowClient=(new \Illuminate\Database\Eloquent\Collection($client_object))->unique();
////////////////
        
        
        return view('user.campaign.detail', compact('campaign','servers','listings','allowClient','allowServer','allowListing'));
    }
    public function campaignList(){ 
    	//$campaigns = Campaign::where('user_id', Auth::user()->id)->get(); //dd($campaigns);
        return view('user.campaign.list');
    }

    public function sendEmail(Request $r){  //dd(array_values($r->mailList));
    	$campaign = Campaign::find($r->campaign_id);
        $srv = explode('-',decrypt($r->servers,'server'));
    	$emails = Emaillist::whereIn('listing_id',$r->mailList)->where('status',1)->get();
    	if($srv[1] == 'smtp'){
            $server = Server::find($srv[0]);
            	Config::set('mail.driver', $server->driver); 
            	Config::set('mail.host', $server->hostname);
            	Config::set('mail.port', $server->port);
            	Config::set('mail.username', $server->username);
            	Config::set('mail.password', $server->password);
            	Config::set('mail.encryption', $server->encryption);
            	Config::set('mail.from.name', $r->name);
            	Config::set('mail.from.address', $r->from);
            }
            if($srv[1] == 'client'){
                $server = Client::find($srv[0]);
                Config::set('mail.driver', $server->driver);
                Config::set('services.ses.key', $server->key); 
                Config::set('services.ses.secret', $server->secret); 
                Config::set('services.ses.region', $server->region); 
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
