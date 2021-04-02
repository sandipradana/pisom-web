<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\TestTypeDataTable as MainDataTable;
use App\Models\TestType;

class TestTypeController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.testtype.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.testtype.create');
    }

    public function store(Request $request)
    {
        $testtype            = new TestType();
        $testtype->name      = $request->name;
        $testtype->save();

        return redirect()->route('admin.testtype.show', $testtype->id);
    }

    public function show($id)
    {
        $testtype = TestType::findOrFail($id);
        
        return view('admin.testtype.show', compact(['testtype']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $testtype = TestType::findOrFail($id);

        $testtype->name     = $request->name;
        $testtype->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $testtype = TestType::findOrFail($id);
        $testtype->delete();

        return redirect()->back();
    }
}
