<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Campaign extends Model
{
    protected $fillable=[
    	'user_id','subject','templates'
    ];

    public function emailresponces(){
        return $this->hasMany('App\Models\Emailrespnce');
    }

    public function users(){
        return $this->belongsToMany('App\User','user_campaign');
    }

    public function teams(){
        return $this->belongsToMany('App\Models\Team','team_campaign');
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
