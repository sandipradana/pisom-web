<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\PatientTest;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request){
		if (auth()->guard('patient')->attempt(['email' => $request->email, 'password' => $request->password ])) {
			$patient = auth()->guard('patient')->user();
			$patient->api_token = md5($patient->id.microtime());
			$patient->firebase_token = $request->firebase_token;
			$patient->save();

			$patient->age = Carbon::parse($patient->date_of_birth)->age;
			$patient->gender = ($patient->gender == 1 ? "Laki - laki" : "Perempuan");

			$patient->test = PatientTest::with('type')->where('patient_id', $patient->id)->orderBy('id', 'desc')->first();
			

			return ['status' => 200, 'message' => "Success",  'data' => auth()->guard('patient')->user()];
		}
		else{
			return ['status' => 400, 'message' => "Usename dan password salah"];
		}
	}

	public function logout(){

	}
}
