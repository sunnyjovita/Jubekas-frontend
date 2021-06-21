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

        $response = $http->post(env('API_URL').'/api/login?',[
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

        $response = $http->post(env('API_URL').'/api/register?',[
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













//     function login(){
//         return User::all();
//         // return view('login');
//     }



//     function PostLogin(Request $req)
//     {

//     	$user = User::where(['email'=>$req->email])->first();
//      //    // return $user->password;
//         if(!$user || !Hash::check($req->password, $user->password)){
//             // $req->session()->flash('error', 'Invalid Email or Password');
//             // return "invalid password or email";
//             // return view('login');

//             // api
//             return response()->json(['error' => 'Unauthorized.'], 401);

//         }
//         else{
//      //        //if password and email are correct

//             $req->session()->put('user', $user);
//             // return $user->password;
//             // return redirect('/');



//          // return session('user');
//             // $req->session()->put('user', $user);
//             // $user = session()->get('user');
//             // return response()->json($user->name);
//             // return $user->name;


//             // api
//             $success['api_token'] = $user->api_token;
//             $success['name'] = $user->name;
//             return response()->json([$success, 'User login successfully']);
//      }
// }

//     function header(Request $req){
//         return response()->json(auth()->user());

//     }


//     function register(Request $req){
//         // return $req->input();
//         // return view('register');
//         // if($req->input() == 'null'){
//         //     return "sorry";
//         // }
//         // else{
//         //     return redirect('login');
//         // }

//          if(empty($req->input('name') || $req->input('email') || $req->input('phoneNumber') || $req->input('password'))) {

//             // $req->session()->flash('error', 'Invalid input');
//             // return view('login');
//             // return view('register');

//             //api
//             return response()->json(['error' => 'Invalid Input.'], 401);

//             // return 'invalid input';
//                 }
//     else{
//         $validateEmail = User::where(['email'=>$req->email])->first();

//         if(strlen($req->input('password')) <6 ){
//             // $req->session()->flash('error', 'Invalid length for password (at least 6 characters)');
//             // return view('login');
//             // return view('register');

//             // api
//         return response()->json(['error' => 'Wrong password length'], 401);

//         }
//         else if($req->input('password') != $req->input('confirmPassword')){
//             $req->session()->flash('error', 'Password and confirm password are not match');
//             // return view('register');

//             // api
//              return response()->json(['error' => 'Different confirm password'], 401);

//         }
//         else if($validateEmail){
//             $req->session()->flash('error', 'Email account already exists');
//             // return view('register');
//             // return 'error email';

//             // api
//             return response()->json(['error' => 'Email already exists'], 401);

//         }
//         else{
//             $user = new User;

//             $user->name=$req->name;
//             $user->email=$req->email;
//             $user->phoneNumber=$req->phoneNumber;
//             $user->password=Hash::make($req->password);
//             $user->api_token = Str::random(60);

//             $user->save();
//             // return redirect('/login');

//             //api

//             $success['api_token'] = $user->api_token;
//             $success['name'] = $user->name;


//             return response()->json([$success, 'User registered successfully']);


//     }
//         }

//     }



// }

