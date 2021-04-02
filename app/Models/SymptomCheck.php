<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SymptomCheck extends Model
{
    use HasFactory;

    public function symptom()
    {
        return $this->belongsTo('App\Models\Symptom', 'symptom_id');
    }
}
