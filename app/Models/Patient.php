<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Authenticatable
{
    use HasFactory;

    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital');
    }

    public function staff()
    {
        return $this->belongsTo('App\Models\Staff');
    }
}
