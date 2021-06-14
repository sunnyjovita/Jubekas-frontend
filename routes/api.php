<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\hehe;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClothesController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ContactController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [UserController::class, 'login'])->name('login');
Route::post("register", [UserController::class, 'register']);

// Route::get('user-profile', [UserController::class, 'profile']);

Route::middleware('auth:api')->group(function() {
    Route::get('user-profile', [UserController::class, 'profile']);
});

// route hehe example
Route::get("data", [hehe::class, 'getData']);

// reset password
Route::post('reset-password/{token}', [ForgotPasswordController::class, 'reset']);

// contact us 
Route::post('contact-us', [ContactController::class, 'contact']);

// Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// Route::get('login', [UserController::class, 'login']);

// forgot password
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPassword']);



Route::get('search', [CarsController::class, 'search']);

// cars
Route::get('cars', [CarsController::class, 'cars']);
Route::get('cars/details/{id}',[CarsController::class, 'details']);

// clothes
Route::get('clothes', [ClothesController::class, 'clothes']);
Route::get('clothes/details/{id}',[ClothesController::class, 'details']);


// Route::get('/logout', [UserController::class, 'logout']);
