<?php

use App\Http\Controllers\BlogCategoriesController;
use App\Http\Controllers\VendorController;
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

Route::get('/admin/home', function () {
    return view('index');
});

Route::group(['prefix' => LaravelLocalization::setLocale()], function(){
    Route::group(['prefix'=> 'admin', 'as' => 'admin'], function(){

        Route::group(['prefix'=> 'vendor', 'as' => '.vendor.'], function(){
            Route::get('/', [VendorController::class, 'index'])->name('index');
            Route::get('/import', [VendorController::class, 'import'])->name('import');
            Route::post('/import/store', [VendorController::class, 'storeImport'])->name('import.store');
            Route::get('/create', [VendorController::class, 'create'])->name('create');
            Route::post('/store', [VendorController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [VendorController::class, 'edit'])->name('edit');
            Route::put('/update', [VendorController::class, 'update'])->name('update');
            Route::delete('/delete', [VendorController::class, 'delete'])->name('delete');
        });

        Route::group(['prefix'=> 'blog/categories', 'as' => '.blog.category.'], function(){
            Route::get('/', [BlogCategoriesController::class, 'index'])->name('index');
            Route::get('/create', [BlogCategoriesController::class, 'create'])->name('create');
            Route::post('/store', [BlogCategoriesController::class, 'store'])->name('store');
            Route::get('/edit/{id}', [BlogCategoriesController::class, 'edit'])->name('edit');
            Route::put('/update', [BlogCategoriesController::class, 'update'])->name('update');
            Route::delete('/delete', [BlogCategoriesController::class, 'delete'])->name('delete');
        });

    });

});
