<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emailrespnce extends Model
{
    protected $fillable = [
    	'error','success','campaign_id','listing_id','user_id'
    ];

    public function campaign(){
    	return $this->belongsTo('App\Models\Campaign');
    }
    public function list($list){
    	return Listing::whereIn('id',explode(',', $list))->pluck('title') ;
    }
}
