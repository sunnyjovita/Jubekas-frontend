<?php

namespace App\Http\Controllers;

// call api from backend Jubekas2
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
// include validator class
use Illuminate\Support\Facades\Validator;
// use Storage;
// use Illuminate\Http\UploadedFile;
// use Symfony\Component\HttpFoundation\File\File;

class SellController extends Controller
{
    //
    public function sellCategory(){
    	 if(Session::has('email')){
    	 	return view('category.sellCategory');
            // return redirect('sell-category');
        }else{	
            return redirect('login');
        }
    }

    public function Car(){
    	if(Session::has('email')){
    	 	return view('sell.sellCar');
        }else{	
            return redirect('login');
        }
    	
    }

    public function Clothes(){
        if(Session::has('email')){
            return view('sell.sellClothes');
        }else{  
            return redirect('login');
        }
    }

    public function Furniture(){
        if(Session::has('email')){
            return view('sell.sellFurniture');
            // return redirect('sell-category');
        }else{  
            return redirect('login');
        }
    }

    public function Electronic(){
        if(Session::has('email')){
            return view('sell.sellElectronics');
            // return redirect('sell-category');
        }else{  
            return redirect('login');
        }
    }

    public function Properties(){
        if(Session::has('email')){
            return view('sell.sellProperty');
            // return redirect('sell-category');
        }else{  
            return redirect('login');
        }
    }

    public function PostCar(Request $req){

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
 			$req->session()->flash('error', 'Invalid Input');
            return view('sell.sellCar');		
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){
        
        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public';
             $name = time().'_'.$image->getClientOriginalName();
             $path = $image->storeAs($destinationPath, $name);
            // $path = $image->move($destinationPath, $name);
            // return $path;
            // dd($path);

        }
        else{
        $req->session()->flash('error', 'No file selected');
        return view('sell.sellCar');
    }

}

        // fetch data for API
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

        $response = $http->post('http://127.0.0.1:8000/api/post/car?',[

            'query'=>[
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

         session()->put([
             'image' => $result['image'],
             'message'=>$result['message'],
             'owner'=>$result['owner'],
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', session('message'));
        // dd($result);
        // return redirect()->to('user-profile/products/'.$id);
        return view('sell.sellCar');

        }catch(\Exception $e){
              $req->session()->flash('error', 'Invalid Input');
            return view('sell.sellCar');
            // return $e;
            // dd($e);
        } 
    }

    public function PostFurniture(Request $req){

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
            // dd($validator);
            // return 'error';
            $req->session()->flash('error', 'Invalid input');
            return view('sell.sellFurniture');        
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){
        
        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public';
             $name = time().'_'.$image->getClientOriginalName();
             $path = $image->storeAs($destinationPath, $name);
            // $path = $image->move($destinationPath, $name);
            // return $path;
            // dd($path);

        }
        else{
        $req->session()->flash('error', 'No file selected');
            return view('sell.sellFurniture');
    }

}

        // fetch data for API
        $title = $req->title;
        $type = $req->type;
        $condition = $req->condition;
        $price = $req->price;
        // $file = $path->getPathName();
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');


        $location = $req->location;
        $description = $req->description;
        // return $location;
        // return $image;

        $response = $http->post('http://127.0.0.1:8000/api/post/furniture?',[

            'query'=>[

                'owner'=>$owner,
                'title'=>$title,
                'type'=>$type,
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
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', 'Product successfuly added');
    
        return view('sell.sellFurniture');

        }catch(\Exception $e){
            // dd($e);
             $req->session()->flash('success', 'Product successfuly added');
            return view('sell.SellFurniture');

        } 
    }

    public function PostElectronic(Request $req){

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
            // dd($validator);
            // return 'error';
            $req->session()->flash('error', 'Invalid input');
            return view('sell.sellElectronics');        
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){
        
        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public';
             $name = time().'_'.$image->getClientOriginalName();
             $path = $image->storeAs($destinationPath, $name);
            // $path = $image->move($destinationPath, $name);
            // return $path;
            // dd($path);

        }
        else{
        $req->session()->flash('error', 'No file selected');
            return view('sell.sellElectronics');
    }

}

        // fetch data for API
        $title = $req->title;
        $type = $req->type;
        $brand = $req->brand;
        $condition = $req->condition;
        $price = $req->price;
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');
        $location = $req->location;
        $description = $req->description;
     

        $response = $http->post('http://127.0.0.1:8000/api/post/electronic?',[

            'query'=>[

                'owner'=>$owner,
                'title'=>$title,
                'type'=>$type,
                'brand'=>$brand,
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
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', 'Product successfuly added');
    
        return view('sell.sellElectronics');

        }catch(\Exception $e){
            // dd($e);
            return $e;
         //    $req->session()->flash('error', 'Invalid Input');
         //    return view('sell.sellCar');
         //    return view('login');
         //    return redirect('/');
         //    return redirect()->back()->with($error);

        } 
    }
    public function PostClothes(Request $req){

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
            // dd($validator);
            // return 'error';
            $req->session()->flash('error', 'Invalid input');
            return view('sell.sellClothes');        
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){
        
        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public';
             $name = time().'_'.$image->getClientOriginalName();
             $path = $image->storeAs($destinationPath, $name);
            // $path = $image->move($destinationPath, $name);
            // return $path;
            // dd($path);

        }
        else{
        $req->session()->flash('error', 'No file selected');
            return view('sell.sellClothes');
    }

}

        // fetch data for API
        $title = $req->title;
        $type = $req->type;
        $condition = $req->condition;
        $price = $req->price;
        // $file = $path->getPathName();
        $owner = Session::get('id');
        $phoneNumber = Session::get('phoneNumber');


        $location = $req->location;
        $description = $req->description;
        // return $location;
        // return $image;

        $response = $http->post('http://127.0.0.1:8000/api/post/clothes?',[

            'query'=>[

                'owner'=>$owner,
                'title'=>$title,
                'type'=>$type,
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
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', 'Product successfuly added');
    
        return view('sell.sellClothes');

        }catch(\Exception $e){
            // dd($e);
            return $e;

        } 
    }

    public function PostProperty(Request $req){

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
            // dd($validator);
            // return $validator;
            $req->session()->flash('error', 'Invalid input');
            return view('sell.sellProperty');        
        }

        try{
            
        $http = new \GuzzleHttp\Client;

        if($req->hasFile('image')){
        
        if ($req->file('image')->isValid()) {
            $image = $req->file('image');
            $destinationPath = 'public';
             $name = time().'_'.$image->getClientOriginalName();
             $path = $image->storeAs($destinationPath, $name);
            // $path = $image->move($destinationPath, $name);
            // return $path;
            // dd($path);

        }
        else{
        $req->session()->flash('error', 'No file selected');
            return view('sell.sellProperty');
    }

}

        // fetch data for API
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
        // return $location;
        // return $image;

        $response = $http->post('http://127.0.0.1:8000/api/post/property?',[

            'query'=>[

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
                // 'distance'=>$distance,
                // 'condition'=>$condition,
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
             'phoneNumber'=>$result['phoneNumber']

         ]);

        $req->session()->flash('success', 'Product successfuly added');
    
        return view('sell.sellProperty');

        }catch(\Exception $e){
            // dd($e);
            return $e;
        } 
    }

  


  

}
