<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class hehe extends Controller
{
    //
    public function getData(){
    	// api data should be in json format
    	return ["name"=>"sunny"];
    }
}
