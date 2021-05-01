<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use DB;
use DataTables;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Hospital;

class MonitoringDailyController extends Controller
{
    public function daily()
    {
        return view('staff.report.monitoring.daily');
    }

    public function dataTable(Request $request)
    {
        $query = DB::table('journals');

        $query->join('patients', 'journals.patient_id', '=', 'patients.id');
        $query->join('days', 'journals.id', '=', 'days.journal_id');

        $query->select(['journals.id', 'patients.name', 'patients.date_of_birth as age', 'patients.gender', 'days.date', 'symptom_status', 'todo_status', 'phone']);

        if($request->has('filter_date') and $request->filter_date != null){
            $query->where('days.date', date('Y-m-d', strtotime($request->filter_date)));
        }else{
            $query->where('days.date', date('Y-m-d'));
        }

        $result = DataTables::of($query)->toArray();

        $i = 0;
        foreach($result['data'] as $data){
            $result['data'][$i]['age'] = Carbon::parse($data['age'])->age;
            $result['data'][$i]['gender'] = $data['gender'] == 1 ? 'Laki-laki' : 'Perempuan';
            $result['data'][$i]['symptom_status'] = $data['symptom_status'] == 1 ? 'Sudah' : 'Belum';
            $result['data'][$i]['todo_status'] = $data['todo_status'] == 1 ? 'Sudah' : 'Belum';
           
            $i++;
        }

        return $result;
    }

    public function print(Request $request){

        $staff      = Auth::guard('staff')->user();
        $hospital   = Hospital::find($staff->hospital_id);


        $query = DB::table('journals');

        $query->join('patients', 'journals.patient_id', '=', 'patients.id');
        $query->join('days', 'journals.id', '=', 'days.journal_id');

        $query->select(['journals.id', 'patients.name', 'patients.date_of_birth as age', 'patients.gender', 'days.date', 'symptom_status', 'todo_status', 'phone']);

        if($request->has('filter_date') and $request->filter_date != null){
            $query->where('days.date', date('Y-m-d', strtotime($request->filter_date)));
        }else{
            $query->where('days.date', date('Y-m-d'));
        }

        $result = $query->get()->toArray();

        $i = 0;
        foreach($result as $data){
            $data =  (array) $data;
            $result[$i] = $data;

            $result[$i]['age'] = Carbon::parse($data['age'])->age;
            $result[$i]['gender'] = $data['gender'] == 1 ? 'Laki-laki' : 'Perempuan';
            $result[$i]['symptom_status'] = $data['symptom_status'] == 1 ? 'Sudah' : 'Belum';
            $result[$i]['todo_status'] = $data['todo_status'] == 1 ? 'Sudah' : 'Belum';
           
            $i++;
        }

        return view('staff.report.monitoring.daily-print', compact(['staff', 'hospital', 'result']));
    }
}