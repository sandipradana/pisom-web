<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\TodoTypeDataTable as MainDataTable;
use App\Models\Todo;
use App\Models\TodoCategory;

class TodoController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.todo.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
		$categories = TodoCategory::all();
        return view('admin.todo.create', compact(['categories']));
    }

    public function store(Request $request)
    {
        $todotype            = new TodoType();
        $todotype->name      = $request->name;
		$todotype->todo_category_id = $request->category_id;
		$todotype->description	= '-';
		$todotype->mandatory	= ($request->category_id == 1 ? 1 : 0);
        $todotype->save();

        return redirect()->route('admin.todo.show', $todotype->id);
    }

    public function show($id)
    {
        $todotype = Todo::findOrFail($id);
		$categories = TodoCategory::all();
        
        return view('admin.todo.show', compact(['todo', 'categories']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $todotype = TodoType::findOrFail($id);

        $todotype->name      = $request->name;
		$todotype->todo_category_id = $request->category_id;
	    $todotype->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $todotype = TodoType::findOrFail($id);
        $todotype->delete();

        return redirect()->back();
    }
}
