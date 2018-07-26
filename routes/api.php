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
Route::get('ancestors/{ancestor}', 'AncestorController@show')->where('ancestor', '[0-9]+');
Route::post('ancestors', 'AncestorController@store');
Route::post('ancestors/{ancestor}/add/students/{student}', 'AncestorController@add')->where('ancestor', '[0-9]+');
Route::put('ancestors/{ancestor}', 'AncestorController@update')->where('ancestor', '[0-9]+');
Route::delete('ancestors/{ancestor}', 'AncestorController@destroy')->where('ancestor', '[0-9]+');

Route::get('students', 'StudentController@index');
Route::get('students/{student}', 'StudentController@show')->where('student', '[0-9]+');
Route::post('students', 'StudentController@store');
Route::put('students/{student}', 'StudentController@update')->where('student', '[0-9]+');
Route::delete('students/{student}', 'StudentController@destroy')->where('student', '[0-9]+');


Route::fallback(function(){
    return response()->json(['message' => 'Not Found'], 404);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
