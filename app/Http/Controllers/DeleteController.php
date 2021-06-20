<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Session;
use Redirect;

class DeleteController extends Controller
{
    //
    public function deleteCars($id){

    	$cars = Http::delete("http://127.0.0.1:8000/api/delete/car/$id");
 
        // $id = Session::get('id');
        // $req->session()->flash('success', 'successfully deleted ur product');

        // return view('profile.user-profile');
        return redirect()->to('user-profile/products/'.$id);
        // return view('cars',['cars'=>$cars]);


    }

    public function deleteClothes($id){
    	$clothes = Http::delete("http://127.0.0.1:8000/api/delete/clothes/$id");
    	
        // $id = Session::get('id');
         // $req->session()->flash('success', 'successfully deleted ur product');
        // return view('profile.user-profile');
        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteElectronic($id){
    	$electronic = Http::delete("http://127.0.0.1:8000/api/delete/electronic/$id");
    	
        $id = Session::get('id');
        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteFurniture($id){
    	$furniture = Http::delete("http://127.0.0.1:8000/api/delete/furniture/$id");
        $id = Session::get('id');
        
       
        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteProperty($id){

    	$property = Http::delete("http://127.0.0.1:8000/api/delete/property/$id");
        $id = Session::get('id');
        

        return redirect()->to('user-profile/products/'.$id);
    }
}
