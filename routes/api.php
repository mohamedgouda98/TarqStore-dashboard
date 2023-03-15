<?php

use App\Http\Controllers\Api\AuthApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['middleware'=> 'api'], function(){
    Route::post('login', [AuthApiController::class, 'login']);
});

Route::group(['middleware'=> 'auth:api'], function(){
    Route::get('home', [AuthApiController::class, 'home']);
});
