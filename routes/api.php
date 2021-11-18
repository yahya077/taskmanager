<?php

use App\Http\Controllers\Api\V1\Auth\AuthController;
use App\Http\Controllers\Api\V1\Modules\ProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    //auth routes
    Route::prefix('auth')->group(function () {

        Route::post('register', [AuthController::class, 'register']);

        Route::post('login', [AuthController::class, 'login']);

        Route::middleware('auth:api')->group(function () {

            Route::get('user', [AuthController::class, 'user']);

            Route::post('logout', [AuthController::class, 'logout']);

        });
    });

    //project routes
    Route::apiResource('projects', ProjectController::class);

});
