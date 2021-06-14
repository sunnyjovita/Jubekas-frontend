@extends('master')
@section('content')

<!-- margin = 0 (remove container) -->
<!-- <div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="detail-img" src="{{$cars['image']}}" alt="">
    </div>

    <div class="col-sm-6">
      <a href="/cars">Go Back</a>
      <h2>{{$cars['title']}}</h2>
      <h3>Brand: {{$cars['brand']}}</h3>
       <h4>Year: {{$cars['year']}}</h4>
        <h4>Distance: {{$cars['distance']}}</h4>
      <h4>Price: Rp  {{$cars['price']}}</h4>
      <h4>Condition: {{$cars['condition']}}</h4>
      <h4>Description: {{$cars['description']}}</h4>
      <br><br>

      <form action="/chat-seller" method="POST">
        @csrf
      <button class="btn btn-primary">Chat Seller</button>
    </form>
      <br><br>

    </div>
  </div>
      
</div> -->


<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/product_detail.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Product details</title>
  </head>
  <body>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <!-- <img src="images/mercedes.webp" width="100%"> -->
              <img class="detail-img" src="{{$cars['image']}}" alt="" width="100%">
        </div>
        <div class="col-2">
            <p>Categories: Cars</p>
             <h1>{{$cars['title']}}</h1>
             <h4>Brand: {{$cars['brand']}}</h4>
             <h4>Location: {{$cars['location']}}</h4>
            <!-- <h1>Title</h1> -->
            <h4>IDR Rp. {{$cars['price']}}</h4>
            <h4>Condition: {{$cars['condition']}}</h4>
            <!-- <h4>IDR Rp. 100,000</h4> -->
            <!-- <h4>phone : 081213845</h4> -->
            <h3>product details</h3>
            <p>{{$cars['description']}}</p>

                 <form action="/chat-seller" method="POST">
        @csrf
      <button class="btn">Chat Seller</button>
    </form>
            <a href="/clothes" class="btn-back">Go back </a>
        </div>
    </div>
      </div>

</body>
</html>

@endsection
