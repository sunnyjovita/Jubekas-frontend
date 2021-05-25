<?php

namespace App\Http\Controllers;

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
        //
       $cars = Cars::all();
        return view('cars', ['cars'=>$cars]);   
    }

    public function details($id){
        // return Clothes::find($id);
        $carsdetails = Cars::find($id);
        return view('detailsCars', ['cars'=>$carsdetails]);
    }
    
    public function search(Request $req){
        // return $req->input();
        $carsSearch = Cars::where('title', 'like', '%'.$req->input('query').'%')->get(); 
        $clothesSearch = Clothes::where('title', 'like', '%'.$req->input('query').'%')->get();
        return view('search', ['cars'=>$carsSearch, 'clothes'=>$clothesSearch]);

    }


    static function chatSeller(Request $req){
        if($req->session()->has('user')){
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
