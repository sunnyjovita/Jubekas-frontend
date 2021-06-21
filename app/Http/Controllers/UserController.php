<?php

namespace App\Http\Controllers;


// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;



// implement hash
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
// use Illuminate\Support\Str;


use Illuminate\Support\Facades\Session;



// use Illuminate\Validation\ValidationException;

// include validator class
use Illuminate\Support\Facades\Validator;


class UserController extends Controller
{

    function login(){
        // return view('login');
        if(Session::has('email')){
            return redirect('/');
        }else{
            return view('login');
        }
    }


    function register_authen(){
        if(Session::has('email')){
            return redirect('/');

        }else{
            return view('register');
        }
    }



    function loginPost(Request $req)
    {

        $validator = Validator::make($req->all(), [
            'email'=>['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        if($validator->fails()){
             $req->session()->flash('error', 'Invalid Email or Password');
            return view('login');
             // return redirect('login');
        }

        try{

        $http = new \GuzzleHttp\Client;

        // fetch data from API
        $email = $req->email;
        $password = $req->password;

        $response = $http->post(env('API_URL').'api/login?',[
            'headers' =>[
                'Authorization' => 'Bearer'.session()->get('token.access_token')
            ],
            'query'=>[
                'email'=>$email,
                'password'=>$password
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);

        // return dd($result);
        // session([
        //    'token' => $result['token'],
        //     'name' => $result['name'],
        //      'phoneNumber' => $result['phoneNumber'],
        //       'email' => $result['email'],


        //  ]);

        session()->put([
            'id' => $result['id'],
             'token' => $result['token'],
            'name' => $result['name'],
             'phoneNumber' => $result['phoneNumber'],
              'email' => $result['email'],

        ]);

        // session()->put('token', $result['token']);

        // dd(session()->all());
        // dd(session('token'));
        return redirect('/');

       // $req->session()->put('user', '$user');
        // dd($data);
        // $req->session()->put('user');
        // return "hello";
        // return redirect('main');
        // return $result['data'];

        // if(!$result){
            // $req->session()->flash('error', 'Invalid Email or Password');
            // return view('login');
        // }else{

        // return redirect('/');
        // $user = Http::post('http://127.0.0.1:8000/api/cars');
        // return view('/', ['user'=>$user]);

        // $req->session()->put('user');
        // return view('/');


            // return redirect('/');
                // return view('/');


        // }

        }catch(\Exception $e){
            $req->session()->flash('error', 'Invalid Email or Password');
            return view('login');
            // return redirect('/');
            // return redirect()->back()->with($error);

        }

}



    function register(Request $req){

        $validator = Validator::make($req->all(), [
            'email'=>['required', 'string', 'email'],
            'password' => ['required', 'string', 'min:6'],
            'name' => ['required', 'string'],
            'phoneNumber' => 'required|regex:/(^62[0-9].*$)/',
            'confirmPassword' => ['required', 'string'],
        ]);

        if($validator->fails()){
            // return $this->responseError('Login Failed', 422, $validator->errors());
             if(empty($req->input('name') && $req->input('email') && $req->input('phoneNumber') && $req->input('password'))) {
    //     // dd('input is empty.');
            $req->session()->flash('error', 'Invalid input');
    //         // return view('login');
            return view('register');
    }

        else if($req->input('password') != $req->input('confirmPassword')){
            $req->session()->flash('error', 'Password and Confirm Password are not same');
            return view('register');

        }




        else{
             $req->session()->flash('error', 'Invalid Input');
                return view('register');
    //         // return $this->responseError('Registration Failed', 422, $validator->errors());
        }
    }
        try{

        $http = new \GuzzleHttp\Client;

        // fetch data from API
        $name = $req->name;
        $email = $req->email;
        $phoneNumber = $req->phoneNumber;
        $password = $req->password;
        $confirmPassword = $req->confirmPassword;

        $response = $http->post(env('API_URL').'api/register?',[
            'headers' =>[
                'Authorization' => 'Bearer'.session()->get('token.access_token')
            ],
            'query'=>[
                'name'=>$name,
                'email'=>$email,
                'phoneNumber'=>$phoneNumber,
                'password'=>$password,
                'confirmPassword'=>$confirmPassword
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
        // return dd($result);
        return redirect('login');



        }catch(\Exception $e){

                $req->session()->flash('error', 'Invalid Input');
                return view('register');

        }
    }

    public function logout(){
        Session::forget('token');
        Session::forget('name');
        Session::forget('email');
        Session::forget('phoneNumber');
        return redirect('login');
    }




    public function forgot(){
        if(Session::has('email')){
            return redirect('/');
        }else{
            return view('forgot-password');

        }
    }


}












