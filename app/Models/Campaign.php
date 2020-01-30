<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
