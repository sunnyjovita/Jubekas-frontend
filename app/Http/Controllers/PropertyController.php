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

        $property = Http::get(env('API_URL').'api/property')->json();

        return view('product.Property',['property'=>$property]);

    }
     public function details($id){



        $propertydetails = Http::get(env('API_URL')."api/property/details/$id");
        $result = json_decode((string)$propertydetails->getBody(), true);

        return view('product.PropertyDetails', ['property'=>$propertydetails]);
    }
}
