<?php

use App\Http\Controllers\ProfileController;
use App\Http\controllers\UserPostsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user-posts', [UserPostsController::class, 'index'])->name('user_posts.index');
    Route::get('/user-posts/create', [UserPostsController::class, 'create'])->name('user_posts.create');
    Route::post('/user-posts', [UserPostsController::class, 'store'])->name('user_posts.store');
    Route::get('/user-posts/{userPost}/edit', [UserPostsController::class, 'edit'])->name('user_posts.edit');
    Route::put('/user-posts/{userPost}', [UserPostsController::class, 'update'])->name('user_posts.update');
    Route::delete('/user-posts/{userPost}', [UserPostsController::class, 'delete'])->name('user_posts.delete');
});

require __DIR__ . '/auth.php';
