<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'App\\Http\\Controllers\\Guest', 'as' => 'guest.'], function () {
    Route::get('/', 'HomeController@index')->name('home.index');
    Route::get('/download', 'HomeController@download')->name('home.download');
});

Route::group(['namespace' => 'App\\Http\\Controllers\\Admin', 'as' => 'admin.', 'prefix' => 'admin', 'middleware' => ['\\App\\Http\\Middleware\\AdminMenu']], function () {

    Route::get('/auth/login', 'AuthController@login')->name('auth.login');
    Route::post('/auth/login', 'AuthController@doLogin')->name('auth.dologin');
    Route::get('/auth/logout', 'AuthController@doLogout')->name('auth.logout');

    Route::group(['middleware' => ['\\App\\Http\\Middleware\\AdminMiddleware']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
    });
});

Route::group(['namespace' => 'App\\Http\\Controllers\\Staff', 'as' => 'staff.', 'prefix' => 'staff', 'middleware' => ['\\App\\Http\\Middleware\\StaffMenu']], function () {
    Route::get('/auth/login', 'AuthController@login')->name('auth.login');
    Route::post('/auth/login', 'AuthController@doLogin')->name('auth.dologin');
    Route::get('/auth/logout', 'AuthController@doLogout')->name('auth.logout');

    Route::group(['middleware' => ['\\App\\Http\\Middleware\\StaffMiddleware']], function () {
        Route::get('/', 'HomeController@index')->name('home.index');
        Route::get('/patient', 'PatientController@index')->name('patient.index');
        Route::get('/test', 'TestController@index')->name('test.index');
        Route::get('/isolation', 'IsolationController@index')->name('isolation.index');
        Route::get('/account', 'AccountController@index')->name('account.index');
    });
});
