<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Controllers\UserController;


use Illuminate\Support\Facades\Session;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

// include validator class
use Illuminate\Support\Facades\Validator;


class ForgotPasswordController extends Controller
{
    //

    public function forgot(){
    	 if(Session::has('email')){
            return redirect('/');
        }else{
            return view('forgot-password');

        }
    }

    public function forgotPost(Request $req){

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

        $response = $http->post(env('API_URL').'/api/forgot-password?',[

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


            $response = $http->post(env('API_URL')."/api/reset-password/$token?",[

                'query'=>[
                    'password'=>$password,
                    'ConfirmPassword'=>$ConfirmPassword

                ]
            ]);



            $result = json_decode((string)$response->getBody(), true);


            $req->session()->flash('success', 'Congratulations! Your password has been changed successfully.');

            return redirect('login');




            }catch(\Exception $e){

                 $req->session()->flash('error', 'Invalid Input');
                return view('ResetPassword');

            }





    }

    // }


}
