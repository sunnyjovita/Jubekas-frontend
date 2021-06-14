<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            'email'=>['required', 'string', 'email'],
            'name'=>['required', 'string'],
            'message'=>['required', 'string']
        ]);

        if($validator->fails()){

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



}
