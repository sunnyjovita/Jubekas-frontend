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

<<<<<<< HEAD
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
=======
// Route::get('login',[UserController::class, 'login']);
// Route::get('/login', function () {
// 	// return "Sunny";
// 	// $array = ["Sunny", "Danka"];
//     // return $array;
//     return view('login');
// });
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

Route::post('reset-password/{token}', [ForgotPasswordController::class, 'reset']);

// register
<<<<<<< HEAD
Route::get('register', [UserController::class, 'register_authen']);
=======
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
// Route::get('/register', function(){
// 	return view('register');
// });

Route::get('/main', [Main::class, 'index']);

Route::get('/', function(){
	return view('home');
});

// for logout
<<<<<<< HEAD
Route::get('/logout', [UserController::class, 'logout']);
=======
// Route::get('/logout', function(){
// 	Session::forget('user');
// 	return redirect('/');
// });
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

// before login
// Route::get('/', [Main::class, 'index']);

// search product
Route::get('search', [CarsController::class, 'search']);

// email MOVE THIS TO FRONTEND


<<<<<<< HEAD
Route::post("/register", [UserController::class, 'register']);
=======
// for login (the / also need to put login)
// Route::post("login", [UserController::class, 'PostLogin']);

// Route::post("/register", [UserController::class, 'register']);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

// after login homepage
// Route::get("/", [HomeController::class, 'homepage']);

// Route::get("/", [Main::class, 'index']);

<<<<<<< HEAD
//clothes
Route::get("clothes",[ClothesController::class, 'clothes']);
Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// cars
Route::get('cars', [CarsController::class, 'cars']);
Route::get('cars/details/{id}',[CarsController::class, 'details']);
=======
// Route::get("clothes",[ClothesController::class, 'clothes']);
// route for details clothes page
// Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// Route::get('cars', [CarsController::class, 'cars']);
// Route::get('cars/details/{id}',[CarsController::class, 'details']);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667


// Auth::routes();

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', 'HomeController@homepage')->name('home');
// Auth::routes();

<<<<<<< HEAD
// contact us
Route::get('contact-us', [ContactController::class, 'contact']);
Route::post('contact-us', [ContactController::class, 'contactPost']);
=======
// Route::get('reset-password', function(){

// return view('ResetPassword');


// });
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667


// route for searching clothes
// Route::get('search', [ClothesController::class, 'search']);
<<<<<<< HEAD

// privacy policy
Route::get('privacy-policy', function(){

return view('terms');

});
=======
// Route::get('search', [CarsController::class, 'search']);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667


// chat to seller
// Route::post('chat-seller', [ClothesController::class, 'chatSeller']);
// Route::post('chat-seller', [CarsController::class, 'chatSeller']);

// forgot password
// Route::get('forgot-password', [ForgotPasswordController::class, 'forgot']);
// Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPost']);

// Route::get('/alert', [UserController::class, 'alert']);
// Route::get('/get-pesan', 'FlashMessageController@pesan');
// Route::get('/get-pesan', [FlashMessageController::class, 'pesan']);

// get user information
Route::get('user-profile', [ProfileController::class, 'profile']);

Route::get('category', [CategoryController::class, 'index']);


