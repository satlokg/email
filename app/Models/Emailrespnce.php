<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emailrespnce extends Model
{
    protected $fillable = [
    	'error','success','campaign_id','listing_id'
    ]
}
