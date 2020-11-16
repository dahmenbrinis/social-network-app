<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
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
    return view('welcome');
})->name('home');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
    Route::resource('post', PostController::class);
    Route::resource('post/{post}/comment', CommentController::class)->names([
        'store' => 'comment.store'
    ]);
    Route::post('/like/{post}', [ReactionController::class, 'like'])->name('like');
    Route::resource('friend', FriendsController::class);
});

//Route::prefix('freinds')->group(function () {
//    Route::get('/',[\App\Http\Controllers\FriendsController::class, 'index',]);
//});

// route for testing .

Route::get('test1', function () {
    return view('posts.index');
})->name('test1');
Route::get('/test2', [ReactionController::class, 'like'])->name('test2');
