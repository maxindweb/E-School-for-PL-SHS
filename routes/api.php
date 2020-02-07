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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// courses Api

Route::get('/Course', 'CourseController@index');
Route::post('/course', 'CourseController@store');

//Assigment Api

Route::get('/Assigment', 'AssigmentController@indexNull');
Route::get('/assigment/:assigment', 'AssigmentController@show');