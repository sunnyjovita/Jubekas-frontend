@extends('master')
@section('content')

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
{{--              <img class="detail-img" style="width: 350px" src="{{ asset('storage/'.$electronic['image']) }}" alt="" width="100%">--}}
            <img class="detail-img" style="width: 350px" alt="" width="100%" src="{{ asset('storage/'.$electronic['image']) }}" onerror="this.onerror=null;
                    this.src='http://127.0.0.1:8001/storage/public/noimage.jpg';" />
        </div>
        <div class="col-2">
            <p>Categories: Electronic</p>
             <h2>{{$electronic['title']}}</h2>
            <h4>Type: {{$electronic['type']}}</h4>
             <h4>Brand: {{$electronic['brand']}}</h4>
             <h4>Location: {{$electronic['location']}}</h4>
            <h4>{{$electronic['price']}}</h4>
            <h4>Condition: {{$electronic['condition']}}</h4>
            <h3>product details</h3>
            <p>{{$electronic['description']}}</p>


            @if(Session::has('name'))
                @if($electronic['owner'] == Session::get('id'))

                  <a class="btn btn-primary" href="/update/electronic/{{$electronic['id']}}">Edit</a>
                   @else
                 <a class="btn btn-primary" target="_blank" href="https://wa.me/{{$electronic['phoneNumber']}}">Chat Seller</a>
                @endif

            @else
               <a class="btn btn-primary" target="_blank" href="/login">Chat Seller</a>
            @endif

            <a href="{{ URL::previous() }}" class="btn-back">Go back </a>
        </div>
    </div>
      </div>

</body>
</html>

@endsection
