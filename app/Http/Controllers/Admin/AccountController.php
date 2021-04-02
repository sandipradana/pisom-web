<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function profile(){
		$user = Auth::guard('admin')->user();
		return view('admin.account.profile', compact(['user']));
	}
	
}
