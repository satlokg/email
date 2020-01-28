<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Contributor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->is_admin){
            return $next($request);
        }else{
            if(Auth::user()->roles[0]->name != 'Contributor'){
                   return $next($request);
                }else{
                    $notification = array(
                                'message' => 'Your are not permitted to access this', 
                                'alert-type' => 'warning'
                            );
                    return redirect()->back()->with($notification);
                }
        }
        
     
        return $next($request);
    }
}
