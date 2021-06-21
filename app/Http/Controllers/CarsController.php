<?php

namespace App\Http\Controllers;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Session;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cars()
    {


        $cars = Http::get(env('API_URL').'/api/cars')->json();
        // dd($cars);
        return view('cars',['cars'=>$cars]);

    }


    public function details($id){


        // $carsdetails = Http::get('http://127.0.0.1:8000/api/cars/details/'.$id);
        $carsdetails = Http::get(env('API_URL')."/api/cars/details/$id");
        $result = json_decode((string)$carsdetails->getBody(), true);
        // return $result;

        return view('detailsCars', ['cars'=>$carsdetails]);
    }

    public function search(Request $req){


        $data = $req->input();
        // dd($data);
        $input = $data['query'];
//        $input = $req->query();

        $response = Http::get(env('API_URL')."/api/search?query=$input");

        $result = json_decode((string)$response->getBody(), true);
        // return $response;
        // dd($result['cars']);
        session()->put([
             'cars' => $result['cars'],
            'clothes' => $result['clothes'],
            'property'=>$result['property'],
            'electronic'=>$result['electronic'],
            'furniture'=>$result['furniture']
             // 'phoneNumber' => $result['phoneNumber'],
              // 'email' => $result['email'],

        ]);

        return view('search', ['cars'=>session('cars'), 'clothes'=>session('clothes'), 'furniture'=>session('furniture'), 'electronic'=>session('electronic'), 'property'=>session('property')]);
        // return ('search', ['cars'=>session('cars'), 'clothes'=>session('clothes')]);

        // return view('search');
    }



    // static function chatSeller(Request $req){

    //     if(!Session::has('email')){
    //         return redirect('/login');
    //         // return 'https://wa.me/'Session::get(phoneNumber);
    //         // return back();
    //         // return "Hello this is chat seller page";
    //     }
    //     // else{

    //     // }

    // }










}
