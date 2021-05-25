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
  <h2>Carousel Example</h2>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      @foreach($cars as $item)

      <div class="item {{$item['id']==5?'active':''}}">
        <a href="cars/details/{{$item['id']}}">
        <img src="{{$item['image']}}" style="display:block; margin-left:auto; margin-right: auto; width: 30%; height:300px;">
        <div class="carousel-caption">
          <h3>{{$item['title']}}</h3>
          <p>{{$item['condition']}}</p>
          <p>{{$item['price']}}</p>
        </div>
      </a>
      </div>
      @endforeach
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<div class="trending-wrapper">
  <h3>Trending products</h3>
  @foreach($cars as $item)
  <div class="trending-item">
    <a href="cars/details/{{$item['id']}}">
        <img class="trending-image" src="{{$item['image']}}" style="width: 30%; height:100px;">
        <div class="trending-image">
          <h3>{{$item['title']}}</h3>
        </div>
      </a>
  </div>
  @endforeach 

      <br><br><br><br><br><br><br><br><br><br><br><br>
</div>

</body>
</html>

@endsection


