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

    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }
    public function teams()
    {
      return $this->belongsToMany('App\Models\Team','user_team');
    }
    public function listing()
    {
      return $this->belongsToMany('App\Models\Listing','user_listing');
    }

    public function campaigns()
    {
      return $this->belongsToMany('App\Models\Campaign','user_campaign');
    }

    public function servers()
    {
      return $this->belongsToMany('App\Models\Server','user_server');
    }

    public function clients()
    {
      return $this->belongsToMany('App\Models\Client','user_client');
    }
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    public function scopeUsers($query)
    {
        return $query->where('admin_id', Auth::user()->id);
    }
    public function scopeUser($query)
    {
        if( Auth::user()->admin_id != null){
            return $query->where('admin_id', Auth::user()->admin_id);
        }else{
            return $query->where('admin_id', Auth::user()->id);
        }
        
    }
   
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function listings(){
        return $this->hasMany('App\Models\Listing');
    }

    
}
