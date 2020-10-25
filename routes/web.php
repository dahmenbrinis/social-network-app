<?php

use App\Models\Country;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
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
//    Country::factory()->create();
//    User::factory()->create();
    $users = User::all();
//    foreach ($users as $user) {
//        $user->products()->save(Product::factory()->create());
//    }
    $user = User::first();
    $country = Country::first();
    return view('welcome');

});

Auth::routes();
Route::resource('products',\App\Http\Controllers\ProductController::class);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/ss', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

