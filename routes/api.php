<?php

use App\Http\Controllers\V1\Auth\AuthController;
use App\Http\Controllers\V1\Auth\LogoutController;
use App\Http\Controllers\V1\Auth\RefreshController;
use App\Http\Controllers\V1\Auth\RegistrationController;
use App\Http\Controllers\V1\StatementController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('/registration', [RegistrationController::class, 'registration']);
        Route::post('/login', [AuthController::class, 'auth']);
        Route::post('/logout', [LogoutController::class, 'logout']);
        Route::post('/refresh', [RefreshController::class, 'refresh']);
    });

    Route::middleware('auth:api')->group(function () {
        Route::apiResource('/statement', StatementController::class);
    });
});
