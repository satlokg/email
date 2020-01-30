<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use App\Notifications\MailNotification;
use Hash;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('contributor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::users()->get();
        return view('user.user.index',compact('users'));
    }
    public function addUser()
    {
        $roles=Role::all();
        return view('user.user.adduser',compact('roles'));
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        if($user){
        	$notification = array(
                        'message' => 'User successfully Aded', 
                        'alert-type' => 'success'
                    );
        }else{
        	$notification = array(
                        'message' => 'Something Went Wrong', 
                        'alert-type' => 'error'
                    );
        }
        return redirect()->back()->with($notification);

        
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

   
    protected function create(array $data)
    {
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'admin_id' => Auth::user()->id,
        ]);
        $user->roles()->attach(Role::where('name', $data['role'])->first());
        //$user->notify(new MailNotification); 
        return $user;
        
    }

    public function detail($id)
    {
        $id = decrypt($id,'vipra');
        $user = User::find($id);
       // dd($user->servers);
        return view('user.user.detail', compact('user'));
    }
}
