<?php

use Modules\Auth\Http\Controllers\AuthController;
use Modules\Auth\Http\Controllers\UserController;

Route::prefix('auth')->group(function () {
    Route::middleware(['auth:api'])
        ->get('/user',[UserController::class,'get']);

    Route::middleware(['guest:api'])
        ->post('/register',[AuthController::class,'register']);
});
