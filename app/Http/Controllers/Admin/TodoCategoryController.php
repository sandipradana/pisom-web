<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\TodoCategoryDataTable as MainDataTable;
use App\Models\TodoCategory;

class TodoCategoryController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.todocategory.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.todocategory.create');
    }

    public function store(Request $request)
    {
        $todocategory            = new TodoCategory();
        $todocategory->name      = $request->name;
        $todocategory->save();

        return redirect()->route('admin.todocategory.show', $todocategory->id);
    }

    public function show($id)
    {
        $todocategory = TodoCategory::findOrFail($id);
        
        return view('admin.todocategory.show', compact(['todocategory']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $todocategory = TodoCategory::findOrFail($id);

        $todocategory->name     = $request->name;
        $todocategory->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $todocategory = TodoCategory::findOrFail($id);
        $todocategory->delete();

        return redirect()->back();
    }
}
