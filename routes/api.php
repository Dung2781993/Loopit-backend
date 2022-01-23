<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;

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


Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login',  [AuthController::class, 'login']);
    Route::get('/refresh', [AuthController::class, 'refresh']);
    Route::group(['middleware' => 'auth:api'], function(){
        Route::post('/change-pass', [AuthController::class, 'changePassWord']);    
        Route::get('/user', [AuthController::class, 'userProfile']);
        Route::post('/logout', [AuthController::class, 'logout']);
    });
});

Route::prefix('car')->group(function () {
    Route::group(['middleware' => 'jwt.verify'], function(){
        Route::get('/getAll', [CarController::class, 'index']);
    });
});