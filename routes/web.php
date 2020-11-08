<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ReactionController;
use App\Models\Post;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', [PostController::class, 'index'])->name('dashboard');
Route::resource('post', PostController::class)->middleware(['auth:sanctum', 'verified']);
Route::resource('post/{post}/comment', CommentController::class)->middleware(['auth:sanctum', 'verified'])->names([
    'store' => 'comment.store'
]);
Route::post('/like/{post}', [ReactionController::class, 'like'])->name('like');
//Route::prefix('freinds')->group(function () {
//    Route::get('/',[\App\Http\Controllers\FriendsController::class, 'index',]);
//});
Route::resource('friend', FriendsController::class)->middleware(['auth:sanctum', 'verified']);

// route for testing .

Route::get('posts', function () {
    $posts = Post::paginate(4);
    return view('posts.index', compact('posts'));
})->name('testing');
Route::get('/test2', [ReactionController::class, 'like'])->name('test2');
