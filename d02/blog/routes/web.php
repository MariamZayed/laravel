<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::resource('post', PostController::class);
Route::post('/posts/{post}/comment', [PostController::class, 'storeComment'])->name('posts.comment.store');    


Route::get('/', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::patch('/posts/{post}', [PostController::class, 'update'])->name('posts.update'); 
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 

// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 
// Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy'); 

