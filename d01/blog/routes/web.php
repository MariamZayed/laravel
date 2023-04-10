<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show'); 
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); 
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');