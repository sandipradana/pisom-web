<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }

    public function loginAction(Request $request){

        $validator = Validator::make($request->only(['email', 'password']), [
            'email'     => ['required', 'string', 'email'],
            'password'  => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()
                        ->route('admin.auth.login')
                        ->withErrors($validator)
                        ->withInput();
        }

        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password ])) {
			return redirect()->route('admin.home.index');
		}

		return back()->withErrors(['email' => 'Email or password are wrong.']);
    }

    public function logout(Request $request){
		auth()->guard('admin')->logout();
		return redirect()->route('admin.auth.login');
	}
}
