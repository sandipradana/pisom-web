<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Journal extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\PatientTest', 'patient_test_id');
    }

    public function day()
    {
        return $this->hasMany('App\Models\Day');
    }
}
