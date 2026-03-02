<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v1', 'as' => 'api.v1.'], function () {
    Route::post('/login', [AuthController::class, 'login']);

    Route::group(['prefix' => 'products', 'as' => 'products.'], function () {
        Route::get('/', [ProductController::class, 'listProducts'])->name('list');
        Route::get('/{id}', [ProductController::class, 'show'])->name('show');
    });

    Route::group(['middleware' => 'auth:sanctum'], function () {});
});
