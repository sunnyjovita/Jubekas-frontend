<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\Session;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

// include validator class
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    //
    public function contact(){
    	return view('contact.contact-us');
    }

    public function contactPost(Request $req){
    		 $validator = Validator::make($req->all(), [
=======
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ContactController extends BaseController
{
    //

    public function contact(Request $req){
    	$validator = Validator::make($req->all(), [
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
            'email'=>['required', 'string', 'email'],
            'name'=>['required', 'string'],
            'message'=>['required', 'string']
        ]);

        if($validator->fails()){
<<<<<<< HEAD

        	if(empty($req->input('email') && $req->input('name') && $req->input('message') )){
             $req->session()->flash('error', 'Invalid Input');
        	}

        	else{
        	$req->session()->flash('error', 'Invalid Input');

        	}
            return view('contact.contact-us');
             // return redirect('login');
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        // fetch data for API
        $email = $req->email;
        $name = $req->name;
        $message = $req->message;

        $response = $http->post('http://127.0.0.1:8000/api/contact-us?',[
            
            'query'=>[
                'email'=>$email,
                'name'=>$name,
                'message'=>$message

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
            $response = $http->post('https://script.google.com/macros/s/AKfycbzvjZYv1JZgvnMOQBzvsdV2mC3yavIN3kTXUnrETv0YGgVwy0A9/exec',[
            
            'query'=>[
                'email'=>$email,
                'name'=>$name,
                'message'=>$message

            ]
        ]);
        }
        // return redirect('forgot-password');
        return view('home');
       


        }
        catch(\Exception $e){
            $req->session()->flash('error', 'Invalid Input');
            return view('contact.contact-us');

            // return $e;

        } 
    }



=======
            // return 'error';
            return $this->responseError('Send Link Failed', 422, $validator->errors());
        }


        // check if email exist or no
        $email = $req->input('email');
                   // check email exixts
        if(User::where('email', $email)->doesntExist()){
                // return $this->responseError([
                //     'message' => 'User doesn\'t exists!'
                // ], 404);
            return response()->json(['message'=>'User does not exist!']);
                // return 'user does not exists';
        }

         try{

            // send email
            $user = User::where('email', $req->email)->first();

            $to_name = $user['name'];
            // $to_name = Auth::user()->name;
            // $to_email = 'RECEIVER_EMAIL_ADDRESS';
            $to_email = $email;
            $data = array('name'=>$to_name, "body" => "Thank You");
            Mail::send('contact-us', $data, function($message) use ($to_email, $to_name) {
            $message->to($to_email)
                    ->subject('Thank you for contacting us');
            $message->from('jubekas.id@gmail.com','Jubekas Website');
            });

            // return response()->json([])
            return response()->json(['message'=>'Thank you for contacting us! We will get back to you soon.']);
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
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
}
