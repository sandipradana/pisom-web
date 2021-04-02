<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Staff extends Authenticatable
{
    protected $table = 'staffs';
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital');
    }
}
