<?php

namespace App\Http\Controllers;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Session;

class PropertyController extends Controller
{
    //
     public function property()
    {

        $property = Http::get('http://127.0.0.1:8000/api/property')->json();

        return view('product.Property',['property'=>$property]);

    }
     public function details($id){


        
        $propertydetails = Http::get("http://127.0.0.1:8000/api/property/details/$id");
        $result = json_decode((string)$propertydetails->getBody(), true);
        
        return view('product.PropertyDetails', ['property'=>$propertydetails]);
    }
}
