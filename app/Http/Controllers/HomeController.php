<?php

namespace App\Http\Controllers;

// all products
use App\Models\Clothes;
use App\Models\Cars;

use Illuminate\Http\Request;

class HomeController extends Controller
{

	@return void

	public function__construct(){
		$this->middleware('auth');
	}

	@return \Illuminate\Http\Response

    public function homepage(){
    	// $furniture = Furniture::all();
    	// $clothes = Clothes::all();
    	// return [$furniture, $clothes];
    	// return "Welcome to home page after login";
    	// return view('home', ['furniture'=>$furniture, 'clothes'=>$clothes]);
    	return view('home');
    }

    
}
