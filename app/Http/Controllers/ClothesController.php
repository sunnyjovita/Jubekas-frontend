<?php

namespace App\Http\Controllers;


// import database clothes
use App\Models\Clothes;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Session;

class ClothesController extends Controller
{
    //
    public function clothes(){

    	// $clothes = Clothes::all();
    	// return view('clothes', ['clothes'=>$clothes]);
        $clothes = Http::get(env('API_URL').'/api/clothes')->json();
        return view('clothes',['clothes'=>$clothes]);

    }


    public function details($id){

        $clothesdetails = Http::get(env('API_URL').'/api/clothes/details/'.$id);
        $result = json_decode((string)$clothesdetails->getBody(), true);
        // return $result;
        return view('detailsClothes', ['clothes' =>$clothesdetails]);

    	// return Clothes::find($id);
    	// $clothesdetails = Clothes::find($id);
        // hehehe


    	// return Clothes::find($id);
    	// $clothesdetails = Clothes::find($id);
    	// return view('detailsClothes', ['clothes'=>$clothesdetails]);
    }

    // public function search(Request $req){
    //     // return $req->input();
    //     $clothesSearch = Clothes::where('title', 'like', '%'.$req->input('query').'%')->get();
    //     return view('searchClothes', ['clothes'=>$clothesSearch]);

    // }


    static function chatSeller(Request $req){

        if(Session::has('email')){
            return "Hello this is chat seller page";
        }
        else{
            return redirect('/login');
        }

        // if($req->session()->has('user')){
        //     return "Hello this is chat seller page";
        // }
        // else{
        //     return redirect('/login');
        // }
    }

    // public function chat(){
        // $userID = Session::get('user')['id'];
        // return
    // }

}
