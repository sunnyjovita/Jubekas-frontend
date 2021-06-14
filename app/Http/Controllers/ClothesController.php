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
<<<<<<< HEAD
    	// $clothes = Clothes::all();
    	// return view('clothes', ['clothes'=>$clothes]);
        $clothes = Http::get('http://127.0.0.1:8000/api/clothes')->json();
        return view('clothes',['clothes'=>$clothes]);
=======
         $clothes = Clothes::all();
        return response()->json($clothes);
    	// $clothes = Clothes::all();
    	// return view('clothes', ['clothes'=>$clothes]);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
    }


    public function details($id){
<<<<<<< HEAD
        $clothesdetails = Http::get('http://127.0.0.1:8000/api/clothes/details/'.$id);
        $result = json_decode((string)$clothesdetails->getBody(), true);
        // return $result;
        return view('detailsClothes', ['clothes' =>$clothesdetails]);

    	// return Clothes::find($id);
    	// $clothesdetails = Clothes::find($id);
        // hehehe
=======
         $clothesdetails = Clothes::find($id);
        return response()->json($clothesdetails);
    	// return Clothes::find($id);
    	// $clothesdetails = Clothes::find($id);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
    	// return view('detailsClothes', ['clothes'=>$clothesdetails]);
    }

    // public function search(Request $req){
    //     // return $req->input();
    //     $clothesSearch = Clothes::where('title', 'like', '%'.$req->input('query').'%')->get(); 
    //     return view('searchClothes', ['clothes'=>$clothesSearch]);

    // }


    static function chatSeller(Request $req){
<<<<<<< HEAD
        if(Session::has('email')){
            return "Hello this is chat seller page";
        }
        else{
            return redirect('/login');
        }
=======
        // if($req->session()->has('user')){
        //     return "Hello this is chat seller page";
        // }
        // else{
        //     return redirect('/login');
        // }
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
    }

    // public function chat(){
        // $userID = Session::get('user')['id'];
        // return  
    // }

}
