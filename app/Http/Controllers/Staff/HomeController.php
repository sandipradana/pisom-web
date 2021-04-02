<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\PatientTest;
use App\Models\Journal;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
		

        $stats = [];

        $total['patient']       = Patient::count();
        $total['test']          = PatientTest::count();
        $total['isolation']     = Journal::count();

        $genders         = DB::select('select gender, count(gender) as total from patients group by gender');
        foreach($genders  as $index => $value){
            $stats['gender']['index'][] = ($value->gender == 1 ? "Laki-laki" : "Perempuan");
            $stats['gender']['value'][] = $value->total;
        }
        
        $journals        = DB::select('select status, count(status) as total from journals group by status');
        foreach($journals  as $index => $value){
            $stats['patient']['index'][] = ($value->status == 1 ? "Selesai Isolasi" : "Isolasi");
            $stats['patient']['value'][] = $value->total;
        }

        $cormobids       = DB::select('select name, count(id) as total from (select cormobids.name as name, cormobids.id from patient_cormobids left join cormobids on patient_cormobids.cormobid_id = cormobids.id) as tmp group by id');
        foreach($cormobids  as $index => $value){
            $stats['cormobid']['index'][] = $value->name;
            $stats['cormobid']['value'][] = $value->total;
        }
       
        $cases           = DB::select('select `case`, count(`case`) as total from patient_tests where `case` in(1,2) group by `case`');
        foreach($cases  as $index => $value){
            $stats['case']['index'][] = ($value->case == 1 ? "OTG" : "Ringan");
            $stats['case']['value'][] = $value->total;
        }

        $symptom          = DB::select('SELECT id, name, count(id) as total FROM (SELECT symptoms.id, symptoms.name FROM `symptoms` JOIN symptom_checks ON symptom_checks.symptom_id = symptoms.id WHERE symptom_checks.status = 1) as tmp group by id');
        foreach($symptom   as $index => $value){
            $stats['symptom']['index'][] = $value->name;
            $stats['symptom']['value'][] = $value->total;
        }

        return view('staff.home.index', compact(['total', 'stats']));
    }
}
