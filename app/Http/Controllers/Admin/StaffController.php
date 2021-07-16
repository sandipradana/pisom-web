<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\StaffDataTable as MainDataTable;
use App\Models\Hospital;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.staff.index');
    }

    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', 'users.action');
    }

    public function create(){
        $hospitals = Hospital::all();
        return view('admin.staff.create', compact(['hospitals']));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'     => ['required', 'string', 'email', 'unique:staffs'],
            'password'  => ['required', 'string'],
            'phone'     => ['required'],
            'name'      => ['required'],
            'hospital_id'     => ['required', 'exists:hospitals,id'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $staff = new Staff();

        $staff->name        = $request->name;
        $staff->hospital_id = $request->hospital_id;
        $staff->email       = $request->email;
        $staff->password    = Hash::make($request->password);
        $staff->phone       = $request->phone;

        $staff->save();

        return redirect()->route('admin.staff.show', $staff->id);
    }

    public function show($id)
    {
        $staff = Staff::with('hospital')->findOrFail($id);
        $hospitals = Hospital::all();

        return view('admin.staff.show', compact(['staff', 'hospitals']));
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('admin.staff.edit', compact(['staff']));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $staff->name        = $request->name;
        $staff->hospital_id = $request->hospital_id;
        $staff->email       = $request->email;
        $staff->phone       = $request->phone;
        
        if($request->password != null){
            $staff->password    = Hash::make($request->password);
        }

        $staff->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);
        $staff->delete();

        return redirect()->back();
    }
}