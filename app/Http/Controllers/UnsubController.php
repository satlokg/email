<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emaillist;
class UnsubController extends Controller
{
    public function index($email){
    	$res=Emaillist::where('email',$email)->update(['status'=>0]);
    	if($res){
    		$msg="Success";
    	}else{
    		$msg="Error";
    	}
    	 return view('unsub', compact('msg'));
    }
}
