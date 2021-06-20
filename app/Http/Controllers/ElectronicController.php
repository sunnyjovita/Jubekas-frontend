<?php

namespace App\Http\Controllers;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Session;

class ElectronicController extends Controller
{
    //
     public function electronic()
    {

        $electronic = Http::get('http://127.0.0.1:8000/api/electronic')->json();

        return view('product.Electronic',['electronic'=>$electronic]);

    }
     public function details($id){


        
        $electronicdetails = Http::get("http://127.0.0.1:8000/api/electronic/details/$id");
        $result = json_decode((string)$electronicdetails->getBody(), true);
        
        return view('product.ElectronicDetails', ['electronic'=>$electronicdetails]);
    }
}
