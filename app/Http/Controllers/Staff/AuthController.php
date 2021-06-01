<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
		return view('staff.auth.login');
	}
	
	public function loginAction(Request $request){
		
		$validator = Validator::make($request->only(['email', 'password']), [
			'email' => ['required', 'string', 'email'],
			'password' => ['required', 'string'],
		]);

		if ($validator->fails()) {
			return redirect()->route('staff.auth.login')->withErrors($validator)->withInput();
		}

		if (auth()->guard('staff')->attempt(['email' => $request->email, 'password' => $request->password ])) {
			return redirect()->route('staff.home.index');
		}

		return back()->withErrors(['email' => 'Email or password are wrong.']);
	}

	public function logoutAction(Request $request){
		auth()->guard('staff')->logout();
		return redirect()->route('staff.auth.login');
	}
}
