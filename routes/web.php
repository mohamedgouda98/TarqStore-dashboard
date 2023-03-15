<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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



Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/reset_password', [AuthController::class, 'restPasswordPage'])->name('reset_password');
Route::post('/reset_password', [AuthController::class, 'restPassword'])->name('reset_password.action');
Route::get('/reset_password/confirm', [AuthController::class, 'restPasswordConfirmPage'])->name('reset_password.confirm');
Route::post('/reset_password/confirm', [AuthController::class, 'restPasswordConfirmAction'])->name('reset_password.confirm.action');
Route::get('/new_password', [AuthController::class, 'newPassword'])->name('new_password.page');
Route::post('/new_password', [AuthController::class, 'newPasswordAction'])->name('new_password.action');

Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware'=>'auth'], function(){

    Route::group(['prefix'=> 'admin', 'as' => 'admin.', 'middleware'=> 'role:blog'], function(){

        Route::get('/', function () {
            return view('index');
        })->name('home');

        Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::group(['prefix'=> 'vendor', 'as' => 'vendor.'], function(){
            Route::get('/', [VendorController::class, 'index'])->name('index');
            Route::get('/import', [VendorController::class, 'import'])->name('import');
            Route::post('/import/store', [VendorController::class, 'storeImport'])->name('import.store');
            Route::get('/create', [VendorController::class, 'create'])->name('create');
            Route::post('/store', [VendorController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('edit');
            Route::put('/update', [VendorController::class, 'update'])->name('update');
            Route::delete('/delete', [VendorController::class, 'delete'])->name('delete');
        });


        Route::group(['prefix'=> 'blog', 'as' => 'blog.'], function(){
            Route::get('/', [BlogController::class, 'index'])->name('index');
            Route::get('/create', [BlogController::class, 'create'])->name('create');
            Route::post('/store', [BlogController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BlogController::class, 'edit'])->name('edit');
            Route::put('/update', [BlogController::class, 'update'])->name('update');
            Route::delete('/delete', [BlogController::class, 'delete'])->name('delete');

            Route::group(['prefix'=> 'categories', 'as' => 'category.'], function(){
                Route::get('/', [BlogCategoriesController::class, 'index'])->name('index');
                Route::get('/create', [BlogCategoriesController::class, 'create'])->name('create');
                Route::post('/store', [BlogCategoriesController::class, 'store'])->name('store');
                Route::get('/edit/{id}', [BlogCategoriesController::class, 'edit'])->name('edit');
                Route::put('/update', [BlogCategoriesController::class, 'update'])->name('update');
                Route::delete('/delete', [BlogCategoriesController::class, 'delete'])->name('delete');
            });

        });

        Route::group(['prefix'=> 'categories', 'as' => 'category.'], function(){
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/store', [CategoryController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/update', [CategoryController::class, 'update'])->name('update');
            Route::delete('/delete', [CategoryController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix'=> 'product', 'as' => 'product.'], function(){
            Route::get('/', [ProductController::class, 'index'])->name('index');
            Route::get('/create', [ProductController::class, 'create'])->name('create');
            Route::post('/store', [ProductController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('edit');
            Route::put('/update', [ProductController::class, 'update'])->name('update');
            Route::delete('/delete', [ProductController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix'=> 'coupon', 'as' => 'coupon.'], function(){
            Route::get('/', [CouponController::class, 'index'])->name('index');
            Route::get('/create', [CouponController::class, 'create'])->name('create');
            Route::post('/store', [CouponController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [CouponController::class, 'edit'])->name('edit');
            Route::put('/update', [CouponController::class, 'update'])->name('update');
            Route::delete('/delete', [CouponController::class, 'delete'])->name('delete');
        });


        Route::group(['prefix'=> 'role', 'as' => 'role.'], function(){
            Route::get('/', [RolesController::class, 'index'])->name('index');
            Route::get('/create', [RolesController::class, 'create'])->name('create');
            Route::post('/store', [RolesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [RolesController::class, 'edit'])->name('edit');
            Route::put('/update', [RolesController::class, 'update'])->name('update');
            Route::delete('/delete', [RolesController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix'=> 'permission', 'as' => 'permission.'], function(){
            Route::get('/', [PermissionController::class, 'index'])->name('index');
            Route::get('/create', [PermissionController::class, 'create'])->name('create');
            Route::post('/store', [PermissionController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [PermissionController::class, 'edit'])->name('edit');
            Route::put('/update', [PermissionController::class, 'update'])->name('update');
            Route::delete('/delete', [PermissionController::class, 'delete'])->name('delete');
        });

    });

});
