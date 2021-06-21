<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
// include validator class
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    //
    public function profile(){
    	// return view('user-profile');
    	 if(Session::has('email')){
            return view('profile.user-profile');
        }
        else{
            return redirect('/login');
        }
//
    }


    public function products($id){
         if(Session::has('email')){

        $result = Http::get(env('API_URL')."/api/user-profile/products/$id")->json();
        // return view('cars',['cars'=>$cars]);
        // dd($result);

        session()->put([
             'cars' => $result['cars'],
            'clothes' => $result['clothes'],
            'furniture'=>$result['furniture'],
            'electronics'=>$result['electronics'],
            'property'=>$result['property']

        ]);
        return view('showProducts', ['furniture'=>session('furniture'), 'cars'=>session('cars'), 'clothes'=>session('clothes'), 'electronics'=>session('electronics'), 'property'=>session('property')]);
        // return view('showProducts', ['cars'=>session('cars'), 'clothes'=>session('clothes')]);
        }
        else{
            return redirect('/login');
        }
    }

    public function updateProfile(){

         if(Session::has('email')){
            return view('profile.updateProfile');
        }
        else{
            return redirect('/login');
        }
    }

    public function updateProfilePost(Request $req){
        $validator = Validator::make($req->all(), [
            'name'=>['required', 'string'],
            'email'=>['required', 'string', 'email'],
            'phoneNumber' => 'required|regex:/(^62[0-9].*$)/',
        ]);

        if($validator->fails()){
             $req->session()->flash('error', 'Invalid Input');
            return view('profile.updateProfile');
            // return $this->responseError('Update User Failed', 422, $validator->errors());
        }


        try{

        $http = new \GuzzleHttp\Client;

        // fetch data for API
        $id = $req->id;
        $name = $req->name;
        $email = $req->email;
        $phoneNumber = $req->phoneNumber;

        $response = $http->post(env('API_URL').'/api/update-profile?',[
            'query'=>[
                'id'=>$id,
                'name'=>$name,
                'email'=>$email,
                'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);

        // dd($result);

        session()->put([
            'message'=>$result['message'],
            'id' => $result['id'],
            'name' => $result['name'],
             'phoneNumber' => $result['phoneNumber'],
              'email' => $result['email'],

        ]);
        $req->session()->flash('success', session('message'));
        return view('profile.user-profile');
        // return redirect('/user-profile');



        }catch(\Exception $e){
            // dd($e);
            $req->session()->flash('error', 'Invalid Input');
            return view('profile.updateProfile');
            // return redirect('/');
            // return redirect()->back()->with($error);

        }
    }


}
