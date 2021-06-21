<?php

namespace App\Http\Controllers;

// all products



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

class HomeController extends Controller
{

    // public function homepage(){

    // 	return view('home');
    // }

    public function homepage(){

    	$result = Http::get(env('API_URL').'api/getPost')->json();
        // dd($cars);

        session()->put([
             'cars' => $result['cars'],
            'clothes' => $result['clothes'],
            'property'=>$result['property'],
            'electronic'=>$result['electronic'],
            'furniture'=>$result['furniture']
             // 'phoneNumber' => $result['phoneNumber'],
              // 'email' => $result['email'],

        ]);
        return view('home', ['cars'=>session('cars'), 'clothes'=>session('clothes'), 'furniture'=>session('furniture'), 'electronic'=>session('electronic'), 'property'=>session('property')]);
    }


}
