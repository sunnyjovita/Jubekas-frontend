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
    <!-- Material Design Bootstrap -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/css/mdb.min.css" rel="stylesheet">
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <link rel="shortcut icon" href="https://mdbootstrap.com/wp-content/themes/mdbootstrap4/favicon.ico">
    <title>User details</title>
  </head>
  <body>
@if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('success') }}
              </div>
              @endif
<!--body-->
    <section class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <div class="row z-depth-3">
                        <div class="col-sm-4 rounded-left">
                            <div class="card-block">
                                <i class="fa fa-user"></i>
                                <h2>{{Session::get('name')}}</h2>
                                <!-- <i class="fa fa-edit fa-2x">
                                    <a href="#"></a>
                                </i> -->

                                <a href="/user-profile/update-profile"><i style="color:white" class="fa fa-edit fa-2x"></i></a>
                            </div>
                        </div>
                        <div class="col-sm-8 bg-white rounded-right">
                            <h3>Information</h3>
                            <hr class="badge-primary mt-0">
                            <div class="row-profile">
                                <div class="profile">
                                    <p class="font-weight-bold">Email:</p>
                                    <h6 class="text-muted">{{Session::get('email')}}</h6>
                                </div>
                                <hr class="badge-primary mt-0">
                                <div class="profile">
                                    <p class="font-weight-bold">Phone</p>
                                    <h6 class="text-muted">{{Session::get('phoneNumber')}}</h6>
                                </div> 
                                <hr class="badge-primary mt-0">
                            </div>
                            <a href="/user-profile/products/{{Session::get('id')}}" class="btn-back">See products</a>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>

    </section>

  
  </body>
</html>

@endsection