<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserPostsController;
use App\Http\Controllers\UserPostCommentController;
use App\Http\Controllers\UserPostLikesController;
use App\Http\Controllers\BoxersController;
use App\Http\Controllers\BoxerPostsController;
use App\Http\Controllers\BoxerPostCommentController;
use App\Http\Controllers\BoxerPostLikesController;
use App\Http\Controllers\BoxerFollowController;
use App\Http\Controllers\GymController;
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

    Route::get('/user-posts', [UserPostsController::class, 'index'])->name('user_posts.index');
    Route::get('/user-posts/create', [UserPostsController::class, 'create'])->name('user_posts.create');
    Route::post('/user-posts', [UserPostsController::class, 'store'])->name('user_posts.store');
    Route::get('/user-posts/{userPost}', [UserPostsController::class, 'show'])->name('user_posts.show');
    Route::get('/user-posts/{userPost}/edit', [UserPostsController::class, 'edit'])->name('user_posts.edit');
    Route::put('/user-posts/{userPost}', [UserPostsController::class, 'update'])->name('user_posts.update');
    Route::delete('/user-posts/{userPost}', [UserPostsController::class, 'delete'])->name('user_posts.delete');

    Route::post('/user-posts/{userPost}/comments', [UserPostCommentController::class, 'store'])->name('user_post_comments.store');
    Route::get('/user-post-comments/{comment}/edit', [UserPostCommentController::class, 'edit'])->name('user_post_comments.edit');
    Route::put('/user-post-comments/{comment}', [UserPostCommentController::class, 'update'])->name('user_post_comments.update');
    Route::delete('/user-post-comments/{comment}', [USerPostCommentController::class, 'destroy'])->name('user_post_comments.destroy');

    Route::post('/user-posts/{userPost}/like', [UserPostLikesController::class, 'store'])->name('user_posts.like');
    Route::delete('/user-posts/{userPost}/like', [UserPostLikesController::class, 'destroy'])->name('user_posts.unlike');

    Route::get('/boxers', [BoxersController::class, 'index'])->name('boxers.index');
    Route::get('/boxers/create', [BoxersController::class, 'create'])->name('boxers.create');
    Route::post('/boxers', [BoxersController::class, 'store'])->name('boxers.store');
    Route::get('/boxers/{boxer}/edit', [BoxersController::class, 'edit'])->name('boxers.edit');
    Route::put('/boxers/{boxer}', [BoxersController::class, 'update'])->name('boxers.update');
    Route::get('/boxers/{boxer}', [BoxersController::class, 'show'])->name('boxers.show');

    Route::get('/boxers/{boxer}/posts', [BoxerPostsController::class, 'index'])->name('boxer_posts.index');
    Route::get('/boxers/{boxer}/posts/create', [BoxerPostsController::class, 'create'])->name('boxer_posts.create');
    Route::post('/boxers/{boxer}/posts', [BoxerPostsController::class, 'store'])->name('boxer_posts.store');
    Route::get('/boxer-posts/{post}/edit', [BoxerPostsController::class, 'edit'])->name('boxer_posts.edit');
    Route::put('/boxer-posts/{post}', [BoxerPostsController::class, 'update'])->name('boxer_posts.update');
    Route::delete('/boxer-posts/{post}', [BoxerPostsController::class, 'destroy'])->name('boxer_posts.destroy');

    Route::post('/boxer-posts/{post}/comments', [BoxerPostCommentController::class, 'store'])->name('boxer_post_comments.store');
    Route::get('/boxer-post-comments/{comment}edit', [BoxerPostCommentController::class, 'edit'])->name('boxer_post_comments.edit');
    Route::put('/boxer-post-comments/{comment}', [BoxerPostCommentController::class, 'update'])->name('boxer_post_comments.update');
    Route::delete('/boxer-post-comments/{comment}', [BoxerPostCommentController::class, 'destroy'])->name('boxer_post_comments.destroy');

    Route::post('/boxer-posts/{post}/like', [BoxerPostLikesController::class, 'store'])->name('boxer_posts.like');
    Route::delete('/boxer-posts/{post}/like', [BoxerPostLikesController::class, 'destroy'])->name('boxer_posts.unlike');

    Route::post('/boxers/{boxer}/follow', [BoxerFollowController::class, 'store'])->name('boxers.follow');
    Route::delete('/boxers/{boxer}/follow', [BoxerFollowController::class, 'destroy'])->name('boxers.unfollow');

    Route::resource('gyms', GymController::class)->only(['index', 'show']);
});
require __DIR__ . '/auth.php';
