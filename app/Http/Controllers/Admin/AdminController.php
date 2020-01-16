<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;
use App\Models\Seserver;
use Auth;

class AdminController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect()->route('admin.dashboard');
        // return view('admin-home');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

   public function mailserver()
    {
         $servers=Server::all();
        return view('admin.mailserver', compact('servers'));
    }
    public function mailserverPost(Request $r)
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
    
    public function sesserver()
    {
         $servers=Seserver::all();
        return view('admin.sesserver', compact('servers'));
    }
    public function sesserverPost(Request $r)
    {
        $dt=$r->all();
        $dt['user_id']=Auth::user()->id;
        $server=Seserver::Create($dt);
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
}
