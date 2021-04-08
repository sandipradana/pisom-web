<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Patient extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }

    public function getAgeAttribute()
    {
        return Carbon::parse($this->date_of_birth)->age;
    }

    public function getGenderNameAttribute()
    {
        return $this->gender == 1 ? 'Laki-laki' : 'Perempuan';
    }
}