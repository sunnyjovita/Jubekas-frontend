<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileController extends Controller
{
    //
    public function profile(){
    	// $user = User::all();
    	// return view('user-profile', ['user'=>$user]);
    	// $users = User::find($name);
    	// return $user;
    	// return view('user-profile', ['user'=>$users]);
    	return view('user-profile');
// 
    }
}
