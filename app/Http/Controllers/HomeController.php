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
        return view('user.maillist');
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

    public function projectComment(Request $r)
    {
        $this->validate($r, [
                'filenames.*' => 'mimes:doc,pdf,docx,zip,png,jpg,xlsx,xls',
                'task.comment'=>'required'
        ]);
        $t=$r->task;
        $t['user_id']=Auth::user()->id;
        if($r->task['id']){
            $task=Task::find($r->task['id']);
            $task->comment=$r->task['comment'];
            $task->hours=$r->task['hours'];
            $task->save();
        }else{
            $task=Task::create($t);
        }
        
        if($r->hasfile('filenames'))
         {
            foreach($r->file('filenames') as $file)
            {
                // $name=$file->getClientOriginalName();
                // $file->move(public_path().'/files/', $name);
              $destinationPath = public_path('files'); 
              $filepath =$destinationPath.'/'. File::sanitize($file->getClientOriginalName());
              $fileinfo = pathinfo(File::generateFilename($filepath));
              $imageName= $fileinfo['basename'];
              $file->move($destinationPath,$imageName);
                $f= new Taskdac();
                 $f->filename=$imageName;
                 $f->task_id=$task->id;
                 $f->save(); 
            }
         }
         if($task){
            $notification = array(
                        'message' => 'Comment Aded', 
                        'alert-type' => 'success'
                    );
        }else{
            $notification = array(
                        'message' => 'Comment not Aded', 
                        'alert-type' => 'danger'
                    );
        }
         return redirect()->route('user.projects.detail',['id'=>encrypt($r->task['project_id'],'vipra')])->with($notification);
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
