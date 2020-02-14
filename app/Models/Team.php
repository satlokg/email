<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Team extends Model
{
    protected $fillable=[
    	'user_id', 'teamname', 'created_by'
    ];

    public function users()
    {
      return $this->belongsToMany('App\User','user_team');
    }
    public function campaigns(){
        return $this->belongsToMany('App\Models\Campaign','team_campaign');
    }

    
    public function servers(){
        return $this->belongsToMany('App\Models\Server','team_server');
    }

    
    public function clients(){
        return $this->belongsToMany('App\Models\Client','team_client');
    }

    public function listings(){
        return $this->belongsToMany('App\Models\Listing','team_listing');
    }


    public function scopeUser($query)
    {
    	if( Auth::user()->admin_id != null){
    		return $query->where('user_id', Auth::user()->admin_id);
    	}else{
    		return $query->where('user_id', Auth::user()->id);
    	}
        
    }

    
}
