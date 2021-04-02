<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    use HasFactory;

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
