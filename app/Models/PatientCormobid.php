<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class PatientCormobid extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function cormobid()
    {
        return $this->belongsTo('App\Models\Cormobid');
    }

    public static function findByPatient($patient_id){
        return DB::table('patient_cormobids')
            ->join('patients', 'patient_cormobids.patient_id', '=', 'patients.id')
            ->join('cormobids', 'patient_cormobids.cormobid_id', '=', 'cormobids.id')
            ->select('cormobids.*')
            ->get();
    }
}
