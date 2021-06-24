<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\StaffIsolationDataTable as MainDataTable;
use App\Models\Patient;
use App\Models\PatientTest;
use App\Models\Journal;
use App\Models\Day;
use App\Models\Symptom;
use Carbon\Carbon;
use App\Models\TodoType;
use App\Models\Todo;
use App\Models\SymptomCheck;
use App\Models\Staff;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;

class IsolationController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('staff.isolation.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function store(Request $request, $patient_id, $patient_test_id)
    {
        $patient = Patient::findOrFail($patient_id);
        $patient_test = PatientTest::findOrFail($patient_test_id);

        $journal = new Journal();
        $journal->patient_id        = $patient->id;
        $journal->staff_id          = auth()->guard('staff')->user()->id;
        $journal->patient_test_id   = $patient_test->id;
        $journal->status            = 0;
        $journal->start             = Carbon::now()->add(0, 'day')->format("Y-m-d");
        $journal->end               = Carbon::now()->add(10, 'day')->format("Y-m-d");
        $journal->save();

        for ($i = 1; $i <= 10; $i++) {
            $day = new Day();
            $day->name              = "Hari ke - " . $i;
            $day->journal_id        = $journal->id;
            $day->symptom_status    = 0;
            $day->todo_status       = 0;
            $day->date              = Carbon::now()->add($i, 'day')->format("Y-m-d");
            $day->save();

            $todo_types = TodoType::where('mandatory', 1)->get();

            foreach ($todo_types as $todo_type) {
                $todo = new Todo();
                $todo->day_id = $day->id;
                $todo->todo_category_id = $todo_type->todo_category_id;
                $todo->todo_type_id = $todo_type->id;
                $todo->status = 0;
                $todo->save();
            }

            $symptoms = Symptom::all();

            foreach ($symptoms as $symptom) {
                $new_symptom = new SymptomCheck();
                $new_symptom->day_id = $day->id;
                $new_symptom->status = 0;
                $new_symptom->symptom_id = $symptom->id;
                $new_symptom->save();
            }

            $patient_test->journal = 1;
            $patient_test->save();
        }

        return redirect()->route('staff.isolation.detail', $journal->id);
    }

    public function detailTodo(Request $request, $id, $dayId)
    {
        $journal    = Journal::findOrFail($id);
        $patient    = Patient::findOrFail($journal->patient_id);
        $day        = Day::findOrFail($dayId);
        $todos      = Todo::with(['type', 'category'])->where("day_id", $day->id)->get();

        return view('staff.isolation.detailTodo', compact(['patient', 'day', 'todos']));
    }

    public function detailCheck(Request $request, $id, $dayId)
    {
        $journal    = Journal::findOrFail($id);
        $patient    = Patient::findOrFail($journal->patient_id);
        $day        = Day::findOrFail($dayId);
        $symptoms   = SymptomCheck::with(['symptom'])->where("day_id", $day->id)->get();

        return view('staff.isolation.detailCheck', compact(['patient', 'day', 'symptoms']));
    }

    public function detail($id)
    {
        $journal        = Journal::with(['test', 'day'])->findOrFail($id);
        $patient        = Patient::findOrFail($journal->patient_id);
        $todoStats      = $this->todoStats($journal->id);
        $symptomStats   = $this->symptomStats($journal->id);

        return view("staff.isolation.detail", compact(['journal', 'patient', 'todoStats', 'symptomStats']));
    }

    public function printDetail(Request $request, $id){

        $journal    = Journal::with(['day'])->findOrFail($id);
        $staff      = Auth::guard('staff')->user();
        $hospital   = Hospital::find($staff->hospital_id);
        $patient    = Patient::findOrFail($journal->patient_id);

        $days       = $journal->day;

        $todos = DB::select("SELECT todos.todo_type_id as id, todo_types.name as name FROM `todos` JOIN todo_types ON todos.todo_type_id = todo_types.id JOIN todo_categories ON todo_categories.id = todos.`todo_category_id` JOIN days ON todos.day_id = day_id JOIN journals ON days.journal_id = journals.id WHERE journals.id = ? AND journals.patient_id = ? GROUP BY todos.todo_type_id", [$journal->id, $patient->id]);
        $symptoms = DB::select("SELECT symptom_checks.`symptom_id` as id, symptoms.name FROM `symptom_checks` JOIN symptoms ON symptoms.id = symptom_checks.`symptom_id` JOIN `days` ON symptom_checks.day_id = `days`.id JOIN journals ON days.journal_id = journals.id WHERE journals.id = ? AND journals.patient_id = ? GROUP BY symptom_checks.`symptom_id`", [$journal->id, $patient->id]);

        $todoStatus = [];
        foreach($todos as $todo){
            $todoStatus[$todo->id] = DB::select("SELECT todos.status FROM `todos` JOIN todo_types ON todos.todo_type_id = todo_types.id JOIN todo_categories ON todo_categories.id = todos.`todo_category_id` JOIN days ON todos.day_id = day_id JOIN journals ON days.journal_id = journals.id WHERE journals.id = ? AND journals.patient_id = ? AND todos.id = ?", [$journal->id, $patient->id, $todo->id]);
        }

        $symptomStatus = [];
        foreach($symptoms as $symptom){
            $symptomStatus[$symptom->id] = DB::select("SELECT symptom_checks.status FROM `symptom_checks` JOIN symptoms ON symptoms.id = symptom_checks.`symptom_id` JOIN `days` ON symptom_checks.day_id = `days`.id JOIN journals ON days.journal_id = journals.id WHERE journals.id = ? AND journals.patient_id = ? AND symptoms.id = ? ", [$journal->id, $patient->id, $symptom->id]);
        }

        return view('staff.isolation.print-detail', compact([
            'journal',
            'staff',
            'hospital',
            'patient',
            'todos',
            'symptoms',
            'todoStatus',
            'symptomStatus'
        ]));
    }

    public function print(Request $request, Journal $model){

        /* $isAll = true;
        $query = $model->with(['patient', 'test'])->select('journals.*')->newQuery();

        if ($request->has('filter_date_start') && $request->has('filter_date_end')) {
            if($request->filter_date_start !== null AND $request->filter_date_end !== null){ 
                $isAll= false;
                $query->whereBetween('journals.created_at', [date('Y-m-d', strtotime($request->filter_date_start)), date('Y-m-d', strtotime($request->filter_date_end))])->get();
            }
        }

        $isolations = $query->get();
        $staff      = Staff::find(Auth::guard('staff')->user()->id);
        
        $start_date = date('Y-m-d', strtotime($request->filter_date_start));
        $end_date   = date('Y-m-d', strtotime($request->filter_date_end));

        return view("staff.isolation.print", compact(['isolations', 'staff', 'start_date', 'end_date', 'isAll'])); */

        $isAll      = false;
        $staff      = Staff::find(Auth::guard('staff')->user()->id);
        $start_date = date('Y-m-d', strtotime($request->filter_date_start));
        $end_date   = date('Y-m-d', strtotime($request->filter_date_end));

        $data = DB::select("

            SELECT 
                journals.id as journal_id,
                journals.start as journal_start,
                journals.end as journal_end,
                journals.status as journal_status,
                
                patients.id as patient_id,
                patients.name as patient_name
            FROM
                journals
            LEFT JOIN
                patients ON patients.id = journals.patient_id
            WHERE 
                journals.created_at BETWEEN ? AND ?

        ", [$start_date, $end_date]);

        return view("staff.isolation.print", compact(['data', 'staff', 'start_date', 'end_date', 'isAll'])); 
    }

    public function todoStats($id)
    {
        $todo_categories = DB::select('SELECT * FROM `todo_categories`');
		$stats = array();

		foreach($todo_categories as $todo_category){
            $stats[$todo_category->id]['name']  = $todo_category->name;
			$stats[$todo_category->id]['label'] = [];
			$stats[$todo_category->id]['value'] = [];

			$newStats = DB::select('SELECT todo_types.name, count(todo_types.name) as total FROM `todos` JOIN todo_types ON todo_types.id = todos.todo_type_id JOIN `days` ON todos.day_id = `days`.id WHERE `days`.journal_id = ? AND todos.todo_category_id = ? AND todos.status = 1 GROUP BY todo_types.name', [$id, $todo_category->id]);
			
			foreach($newStats as $key => $value){
				$stats[$todo_category->id]['label'][] = $value->name;
				$stats[$todo_category->id]['value'][] = $value->total;
			}
		}

		return $stats;
    }

    public function symptomStats($id)
    {
        $symptoms = DB::select('
		
		SELECT
			symptom_name as label,
			count(symptom_status) as value
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

        $result = ['label' => [], 'value' => []];
        foreach($symptoms as $symptom){
            $result['label'][] = $symptom->label;
            $result['value'][] = $symptom->value;
        }

        return $result;
    }

    public function certificate(Request $request, $id)
    {
        $journal    = Journal::with(['test', 'day'])->findOrFail($id);
        $patient    = Patient::with('staff', 'hospital')->findOrFail($journal->patient_id);

        $name =  $patient->name;
        $name_len = strlen($name);

         $occupation = $this->dateIndo(date("d-m-Y", strtotime($journal->start)))." - ".$this->dateIndo(date("d-m-Y", strtotime($journal->end)));

        if ($occupation) {
          $font_size_occupation = 20;
        }

        $image = storage_path('certificate/certi.png');

        $createimage = imagecreatefrompng($image);

        //this is going to be created once the generate button is clicked
        $output_path = "certificate/certificate-" . $journal->id . ".png";
        $output = $output_path;

        //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
        $white = imagecolorallocate($createimage, 205, 245, 255);
        $black = imagecolorallocate($createimage, 0, 0, 0);

        //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
        $rotation = 0;

        //we then set the x and y axis to fix the position of our text name
        $origin_x = 800;
        $origin_y = 700;

        //we then set the x and y axis to fix the position of our text occupation
        $origin1_x = 800;
        $origin1_y = 880;

        //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
        if ($name_len <= 7) {
            $font_size = 50;
        } elseif ($name_len <= 12) {
            $font_size = 50;
        } elseif ($name_len <= 15) {
            $font_size = 50;
        } elseif ($name_len <= 20) {
            $font_size = 50;
        } elseif ($name_len <= 22) {
            $font_size = 50;
        } elseif ($name_len <= 33) {
            $font_size = 50;
            $origin_x = 700;
        } else {
            $font_size = 10;
        }

        $certificate_text = $name;

        //font directory for name
        $drFont = storage_path('certificate/developer.ttf');

        // font directory for occupation name
        $drFont1 = storage_path('certificate/Gotham-black.otf');

        //function to display name on certificate picture
        $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black, $drFont, $certificate_text);

        //function to display occupation name on certificate picture
        $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x + 2, $origin1_y, $black, $drFont1, $occupation);

        imagepng($createimage, $output, 3);

         return view('staff.isolation.certificate', compact(['output_path']));
    }

    public function dateIndo($tanggal){

        $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );

        $pecahkan = explode('-', $tanggal);

        return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
    }
}
