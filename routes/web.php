<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
// use App\Http\Controllers\Main;

// use App\Http\Controllers\FlashMessageController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SellController;
use App\Http\Controllers\UpdateProductController;
use App\Http\Controllers\DeleteController;


use App\Http\Controllers\CarsController;
use App\Http\Controllers\ElectronicController;
use App\Http\Controllers\FurnitureController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ClothesController;
// use App\Mail\ForgotMail;

Route::get('show', [SellController::class, 'show']);
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

// Route::get('login',[UserController::class, 'login']);
// Route::get('/login', function () {
// 	// return "Sunny";
// 	// $array = ["Sunny", "Danka"];
//     // return $array;
//     return view('login');
// });


Route::post('reset-password/{token}', [ForgotPasswordController::class, 'reset']);

// register

Route::get('register', [UserController::class, 'register_authen']);

// Route::get('/register', function(){
// 	return view('register');
// });

// Route::get('/main', [Main::class, 'index']);

Route::get('/', [HomeController::class, 'homepage']);
// for logout

Route::get('/logout', [UserController::class, 'logout']);

// Route::get('/logout', function(){
// 	Session::forget('user');
// 	return redirect('/');
// });


// before login
// Route::get('/', [Main::class, 'index']);

// search product
Route::get('/search', [CarsController::class, 'search']);


Route::post("/register", [UserController::class, 'register']);


//clothes
Route::get("clothes",[ClothesController::class, 'clothes']);
Route::get('/clothes/details/{id}', [ClothesController::class, 'details']);

// cars
Route::get('cars', [CarsController::class, 'cars']);
Route::get('/cars/details/{id}',[CarsController::class, 'details']);

//furniture
Route::get('furniture', [FurnitureController::class, 'furniture']);
Route::get('furniture/details/{id}',[FurnitureController::class, 'details']);

//electronics
Route::get('electronics', [ElectronicController::class, 'electronic']);
Route::get('electronics/details/{id}',[ElectronicController::class, 'details']);

//properties
Route::get('property', [PropertyController::class, 'property']);
Route::get('property/details/{id}',[PropertyController::class, 'details']);

// Route::get("clothes",[ClothesController::class, 'clothes']);
// route for details clothes page
// Route::get('clothes/details/{id}', [ClothesController::class, 'details']);

// Route::get('cars', [CarsController::class, 'cars']);
// Route::get('cars/details/{id}',[CarsController::class, 'details']);

// sell product
// for category
Route::get('sell-category', [SellController::class, 'sellCategory']);
// car
Route::get('sell-category/car', [SellController::class, 'Car']);
Route::post('sell-category/car', [SellController::class, 'PostCar']);

// clothes
Route::get('sell-category/clothes', [SellController::class, 'Clothes']);
Route::post('sell-category/clothes', [SellController::class, 'PostClothes']);

// furniture
Route::get('sell-category/furniture', [SellController::class, 'Furniture']);
Route::post('sell-category/furniture', [SellController::class, 'PostFurniture']);

// electronic
Route::get('sell-category/electronic', [SellController::class, 'Electronic']);
Route::post('sell-category/electronic', [SellController::class, 'PostElectronic']);

// properties
Route::get('sell-category/properties', [SellController::class, 'Properties']);
Route::post('sell-category/properties', [SellController::class, 'PostProperty']);


// update product
Route::get('/update/car/{id}', [UpdateProductController::class, 'updateCar']);
Route::post('update/car/{id}', [UpdateProductController::class, 'updateCarPost']);

Route::get('/update/clothes/{id}', [UpdateProductController::class, 'updateClothes']);
Route::post('update/clothes/{id}', [UpdateProductController::class, 'updateClothesPost']);

Route::get('/update/furniture/{id}', [UpdateProductController::class, 'updateFurniture']);
Route::post('update/furniture/{id}', [UpdateProductController::class, 'updateFurniturePost']);

Route::get('/update/electronic/{id}', [UpdateProductController::class, 'updateElectronic']);
Route::post('update/electronic/{id}', [UpdateProductController::class, 'updateElectronicPost']);

Route::get('/update/property/{id}', [UpdateProductController::class, 'updateProperty']);
Route::post('update/property/{id}', [UpdateProductController::class, 'updatePropertyPost']);


// delete product
Route::delete('delete/car/{id}', [DeleteController::class, 'deleteCars']);
Route::delete('delete/clothes/{id}', [DeleteController::class, 'deleteClothes']);
Route::delete('delete/furniture/{id}', [DeleteController::class, 'deleteFurniture']);
Route::delete('delete/electronic/{id}', [DeleteController::class, 'deleteElectronic']);
Route::delete('delete/property/{id}', [DeleteController::class, 'deleteProperty']);

// Auth::routes();

// Route::get('/', function () {
//     return view('home');
// });

// Route::get('/home', 'HomeController@homepage')->name('home');
// Auth::routes();


// contact us
Route::get('contact-us', [ContactController::class, 'contact']);
Route::post('contact-us', [ContactController::class, 'contactPost']);
// Route::get('reset-password', function(){

// return view('ResetPassword');


// });



// route for searching clothes
// Route::get('search', [ClothesController::class, 'search']);


// privacy policy
Route::get('privacy-policy', function(){

return view('terms');

});

// Route::get('search', [CarsController::class, 'search']);



// chat to seller
// Route::post('chat-seller', [ClothesController::class, 'chatSeller']);
// Route::post('/chat-seller', [CarsController::class, 'chatSeller']);

// forgot password
Route::get('forgot-password', [ForgotPasswordController::class, 'forgot']);
Route::post('forgot-password', [ForgotPasswordController::class, 'forgotPost']);

// Route::get('/alert', [UserController::class, 'alert']);
// Route::get('/get-pesan', 'FlashMessageController@pesan');
// Route::get('/get-pesan', [FlashMessageController::class, 'pesan']);

// get user information
Route::get('user-profile', [ProfileController::class, 'profile']);
// get user;s products
Route::get('/user-profile/products/{id}', [ProfileController::class, 'products']);
// edit profile (password, email, name, phone number)
Route::get('user-profile/update-profile', [ProfileController::class, 'updateProfile']);
Route::post('user-profile/update-profile', [ProfileController::class, 'updateProfilePost']);

Route::get('category', [CategoryController::class, 'category']);

Route::get('show', [SellController::class, 'show']);

