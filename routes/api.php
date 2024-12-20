<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\PostController;

Route::apiResource('categories', CategoryController::class);
Route::apiResource('posts', PostController::class);

//Route::get('/test', function() {
//    return 'Test route works';
//});
//
