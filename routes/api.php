<?php

use App\Http\Controllers\Api\v1\PostActionController;
use App\Http\Controllers\Api\v1\PostController as V1PostController;
use Illuminate\Support\Facades\Route;

/**
 * Example for the simple projects
 */
Route::prefix('v1')->group(function () {
    Route::apiResource('posts', V1PostController::class)->only(['index', 'show']);

    Route::prefix('posts/{post}')->group(function () {
        Route::patch('/update-status', [PostActionController::class, 'updateStatus']);
    });
});
