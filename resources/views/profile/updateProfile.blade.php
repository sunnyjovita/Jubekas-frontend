@extends('master')
@section('content')

<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/user_detail.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico">
    <title>Edit Profile</title>

    <script>
      function validateFormOnSubmit(theForm){
        var reason = "";
        reason += validatePassword(theForm.name, theForm.email, theForm.phoneNumber);

        if(reason != ""){
          alert("Some Fields need correction:\n" + reason);
          return false;
        }
        // alert("all fields are filled correctly");
        return false;
      }

      function validatePassword(name, em, phone){
        var error = "";
        var illegal_phoneNumber = /^08[0-9].*$/;
        // var illegal_phoneNumber = /(^62[0-9].*$)/;
        // var illegalChars = /[\W_]/; // allow only letters and numbers
        if(name.value == ""){
          error = "you didnt enter the name.\n"
        }  
        else if(em.value == ""){
          error = "you didnt enter the email.\n"
        }
        else if(phone.value == ""){
          error = "you didnt enter the phone number.\n"
        }
        
        else if(illegal_phoneNumber.test(phone.value)){
          error = 'the phone number should be started with 62.\n';

        }
        
        return error;
      }
    </script>

  </head>
  <body>
            
<!--body-->
    <section class="bg-light">
      @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif


              @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('success') }}
              </div>
              @endif
       <form onsubmit= "validateFormOnSubmit(this)" action="/user-profile/update-profile" method="POST">
             @csrf
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="row z-depth-3">
                        <div class="col-sm-8 bg-white rounded-right">
                            <h3>Update Profile</h3>
                            <hr class="badge-primary mt-0">
                            <div class="row-profile">
                                <div class="profile">
                                     <input type="hidden" class="form-control" name='id' value="{{Session::get('id')}}">
                                    <p class="font-weight-bold">Name:</p>
                                     <input type="name" class="form-control" name='name' value="{{Session::get('name')}}">
                                    <!-- <h6 class="">{{Session::get('name')}}</h6> -->
                                </div>
                                <br>
                                <div class="profile">
                                    <p class="font-weight-bold">Email:</p>
                                     <input type="name" class="form-control" name='email' value="{{Session::get('email')}}">
                                    <!-- <h6 class="">{{Session::get('email')}}</h6> -->
                                </div>
                                <hr class="badge-primary mt-0">
                                <div class="profile">
                                    <p class="font-weight-bold">Phone Number:</p>
                                     <input type="name" class="form-control" name='phoneNumber' value="{{Session::get('phoneNumber')}}">
                                    <!-- <h6 class="">{{Session::get('phoneNumber')}}</h6> -->
                                </div> 
                                <hr class="badge-primary mt-0">
                            </div>
                             <input type="submit" class="btn-back" name="" value="Update">
                            <!-- <a type="submit" class="btn-back">Update Profile</a> -->
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
      </form>

    </section>

  
  </body>
</html>

@endsection