<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientMedicine extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function medicine()
    {
        return $this->belongsTo('App\Models\Medicine');
    }
}
