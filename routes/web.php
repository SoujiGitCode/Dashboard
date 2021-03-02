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

Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

/*
|--------------------------------------------------------------------------
| Roles Routes
|--------------------------------------------------------------------------
*/
Route::get('/roles-list', 'RoleController@index');
Route::post('/roles-store', 'RoleController@store');
Route::delete('/roles-delete', 'RoleController@delete');

/*
|--------------------------------------------------------------------------
| Users Routes
|--------------------------------------------------------------------------
*/
Route::get('/users-list', 'UserController@index')->middleware('role:vip,admin,dist');
Route::get('/user-create', 'UserController@create')->middleware('role:vip');
Route::post('/user-store', 'UserController@store')->middleware('role:vip');
Route::get('/user-edit-{id}', 'UserController@edit')->middleware('role:vip');
Route::post('/user-update', 'UserController@update')->middleware('role:vip');
Route::post('/user-delete-{id}', 'UserController@destroy')->middleware('role:vip');


Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
