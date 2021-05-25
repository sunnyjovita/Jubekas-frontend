<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    //
    $furniture = DB::table('furniture')->get();
    

}


