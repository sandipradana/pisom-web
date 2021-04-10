<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\\Http\\Controllers\\Guest', 'as' => 'guest.'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/download', 'HomeController@download')->name('home.download');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\Admin', 'as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['\\App\\Http\\Middleware\\MenuAdmin']], function () {

    Route::get('/auth/login', 'AuthController@login')->name('auth.login');
    Route::post('/auth/login', 'AuthController@loginAction')->name('auth.login.action');
    Route::get('/auth/logout', 'AuthController@logoutAction')->name('auth.logout.action');

    Route::group(['middleware' => ['\\App\\Http\\Middleware\\AccessAdmin']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');

        Route::get('/admin', 'AdminController@index')->name('admin.index');
        Route::post('/admin', 'AdminController@datatable')->name('admin.datatable');
        Route::get('/admin/create', 'AdminController@create')->name('admin.create');
        Route::post('/admin/create', 'AdminController@store')->name('admin.store');
        Route::post('/admin/edit/{id}', 'AdminController@update')->name('admin.update');
        Route::get('/admin/detail/{id}', 'AdminController@show')->name('admin.show');
        Route::get('/admin/delete/{id}', 'AdminController@destroy')->name('admin.destroy');

        Route::get('/patient', 'PattientController@index')->name('pattient.index');
        Route::post('/patient', 'PatientController@datatable')->name('pattient.datatable');
        Route::get('/patient/create', 'PattientController@create')->name('pattient.create');
        Route::post('/patient/create', 'PattientController@store')->name('pattient.store');
        Route::get('/patient/detail/{id}', 'PattientController@show')->name('pattient.show');
        Route::get('/patient/delete/{id}', 'PattientController@destroy')->name('pattient.destroy');

        Route::get('/staff', 'StaffController@index')->name('staff.index');
        Route::post('/staff', 'StaffController@datatable')->name('staff.datatable');
        Route::get('/staff/create', 'StaffController@create')->name('staff.create');
        Route::post('/staff/create', 'StaffController@store')->name('staff.store');
        Route::post('/staff/edit/{id}', 'StaffController@update')->name('staff.update');
        Route::get('/staff/detail/{id}', 'StaffController@show')->name('staff.show');
        Route::get('/staff/delete/{id}', 'StaffController@destroy')->name('staff.destroy');

        Route::get('/patient', 'PatientController@index')->name('patient.index');
        Route::post('/patient', 'PatientController@datatable')->name('patient.datatable');
        Route::get('/patient/create', 'PatientController@create')->name('patient.create');
        Route::post('/patient/create', 'PatientController@store')->name('patient.store');
        Route::post('/patient/edit/{id}', 'PatientController@update')->name('patient.update');
        Route::get('/patient/detail/{id}', 'PatientController@show')->name('patient.show');
        Route::get('/patient/delete/{id}', 'PatientController@destroy')->name('patient.destroy');

        Route::get('/medicine', 'MedicineController@index')->name('medicine.index');
        Route::post('/medicine', 'MedicineController@datatable')->name('medicine.datatable');
        Route::get('/medicine/create', 'MedicineController@create')->name('medicine.create');
        Route::post('/medicine/create', 'MedicineController@store')->name('medicine.store');
        Route::get('/medicine/detail/{id}', 'MedicineController@show')->name('medicine.show');
        Route::post('/medicine/edit/{id}', 'MedicineController@update')->name('medicine.update');
        Route::get('/medicine/delete/{id}', 'MedicineController@destroy')->name('medicine.destroy');

        Route::get('/hospital', 'HospitalController@index')->name('hospital.index');
        Route::post('/hospital', 'HospitalController@datatable')->name('hospital.datatable');
        Route::get('/hospital/create', 'HospitalController@create')->name('hospital.create');
        Route::post('/hospital/create', 'HospitalController@store')->name('hospital.store');
        Route::post('/hospital//edit/{id}', 'HospitalController@update')->name('hospital.update');
        Route::get('/hospital/detail/{id}', 'HospitalController@show')->name('hospital.show');
        Route::get('/hospital/delete/{id}', 'HospitalController@destroy')->name('hospital.destroy');
        
        Route::get('/symptom', 'SymptomController@index')->name('symptom.index');
        Route::post('/symptom', 'SymptomController@datatable')->name('symptom.datatable');
        Route::get('/symptom/create', 'SymptomController@create')->name('symptom.create');
        Route::post('/symptom/create', 'SymptomController@store')->name('symptom.store');
        Route::post('/symptom/edit/{id}', 'SymptomController@update')->name('symptom.update');
        Route::get('/symptom/detail/{id}', 'SymptomController@show')->name('symptom.show');
        Route::get('/symptom/delete/{id}', 'SymptomController@destroy')->name('symptom.destroy');

        Route::get('/test', 'TestController@index')->name('test.index');
        Route::post('/test', 'TestController@datatable')->name('test.datatable');
        Route::get('/test/create', 'TestController@create')->name('test.create');
        Route::post('/test/create', 'TestController@store')->name('test.store');
        Route::get('/test/detail/{id}', 'TestController@show')->name('test.show');
        Route::get('/test/delete/{id}', 'TestController@destroy')->name('test.destroy');

        Route::get('/test-type', 'TestTypeController@index')->name('testtype.index');
        Route::post('/test-type', 'TestTypeController@datatable')->name('testtype.datatable');
        Route::get('/test-type/create', 'TestTypeController@create')->name('testtype.create');
        Route::post('/test-type/create', 'TestTypeController@store')->name('testtype.store');
        Route::get('/test-type/detail/{id}', 'TestTypeController@show')->name('testtype.show');
        Route::post('/test-type/edit/{id}', 'TestTypeController@update')->name('testtype.update');
        Route::get('/test-type/delete/{id}', 'TestTypeController@destroy')->name('testtype.destroy');

        Route::get('/news', 'NewsController@index')->name('news.index');
        Route::post('/news', 'NewsController@datatable')->name('news.datatable');
        Route::get('/news/create', 'NewsController@create')->name('news.create');
        Route::post('/news/create', 'NewsController@store')->name('news.store');
        Route::post('/news/edit/{id}', 'NewsController@update')->name('news.update');
        Route::get('/news/detail/{id}', 'NewsController@show')->name('news.show');
        Route::get('/news/delete/{id}', 'NewsController@destroy')->name('news.destroy');

        Route::get('/news/category', 'NewsCategoryController@index')->name('news.category.index');
        Route::post('/news/category', 'NewsCategoryController@datatable')->name('news.category.datatable');
        Route::get('/news/category/create', 'NewsCategoryController@create')->name('news.category.create');
        Route::post('/news/category/create', 'NewsCategoryController@store')->name('news.category.store');
        Route::post('/news/category/edit/{id}', 'NewsCategoryController@update')->name('news.category.update');
        Route::get('/news/category/detail/{id}', 'NewsCategoryController@show')->name('news.category.show');
        Route::get('/news/category/delete/{id}', 'NewsCategoryController@destroy')->name('news.category.destroy');
        
        Route::get('/news/comment', 'NewsCommentController@index')->name('news.comment.index');
        Route::post('/news/comment', 'NewsCommentController@datatable')->name('news.comment.datatable');
        Route::get('/news/comment/create', 'NewsCommentController@create')->name('news.comment.create');
        Route::post('/news/comment/create', 'NewsCommentController@store')->name('news.comment.store');
        Route::post('/news/comment/edit/{id}', 'NewsCommentController@update')->name('news.comment.update');
        Route::get('/news/comment/detail/{id}', 'NewsCommentController@show')->name('news.comment.show');
        Route::get('/news/comment/delete/{id}', 'NewsCommentController@destroy')->name('news.comment.destroy');

        Route::get('/cormobid', 'CormobidController@index')->name('cormobid.index');
        Route::post('/cormobid', 'CormobidController@datatable')->name('cormobid.datatable');
        Route::get('/cormobid/create', 'CormobidController@create')->name('cormobid.create');
        Route::post('/cormobid/create', 'CormobidController@store')->name('cormobid.store');
        Route::post('/cormobid/edit/{id}', 'CormobidController@update')->name('cormobid.update');
        Route::get('/cormobid/detail/{id}', 'CormobidController@show')->name('cormobid.show');
        Route::get('/cormobid/delete/{id}', 'CormobidController@destroy')->name('cormobid.destroy');

        Route::get('/todo', 'TodoController@index')->name('todo.index');
        Route::get('/todo/create', 'TodoController@create')->name('todo.create');
        Route::post('/todo/create', 'TodoController@store')->name('todo.store');
        Route::get('/todo/detail/{id}', 'TodoController@show')->name('todo.show');
        Route::post('/todo/edit/{id}', 'TodoController@update')->name('todo.update');
        Route::get('/todo/delete/{id}', 'TodoController@destroy')->name('todo.destroy');

        Route::get('/todo/category', 'TodoCategoryController@index')->name('todo.category.index');
        Route::post('/todo/category', 'TodoCategoryController@datatable')->name('todo.category.datatable');
        Route::get('/todo/category/create', 'TodoCategoryController@create')->name('todo.category.create');
        Route::post('/todo/category/create', 'TodoCategoryController@store')->name('todo.category.store');
        Route::get('/todo/category/detail/{id}', 'TodoCategoryController@show')->name('todo.category.show');
        Route::post('/todo/category/edit/{id}', 'TodoCategoryController@update')->name('todo.category.update');
        Route::get('/todo/category/delete/{id}', 'TodoCategoryController@destroy')->name('todo.category.destroy');
                
        Route::get('/account/profile', 'AccountController@profile')->name('account.profile');
    });
});

Route::group(['namespace' => 'App\\Http\\Controllers\\Staff', 'as' => 'staff.', 'prefix' => 'staff', 'middleware' => ['\\App\\Http\\Middleware\\MenuStaff']], function () {
    Route::get('/auth/login', 'AuthController@login')->name('auth.login');
    Route::post('/auth/login', 'AuthController@loginAction')->name('auth.login.action');
    Route::get('/auth/logout', 'AuthController@logoutAction')->name('auth.logout');

    Route::group(['middleware' => ['\\App\\Http\\Middleware\\AccessStaff']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');

        Route::get('/patient', 'PatientController@index')->name('patient.index');
        Route::post('/patient', 'PatientController@datatable')->name('patient.datatable');
        Route::get('/patient/print', 'PatientController@print')->name('patient.print');
        Route::get('/patient/detail/{id}', 'PatientController@detail')->name('patient.detail');
        Route::get('/patient/detail/{id}/print', 'PatientController@printDetail')->name('patient.detail.print');
        Route::get('/patient/create', 'PatientController@create')->name('patient.create');
        Route::post('/patient/create', 'PatientController@store')->name('patient.store');
        Route::get('/patient/edit/{id}', 'PatientController@edit')->name('patient.edit');
        Route::post('/patient/edit/{id}', 'PatientController@update')->name('patient.update');
        Route::get('/patient/delete/{id}', 'PatientController@destroy')->name('patient.destroy');
        Route::get('/patient/report/{id}', 'PatientController@report')->name('patient.report');

        Route::get('/patient/journal/{id}', 'PatientController@journal')->name('patient.journal');
        Route::get('/patient/cormobid/{id}', 'PatientController@cormobid')->name('patient.cormobid');
        Route::get('/patient/medicine/{id}', 'PatientController@medicine')->name('patient.medicine');
        Route::get('/patient/test/{id}', 'PatientController@test')->name('patient.test');

        Route::get('/patient/{id}/cormobid/delete/{idCormobid}', 'PatientController@deleteCormobid')->name('patient.cormobid.delete');
        Route::post('/patient/{id}/cormobid/add', 'PatientController@addCormobid')->name('patient.cormobid.add');

        Route::get('/patient/{id}/medicine/delete/{idMedicine}', 'PatientController@deleteMedicine')->name('patient.medicine.delete');
        Route::post('/patient/{id}/medicine/add', 'PatientController@addMedicine')->name('patient.medicine.add');

        Route::get('/test', 'TestController@index')->name('test.index');
        Route::post('/test', 'TestController@datatable')->name('test.datatable');
        Route::get('/test/create/{id?}', 'TestController@create')->name('test.create');
        Route::post('/test/create/{id?}', 'TestController@store')->name('test.store');
        Route::get('/test/detail/{id}', 'TestController@detail')->name('test.detail');
        Route::get('/test/delete/{id}', 'TestController@destroy')->name('test.destroy');
        Route::get('/test/report/{id}', 'TestController@report')->name('test.report');
        Route::get('/test/print', 'TestController@print')->name('test.print');
          
        Route::get('/isolasi', 'IsolationController@index')->name('isolation.index');
        Route::post('/isolasi', 'IsolationController@datatable')->name('isolation.datatable');
        Route::get('/isolasi/create', 'IsolationController@create')->name('isolation.create');
        Route::post('/isolasi/create/{patient_id}/{patient_test_id}', 'IsolationController@store')->name('isolation.store');
        Route::get('/isolasi/detail/{id}', 'IsolationController@detail')->name('isolation.detail');
        Route::get('/isolasi/delete/{id}', 'IsolationController@destroy')->name('isolation.destroy');
        Route::get('/isolasi/{id}/check/detail/{dayId}', 'IsolationController@detailCheck')->name('isolation.check.detail');
        Route::get('/isolasi/{id}/todo/detail/{dayId}', 'IsolationController@detailTodo')->name('isolation.todo.detail');
        
        Route::get('/account/profile', 'AccountController@profile')->name('account.profile');
        Route::post('/account/profile', 'AccountController@update')->name('account.update');
    });
});
