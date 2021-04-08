<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TodoCategory;
use App\Models\TodoType;
use App\Models\Todo;
use App\Models\Day;

class TodoController extends Controller
{
    public function category(Request $request){
        $todo_categories = TodoCategory::whereIn("id", [2,3,4,5])->get();
        return ['status' => 200, 'data' => $todo_categories];
    }
    
    public function subCategory(Request $request){
        $todo_categories = TodoType::where('todo_category_id', $request->todo_category_id)->get();
        return ['status' => 200, $request->todo_category_id, 'data' => $todo_categories];
    }
    
    public function add(Request $request){
        $todo = new Todo();
        $todo->day_id = $request->id;
        $todo->todo_category_id = $request->category_id;

        if(strlen($request->sub_category_other) > 0){
            $todo->data = $request->sub_category_other_input;
            $todo->status = 1;
            $todo->todo_type_id = ($request->sub_category_id == null ? 0 : $request->sub_category_id);
        }else {
            $todo->todo_type_id = $request->sub_category_id;
            $todo->status = 1;
        }
        
        $todo->save();

        return ['status' => 200, 'data' => $todo];
    }

    public function update(Request $request){
        
        $todo = Todo::find($request->id);
        $todo->status = $request->status;
        $todo->save();

        $day = Day::find($todo->day_id);
        $day->todo_status = 1;

        $todo->save();
        $day->save();

        return ['status' => 200, 'data' => $todo];
    }
}
