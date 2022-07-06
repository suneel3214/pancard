<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Frontend\ContactUsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\ServicesController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Auth\ForgotPasswordController;
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
Route::get('/user/register',[App\Http\Controllers\Admin\UserController::class,'userRegister'])->name('user.register');
Route::post('user/fetch-role', [UserController::class, 'fetchRole']);

// reset password route 
Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
// reset password route end 

Route::resource('contacts', 'App\Http\Controllers\Frontend\ContactUsController');
Route::resource('abouts', 'App\Http\Controllers\Frontend\AboutUsController');
Route::resource('/services/index', 'App\Http\Controllers\Frontend\ServicesController');




Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin/index',[App\Http\Controllers\Admin\UserController::class,'index'])->name('admin.index');

    Route::post('/admin/user/create',[App\Http\Controllers\Admin\UserController::class,'store'])->name('admin.user.create');
    // Route::get('/admin/role/index',[App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.role');
    Route::get('/activate/{id}', [App\Http\Controllers\Admin\UserController::class, 'activate'])->name('admin.activate');
    Route::get('/admin/user/register',[App\Http\Controllers\Admin\UserController::class,'create'])->name('admin.register');
    Route::get('/admin/user/edit/{id}',[App\Http\Controllers\Admin\UserController::class,'edit'])->name('admin.user.edit');
    Route::put('/admin/user/update/{id}',[App\Http\Controllers\Admin\UserController::class,'update'])->name('admin.user.update');
    Route::resource('coupons', 'App\Http\Controllers\Admin\CouponController');

});

Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('/admin/role/index',[App\Http\Controllers\Admin\RoleController::class,'index'])->name('admin.role');
    Route::get('/edit-percent_amount/{id}',[App\Http\Controllers\Admin\RoleController::class,'edit'])->name('role.percentage.edit');
    Route::put('/role-update',[App\Http\Controllers\Admin\RoleController::class,'percentAmount'])->name('role.update');

    Route::get('/admin/all_user/index',[App\Http\Controllers\Admin\UserController::class,'allUsers'])->name('admin.all.users');
    Route::get('export', [App\Http\Controllers\Admin\UserController::class, 'export'])->name('export');
    Route::resource('packages', 'App\Http\Controllers\Admin\PackageController');
    Route::get('/edit-package/{id}',[App\Http\Controllers\Admin\PackageController::class,'package_edit'])->name('package.edit');
    Route::put('/package-update',[App\Http\Controllers\Admin\PackageController::class,'updatePackage'])->name('package.update');

    Route::resource('services', 'App\Http\Controllers\Admin\ServiceController');
    Route::get('/edit-service/{id}',[App\Http\Controllers\Admin\ServiceController::class,'service_edit'])->name('service.edit');
    Route::put('/service-update',[App\Http\Controllers\Admin\ServiceController::class,'updateService'])->name('service.update');



});