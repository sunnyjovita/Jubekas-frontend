<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\UserController;
use App\Models\User;



class ForgotPasswordController extends Controller
{
    //
    public function forgot(){
    	return view('forgot-password');
    }

    public function forgotPost(Request $req){
    	// dd($req->all());
    	return($req->all());
    	// return redirect('/');

    	// // get the email from the request input
    	// $user = User::whereEmail($req->email)->first();
    	// if($user == null){
    	// 	return redirect()->back()->with(['error' => 'Email not exists']);
    	// }
    	// $user = Sentinel::findById($user->id);

    	// // if the user doesnt exist, we will create a reminder
    	// $reminder = Reminder::exists($user) ?: Reminder::create($user);
    	// // after creating a reminder, send an email to the input email address
    	// $this->sendEmail($user, $reminder->code);

    	// return redirect()->back()->with(['success'=>'reset code sent to your email']);

    }

    // public function sendEmail($user, $code){
    // 	Mail::send(
    // 		'email.forgot-password',
    // 		['user' => $user, 'code' =>$code],
    // 		function($message) use ($user){
    // 			$message->to($user->email);
    // 			$message->subject("$user->name", "reset your password");

    // 		}

    // 	);
    // }
}
