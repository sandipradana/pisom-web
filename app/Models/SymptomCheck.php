<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SymptomCheck extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function symptom()
    {
        return $this->belongsTo('App\Models\Symptom', 'symptom_id');
    }
}
