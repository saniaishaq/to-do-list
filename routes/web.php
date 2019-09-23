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


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/list', "TaskController@index");
Route::post("/task", "TaskController@post");
Route::get("/{id}/edit", "TaskController@edit");
Route::get("/{id}/complete", "TaskController@complete");
Route::get("/{id}/delete", "TaskController@destroy");
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


