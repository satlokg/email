<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\ItemNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\User;
use Auth;
use Carbon\Carbon;
use App\Models\File;
use App\Models\Listing;
use App\Models\Emaillist;
use App\Imports\EmailImport;
use Maatwebsite\Excel\Facades\Excel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
         $this->middleware('contributor')->only('mailListPost');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home');
    }

    public function mailList(){
        $listings = Listing::listing()->get();
        return view('user.maillist',compact('listings'));
    }

    public function mailListPost(Request $r){
       $this->validate($r, [
                'file' => 'mimes:xlsx,xls',
                'title'=>'required'
        ]);
        if($r->hasfile('file'))
         {
              $list=Listing::Create([
                'title'=>$r->title,
                'user_id'=>Auth::user()->id
              ]);
              Excel::import(new EmailImport($list->id),request()->file('file'));
              Emaillist::whereNull('email')->delete();
              return back();
            
         }

    }
    public function listDetail($id){
        $emails = Emaillist::where('listing_id',decrypt($id,'vipra'))->get();
        return view('user.mailList.detail', compact('emails'));
        //dd($email);
    }

   
    public function notify(){
         $user= User::all();
         $data=collect([
            'title' => "this is tilte of notification",
            'body' => "this is body of notification"
            ]);
            Notification::send($user, new ItemNotification($data));
            return view('home');
    }
}
