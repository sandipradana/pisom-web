<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;
use App\Models\Day;
use App\Models\Patient;
use App\Models\Todo;
use App\Models\PatientTest;
use App\Models\SymptomCheck;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class SymptomController extends Controller
{
    public function daylist(Request $request){
		$patient 	= $request->user();
		$journal 	= Journal::where("patient_id", $patient->id)->orderBy('id', 'desc')->first();
		$day 		= Day::where("journal_id", $journal->id)->get();

		return [
			'status' => 200,
			'data' => $day
		];
	}
	
	public function detail($id){
		$day 			= Day::where("id", $id)->first();
		$symptom_check	= SymptomCheck::with(['symptom'])->where("day_id", $id)->get();

		$day['symptom_check'] = $symptom_check;

		return [
			'status' => 200,
			'data' => $day 
		];

	}

	public function update(Request $request){
        
        $todo = SymptomCheck::find($request->id);
        $todo->status = $request->status;
		
		$day = Day::find($todo->day_id);
		$day->symptom_status = 1;

		if($day->date != date("Y-m-d")){
            return ['status' => 200, 'data' => ""];
        }

		$todo->save();
		$day->save();

        return ['status' => 200, 'data' => $todo];
	}
	
	public function stats($id){

		$symptom = DB::select('
		
		SELECT
			symptom_name,
			count(symptom_status) as total
		FROM
			(
			SELECT 
				journals.id as journal_id,
				days.id as day_id,
				symptoms.id as symptom_id,
				symptoms.name as symptom_name,
				symptom_checks.status as symptom_status
			FROM 
				symptom_checks
			JOIN
				symptoms ON symptom_checks.symptom_id = symptoms.id
			JOIN
				days ON days.id = symptom_checks.day_id
			JOIN
				journals ON journals.id = days.journal_id
			WHERE
				journals.id = ?
			AND
				symptom_checks.status = 1
			) as tmp
		GROUP BY
			symptom_name	
	
		', [$id]);


		return ['status' => 200, 'data' => $symptom];
	}
}
