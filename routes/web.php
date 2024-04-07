<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
#Route::get('/', [PagesController::class,'index']);
Route::get('/', 'App\Http\Controllers\DashboardController@index');
#Route::get('/welcome', function () {return view('pages.index');});
Route::resource('/todo', 'App\Http\Controllers\ToDoController');
Route::resource('/github', 'App\Http\Controllers\GitHubController');
Route::get('/github', 'App\Http\Controllers\GitHubController@git_issues');
Route::get('/github/closeIssue', 'App\Http\Controllers\GitHubController@closeIssue');
Route::get('/github', 'App\Http\Controllers\GitHubController@openIssue');
Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index');
//Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
