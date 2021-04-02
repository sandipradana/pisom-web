<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\SymptomDataTable as MainDataTable;
use App\Models\Symptom;
use Symptoms;

class SymptomController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.symptom.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.symptom.create');
    }

    public function store(Request $request)
    {
        $symptom            = new Symptom();
        $symptom->name      = $request->name;
        $symptom->save();

        return redirect()->route('admin.symptom.show', $symptom->id);
    }

    public function show($id)
    {
        $symptom = Symptom::findOrFail($id);
        
        return view('admin.symptom.show', compact(['symptom']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $symptom = Symptom::findOrFail($id);

        $symptom->name     = $request->name;
        $symptom->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $symptom = Symptom::findOrFail($id);
        $symptom->delete();

        return redirect()->back();
    }
}