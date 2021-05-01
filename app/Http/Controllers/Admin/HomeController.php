<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Cormobid;
use App\Models\Hospital;
use App\Models\Medicine;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Patient;
use App\Models\Staff;
use App\Models\Symptom;
use App\Models\TestType;
use App\Models\TodoType;
use App\Models\TodoCategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){

        $total_admin    = Admin::count();
        $total_staff    = Staff::count();
        $total_patient  = Patient::count();

        $total_news             = News::count();
        $total_news_category    = NewsCategory::count();

        $total_hospital         = Hospital::count();
        $total_medicine         = Medicine::count();
        $total_symptom          = Symptom::count();
        $total_test             = TestType::count();
        $total_todo             = TodoType::count();
        $total_todo_category    = TodoCategory::count();
        $total_cormobid         = Cormobid::count();

        return view('admin.home.index', compact([
            'total_admin',
            'total_staff',
            'total_patient',

            'total_news',
            'total_news_category',

            'total_hospital',
            'total_medicine',
            'total_symptom',
            'total_test',
            'total_todo',
            'total_todo_category',
            'total_cormobid'
        ]));
    }
}
