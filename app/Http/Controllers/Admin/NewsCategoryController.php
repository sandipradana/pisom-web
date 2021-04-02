<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\NewsCategoriesDataTable as MainDataTable;
use App\Models\NewsCategory;

class NewsCategoryController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.newscategory.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.newscategory.create');
    }

    public function store(Request $request)
    {
        $category           = new NewsCategory();
        $category->name     = $request->name;
        $category->save();

        return redirect()->route('admin.newscategory.show', $category->id);
    }

    public function show($id)
    {
        $category = NewsCategory::findOrFail($id);
        
        return view('admin.newscategory.show', compact(['category']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $category = NewsCategory::findOrFail($id);

        $category->name     = $request->name;
        $category->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = NewsCategory::findOrFail($id);
        $category->delete();

        return redirect()->back();
    }
}