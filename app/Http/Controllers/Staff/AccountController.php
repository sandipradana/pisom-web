<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    public function profile(){
		$user = Auth::guard('staff')->user();
		return view('staff.account.profile', compact(['user']));
	}
	
}
