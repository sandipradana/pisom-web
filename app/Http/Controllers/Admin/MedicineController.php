<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\MedicineDataTable as MainDataTable;
use App\Models\Medicine;

class MedicineController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.medicine.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.medicine.create');
    }

    public function store(Request $request)
    {
        $medicine            = new Medicine();
        $medicine->name      = $request->name;
        $medicine->save();

        return redirect()->route('admin.medicine.show', $medicine->id);
    }

    public function show($id)
    {
        $medicine = Medicine::findOrFail($id);
        
        return view('admin.medicine.show', compact(['medicine']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $medicine = Medicine::findOrFail($id);

        $medicine->name     = $request->name;
        $medicine->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $medicine = Medicine::findOrFail($id);
        $medicine->delete();

        return redirect()->back();
    }
}
