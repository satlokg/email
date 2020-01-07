<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Server;

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
     
}
