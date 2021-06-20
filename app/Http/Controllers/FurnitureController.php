<?php

namespace App\Http\Controllers;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Session;

class FurnitureController extends Controller
{
    //
    // $furniture = DB::table('furniture')->get();
    public function furniture()
    {

        $furniture = Http::get('http://127.0.0.1:8000/api/furniture')->json();

        return view('product.Furniture',['furniture'=>$furniture]);

    }
     public function details($id){


        
        $furnituredetails = Http::get("http://127.0.0.1:8000/api/furniture/details/$id");
        $result = json_decode((string)$furnituredetails->getBody(), true);
        
        return view('product.FurnitureDetails', ['furniture'=>$furnituredetails]);
    }
    

}


