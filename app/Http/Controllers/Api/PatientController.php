<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function detail($id){
		$patient = Patient::findOrFail($id);
		
		return $patient;
	}
}
