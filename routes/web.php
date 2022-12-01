<?php

use App\Http\Controllers\VendorController;
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

Route::get('/admin/home', function () {
    return view('index');
});

Route::group(['prefix'=> 'admin', 'as' => 'admin'], function(){

    Route::group(['prefix'=> 'vendor', 'as' => '.vendor.'], function(){
        Route::get('/index', [VendorController::class, 'index']);
        Route::get('/create', [VendorController::class, 'create']);
        Route::post('/store', [VendorController::class, 'store'])->name('store');
        Route::get('/edit', [VendorController::class, 'edit']);
        Route::get('/update', [VendorController::class, 'update']);
        Route::get('/delete', [VendorController::class, 'delete']);
    });

});
