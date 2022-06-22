<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PackageController;



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
    return view('frontend.index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/create',[App\Http\Controllers\Admin\UserController::class,'register'])->name('user.create');


Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/index',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.index');

    Route::post('/admin/user/create',[App\Http\Controllers\Admin\UserController::class,'store'])->name('admin.user.create');
    // Route::get('/admin/role/index',[App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.role');
    Route::get('/activate/{id}', [App\Http\Controllers\Admin\UserController::class, 'activate'])->name('admin.activate');
    Route::get('/admin/user/register',[App\Http\Controllers\Admin\UserController::class,'create'])->name('admin.register');
    Route::get('/admin/user/edit/{id}',[App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin.user.edit');
    Route::put('/admin/user/update/{id}',[App\Http\Controllers\Admin\UserController::class,'update'])->name('admin.user.update');
    Route::resource('packages', 'App\Http\Controllers\Admin\PackageController');

});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/role/index',[App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.role');
    Route::get('/admin/all_user/index',[App\Http\Controllers\Admin\UserController::class,'allUsers'])->name('admin.all.users');
    Route::get('export', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('export');

});