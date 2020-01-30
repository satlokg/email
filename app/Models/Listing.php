<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Listing extends Model
{
     protected $fillable=[
		'title','user_id'
    ];
    public function scopeListing($query)
    {
    	if( Auth::user()->admin_id != null){
    		return $query->where('user_id', Auth::user()->admin_id);
    	}else{
    		return $query->where('user_id', Auth::user()->id);
    	}
        
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function users(){
        return $this->belongsToMany('App\User','user_listing');
    }

    public function teams(){
        return $this->belongsToMany('App\Models\Team','team_listing');
    }
     public function emaillists(){

    	return $this->hasMany(Emaillist::class);
    }
}
