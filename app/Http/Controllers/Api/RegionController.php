<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function provinces(){
		$region 	= new Region();
		$provinces 	= $region->provinces();
		return $provinces;
	}
	
	public function cities(Request $request){
		$region 	= new Region();
		$cities 	= $region->cities($request->province_id);
		return $cities;
	}
	
	public function districts(Request $request){
		$region 	= new Region();
		$districts 	= $region->districts($request->city_id);
		return $districts;
	}

	public function villages(Request $request){
		$region 	= new Region();
		$districts 	= $region->villages($request->district_id);
		return $districts;
	}
}
