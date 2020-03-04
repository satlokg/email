<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Models\Client;
use App\Models\Team;
use App\User;
use Auth;

class ServerController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('contributor');
    }
    public function index()
    {
        $servers = Server::server()->get(); //dd($server);
        $clients = Client::server()->get();
        return view('user.server.index',compact('servers','clients'));
    }
    public function addServerClient()
    {	$servers = Client::server()->get();
        return view('user.server.addServerClient',compact('servers'));
    }

    public function addServerSmtp()
    {	$servers = Server::server()->get(); 
        return view('user.server.addServerSmtp',compact('servers'));
    }

    public function smtpserverPost(Request $r)
    {
         $dt=$r->all();
         if(Auth::user()->admin_id != null){
            $dt['user_id']=Auth::user()->admin_id;
            $dt['created_by']=Auth::user()->id;
         }else{
            $dt['user_id']=Auth::user()->id;
            $dt['created_by']=Auth::user()->id;
         }
          
        $server=Server::Create($dt);
        
        if(Auth::user()->admin_id != null){
                $ids[]=Auth::user()->admin_id;
         }else{
                $ids[]=Auth::user()->id;
         }
         $server->users()->sync($ids);
        if($server){
            $notification = array(
                        'message' => 'Server Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Server not Aded', 
                        'alert-type' => 'error'
                    );
        }
         return redirect()->back()->with($notification);
    }
    
    
    public function clintserverPost(Request $r)
    {
        $dt=$r->all();
         if(Auth::user()->admin_id != null){
            $dt['user_id']=Auth::user()->admin_id;
            $dt['created_by']=Auth::user()->id;
         }else{
            $dt['user_id']=Auth::user()->id;
            $dt['created_by']=Auth::user()->id;
         }
        $server=Client::Create($dt);
        if(Auth::user()->admin_id != null){
                $ids[]=Auth::user()->admin_id;
         }else{
                $ids[]=Auth::user()->id;
         }
         $server->users()->sync($ids);
        if($server){
            $notification = array(
                        'message' => 'Server Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Server not Aded', 
                        'alert-type' => 'error'
                    );
        }
         return redirect()->back()->with($notification);
    }

    public function smtpdetail($id)
    {
        $id = decrypt($id,'vipra');
        $server = Server::find($id);
        $teams = Team::user()->get();
        $users = User::user()->get();
       // dd($user->servers);
        return view('user.server.smtpdetail', compact('server','users','teams'));
    }
    public function smtpupdate(Request $r){
        //dd($r->all());
        $server = Server::find($r->id);
        $server->title = $r->title;
        $server->hostname = $r->hostname;
        $server->port = $r->port;
        $server->username = $r->username;
        $server->password = $r->password;
        $server->driver = $r->driver;
        $server->encryption = $r->encryption;
        $server->save(); 
        
        $server->users()->sync($r->user_server);
        $server->teams()->sync($r->team_server);
        
        if($server){
            $notification = array(
                        'message' => 'Server successfully Updated', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Something Went Wrong', 
                        'alert-type' => 'error'
                    );
        }
        return redirect()->back()->with($notification);
    }

    public function clientdetail($id)
    {
        $id = decrypt($id,'vipra');
        $client = Client::find($id);
        $teams = Team::user()->get();
        $users = User::user()->get();
       // dd($user->servers);
        return view('user.server.clientdetail', compact('client','users','teams'));
    }

    public function clientupdate(Request $r){
        //dd($r->all());
        $client = Client::find($r->id);
        $client->title = $r->title;
        $client->server_key = $r->server_key;
        $client->secret = $r->secret;
        $client->region = $r->region;
        $client->driver = $r->driver;
        $client->save(); 
        
        $client->users()->sync($r->user_client);
        $client->teams()->sync($r->team_client);
        
        if($client){
            $notification = array(
                        'message' => 'Server successfully Updated', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Something Went Wrong', 
                        'alert-type' => 'error'
                    );
        }
        return redirect()->back()->with($notification);
    }
}
