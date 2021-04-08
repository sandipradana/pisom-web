<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function statistics(){
		return [
			'status' => 200,
			'data' => [
				'positif' => 1200, 
				'sembuh' => 800, 
				'meninggal' => 100, 
				'odp' => 100, 
				'pdp' => 60, 
				'isolasi' => 80, 
				'karantina' => 80, 
			]
		];
	}
}
