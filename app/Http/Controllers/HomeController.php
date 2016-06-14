<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\User;
use App\Http\Requests;
use Auth;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
class HomeController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function getAdd() {
    	return view('addadmin');
    }
    public function getChangepass(){
    	return view('changepass');
    }
    public function getLogout() {
	   Auth::logout();
	   return redirect('/');
	}
    public function getContact(){
        return view('contact');
    }
	public function postAdd(Request $request){
        $rules = [
            'email' => 'required|email',
            'username' => 'required|min:5'
        ];
        $messages = [
            'email.required' => 'Email is required',
            'email.email' => 'Email is not right format',
            'username.required' => 'Username is required',
            'username.min' => 'Username is least 5 characters'
        ];
        $validator = Validator::make($request->all(),$rules,$messages);
        if($validator->fails()){
            return response()->json([
                'error' => true,
                'message' => $validator->errors() 
            ],200);
        }else{
            $allRequest = $request->all();
            $username = $allRequest['username'];
            $email = $allRequest['email'];
            if (DB::table('users')->where('username', $username)->first() != NULL){
                $errors = new MessageBag(['erroruser' => 'Username is already exists']);
                return response()->json([
                    'error' => true,
                    'message' => $errors
                ],200);
            }
            else if(DB::table('users')->where('email',$email)->first() != NULL){
                $errors = new MessageBag(['erroremail' => 'Email is already exists']);
                return response()->json([
                    'error' => true,
                    'message' => $errors
                ],200);
            }else{
                $password = (str_random(6));
                User::create([
                    'username' => $username,
                    'email' => $email,
                    'password' => Hash::make($password),
                    'active' => 0
                ]);
                Mail::send('email.sendpass', array('username' => $username, 'password'=>$password) , function($message) {
                    $message->from('admin@employee.com', 'Employee Directory');
                    $message->to(Input::get('email'), Input::get('username'))
                        ->subject('Account admin is created for Employee Directory');
                });
                return response()->json([
                    'error' => false,
                    'message' => 'success'
                ],200);
            }
        }
		
	}
	public function postChangepass(Request $request){
		$rules = [
            'oldpass' => 'required|min:6',
    		'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
    	];
    	$messages = [
    		'oldpass.required' => 'Old password is required',
            'oldpass.min' => 'Old password is least 6 characters',
            'password.required' => 'New password is required',
            'password.min' => 'New password is least 6 characters',
    		'password_confirmation.required' => 'Confirm password is required',
            'password_confirmation.min' => 'Confirm password is least 6 characters',
            'password.confirmed' => 'Confirm password is different with password'
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);
        $oldpass = $request->input('oldpass');
    	if($validator->fails()){
    		return response()->json([
    			'error' => true,
    			'message' => $validator->errors() 
    		],200);
    	}else if (Hash::check($oldpass, Auth::user()->password))
        {
            $password = $request->input('password');
            $user = User::find(Auth::user()->id);
            $user->password = Hash::make($password);
            $user->active = 1;
            $user->save();
            return response()->json([
                'error' => false,
                'message' => 'success'
            ],200);      
        }else{
			$errors = new MessageBag(['errorpass' => 'Old password is incorrect']);
            return response()->json([
                'error' => true,
                'message' => $errors
            ],200);    
		}
	}
}
