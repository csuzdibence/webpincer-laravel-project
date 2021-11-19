<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\RestaurantController;
use App\Models\Restaurant;
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
Route::get('/food/{food}', [FoodController::class, 'show'])->name('food.details');

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
    Route::get('/food/{food}/edit', [FoodController::class, 'edit'])->name('food.edit');
    Route::post('/food/{food}/edit', [FoodController::class, 'up']);
    Route::get('/restaurant/{restaurant}/edit', [RestaurantController::class, 'edit'])->name('restaurant.edit');
    Route::post('/restaurant/{restaurant}/edit', [RestaurantController::class, 'update']);
    Route::post('/restaurant/{restaurant}/comment', [RestaurantController::class, 'comment'])->name('restaurants.comment');
    Route::post('/resutarant/{restaurant}/image', [RestaurantController::class, 'uploadImage'])->name('restaurant.image');
});