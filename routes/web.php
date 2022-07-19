<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\GigController;
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
    return view('user.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group(["as"=>'user.', "prefix"=>'user',  "middleware"=>['auth','user']],function(){
    Route::get('dashboard', [App\Http\Controllers\User\UserDashboardController::class, 'index'])->name('dashboard');
});

Route::group(["middleware"=>['auth']],function(){
    Route::get('gig/list', [App\Http\Controllers\GigController::class, 'gigList'])->name('gig.list');
    Route::resource('gig', GigController::class);

    //driver
    Route::get('driver', [App\Http\Controllers\DriverController::class, 'driver'])->name('driver');

    //request
    Route::get('request/{id}', [App\Http\Controllers\RequestWorkController::class, 'requestDriver'])->name('request');
    Route::get('work/status', [App\Http\Controllers\RequestWorkController::class, 'requestWork']);
    Route::get('driver/accept/{id}', [App\Http\Controllers\RequestWorkController::class, 'driverAccept']);
    Route::post('request/work/store/{id}', [App\Http\Controllers\RequestWorkController::class, 'workStore']);
    Route::get('user/get/{id}', [App\Http\Controllers\RequestWorkController::class, 'userget']);
    Route::get('seller/status/{id}', [App\Http\Controllers\RequestWorkController::class, 'sellerStatus']);


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
Route::get('logout', [App\Http\Controllers\Admin\AdminDashboardController::class, 'logout'])->name('logout');