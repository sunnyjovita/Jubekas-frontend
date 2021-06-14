<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Session;

class ProfileController extends Controller
{
    //
    public function profile(){
    	// return view('user-profile');
    	 if(Session::has('email')){
            return view('user-profile');
        }
        else{
            return redirect('/login');
        }
// 
    }
}
