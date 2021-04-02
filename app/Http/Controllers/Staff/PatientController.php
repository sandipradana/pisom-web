<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\StaffPatientDataTable as MainDataTable;
use App\Models\Cormobid;
use App\Models\Patient;
use App\Models\Journal;
use App\Models\PatientCormobid;
use App\Models\Day;
use App\Models\Todo;
use App\Models\SymptomCheck;
use App\Models\PatientTest;
use App\Models\Test;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Medicine;
use App\Models\PatientMedicine;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('staff.patient.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('staff.patient.create');
    }

    public function store(Request $request){

        $patient = new Patient();
        $patient->name          = $request->name;
        $patient->email         = $request->email;
        $patient->password      = Hash::make($request->password);
        $patient->gender        = $request->gender;
        $patient->phone         = $request->phone;
        $patient->address       = $request->address;
        $patient->date_of_birth = $request->date_of_birth;
        $patient->hospital_id   = ($request->hospital_id ? $request->hospital_id : 1 );
        $patient->staff_id      = Auth::guard('staff')->user()->id;
        $patient->save();

        return redirect()->route('staff.patient.detail', $patient->id);
    }

    public function detail($id){

        $patient            = Patient::with(['hospital', 'staff'])->findOrFail($id);
        $journals           = Journal::where('patient_id', $patient->id)->orderBy('id', 'desc')->get();
        $patient_cormobid   = PatientCormobid::with(['cormobid'])->where('patient_id', $patient->id)->get();
        $cormobids          = Cormobid::all();
        $tests              = PatientTest::with(['type'])->where('patient_id', $patient->id)->get();
        $medicines          = Medicine::all();
        $patient_medicine   = PatientMedicine::with(['medicine'])->where('patient_id', $patient->id)->get();
    
        return view('staff.patient.detail', compact(['patient', 'journals', 'patient_cormobid', 'cormobids', 'tests', 'medicines', 'patient_medicine']));
    }

    public function addCormobid(Request $request, $id){
        $patient            = Patient::findOrFail($id);
        $cormobid           = Cormobid::findOrFail($request->cormobidId);

        $patient_cormobid   = new PatientCormobid();
        $patient_cormobid->patient_id = $patient->id;
        $patient_cormobid->cormobid_id = $cormobid->id;
        $patient_cormobid->save();

        return redirect()->back();
    }

    public function deleteCormobid(Request $request, $id, $cormobidId){
        $patient            = Patient::findOrFail($id);
        $patient_cormobid   = PatientCormobid::findOrFail($cormobidId);
        $patient_cormobid->delete();

        return redirect()->back();
    }

    public function addMedicine(Request $request, $id){
        $patient            = Patient::findOrFail($id);
        $medicine           = Medicine::findOrFail($request->medicineId);

        $patient_medicine   = new PatientMedicine();
        $patient_medicine->patient_id = $patient->id;
        $patient_medicine->medicine_id = $medicine->id;
        $patient_medicine->save();

        return redirect()->back();
    }

    public function deleteMedicine(Request $request, $id, $medicineId){
        $patient            = Patient::findOrFail($id);
        $patient_medicine   = PatientMedicine::findOrFail($medicineId);
        $patient_medicine->delete();

        return redirect()->back();
    }

    public function destroy($id){
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->route('staff.patient.index');
    }

    public function report($id){
        $patient    = Patient::with('staff', 'hospital')->findOrFail($id);
        $journal   = Journal::where('patient_id', $patient->id)->orderBy('id', 'desc')->first();

        if($journal == null){
            return redirect()->back();
        }

        $tests       = PatientTest::with('type')->where('patient_id', $patient->id)->orderBy('id', 'desc')->get();
        $cormobids  = PatientCormobid::with(['cormobid'])->where('patient_id', $patient->id)->get();
        $staff      = Auth::guard('staff')->user();

        $todos = DB::select("SELECT * FROM (SELECT todo_types.id, todo_types.name FROM `todos` JOIN todo_types ON todos.todo_type_id = todo_types.id JOIN todo_categories ON todo_categories.id = todos.`todo_category_id` JOIN days ON todos.day_id = day_id JOIN journals ON days.journal_id = journals.id WHERE journals.patient_id = ?) AS tmp GROUP BY name", [$patient->id]);
        $symptoms = DB::select("SELECT * FROM (SELECT symptoms.id, symptoms.name FROM `symptom_checks` JOIN symptoms ON symptoms.id = symptom_checks.`symptom_id` JOIN `days` ON symptom_checks.day_id = `days`.id JOIN journals ON days.journal_id = journals.id WHERE journals.patient_id = ?) AS tmp GROUP BY name", [$patient->id]);

        $todoStatus = [];
        foreach($todos as $todo){
            $todoStatus[$todo->id] = Todo::select('status')->where('todo_type_id', $todo->id)->get(); 
        }

        $symptomStatus = [];
        foreach($symptoms as $symptom){
            $symptomStatus[$symptom->id] = SymptomCheck::select('status')->where('symptom_id', $symptom->id)->get(); 
        }

        return response()->view('staff.patient.report', compact(['journal', 'staff', 'patient', 'tests', 'cormobids', 'todos', 'todoStatus', 'symptoms', 'symptomStatus']), 200)
        ->header('Content-Type', 'application/vnd.ms-excel; charset=utf-8')
        ->header('Content-Disposition', 'attachment; filename=Laporan-Pasien-'.$patient->id.'-'.$patient->name.'.xls');
    }
}