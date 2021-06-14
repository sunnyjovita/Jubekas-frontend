<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
// use Illuminate\Validation\Rules\Password as RulesPassword;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use Auth;

use Illuminate\Support\Str;
use DB;

use Illuminate\Support\Facades\Mail;





use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends BaseController
{
    //

     public function forgotPassword(Request $req){
        $validator = Validator::make($req->all(), [
            'email'=>['required', 'string', 'email']
        ]);

        if($validator->fails()){
            // return 'error';
            return $this->responseError('Send Link Failed', 422, $validator->errors());
        }

        $email = $req->input('email');
           
           // check email exixts
        if(User::where('email', $email)->doesntExist()){
                // return $this->responseError([
                //     'message' => 'User doesn\'t exists!'
                // ], 404);
            return response()->json(['message'=>'User does not exist!']);
                // return 'user does not exists';
        }

            // generate token with random string
        $token = Str::random(10);
        try{


            DB::table('password_reset')->insert([
                'email' => $email,
                'token' => $token
        ]);

            // send email
            $user = User::where('email', $req->email)->first();

            $to_name = $user['name'];
            // $to_name = Auth::user()->name;
            // $to_email = 'RECEIVER_EMAIL_ADDRESS';
            $to_email = $email;
            $data = array('name'=>$to_name, "body" => "Change Password", 'token'=>$token);
            Mail::send('MailText', $data, function($message) use ($to_email, $to_name) {
            $message->to($to_email)
                    ->subject('Jubekas Change Password');
            $message->from('jubekas.id@gmail.com','Jubekas Website');
            });

            // return response()->json([])
            return response()->json(['message'=>'Check ur email']);
            // return $this->responseOk([
            //     'message' => 'Check ur email'
            // ]);
            // return 'check ur email';
            // return response([
            //     'message' =>'check your email!'
            // ]);

        }
        catch(\Exception $exception){
            return response([
                'message' => $exception->responseError()
            ], 400);
            // return $exception;
            // return response()->json(['message'=>'why error ']);


        }
        
    }

    public function reset(Request $request, $token){
        $validator = Validator::make($request->all(), [
            // 'token' => ['required'],
            'password'=> ['required', 'min:6'],
            'ConfirmPassword' => ['required', 'same:password']
        ]);

        if($validator->fails()){
            // return 'error';
            return $this->responseError('reset password failed', 422, $validator->errors());
        }


        // return none;
        // $token = $request->input('token');

        // match the token with the ones in the database
        if(!$passwordReset = DB::table('password_reset')->where('token', $token)->first()){
            // if token doesnt exist, return invalid token
            return responseError([
                'message'=>'Invalid token!'

            ], 400);


        }
        // check user exists or no
        if(!$user = User::where('email', $passwordReset->email)->first()){
            return responseError([
                'message'=>'User doesn\'t exists!'

            ], 404);

        }


        // hash the new password
        $user->password = Hash::make($request->input('password'));
        $user->save();


        return response()->json(['message' => 'Congratulations! Your password has been changed successfully.']);

            

    }

    // public function forgotPost(Request $req){
    	// dd($req->all());
    	// return($req->all());
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

    // }

   
}
