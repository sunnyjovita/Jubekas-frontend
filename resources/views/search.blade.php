@extends('master')
@section('content')
<!DOCTYPE html>
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
<!-- margin = 0 (remove container) -->

<div class="container custom-product">
  

<div class="col-sm-4">
  <a href="#">Filter</a>
</div>
<div class="col-sm-4">
<div class="trending-wrapper">
  <h3>Result for products</h3>

  @foreach($cars as $item)
  <div class="searched-item">
    <a href="cars/details/{{$item['id']}}">
      <!-- <a href="#"> -->
        <img class="" src="{{$item['image']}}" style="width: 20%; height:100px;">
        <div class="">
          <h2>{{$item['title']}}</h2>
          <h5>Rp {{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 

   @foreach($clothes as $item)
  <div class="searched-item">
    <a href="clothes/details/{{$item['id']}}">
        <img class="" src="{{$item['image']}}" style="width: 20%; height:100px;">
        <div class="">
          <h2>{{$item['title']}}</h2>
          <h5>Rp {{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach 

      
</div>
</div>
</div>

</body>
</html>
@endsection
