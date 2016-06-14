<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;
use \App\Traits\CaptchaTrait;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    use CaptchaTrait;
    public function getLogin() {
        if (Auth::check()) {
            return redirect('admin/employees');
        }else return view('login');
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
    		return redirect()->back()->withErrors($validator)->withInput();
    	}/*else if($this->captchaCheck() == false){
            $errors = new MessageBag(['errorcaptcha' => 'Wrong captcha!']);
            return redirect()->back()->withInput()->withErrors($errors);
        }*/else{
    		$username = $request->input('username');
    		$password = $request->input('password');
    		if(Auth::attempt(['username'=>$username, 'password'=>$password],$request->has('remember'))){
                if(Auth::user()->active == 1){
                    return redirect('admin/employees');
                }else{
                    return redirect('admin/changepass');
                }
            }
            else {
    			$errors = new MessageBag(['errorlogin' => 'Username or password is incorrect']);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
}
