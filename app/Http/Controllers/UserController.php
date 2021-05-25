<?php

namespace App\Http\Controllers;

// implement hash
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// take it from models
use App\Models\User;
// use App\Models\Clothes;

use Illuminate\Support\Facades\Session;



use Illuminate\Validation\ValidationException;

// use resources/lang/en/auth.php;

// include validator class
use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    function login(Request $req)
    {

    	$user = User::where(['email'=>$req->email])->first();
     //    // return $user->password;
        if(!$user || !Hash::check($req->password, $user->password)){
            $req->session()->flash('error', 'Invalid Email or Password');
            return view('login');
            // return redirect('login');
        }
        else{
     //        //if password and email are correct
            $req->session()->put('user', $user);
            return redirect('/');
     // //        // return view('Main');
        }
    
}


    function register(Request $req){
        // return $req->input();
        // return view('register');
        // if($req->input() == 'null'){
        //     return "sorry";
        // }
        // else{
        //     return redirect('login');        
        // }

         if(empty($req->input('name') || $req->input('email') || $req->input('phoneNumber') || $req->input('password'))) {
        // dd('input is empty.');
            $req->session()->flash('error', 'Invalid input');
            // return view('login');
            return view('register');
    } 
    else{
        $validateEmail = User::where(['email'=>$req->email])->first();

        if(strlen($req->input('password')) <6 ){
            $req->session()->flash('error', 'Invalid length for password (at least 6 characters)');
            // return view('login');
            return view('register');
        }
        else if($req->input('password') != $req->input('confirmPassword')){
            $req->session()->flash('error', 'Password and confirm password are not match');
            return view('register');

        }
        else if($validateEmail){
            $req->session()->flash('error', 'Email account already exists');
            return view('register');
        }
        else{
            $user = new User;
        
            $user->name=$req->name;
            $user->email=$req->email;
            $user->phoneNumber=$req->phoneNumber;
            $user->password=Hash::make($req->password);

            $user->save();
            return redirect('/login');
        // dd('successfully saved input');
    }
        }

    }

    

}
