<?php

use App\Http\Controllers\Admin\RoleController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["as"=>'user.', "prefix"=>'user',  "middleware"=>['auth','user']],function(){
    Route::get('dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});

Route::group(["as"=>'admin.', "prefix"=>'admin', "middleware"=>['auth','admin']],function(){
    Route::get('dashboard', [App\Http\Controllers\Admin\AdminDashboardController::class, 'index'])->name('dashboard');

    // permission
    // Route::get('permission/index', [PermissionController::class, 'index'])->name('permission.index');
    // Route::get('permission/create', [PermissionController::class, 'create'])->name('permission.create');
    // Route::post('permission/store', [PermissionController::class, 'store']);
    // Route::get('permission/edit/{id}', [PermissionController::class, 'edit']);
    // Route::post('permission/update/{id}', [PermissionController::class, 'update']);
    Route::resource('permission', PermissionController::class);

    //role
    Route::resource('role', RoleController::class);

});