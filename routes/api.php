<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/tasks', 'TaskController@index');
Route::get('/tasks/create', 'TaskController@create');
Route::get('/tasks/{task}/edit', 'TaskController@edit');
Route::post('/tasks/create', 'TaskController@store');
Route::get('/tasks/{task}', 'TaskController@show');
Route::put('/tasks/{task}', 'TaskController@update');
Route::delete('/tasks/{task}', 'TaskController@destroy');
