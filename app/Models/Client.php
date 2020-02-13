<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Client extends Model
{
    protected $fillable=[
		'title','server_key','secret','region','user_id','domain','driver'
    ];
    public function scopeServer($query)
    {
    	if( Auth::user()->admin_id != null){
    		return $query->where('user_id', Auth::user()->admin_id);
    	}else{
    		return $query->where('user_id', Auth::user()->id);
    	}
        
    }

    public function users(){
        return $this->belongsToMany('App\User','user_client');
    }
    public function teams(){
        return $this->belongsToMany('App\Models\Team','team_client');
    }
}
