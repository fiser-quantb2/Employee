<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Mail;
use App\User;
use App\Http\Requests;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class HomeController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function getIndex() {
    	return view('admin');
    }
    public function getChangepass(){
    	if(Auth::user()->active == 1){
    		redirect ('admin');
    	}else {
    	return view('changepass');
    	}
    }
    public function getLogout() {
	   Auth::logout();
	   return redirect(\URL::previous());
	}
	public function postAdd(Request $request){
		$allRequest = $request->all();
		$username = $allRequest['username'];
		$email = $allRequest['email'];
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
		return response()->json(['message' => 'success'], 200);
	}
	public function postChangepass(Request $request){
		$rules = [
    		'newpass' => 'required|min:6'
    	];
    	$messages = [
    		'newpass.required' => 'Password is required',
    		'newpass.min' => 'Password is least 6 characters',
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);
    	if($validator->fails()){
    		return response()->json([
    			'error' => true,
    			'message' => $validator->errors() 
    		],200);
    	}else{
			$newpass = $request->input('newpass');
			$user = User::find(Auth::user()->id);
			$user->password = Hash::make($newpass);
			$user->active = 1;
			$user->save();
			return response()->json([
				'error' => false,
				'message' => 'success'
			],200);
		}
	}
}
