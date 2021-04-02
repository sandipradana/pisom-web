<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    public function type()
    {
        return $this->belongsTo('App\Models\TodoType', 'todo_type_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\TodoCategory', 'todo_category_id');
    }
}
