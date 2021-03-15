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

/*
|--------------------------------------------------------------------------
| Vip Section- Distributors Routes
|--------------------------------------------------------------------------
*/
Route::get('/distributors-list', 'ProviderController@index')->middleware('role:vip,admin');
Route::post('/distributors-status-update', 'ProviderController@update')->middleware('role:vip');
Route::get('/provider-edit-{id}', 'ProviderController@edit')->middleware('role:vip');
Route::post('/provider-update', 'ProviderController@updateprovider')->middleware('role:vip');

/*
|--------------------------------------------------------------------------
| Vip Section- Managers Routes
|--------------------------------------------------------------------------
*/
Route::get('/managers-list', 'ManagerController@index')->middleware('role:vip,admin');
Route::post('/managers-status-update', 'ManagerController@update')->middleware('role:vip');
Route::get('/managers-edit-{id}', 'ManagerController@edit')->middleware('role:vip');
Route::post('/manager-update', 'ManagerController@updateprovider')->middleware('role:vip');

/*
|--------------------------------------------------------------------------
| Vip Section- Agents Routes
|--------------------------------------------------------------------------
*/
Route::get('/agents-list', 'AgentController@index')->middleware('role:vip,admin');
Route::post('/agents-status-update', 'AgentController@update')->middleware('role:vip');
Route::get('/agent-edit-{id}', 'AgentController@edit')->middleware('role:vip');
Route::post('/agent-update', 'AgentController@updateprovider')->middleware('role:vip');

/*
|--------------------------------------------------------------------------
| Vip Section- Plans Routes
|--------------------------------------------------------------------------
*/
Route::get('/plans-list', 'PlanController@index')->middleware('role:vip,admin');
Route::post('/plan-update', 'PlanController@update')->middleware('role:vip');

Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

//Language Translation
Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);
