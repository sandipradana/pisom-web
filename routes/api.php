<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\\Http\\Controllers\\Api', 'as' => 'api.', 'middleware' => ['\\App\\Http\\Middleware\\BypassCORS']], function () {
    Route::post('/auth/login', 'AuthController@login')->name('auth.login');

    Route::get('/region/provinces', 'RegionController@provinces')->name('region.provices');
    Route::get('/region/cities', 'RegionController@cities')->name('region.cities');
    Route::get('/region/districts', 'RegionController@districts')->name('region.districts');
    Route::get('/region/villages', 'RegionController@villages')->name('region.villages');

    Route::get('/home/statistics', 'HomeController@statistics')->name('home.statistics');
	
    Route::get('/news/latest', 'NewsController@latest')->name('news.latest');
    Route::get('/news/featured', 'NewsController@featured')->name('news.featured');
    Route::get('/news/detail/{id}', 'NewsController@detail')->name('news.detail');
	
    Route::get('/patient/{id}', 'PatientController@detail')->name('patient.detail');

    Route::post('/todo/category', 'TodoController@category')->name('todo.category');
    Route::post('/todo/sub-category', 'TodoController@subCategory')->name('todo.sub-category');

    Route::post('/journal/public-list', 'JournalController@publicList')->name('journal.public-list');
    Route::post('/journal/public-single/{id}', 'JournalController@publicSingle')->name('journal.public-single');
    Route::post('/journal/public-detail/{id}', 'JournalController@publicDetail')->name('journal.public-detail');
       

    Route::group(['middleware' => ['\\App\\Http\\Middleware\\PatientApiMiddleware', 'auth:api']], function () {
        Route::post('/journal/list', 'JournalController@list')->name('journal.list');
        Route::post('/journal/detail/{id}', 'JournalController@detail')->name('journal.detail');
        Route::post('/journal/stats/{id}', 'JournalController@stats')->name('journal.stats');

        Route::get('/patient/profile', 'PatientController@detail')->name('patient.detail');

        Route::post('/todo/add', 'TodoController@add')->name('todo.add');
        Route::post('/todo/update', 'TodoController@update')->name('todo.update');
         	
        Route::post('/symptom/daylist', 'SymptomController@daylist')->name('symptom.daylist');
        Route::post('/symptom/detail/{id}', 'SymptomController@detail')->name('symptom.detail');
        Route::post('/symptom/update', 'SymptomController@update')->name('symptom.update');
        Route::post('/symptom/stats/{id}', 'SymptomController@stats')->name('symptom.stats');

        Route::post('/auth/logout', 'AuthController@logout')->name('auth.logout');
    });
});