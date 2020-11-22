<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Http\Controllers\UserController;
use App\Notifications\FreindRequest;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.guest');
})->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::resource('userProfile', UserController::class);
    Route::resource('post', PostController::class)->except(['index']);

    Route::get('test', function () {
        return view('test');
    })->name('test');
//    Route::resource('post/{post}/comment', CommentController::class)->names([
//        'store' => 'comment.store'
//    ]);
//    Route::post('/like/{post}', [ReactionController::class, 'like'])->name('like');
//    Route::resource('friend', FriendsController::class);
});


//Route::prefix('freinds')->group(function () {
//    Route::get('/',[\App\Http\Controllers\FriendsController::class, 'index',]);
//});

// route for testing .

Route::get('/test2', [ReactionController::class, 'like'])->name('test2');
Route::get('test3', function () {
//    dd('hello');
//    \App\Models\User::find(1)->notify(new FreindRequest());
//    dd('worked');
//    return view('posts.index');
    return 'test3 page';
})->name('test3');
