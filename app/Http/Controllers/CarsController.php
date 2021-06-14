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
<<<<<<< HEAD

        $cars = Http::get('http://127.0.0.1:8000/api/cars')->json();
        return view('cars',['cars'=>$cars]);
=======
        //
       // $cars = Cars::all();
        // return view('cars', ['cars'=>$cars]);  

        // api
        $cars = Cars::all();
        // return $cars;
        return response()->json($cars);
        // return ['cars'=>$cars];
        // return response()->json([
            // 'cars' => $cars
        // ]);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667
    }


    public function details($id){
<<<<<<< HEAD

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
=======
        
        // $carsdetails = Cars::find($id);
        // return view('detailsCars', ['cars'=>$carsdetails]);


        // api
        $carsdetails = Cars::find($id);
        return response()->json($carsdetails);
        // return Cars::find($id);
    }
    
    public function search(Request $req){
        // return $req->input();
        $carsSearch = Cars::where('title', 'like', '%'.$req->input('query').'%')->get(); 
        $clothesSearch = Clothes::where('title', 'like', '%'.$req->input('query').'%')->get();

        // return view('search', ['cars'=>$carsSearch, 'clothes'=>$clothesSearch]);

        // api
            // dd($response);
        // return response()->json([$carsSearch, $clothesSearch]);
        $response = [
            'cars'=>$carsSearch,
            'clothes'=>$clothesSearch

        ];
        return response()->json($response);
        // return response()->json(['cars'=>$carsSearch, 'clothes'=>$clothesSearch]);
>>>>>>> 3e0eea19f2539c6ebd18b5319c159eee682a6667

    }

    // public function search($title){
    //     $carsSearch = Cars::where('title', 'like', '%'.$title.'%')->get(); 
    //     $clothesSearch = Clothes::where('title', 'like', '%'.$title.'%')->get();

    //     return response()->json([$carsSearch, $clothesSearch]); 
    // }


    static function chatSeller(Request $req){
<<<<<<< HEAD

        // Session::put('name');
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
