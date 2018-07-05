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

//SITE
Route::get('/', 'HomeController@index')->name('home');
Route::get('/serial/{id}', 'HomeController@serial')->name('serial');
Route::get('/serial/season/{id}', 'HomeController@season')->name('season');
Route::get('/serial/season/seria/{id}', 'HomeController@seria')->name('seria');

//ADMIN
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth','admin']], function(){
    Route::get('/','AdminController@index')->name('admin.index');
    Route::resource('/serial', 'SerialController',['as' => 'admin']);
    Route::resource('/season', 'SeasonController',['as' => 'admin']);
    Route::resource('/serie', 'SeriaController',['as' => 'admin']);
});

Auth::routes();

