<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\FollowingController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if(Auth::user()) {
    return redirect(route('posts.index'));
    }
    return view('welcome');

})->name('welcome');

Route::get('/dashboard', function () {
    return redirect(route('posts.index'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('posts', PostsController::class)->middleware('auth');

Route::post('/comments', [CommentsController::class,'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentsController::class,'destroy'])->name('comments.destroy');


Route::get('/category/{category}', [CategoryController::class,'show'])->name('category.show');

Route::get('/profile/{id}', [ProfileController::class,'show'])->name('profile.show');

Route::middleware('auth')->group(function () {
    Route::post('/follow/{user}', [FollowingController::class,'follow'])->name('follow');
    Route::delete('/unfollow/{user}', [FollowingController::class,'unfollow'])->name('unfollow');
    Route::post('/followCategory/{category}', [FollowingController::class,'followCategory'])->name('followCategory');
    Route::delete('/unfollowCategory/{category}', [FollowingController::class,'unfollowCategory'])->name('unfollowCategory');
    Route::get('/followAuthors', [FollowingController::class,'followAuthors'])->name('followAuthors');
    Route::get('/followCategories', [FollowingController::class,'followCategories'])->name('followCategories');
    Route::post('/savePost/{post}', [PostsController::class,'savePost'])->name('SavePost');
    Route::get('/saved', [PostsController::class,'indexSaved'])->name('posts.saved');
    Route::get('/followings', [FollowingController::class,'followings'])->name('followings');
    Route::get('/followers', [FollowingController::class,'followers'])->name('followers');
});

Route::get('/search', [SearchController::class,'results'])->name('SearchResult');

require __DIR__.'/auth.php';
