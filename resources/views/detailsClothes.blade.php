@extends('master')
@section('content')


<!-- <!DOCTYPE html>
<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="detail-img" src="{{$clothes['image']}}" alt="">
    </div>

    <div class="col-sm-6">
      <a href="/clothes">Go Back</a>
      <h2>{{$clothes['title']}}</h2>
      <h3>Type: {{$clothes['type']}}</h3>
      <h4>Price: Rp {{$clothes['price']}}</h4>
      <h4>Condition: {{$clothes['condition']}}</h4>
      <h4>Description: {{$clothes['description']}}</h4>
      <br><br>

      <form action="/chat-seller" method="POST">
        @csrf
      <button class="btn btn-primary">Chat Seller</button>
    </form>
      <br><br>

    </div>
  </div>
      
</div>

</body>
</html> -->

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
    <title>product details</title>
  </head>
  <body>

<div class="small-container single-product">
    <div class="row">
        <div class="col-2">
            <!-- <img src="images/mercedes.webp" width="100%"> -->
              <img class="detail-img" src="{{$clothes['image']}}" alt="" width="100%">
        </div>
        <div class="col-2">
            <p>Categories: Clothes</p>
             <h1>{{$clothes['title']}}</h1>
             <h4>Type: {{$clothes['type']}}</h4>
             <h4>Location: {{$clothes['location']}}</h4>
            <!-- <h1>Title</h1> -->
            <h4>IDR Rp. {{$clothes['price']}}</h4>
            <h4>Condition: {{$clothes['condition']}}</h4>
            <!-- <h4>IDR Rp. 100,000</h4> -->
            <!-- <h4>phone : 081213845</h4> -->
            <h3>product details</h3>
            <p>{{$clothes['description']}}</p>

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
