<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable=[
		'title','hostname','port','username','password','encryption','driver'
    ];
}
