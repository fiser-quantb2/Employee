<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class LoginController extends Controller
{
    public function getLogin() {
        if (Auth::check()) {
            return redirect('admin');
        }else return view('login');
    }
    public function getActive($username){

    }
    public function postLogin(Request $request){
    	$rules = [
    		'username' => 'required',
    		'password' => 'required|min:6'
    	];
    	$messages = [
    		'username.required' => 'Username is required',
    		'password.required' => 'Password is required',
    		'password.min' => 'Password is least 6 characters',
    	];
    	$validator = Validator::make($request->all(),$rules,$messages);
    	if($validator->fails()){
    		return response()->json([
    			'error' => true,
    			'message' => $validator->errors() 
    		],200);
    	}else{
    		$username = $request->input('username');
    		$password = $request->input('password');
    		if(Auth::attempt(['username'=>$username, 'password'=>$password],$request->has('remember'))){
                if(Auth::user()->active == 1){
                    return response()->json([
                        'error' => false,
                        'message' => 'success'
                    ],200);
                }else{
                    return response()->json([
                        'error' => false,
                        'message' => 'changepass'
                    ],200);
                }
    			/*return redirect()->intended('/');*/
            }
            else {
    			$errors = new MessageBag(['errorlogin' => 'Username or password is incorrect']);
    			return response()->json([
    				'error' => true,
    				'message' => $errors
    			],200);
    		}
    	}
    }
}
