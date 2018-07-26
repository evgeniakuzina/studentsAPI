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
Route::get('ancestors', 'AncestorController@index');
Route::get('ancestors/{ancestor}', 'AncestorController@show');
Route::post('ancestors', 'AncestorController@store');
Route::post('ancestors/{ancestor}/add/students/{student}', 'AncestorController@add');

Route::get('students', 'StudentController@index');
Route::get('students/{student}', 'StudentController@show');
Route::post('students', 'StudentController@store');


Route::fallback(function(){
    return response()->json(['message' => 'Not Found'], 404);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
