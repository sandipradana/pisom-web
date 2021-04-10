<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\StaffPatientTestDataTable as MainDataTable;
use App\Models\PatientTest;
use App\Models\TestType;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;

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

    public function detail($id){
        $test = PatientTest::with(['patient', 'type'])->findOrFail($id);
        return view('staff.test.detail', compact(['test']));
    }

    public function report($id){
        $test       = PatientTest::with(['patient', 'type'])->findOrFail($id);
        $patient    = Patient::with('staff', 'hospital')->findOrFail($id);
        $staff      = Patient::with('staff', 'hospital')->findOrFail($id);
        $staff      = Auth::guard('staff')->user();

        return response()->view('staff.test.report', compact(['test', 'patient', 'staff']))
        ->header('Content-Type', 'application/vnd.ms-excel; charset=utf-8')
        ->header('Content-Disposition', 'attachment; filename=Laporan-Test-Pasien-'.$patient->id.'-'.$patient->name.'.xls');
    
    }

    public function destroy($id){
        $patient_test = PatientTest::findOrFail($id);
        $patient_test->delete();

        return redirect()->route('staff.test.index');
    }
}
