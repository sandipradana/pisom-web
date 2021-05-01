<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PatientDataTable as MainDataTable;
use App\Models\Patient;

class PatientController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.patient.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function store(Request $request)
    {
        $patient = new Patient();

        $patient->name        = $request->name;
        $patient->email       = $request->email;
        $patient->password    = Hash::make($request->password);
        $patient->phone       = $request->phone;

        $patient->save();

        return redirect()->route('admin.patient.show', $patient->id);
    }

    public function show($id)
    {
        $patient = Patient::findOrFail($id);
        
        return view('admin.patient.show', compact(['patient']));
    }

    public function edit($id)
    {
        $patient = Patient::findOrFail($id);

        return view('admin.patient.show', compact(['patient']));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return redirect()->back();
    }
}