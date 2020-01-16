<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Seserver extends Model
{
    protected $fillable=[
		'title','ses_key','secret','region','user_id'
    ];
}
