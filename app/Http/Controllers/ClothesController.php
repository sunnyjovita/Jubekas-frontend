<?php

namespace App\Http\Controllers;


// import database clothes
use App\Models\Clothes;

use Illuminate\Http\Request;
use Session;

class ClothesController extends Controller
{
    //
    public function clothes(){
    	$clothes = Clothes::all();
    	return view('clothes', ['clothes'=>$clothes]);
    }


    public function details($id){
    	// return Clothes::find($id);
    	$clothesdetails = Clothes::find($id);
    	return view('detailsClothes', ['clothes'=>$clothesdetails]);
    }

    // public function search(Request $req){
    //     // return $req->input();
    //     $clothesSearch = Clothes::where('title', 'like', '%'.$req->input('query').'%')->get(); 
    //     return view('searchClothes', ['clothes'=>$clothesSearch]);

    // }


    static function chatSeller(Request $req){
        if($req->session()->has('user')){
            return "Hello this is chat seller page";
        }
        else{
            return redirect('/login');
        }
    }

    // public function chat(){
        // $userID = Session::get('user')['id'];
        // return  
    // }

}
