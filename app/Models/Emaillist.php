<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emaillist extends Model
{
    protected $fillable=[
		'listing_id','name','email'
    ];
    public function listings(){
        return $this->belongsTo('App\Models\Listing');
    }
}
