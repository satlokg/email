<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Models\Client;
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
        $server=Server::Create($r->all());
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
        $dt['user_id']=Auth::user()->id;
        $server=Client::Create($dt);
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
       // dd($user->servers);
        return view('user.server.smtpdetail', compact('server'));
    }

    public function clientdetail($id)
    {
        $id = decrypt($id,'vipra');
        $client = Client::find($id);
       // dd($user->servers);
        return view('user.server.clientdetail', compact('client'));
    }
}
