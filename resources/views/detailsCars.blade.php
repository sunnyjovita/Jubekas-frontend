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

{{--            {{dd($cars['image'])}}--}}

{{--                <img class="detail-img" style="width: 350px" src="/storage/public/404.jpg" alt="" width="100%">--}}
    <img class="detail-img" style="width: 350px" alt="" width="100%" src="{{asset('storage/public/public/'.$cars['image'])}}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />

        </div>
        <div class="col-2">
            <p>Categories: Cars</p>
             <h2>{{$cars['title']}}</h2>
             <h3>Brand: {{$cars['brand']}}</h3>
             <h3>Location: {{$cars['location']}}</h3>
             <h3>Year: {{$cars['year']}}</h3>
             <h3>Distance: {{$cars['distance']}}</h3>
            <h3>{{$cars['price']}}</h3>
            <h3>Condition: {{$cars['condition']}}</h3>
            <h3>product details</h3>
            <p>{{$cars['description']}}</p>

              @if(Session::has('name'))
             @if($cars['owner'] == Session::get('id'))

                 <a class="btn btn-primary" href="/update/car/{{$cars['id']}}">Edit</a>
                   @else
                     <a class="btn btn-primary" target="_blank" href="https://wa.me/{{$cars['phoneNumber']}}">Chat Seller</a>
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
