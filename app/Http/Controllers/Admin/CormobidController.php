<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\CormobidDataTable as MainDataTable;
use App\Models\Cormobid;

class CormobidController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.cormobid.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        return view('admin.cormobid.create');
    }

    public function store(Request $request)
    {
        $cormobid            = new Cormobid();
        $cormobid->name      = $request->name;
        $cormobid->save();

        return redirect()->route('admin.cormobid.show', $cormobid->id);
    }

    public function show($id)
    {
        $cormobid = Cormobid::findOrFail($id);
        
        return view('admin.cormobid.show', compact(['cormobid']));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        $cormobid = Cormobid::findOrFail($id);

        $cormobid->name     = $request->name;
        $cormobid->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $cormobid = Cormobid::findOrFail($id);
        $cormobid->delete();

        return redirect()->back();
    }
}
