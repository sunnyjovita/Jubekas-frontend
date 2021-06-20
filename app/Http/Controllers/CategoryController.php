<?php

namespace App\Http\Controllers;

// use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category()
    {
        return view('category.category');
        // return redirect('category');
        // $categories = Category::all();
        // return view('categories', ['categories'=>$categories]);
        //
        // $categories = Category::orderBy('id', 'DESC')->get();
        // return view('categories', compact('categories'));

    }

}
