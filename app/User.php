<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Task;
use App\Models\Attempt;
use Carbon\Carbon;
use DateTime;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','admin_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function scopeUsers($query)
    {
        return $query->where('admin_id', Auth::user()->id);
    }
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings(){
        return $this->hasMany('App\Models\Listing');
    }

    
}
