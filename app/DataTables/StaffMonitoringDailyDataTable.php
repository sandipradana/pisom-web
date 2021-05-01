<?php

namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class StaffMonitoringDailyDataTable extends DataTable
{
    public function dataTable(Request $request, $query)
    {
        return datatables()->of($query);
    }

    public function query()
    {
        return DB::table('journals');
    }
}