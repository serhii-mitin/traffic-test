<?php

use App\Http\Controllers\Api\v1\PostActionController as V1PostActionController;
use App\Http\Controllers\Api\v1\PostController as V1PostController;
use App\Http\Controllers\Api\v2\PostActionController as V2PostActionController;
use App\Http\Controllers\Api\v2\PostController as V2PostController;
use Illuminate\Support\Facades\Route;

/**
 * Example for the simple projects
 */
Route::prefix('v1')->group(function () {
    Route::apiResource('posts', V1PostController::class)->only(['index', 'show']);

    Route::prefix('posts/{post}')->group(function () {
        Route::patch('/update-status', [V1PostActionController::class, 'updateStatus']);
    });
});


/**
 * Advanced usage. Repository pattern
 */
Route::prefix('v2')->group(function () {
    Route::apiResource('posts', V2PostController::class)->only(['index', 'show']);

    Route::prefix('posts/{id}')->group(function () {
        Route::patch('/update-status', [V2PostActionController::class, 'updateStatus']);
    });
});
