<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Notifications\MailNotification;
use Hash;
use Auth;
use App\Models\Team;
use App\Models\Campaign;
use App\Models\Server;
use App\Models\Client;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('contributor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::user()->get();
        return view('user.user.index',compact('users'));
    }
    public function addUser()
    {
        $roles=Role::all();
        return view('user.user.adduser',compact('roles'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        if($user){
        	$notification = array(
                        'message' => 'User successfully Aded', 
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
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

   
    protected function create(array $data)
    {
        $user= new User();
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->password = Hash::make($data['password']);
        if(Auth::user()->admin_id != null){
            $user->admin_id = Auth::user()->admin_id;
        }else{
            $user->admin_id = Auth::user()->id;
        }
        $user->save(); 
        $user->roles()->attach(Role::where('name', $data['role'])->first());
        return $user;
    }

    public function detail($id)
    {
        $id = decrypt($id,'vipra');
        $user = User::find($id);
        $teams = Team::user()->get();
        $campaigns = Campaign::user()->get();
        $servers = Server::server()->get();
        $clients = Client::server()->get();
        $roles=Role::all();
         // dd($user->campaigns);
        return view('user.user.detail', compact('user','teams','campaigns','servers','clients','roles'));
    }
    public function update(Request $r){
        //dd($r->all());
        $user = User::find($r->id);
        if($r->password != ''){
           $user->password = Hash::make($r->password);
        }
        $user->name = $r->name;
        $user->save(); 
        $user->roles()->sync(Role::where('name', $r->role)->first());
        $user->teams()->sync($r->user_team);
        $user->campaigns()->sync($r->user_campaign);
        $user->servers()->sync($r->user_server);
        $user->clients()->sync($r->user_client);
        
        if($user){
            $notification = array(
                        'message' => 'User successfully Updated', 
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
