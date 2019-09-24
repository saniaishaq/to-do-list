<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/list', "TaskController@index");
Route::post("/store", "TaskController@post");
Route::post("/update/{id}", "TaskController@update");
Route::get("/edit/{id}", "TaskController@edit");
Route::post("/complete", "TaskController@complete");
Route::post("/delete", "TaskController@destroy");