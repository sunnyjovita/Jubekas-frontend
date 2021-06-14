<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class ContactController extends BaseController
{
    //

    public function contact(Request $req){
    	$validator = Validator::make($req->all(), [
            'email'=>['required', 'string', 'email'],
            'name'=>['required', 'string'],
            'message'=>['required', 'string']
        ]);

        if($validator->fails()){
            // return 'error';
            return $this->responseError('Send Link Failed', 422, $validator->errors());
        }


        // check if email exist or no
        $email = $req->input('email');
                   // check email exixts
        if(User::where('email', $email)->doesntExist()){
                // return $this->responseError([
                //     'message' => 'User doesn\'t exists!'
                // ], 404);
            return response()->json(['message'=>'User does not exist!']);
                // return 'user does not exists';
        }

         try{

            // send email
            $user = User::where('email', $req->email)->first();

            $to_name = $user['name'];
            // $to_name = Auth::user()->name;
            // $to_email = 'RECEIVER_EMAIL_ADDRESS';
            $to_email = $email;
            $data = array('name'=>$to_name, "body" => "Thank You");
            Mail::send('contact-us', $data, function($message) use ($to_email, $to_name) {
            $message->to($to_email)
                    ->subject('Thank you for contacting us');
            $message->from('jubekas.id@gmail.com','Jubekas Website');
            });

            // return response()->json([])
            return response()->json(['message'=>'Thank you for contacting us! We will get back to you soon.']);
            // return $this->responseOk([
            //     'message' => 'Check ur email'
            // ]);
            // return 'check ur email';
            // return response([
            //     'message' =>'check your email!'
            // ]);

        }
        catch(\Exception $exception){
            return response([
                'message' => $exception->responseError()
            ], 400);
            // return $exception;
            // return response()->json(['message'=>'why error ']);


        }


    }
}
