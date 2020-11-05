<?php

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});
Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::resource('user', UserController::class)->only([
    'show',
    'edit',
    'update',
]);

// routes for updating the password of the user .
Route::patch('/updatepassword/user/{user}', [ResetPasswordController::class, 'changePassword'])->name('update_password')->middleware('auth');

Route::get('/updatepassword', function () {
    return view('users.change_password');
})->name('update_password')->middleware('auth');

// route for testing .
Route::get('posts', function () {
    $posts = Post::paginate(4);
    return view('posts.show', compact('posts'));
});
