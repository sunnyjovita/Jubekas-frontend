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
use App\Http\Controllers\ContactController;



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

// Route::get('/','Main@index');


// for login (the / also need to put login)
// Route::get('/login', function () {
//     return view('login');
// });
Route::get("login", [UserController::class, 'login']);
Route::post("login", [UserController::class, 'loginPost']);

// Route::get('/', [Main::class, 'index'])->name('home');
Route::get('reset-password/{token}', function(){

return view('ResetPassword');

});

Route::post('reset-password/{token}', [ForgotPasswordController::class, 'reset']);

// register
Route::get('register', [UserController::class, 'register_authen']);
// Route::get('/register', function(){
// 	return view('register');
// });

Route::get('/main', [Main::class, 'index']);

Route::get('/', function(){
	return view('home');
});

// for logout
Route::get('/logout', [UserController::class, 'logout']);

// before login
// Route::get('/', [Main::class, 'index']);

// search product
Route::get('search', [CarsController::class, 'search']);


Route::post("/register", [UserController::class, 'register']);

// after login homepage
// Route::get("/", [HomeController::class, 'homepage']);

// Route::get("/", [Main::class, 'index']);

//clothes
Route::get("clothes",[ClothesController::class, 'clothes']);
Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// cars
Route::get('cars', [CarsController::class, 'cars']);
Route::get('cars/details/{id}',[CarsController::class, 'details']);


// Auth::routes();

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', 'HomeController@homepage')->name('home');
// Auth::routes();

// contact us
Route::get('contact-us', [ContactController::class, 'contact']);
Route::post('contact-us', [ContactController::class, 'contactPost']);


// route for searching clothes
// Route::get('search', [ClothesController::class, 'search']);

// privacy policy
Route::get('privacy-policy', function(){

return view('terms');

});


// chat to seller
Route::post('chat-seller', [ClothesController::class, 'chatSeller']);
Route::post('chat-seller', [CarsController::class, 'chatSeller']);

// forgot password
Route::get('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPost']);

// Route::get('/alert', [UserController::class, 'alert']);
// Route::get('/get-pesan', 'FlashMessageController@pesan');
// Route::get('/get-pesan', [FlashMessageController::class, 'pesan']);

// get user information
Route::get('user-profile', [ProfileController::class, 'profile']);

Route::get('category', [CategoryController::class, 'index']);


