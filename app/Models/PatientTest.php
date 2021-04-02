<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientTest extends Model
{
    use HasFactory;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\TestType', 'test_type_id');
    }
}
