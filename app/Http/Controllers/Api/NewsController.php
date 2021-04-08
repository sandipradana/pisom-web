<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function featured(){

		$news = News::where("featured", 1)->orderBy('id', 'desc')->limit(5)->get();

		foreach($news as $key => $value){
			$news[$key]['thumbnail'] = url($value['thumbnail']);
		}

		return [
			'status' => 200,
			'data' => $news
		];
	}
	
	public function latest(){

		$news = News::orderBy('id', 'desc')->limit(10)->get();

		foreach($news as $key => $value){
			$news[$key]['thumbnail'] = url($news[$key]['thumbnail']);
		}

		return [
			'status' => 200,
			'data' => $news
		];
	}
	
	public function detail($id){

		$news = News::find($id);

		$news['thumbnail'] = url($news['thumbnail']);

		return [
			'status' => 200,
			'data' => $news
		];
	}
}
