<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\SearchController;
use App\Http\Controllers\Api\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


// Auth Controller for login and register and logout

Route::controller(AuthController::class)->group(function () {
    Route::post('register', 'register')->name('register');
    Route::post('login', 'login')->name('login');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});

//category controller for get all categories and create and update and delete

Route::controller(CategoryController::class)->group(function () {
    Route::get('categories', 'index');
    Route::post('categories', 'store');
    Route::get('categories/{id}', 'show');
    Route::put('categories/{id}', 'update');
    Route::delete('categories/{id}', 'destroy');
});

//car controller for get all cars and create and update and delete

Route::controller(CarController::class)->group(function () {
    Route::get('cars', 'index');
    Route::post('cars', 'store');
    Route::get('cars/{id}', 'show');
    Route::put('cars/{id}', 'update');
    Route::delete('cars/{id}', 'destroy');
});

// like controller for like or unlike the car

Route::post('cars/{car}/likeOrUnlike', LikeController::class);

// Route for home page to show categories and cars

Route::get('home', HomeController::class);

// Route for get search for car

Route::post('cars/search', SearchController::class);
