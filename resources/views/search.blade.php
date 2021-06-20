@extends('master')
@section('content')


<!DOCTYPE html>
<html>
<head>
  <title>Search</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
  integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
  <link rel="stylesheet" type="text/css" href="/web app project new/search.css">
  



</head>
<body >
<section class="product spad">
	<div class="container">

	<div  style="height: 100%" class="trending-wrapper">
  <h3>Result for products</h3>
   <!-- @foreach($cars as $item)
  <div class="trending-item-item">
    <a href="cars/details/{{$item['id']}}">
    
        <img class="" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
        <div class="trending-image">
          <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach  -->

  @foreach($cars as $item)
  <div class="trending-item">
    <a href="cars/details/{{$item['id']}}">
        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
        <div class="trending-image">
          <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 

  @foreach($property as $item)
  <div class="trending-item">
    <a href="property/details/{{$item['id']}}">
        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
       <div class="trending-image">
         <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach

   @foreach($clothes as $item)
  <div class="trending-item">
    <a href="clothes/details/{{$item['id']}}">
        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
        <div class="trending-image">
           <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 

   @foreach($furniture as $item)
  <div class="trending-item">
    <a href="furniture/details/{{$item['id']}}">
        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
        <div class="trending-image">
           <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 
    @foreach($electronic as $item)
  <div class="trending-item">
    <a href="electronics/details/{{$item['id']}}">
        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">
        <div class="trending-image">
          <h2 style="font-size: 25px">{{$item['title']}}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 

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
<script type="text/javascript" src="/web app project new/main.js"></script>
 

</body>
</html>


@endsection