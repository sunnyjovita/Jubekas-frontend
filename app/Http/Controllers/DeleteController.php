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
    public function deleteCars($id, Request $req){

    	$cars = Http::delete(env('API_URL')."api/delete/car/$id");

        // $id = Session::get('id');
         $req->session()->flash('success', 'successfully deleted ur product');

//         return view('profile.user-profile');
//        return redirect()->to('user-profile/products/'.$id);
         return view('profile.user-profile',['cars'=>$cars]);


    }

    public function deleteClothes($id){
    	$clothes = Http::delete(env('API_URL')."api/delete/clothes/$id");

        // $id = Session::get('id');
         // $req->session()->flash('success', 'successfully deleted ur product');
        // return view('profile.user-profile');
        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteElectronic($id){
    	$electronic = Http::delete(env('API_URL')."api/delete/electronic/$id");

        $id = Session::get('id');
        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteFurniture($id){
    	$furniture = Http::delete(env('API_URL')."api/delete/furniture/$id");
        $id = Session::get('id');


        return redirect()->to('user-profile/products/'.$id);

    }

    public function deleteProperty($id){

    	$property = Http::delete(env('API_URL')."api/delete/property/$id");
        $id = Session::get('id');


        return redirect()->to('user-profile/products/'.$id);
    }
}
