<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Day;
use App\Models\Patient;
use App\Models\Todo;
use App\Models\PatientTest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class JournalController extends Controller
{
    public function list(Request $request){
		
		$patient 	= $request->user();
		$journal 	= Journal::where("patient_id", $patient->id)->orderBy('id', 'desc')->first();

		if($journal == null){
			return [
				'status' => 400,
				'message' => 'Journal Empty'
			];
		}
		$day 		= Day::where("journal_id", $journal->id)->get();

		return [
			'status' => 200,
			'data' => $day
		];
	}
	
	public function detail(Request $request, $id){

		$day 		= Day::where("id", $id)->first();
		$todos		= Todo::with(['type', 'category'])->where("day_id", $id)->get();

		$day['todos'] = $todos;

		return [
			'status' => 200,
			'data' => $day 
		];

	}
	
	
	public function publicList(){

		$journals 	= Journal::with('patient')->where("status", 1)->get();
		$data = array();

		$i = 0;
		foreach($journals as $test){
			$test['patient_id'] = $test['patient_id'];
			$test['patient']['age'] = Carbon::parse($test['patient']->date_of_birth)->age;
			$data[$i] = $test;
			$i++;
		}

		return [
			'status' => 200,
			'data' => $data
		];
	}
	
	public function publicSingle($id){
		$patient 	= Patient::find($id);
		$journal 	= Journal::where("patient_id", $patient->id)->first();
		$day 		= Day::where("journal_id", $journal->id)->get();

		return [
			'status' => 200,
			'data' => $day
		];
	}
	
	public function publicDetail($id){
		$day 		= Day::where("id", $id)->first();
		$todos		= Todo::with(['type', 'category'])->where("day_id", $id)->get();

		$day['todos'] = $todos;

		return [
			'status' => 200,
			'data' => $day 
		];	
	}

	public function stats($id){

		$todo_categories = DB::select('SELECT * FROM `todo_categories`');
		$stats = array();

		foreach($todo_categories as $todo_category){
			$stats[$todo_category->id]['label'] = [];
			$stats[$todo_category->id]['total'] = [];

			$newStats = DB::select('SELECT todo_types.name, count(todo_types.name) as total FROM `todos` JOIN todo_types ON todo_types.id = todos.todo_type_id JOIN `days` ON todos.day_id = `days`.id WHERE `days`.journal_id = ? AND todos.todo_category_id = ? AND todos.status = 1 GROUP BY todo_types.name', [$id, $todo_category->id]);
			
			foreach($newStats as $key => $value){
				$stats[$todo_category->id]['label'][] = $value->name;
				$stats[$todo_category->id]['total'][] = $value->total;
			}
		}

		return ['status' => 200, 'data' => $stats];
	}
}
