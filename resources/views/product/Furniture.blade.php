@extends('master')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <title>Furniture</title>
   <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" type="text/css" href="/web app project new/style.css"> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body style="height: 100%">

<!-- margin = 0 (remove container) -->

<div class="container custom-product">
  <!-- <h2></h2> -->
  <div id="TrendingProducts" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="" data-slide-to="0" class="active"></li>
      <li data-target="" data-slide-to="1"></li>
      <li data-target="" data-slide-to="2"></li>
      <li data-target="" data-slide-to="3"></li>
      <li data-target="" data-slide-to="4"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">

      @foreach($furniture as $item)

      <div class="item {{$item['id']==5?'active':''}}">
        <a href="furniture/details/{{$item['id']}}">
            <img style="display:block; margin-left:auto; margin-right: auto; width: 30%; height:300px;" src="{{asset('storage/public/public/'.$item['image'])}}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img src="{{ asset('storage/'.$item['image']) }}" style="display:block; margin-left:auto; margin-right: auto; width: 30%; height:300px;">--}}
        <div class="carousel-caption">
          <h3>{{ Str::words($item['title'],'3','...') }}</h3>

          <p>{{$item['condition']}}</p>
          <p>{{$item['price']}}</p>
        </div>
      </a>
      </div>
      @endforeach

    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#TrendingProducts" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#TrendingProducts" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>



<div class="trending-wrapper">
  <h3>Trending products</h3>
  @foreach($furniture as $item)
  <div class="trending-item">
    <a href="furniture/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{asset('storage/public/public/'.$item['image'])}}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
        <div class="trending-image">
          <h3>{{ Str::words($item['title'],'3','...') }}</h3>
        </div>
      </a>
  </div>
  @endforeach


</div>
<br><br><br><br><br><br><br><br><br><br><br><br>
</body>
</html>

@endsection


