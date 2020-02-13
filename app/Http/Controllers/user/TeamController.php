<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use Auth;
use App\User;
use App\Models\Campaign;
use App\Models\Server;
use App\Models\Client;


class TeamController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('contributor');
    }

    public function index(){
    	$teams = Team::user()->get();
        return view('user.team.index', compact('teams'));
    }

    public function add(Request $r){
    	$users = User::user()->get();
        return view('user.team.add', compact('users'));
    }

    public function post(Request $r){
    	$team = new Team();
    	if(Auth::user()->admin_id != null){
    		$team->user_id=Auth::user()->admin_id;
    	}else{
    		$team->user_id=Auth::user()->id;
    	}
    	$team->created_by=Auth::user()->id;
    	$team->teamname=$r->teamname;
    	$team->save();
    	$team->users()->attach($r->user);

        if($team){
        	$notification = ['message'=>'Success','alert-type'=>'success'];
        }else{
        	$notification = ['message'=>'Failed','alert-type'=>'error'];
        }
        return redirect()->back()->with($notification);
    }

    public function detail($id)
    {
        $id = decrypt($id,'vipra');
        $team = Team::find($id);
       // dd($user->servers);
        $users = User::user()->get();
        $campaigns = Campaign::user()->get();
        $servers = Server::server()->get();
        $clients = Client::server()->get();
        return view('user.team.detail', compact('team','campaigns','servers','clients','users'));
    }

    public function update(Request $r){
       // dd($r->all());
        $team = Team::find($r->id);
        $team->teamname = $r->teamname;
        $team->save(); 
        $team->users()->sync($r->user_team);
        $team->campaigns()->sync($r->team_campaign);
        $team->servers()->sync($r->team_server);
        $team->clients()->sync($r->team_client);
        
        if($team){
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
