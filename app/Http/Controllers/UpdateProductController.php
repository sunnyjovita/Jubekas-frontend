<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
// include validator class
use Illuminate\Support\Facades\Validator;
use File;
use Illuminate\Support\Facades\Redirect;

class UpdateProductController extends Controller
{
    //
    public function updateCar($id){
    	if(Session::has('email')){

        $carsdetails = Http::get(env('API_URL')."api/cars/details/$id");

        return view('update.updateCars', ['cars'=>$carsdetails]);
        }
        else{
            return redirect('/login');
        }
    }


    public function updateClothes($id){
      if(Session::has('email')){

        $clothesdetails = Http::get(env('API_URL')."api/clothes/details/$id");

        return view('update.updateClothes', ['clothes'=>$clothesdetails]);
        }
        else{
            return redirect('/login');
        }
    }

    public function updateFurniture($id){
      if(Session::has('email')){

        $furnidetails = Http::get(env('API_URL')."api/furniture/details/$id");

        return view('update.updateFurniture', ['furniture'=>$furnidetails]);
        }
        else{
            return redirect('/login');
        }
    }

    public function updateElectronic($id){
      if(Session::has('email')){

        $electronicdetails = Http::get(env('API_URL')."api/electronic/details/$id");

        return view('update.updateElectronic', ['electronic'=>$electronicdetails]);
        }
        else{
            return redirect('/login');
        }
    }

    public function updateProperty($id){
      if(Session::has('email')){

        $propertydetails = Http::get(env('API_URL')."api/property/details/$id");

        return view('update.updateProperty', ['property'=>$propertydetails]);
        }
        else{
            return redirect('/login');
        }
    }

    public function updateCarPost(Request $req){

    	$validator = Validator::make($req->all(), [
    		'title'=>['required', 'string', 'max:75'],
    		'brand'=>['required', 'string'],
    		'year'=>['required', 'string'],
    		'distance'=>['required', 'string'],
    		'condition'=>['required', 'string'],
    		'price'=>['required', 'string'],
    		'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    		'location'=>['required', 'string'],
    		'description'=>['required', 'string']
		]);

		if($validator->fails()){
	    // return redirect()->to('user-profile/products/'.$id);
			return back();

        }

        try{

       	$http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){

        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public/public';
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $name);

        }

}

 		// fetch data for API
		    $id = $req->id;
        $title = $req->title;
        $brand = $req->brand;
        $year = $req->year;
        $distance = $req->distance;
        $condition = $req->condition;

        $price = $req->price;
        $location = $req->location;
        $description = $req->description;
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');

        $response = $http->post(env('API_URL').'api/update/car/$id',[

            'query'=>[

            	'id'=>$id,
                'owner'=>$owner,
            	'title'=>$title,
            	'brand'=>$brand,
            	'year'=>$year,
            	'distance'=>$distance,
            	'condition'=>$condition,
            	'price'=>$price,
            	'image'=>$path,
            	'location'=>$location,
            	'description'=>$description,
            	'categories'=>'4',
              'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
 		// dd($result);
         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'title'=>$result['title'],
             'brand'=>$result['brand'],
             'year'=>$result['year'],
             'distance'=>$result['distance'],
             'condition'=>$result['condition'],
             'price'=>$result['price'],
             'location'=>$result['location'],
             'description'=>$result['description'],
             'categories'=>$result['categories'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return view('showProducts');
        // return view('home');
        return view('profile.user-profile');



        }catch(\Exception $e){
           $req->session()->flash('error', 'can not update product');
        	return view('home');
        	// dd($e);
        }

    }


    public function updatePropertyPost(Request $req){
     $validator = Validator::make($req->all(), [
           'title'=>['required', 'string', 'max:75'],
            'type'=>['required', 'string'],
            'landSize'=>['required', 'string'],
            'buildingSize'=>['required', 'string'],
            'address'=>['required', 'string'],
            'bedrooms'=>['required', 'string'],
            'bathrooms'=>['required', 'string'],
            'year'=>['required', 'string'],
            'certificate'=>['required', 'string'],
            'location'=>['required', 'string'],
            'price'=>['required', 'string'],
            'description'=>['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

    if($validator->fails()){

      return back();

        }

        try{

        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){

        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public/public';
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $name);

        }

}


    // fetch data for API
        $id = $req->id;
         $title = $req->title;
        $type = $req->type;
        $landSize = $req->landSize;
        $buildingSize = $req->buildingSize;
        $address = $req->address;
        $bedrooms = $req->bedrooms;
        $bathrooms = $req->bathrooms;
        $year = $req->year;
        $certificate = $req->certificate;

        // $condition = $req->condition;
        $price = $req->price;
        // $file = $path->getPathName();
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');


        $location = $req->location;
        $description = $req->description;

        $response = $http->post(env('API_URL').'api/update/property/$id',[

            'query'=>[

                'id'=>$id,
                'owner'=>$owner,
                'title'=>$title,
                'type'=>$type,
                'landSize'=>$landSize,
                'buildingSize'=>$buildingSize,
                'address'=>$address,
                'bedrooms'=>$bedrooms,
                'bathrooms'=>$bathrooms,
                'year'=>$year,
                'certificate'=>$certificate,
                'price'=>$price,
                'image'=>$path,
                'location'=>$location,
                'description'=>$description,
                'categories'=>'5',
                'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
    // dd($result);
         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'title'=>$result['title'],
             'type'=>$result['type'],
             'landSize'=>$result['landSize'],
             'buildingSize'=>$result['buildingSize'],
             'address'=>$result['address'],
             'bedrooms'=>$result['bedrooms'],
             'bathrooms'=>$result['bathrooms'],
             'year'=>$result['year'],
             // 'condition'=>$result['condition'],
             'price'=>$result['price'],
             'location'=>$result['location'],
             'description'=>$result['description'],
             'categories'=>$result['categories'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return view('showProducts');
        return view('profile.user-profile');




        }catch(\Exception $e){
            $req->session()->flash('error', 'can not update product');
          return view('home');

          // dd($e);
        }

    }

     public function updateClothesPost(Request $req){
      $validator = Validator::make($req->all(), [
            'title'=>['required', 'string', 'max:75'],
            'type'=>['required', 'string'],
            'condition'=>['required', 'string'],
            'price'=>['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location'=>['required', 'string'],
            'description'=>['required', 'string']
        ]);

    if($validator->fails()){
      return back();
        }

        try{

        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){

        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public/public';
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $name);

        }

}


    // fetch data for API
        $id = $req->id;
        $title = $req->title;
        $type = $req->type;
        // $year = $req->year;
        // $distance = $req->distance;
        $condition = $req->condition;

        $price = $req->price;
        $location = $req->location;
        $description = $req->description;
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');

        $response = $http->post(env('API_URL').'api/update/clothes/$id',[

            'query'=>[

              'id'=>$id,
                'owner'=>$owner,
              'title'=>$title,
              'type'=>$type,
              // 'year'=>$year,
              // 'distance'=>$distance,
              'condition'=>$condition,
              'price'=>$price,
              'image'=>$path,
              'location'=>$location,
              'description'=>$description,
              'categories'=>'1',
              'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
    // dd($result);
         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'title'=>$result['title'],
             'type'=>$result['type'],
             // 'year'=>$result['distance'],
             'condition'=>$result['condition'],
             'price'=>$result['price'],
             'location'=>$result['location'],
             'description'=>$result['description'],
             'categories'=>$result['categories'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return view('showProducts');
        return view('profile.user-profile');




        }catch(\Exception $e){
           $req->session()->flash('error', 'can not update product');
          return view('home');
          // dd($e);
        }

    }
       public function updateFurniturePost(Request $req){
      $validator = Validator::make($req->all(), [
            'title'=>['required', 'string', 'max:75'],
            'type'=>['required', 'string'],
            'condition'=>['required', 'string'],
            'price'=>['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'location'=>['required', 'string'],
            'description'=>['required', 'string']
        ]);

    if($validator->fails()){
      return back();
        }

        try{

        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){

        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public/public';
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $name);

        }

}


    // fetch data for API
        $id = $req->id;
        $title = $req->title;
        $type = $req->type;
        // $year = $req->year;
        // $distance = $req->distance;
        $condition = $req->condition;

        $price = $req->price;
        $location = $req->location;
        $description = $req->description;
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');

        $response = $http->post(env('API_URL').'api/update/furniture/$id',[

            'query'=>[

              'id'=>$id,
                'owner'=>$owner,
              'title'=>$title,
              'type'=>$type,
              // 'year'=>$year,
              // 'distance'=>$distance,
              'condition'=>$condition,
              'price'=>$price,
              'image'=>$path,
              'location'=>$location,
              'description'=>$description,
              'categories'=>'2',
              'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
    // dd($result);
         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'title'=>$result['title'],
             'type'=>$result['type'],
             // 'year'=>$result['distance'],
             'condition'=>$result['condition'],
             'price'=>$result['price'],
             'location'=>$result['location'],
             'description'=>$result['description'],
             'categories'=>$result['categories'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return view('showProducts');
         return view('profile.user-profile');




        }catch(\Exception $e){
           $req->session()->flash('error', 'can not update product');
          return view('home');
          // dd($e);
        }

    }

       public function updateElectronicPost(Request $req){
      $validator = Validator::make($req->all(), [

            'title'=>['required', 'string', 'max:75'],
            'type'=>['required', 'string'],
            'brand'=>['required', 'string'],
            'condition'=>['required', 'string'],
            'price'=>['required', 'string'],
            'description'=>['required', 'string'],
            'location'=>['required', 'string'],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

    if($validator->fails()){
      return back();
        }

        try{

        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){

        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public/public';
            $name = time().'_'.$image->getClientOriginalName();
            $path = $image->storeAs($destinationPath, $name);

        }

}


    // fetch data for API
        $id = $req->id;
        $title = $req->title;
        $type = $req->type;
        $brand = $req->brand;
        // $distance = $req->distance;
        $condition = $req->condition;

        $price = $req->price;
        $location = $req->location;
        $description = $req->description;
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');

        $response = $http->post(env('API_URL').'api/update/electronic/$id',[

            'query'=>[

              'id'=>$id,
                'owner'=>$owner,
              'title'=>$title,
              'type'=>$type,
              'brand'=>$brand,
              // 'distance'=>$distance,
              'condition'=>$condition,
              'price'=>$price,
              'image'=>$path,
              'location'=>$location,
              'description'=>$description,
              'categories'=>'1',
              'phoneNumber'=>$phoneNumber
            ]
        ]);

        $result = json_decode((string)$response->getBody(), true);
    // dd($result);
         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'title'=>$result['title'],
             'type'=>$result['type'],
             'brand'=>$result['brand'],
             'condition'=>$result['condition'],
             'price'=>$result['price'],
             'location'=>$result['location'],
             'description'=>$result['description'],
             'categories'=>$result['categories'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return view('showProducts');
        return view('profile.user-profile');




        }catch(\Exception $e){
           $req->session()->flash('error', 'can not update product');
          return view('home');
          // dd($e);
        }

    }
}
