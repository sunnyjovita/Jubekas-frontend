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
            <img class="detail-img" style="width: 350px" alt="" width="100%" src="{{asset('storage/public/public/'.$property['image'])}}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--              <img class="detail-img" style="width: 350px" src="{{ asset('storage/'.$property['image']) }}" alt="" width="100%">--}}

        </div>
        <div class="col-2">
            <p>Categories: Property</p>
             <h2>{{$property['title']}}</h2>
             <h3>Type: {{$property['type']}}</h3>
             <h3>Location: {{$property['location']}}</h3>
             <h3>Land Size: {{$property['landSize']}}</h3>
             <h3>Building Size: {{$property['buildingSize']}}</h3>
             <h3>Address: {{$property['address']}}</h3>
             <h3>Bedrooms: {{$property['bedrooms']}}</h3>
             <h3>Bathrooms: {{$property['bathrooms']}}</h3>
             <h3>Year: {{$property['year']}}</h3>
             <h3>Certificate: {{$property['certificate']}}</h3>
            <h3>{{$property['price']}}</h3>
            <h3>product details</h3>
            <p>{{$property['description']}}</p>



              @if(Session::has('name'))
                  @if($property['owner'] == Session::get('id'))

                  <a class="btn btn-primary" href="/update/property/{{$property['id']}}">Edit</a>
                   @else

                    <a class="btn btn-primary" target="_blank" href="https://wa.me/{{$property['phoneNumber']}}">Chat Seller</a>

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
