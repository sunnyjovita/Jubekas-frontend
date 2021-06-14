<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Main;
use App\Http\Controllers\ClothesController;
// use App\Http\Controllers\FlashMessageController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CarsController;


use App\Mail\ForgotMail;


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

// Route::get('/', function () {
// 	// return "Sunny";
// 	// $array = ["Sunny", "Danka"];
//     // return $array;
//     return view('Main');
// });

// Route::get('login',[UserController::class, 'login']);
// Route::get('/login', function () {
// 	// return "Sunny";
// 	// $array = ["Sunny", "Danka"];
//     // return $array;
//     return view('login');
// });


// register
// Route::get('/register', function(){
// 	return view('register');
// });



// for logout
// Route::get('/logout', function(){
// 	Session::forget('user');
// 	return redirect('/');
// });

// before login
// Route::get('/', [Main::class, 'index']);


// email MOVE THIS TO FRONTEND


// for login (the / also need to put login)
// Route::post("login", [UserController::class, 'PostLogin']);

// Route::post("/register", [UserController::class, 'register']);

// after login homepage
// Route::get("/", [HomeController::class, 'homepage']);

// Route::get("/", [Main::class, 'index']);

// Route::get("clothes",[ClothesController::class, 'clothes']);
// route for details clothes page
// Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// Route::get('cars', [CarsController::class, 'cars']);
// Route::get('cars/details/{id}',[CarsController::class, 'details']);


// Auth::routes();

Route::get('/', function () {
    return view('home');
});

// Route::get('/home', 'HomeController@homepage')->name('home');
// Auth::routes();

// Route::get('reset-password', function(){

// return view('ResetPassword');


// });


// route for searching clothes
// Route::get('search', [ClothesController::class, 'search']);
// Route::get('search', [CarsController::class, 'search']);


// chat to seller
// Route::post('chat-seller', [ClothesController::class, 'chatSeller']);
// Route::post('chat-seller', [CarsController::class, 'chatSeller']);

// forgot password
// Route::get('forgot-password', [ForgotPasswordController::class, 'forgot']);
// Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPost']);

// Route::get('/alert', [UserController::class, 'alert']);
// Route::get('/get-pesan', 'FlashMessageController@pesan');
// Route::get('/get-pesan', [FlashMessageController::class, 'pesan']);

Route::get('user-profile', [ProfileController::class, 'profile']);

Route::get('category', [CategoryController::class, 'index']);


