<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\StaffPatientTestDataTable as MainDataTable;
use App\Models\Hospital;
use App\Models\PatientTest;
use App\Models\TestType;
use App\Models\Patient;
use App\Models\Staff;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('staff.test.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create($patient_id = 0){
        $testTypes = TestType::all();
        return view('staff.test.create', compact(['testTypes', 'patient_id']));
    }

    public function store(Request $request){

        $patient_test = new PatientTest();
        $patient_test->patient_id    = $request->patient_id;
        $patient_test->test_type_id  = $request->test_type_id;
        $patient_test->result        = $request->result;
        $patient_test->date          = date("Y-m-d");
        $patient_test->case          = $request->case;
        $patient_test->save();

        return redirect()->route('staff.test.detail', $patient_test->id);
    }

    public function print(Request $request, PatientTest $model){

        /* $query = $model->with(['patient', 'type'])->select('patient_tests.*')->newQuery();

        if ($request->has('filter_date_start') && $request->has('filter_date_end')) {
            if($request->filter_date_start !== null AND $request->filter_date_end !== null) 
                $query->whereBetween('created_at', [date('Y-m-d', strtotime($request->filter_date_start)), date('Y-m-d', strtotime($request->filter_date_end))])->get();
        }

        $tests      = $query->get();
        $staff      = Staff::find(Auth::guard('staff')->user()->id);

        return view('staff.test.print', compact(['staff', 'tests']));  */

        $start_date = date('Y-m-d', strtotime($request->filter_date_start));
        $end_date = date('Y-m-d', strtotime($request->filter_date_end));

        $staff      = Staff::find(Auth::guard('staff')->user()->id);

        $data = DB::select("

        SELECT
            patients.id as patient_id,
            patients.name as patient_name,

            patient_tests.id as test_id,
            patient_tests.created_at as test_date,
            CASE WHEN patient_tests.result = 1 THEN 'Negatif' WHEN patient_tests.result = 2 THEN 'Positif' ELSE 'Positif' END as test_result,
            CASE WHEN patient_tests.case = 1 THEN 'OTG' ELSE 'Ringan' END as test_case,
            test_types.name as test_name
        FROM
            patient_tests
        LEFT JOIN
            patients ON patient_tests.patient_id = patients.id
        LEFT JOIN
            test_types ON patient_tests.test_type_id = test_types.id
        WHERE 
            patients.staff_id = ? AND patient_tests.created_at BETWEEN ? AND ?
            
        ", [ Auth::guard('staff')->user()->id, $start_date, $end_date ]);

        return view('staff.test.print', compact(['data', 'staff', 'start_date', 'end_date']));

    }

    public function printDetail(Request $request, PatientTest $model, $id){

       /* $test       = PatientTest::find($id);
        $staff      = Staff::find(Auth::guard('staff')->user()->id);
        $hospital   = Hospital::find($staff->hospital_id);
        $patient    = Patient::find($test->patient_id);

        return view('staff.test.print-detail', compact(['test', 'staff', 'hospital', 'patient'])); */

        $staff      = Staff::find(Auth::guard('staff')->user()->id);

        $data = DB::select("
        
        SELECT
            patients.id as patient_id,
            patients.name as patient_name,
            patients.email as patient_email,
            patients.date_of_birth as patient_date_of_birth,
            ROUND((DATEDIFF(NOW(), patients.date_of_birth) / 365.25), 0) as patient_age,
            patients.address as patient_address,
            patients.phone as patient_phone,
            CASE WHEN patients.gender = 1 THEN 'Laki - laki' ELSE 'Perempuan' END as patient_gender,

            hospitals.name as hospital_name,
            hospitals.phone as hospital_phone,
            hospitals.address as hospital_address,
            
            staffs.name as staff_name,

            CAST(CONCAT('[', GROUP_CONCAT(JSON_OBJECT('id', test_types.id, 'name', test_types.name, 'date', patient_tests.created_at, 'result', (CASE WHEN patient_tests.result = 1 THEN 'Negatif' WHEN patient_tests.result = 2 THEN 'Positif' ELSE 'Positif' END ), 'case', (CASE WHEN patient_tests.case = 1 THEN 'OTG' ELSE 'Ringan' END))), ']') AS JSON) as tests

         FROM
             patient_tests
         LEFT JOIN
             patients ON patient_tests.patient_id = patients.id
         LEFT JOIN
             test_types ON patient_tests.test_type_id = test_types.id
         LEFT JOIN 
             hospitals ON hospitals.id = patients.hospital_id
         LEFT JOIN
              staffs ON staffs.id = patients.staff_id
         WHERE 
            patient_tests.id = ?
         GROUP BY
            patient_tests.patient_id
        
        ", [$id]);

        $data = collect($data)->first();

        return view('staff.test.print-detail', compact(['data', 'staff'])); 
    }

    public function detail($id){
        $test = PatientTest::with(['patient', 'type'])->findOrFail($id);
        return view('staff.test.detail', compact(['test']));
    }

    public function report($id){
        
        $test       = PatientTest::with(['patient', 'type'])->findOrFail($id);
        $patient    = Patient::with('staff', 'hospital')->findOrFail($id);
        $staff      = Patient::with('staff', 'hospital')->findOrFail($id);
        $staff      = Auth::guard('staff')->user();

        return response()
        ->view('staff.test.report', compact(['test', 'patient', 'staff']))
        ->header('Content-Type', 'application/vnd.ms-excel; charset=utf-8')
        ->header('Content-Disposition', 'attachment; filename=Laporan-Test-Pasien-'.$patient->id.'-'.$patient->name.'.xls');
    
    }

    public function destroy($id){
        $patient_test = PatientTest::findOrFail($id);
        $patient_test->delete();

        return redirect()->route('staff.test.index');
    }
}
