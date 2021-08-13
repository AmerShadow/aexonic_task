<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class UserLoginController extends Controller
{

	public function loginShow(){
		return view('auth.userlogin');
	}

    public function userLogin(Request $request){
    	$this->validate($request, [
        'email'   => 'required',
        'password' => 'required',
      ]);
		
		if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
        // if successful, then redirect to their intended location
        return redirect()->route('user_home');
      }
      else{
      	 if ( ! User::where('email', $request->email)->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                   'email' => Lang::get('Email Not registered.'),
                ]);
        }

        if ( ! User::where('email', $request->email)->where('password', Hash::make($request->password))->first() ) {
            return redirect()->back()
                ->withInput($request->only('email', 'remember'))
                ->withErrors([
                    'password' => Lang::get('Invalid password'),
                ]);
        }
    }
}
}
