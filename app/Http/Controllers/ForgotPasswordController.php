<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\UserController;
<<<<<<< HEAD

use Illuminate\Support\Facades\Session;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

// include validator class
use Illuminate\Support\Facades\Validator;
=======
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
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

use Illuminate\Support\Facades\Mail;





use App\Http\Requests\ForgotPasswordRequest;

class ForgotPasswordController extends BaseController
{
    //
<<<<<<< HEAD
    public function forgot(){
    	 if(Session::has('email')){
            return redirect('/');
        }else{
            return view('forgot-password');

        }
    }

    public function forgotPost(Request $req){
=======

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
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

        $validator = Validator::make($req->all(), [
            'email'=>['required', 'string', 'email'],
        ]);

        if($validator->fails()){
             $req->session()->flash('error', 'Invalid Email');
            return view('forgot-password');
             // return redirect('login');
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        // fetch data from API
        $email = $req->email;

        $response = $http->post('http://127.0.0.1:8000/api/forgot-password?',[
            
            'query'=>[
                'email'=>$email,

            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);

        session()->put([
            'message'=>$result['message']

        ]);

        // dd(session('message'));
        // return $result;
        if(session('message') == 'User does not exist!'){
            $req->session()->flash('error', session('message'));

        }
        else{
            $req->session()->flash('success', session('message'));
        }
        // return redirect('forgot-password');
        return view('forgot-password');
       


        }
        catch(\Exception $e){
            $req->session()->flash('error', 'Invalid Email');
            return view('forgot-password');

            // return $e;

        } 

<<<<<<< HEAD
    }


    public function reset(Request $req, $token){
        $validator = Validator::make($req->all(), [
            // 'email'=>['required', 'string', 'email']
            // 'token' => ['required'],
            'password' => ['required', 'string', 'min:6'],
            'ConfirmPassword' => ['required', 'string'],
        ]);

        if($validator->fails()){
             if(empty($req->input('password')) ){
    //     // dd('input is empty.');
            $req->session()->flash('error', 'Invalid input');
    //         // return view('login');
            return view('ResetPassword');
    } 
        
        else if($req->input('password') != $req->input('ConfirmPassword')){
            $req->session()->flash('error', 'Password and confirm password are not match');
            return view('ResetPassword');

        }
       }
            try{

                $http = new \GuzzleHttp\Client;

            // // fetch data for API
            $password = $req->password;
            $ConfirmPassword = $req->ConfirmPassword;


            $response = $http->post("http://127.0.0.1:8000/api/reset-password/$token?",[
                
                'query'=>[
                    'password'=>$password,
                    'ConfirmPassword'=>$ConfirmPassword

                ]
            ]);

            // $response = Http::post("http://127.0.0.1:8000/api/reset-password/$token?",[
            //     'query'=>[
            //         'password'=>$password,
            //         'ConfirmPassword'=>$ConfirmPassword
            //     ]

            // ]);

            $result = json_decode((string)$response->getBody(), true);
            // return $result;
            // dd($result);

            $req->session()->flash('success', 'Congratulations! Your password has been changed successfully.');
            // return redirect('/');
            Session::forget($token);
            // return view('home');
            return redirect('/');




            }catch(\Exception $e){

                 $req->session()->flash('error', 'Invalid Input');
                return view('ResetPassword');

            }
        
            



    }
=======
    // }

   
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
}
