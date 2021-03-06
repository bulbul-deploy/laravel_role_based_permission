<?php

use App\Http\Controllers\Backend\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes

Route::group(['prefix'=>'admin'],function(){
    Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
    Route::resource('roles', 'App\Http\Controllers\Backend\RolesController', ['names' => 'admin.roles']);
    Route::resource('users', 'App\Http\Controllers\Backend\UsersController', ['names' => 'admin.users']);
 
});