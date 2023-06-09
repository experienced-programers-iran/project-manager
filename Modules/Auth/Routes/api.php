<?php

use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\UserController;

Route::prefix('auth')->group(function () {
    Route::middleware(['auth:api'])->group(function () {
        Route::get('/user',[AuthController::class,'getUser']);
    });

    Route::middleware(['guest:api'])->group(function () {
        Route::post('/register',[AuthController::class,'register']);
        Route::post('/login',[AuthController::class,'login']);
    });
});
