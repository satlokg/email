<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Server extends Model
{
    protected $fillable=[
		'title','hostname','port','username','password','encryption','driver'
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
        return $this->belongsToMany('App\User','user_server');
    }

    public function teams(){
        return $this->belongsToMany('App\Models\Team','team_server');
    }

   
}
