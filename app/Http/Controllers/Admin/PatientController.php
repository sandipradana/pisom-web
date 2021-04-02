<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\PatientDataTable as MainDataTable;

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
        $admin = new Admin();

        $admin->name        = $request->name;
        $admin->email       = $request->email;
        $admin->password    = Hash::make($request->password);
        $admin->phone       = $request->phone;

        $admin->save();

        return redirect()->route('admin.admin.show', $admin->id);
    }

    public function show($id)
    {
        $admin = Admin::findOrFail($id);
        
        return view('admin.admin.show', compact(['admin']));
    }

    public function edit($id)
    {
        $admin = Admin::findOrFail($id);

        return view('admin.admin.show', compact(['admin']));
    }

    public function update(Request $request, $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return redirect()->back();
    }
}