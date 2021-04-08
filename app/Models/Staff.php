<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Authenticatable
{
    protected $table = 'staffs';
    use SoftDeletes;
    
    public function hospital()
    {
        return $this->belongsTo('App\Models\Hospital');
    }
}
