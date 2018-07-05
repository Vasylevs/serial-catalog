<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function(){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::resource('/serial', 'SerialController',['as' => 'admin']);
    Route::resource('/season', 'SeasonController',['as' => 'admin']);
    Route::resource('/serie', 'SeriaController',['as' => 'admin']);
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
