<?php

namespace App\Http\Controllers;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use App\Models\Cars;
use App\Models\Clothes;
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

        $cars = Http::get('http://127.0.0.1:8000/api/cars')->json();
        return view('cars',['cars'=>$cars]);
    }


    public function details($id){

        // $carsdetails = Http::get('http://127.0.0.1:8000/api/cars/details/'.$id);
        $carsdetails = Http::get("http://127.0.0.1:8000/api/cars/details/$id");
        $result = json_decode((string)$carsdetails->getBody(), true);
        // return $result;
        // dd($result);
        return view('detailsCars', ['cars' =>$carsdetails]);
        // return redirect('detailsCars', ['cars'=>$carsdetails]);
    }
    
    public function search(Request $req){

        
        $data = $req->input();
        // dd($data);
        $input = $data['query'];

        $response = Http::get("http://127.0.0.1:8000/api/search?query=$input");

        $result = json_decode((string)$response->getBody(), true);
        // return $response;
        // dd($result['cars']);
        session()->put([
             'cars' => $result['cars'],
            'clothes' => $result['clothes'],
             // 'phoneNumber' => $result['phoneNumber'],
              // 'email' => $result['email'],

        ]);

        return view('search', ['cars'=>session('cars'), 'clothes'=>session('clothes')]);
        // return view('search');

    }


    static function chatSeller(Request $req){

        // Session::put('name');
        if(Session::has('email')){
            return "Hello this is chat seller page";
        }
        else{
            return redirect('/login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
