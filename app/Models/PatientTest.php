<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientTest extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function type()
    {
        return $this->belongsTo('App\Models\TestType', 'test_type_id');
    }
}
