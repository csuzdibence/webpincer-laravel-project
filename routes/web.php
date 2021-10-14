<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/restaurant/{restaurant}', [RestaurantController::class, 'show'])->name('restaurants.details');

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('auth.register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionController::class, 'create'])->name('auth.login');
    Route::post('/login', [SessionController::class, 'store']);
});

Route::middleware(['auth'])->group(function() {
    Route::post('/logout', [SessionController::class, 'destroy'])->name('auth.logout');
    Route::get('/createRestaurant', [RestaurantController::class, 'create'])->name('restaurant.create');
    Route::post('/createRestaurant', [RestaurantController::class, 'store']);
    Route::get('/createFood', [FoodController::class, 'create'])->name('food.create');
    Route::post('/createFood', [FoodController::class, 'store']);

});