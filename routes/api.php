<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [PostController::class, 'getAll']);
Route::get('/posts/{postId}', [PostController::class, 'getOne']);
Route::get('/comments', [CommentController::class, 'getAll']);

Route::post('/posts', [PostController::class, 'postOne']);

Route::put('/posts/{postId}', [PostController::class, 'updateOne']);

Route::delete('/posts/{postId}', [PostController::class, 'deleteOne']);
