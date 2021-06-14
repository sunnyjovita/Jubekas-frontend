@extends('master')
@section('content')


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Contact us</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/web app project new/contact-us.css">

</head>
<body>
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

<section>
    <div class="container">
        <div class="user singupBx">
          <div class="formBx">
            <form action="contact-us" method="POST">
            
               @csrf
              <h2>Contact us</h2>
              <p>We love to hear more about you!</p>
              <br>
              <h5>Your Name</h5>
              <input type="text" name="name" placeholder="Name">
              <h5>Your Email</h5>
              <input type="text" name="email" placeholder="Email">
              <h5>Your Message</h5>
              <textarea rows="5" cols="60" placeholder="Message" name= "message"></textarea>
              <input type="submit" name="" value="Send it">

            </form>
          </div>
        </div>
      </div>
</section>


   
  
  
  <!--jQuery Library-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!--Popper JS-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <!--compiled Javascript-->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!--owl carousel-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <!--javascript-->
  <script type="text/javascript" src="main.js"></script>
   
  
  
  
  
  
  </body>
  </html>

  @endsection