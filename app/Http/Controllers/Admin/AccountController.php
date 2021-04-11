<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function profile(){
		$user = Auth::guard('admin')->user();
		return view('admin.account.profile', compact(['user']));
	}

	public function update(Request $request){
		$user = Auth::guard('admin')->user();
		$user->name		= $request->name;
		$user->email	= $request->email;
		$user->phone	= $request->phone;

		if(strlen($request->password) > 0){
			$user->password = Hash::make($request->password);
		}

		$user->save();

		return redirect()->back();
	}
	
}
