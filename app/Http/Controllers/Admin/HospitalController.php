<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\HospitalDataTable as MainDataTable;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.hospital.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create()
    {
        return view('admin.hospital.create');
    }

    public function store(Request $request)
    {
        $hospital = new Hospital();

        $hospital->name        = $request->name;
        $hospital->address     = $request->address;
        $hospital->phone       = $request->phone;

        $hospital->save();

        return redirect()->route('admin.hospital.show', $hospital->id);
    }

    public function show($id)
    {
        $hospital = Hospital::findOrFail($id);
        
        return view('admin.hospital.show', compact(['hospital']));
    }

    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('admin.hospital.show', compact(['hospital']));
    }

    public function update(Request $request, $id)
    {
        $hospital = Hospital::findOrFail($id);

        $hospital->name        = $request->name;
        $hospital->address     = $request->address;
        $hospital->phone       = $request->phone;
        
        $hospital->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();

        return redirect()->back();
    }
}
