<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\DataTables\AdminDataTable as MainDataTable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(MainDataTable $dataTable)
    {
        return $dataTable->render('admin.admin.index');
    }

    public function indexData($query)
    {
        return datatables()->eloquent($query) ->addColumn('action', 'users.action');
    }
    
    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->only(['email', 'password']), [
            'email'     => ['required', 'string', 'email'],
            'password'  => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            return redirect()->route('admin.auth.login')->withErrors($validator)->withInput();
        }

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
        $admin->name        = $request->name;
        $admin->email       = $request->email;
        $admin->phone       = $request->phone;

        if ($admin->password != null) {
            $admin->password    = Hash::make($request->password);
        }

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
