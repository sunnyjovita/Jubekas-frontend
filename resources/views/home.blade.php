

@extends('master')
@section('content')
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>Jubekas</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/web app project new/style.css">

</head>
<body id="content">

 @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('success') }}
              </div>
              @endif

@if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif




<section class="categories ">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="categories_item categories_large_item">
                    <img src="/web app project new/images/porsche.webp" alt="" class="img-fluid ">
                    <div class="categories_text">
                        <h1>Cars</h1>

                        <a href="/cars">Buy Now</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="row ">
                    <div class="col-lg-6 col-md-6 col-12 p-0" >
                        <div class="categories_item">

                                <img src="<?php echo asset('web app project new/images/furniture2.jpg')?>" alt="" class="img-fluid">

{{--                                <img src="/web app project new/images/furniture2.jpg" alt="" class="img-fluid">--}}
                            <div class="categories_text">
                                <h4>Furniture</h4>

                                <a href="/furniture">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0" >
                        <div class="categories_item">
                            <img src="/web app project new/images/clothes.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Clothes</h4>

                                <a href="/clothes">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0" >
                        <div class="categories_item">
                            <img src="/web app project new/images/property.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Property</h4>

                                <a href="/property">Buy Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12 p-0" >
                        <div class="categories_item">
                            <img src="/web app project new/images/electronics2.jpg" alt="" class="img-fluid">
                            <div class="categories_text">
                                <h4>Electronics</h4>

                                <a href="/electronics">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="section-title">
                    <h4>Our Product</h4>
                </div>
            </div>
        </div>

        <div class="row property_gallery">
            @foreach($cars as $item)
  <div class="trending-item">
    <a href="cars/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{ asset('storage/'.$item['image']) }}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
        <div class="trending-image">
          <h2 style="font-size: 25px">{{ Str::words($item['title'],'3','...') }}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach

  @foreach($property as $item)
  <div class="trending-item">
    <a href="property/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{ asset('storage/'.$item['image']) }}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
       <div class="trending-image">
         <h2 style="font-size: 25px">{{ Str::words($item['title'],'3','...') }}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach

    @foreach($clothes as $item)
  <div class="trending-item">
    <a href="clothes/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{ asset('storage/'.$item['image']) }}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
        <div class="trending-image">
           <h2 style="font-size: 25px">{{ Str::words($item['title'],'3','...') }}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach

    @foreach($furniture as $item)
  <div class="trending-item">
    <a href="furniture/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{ asset('storage/'.$item['image']) }}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
        <div class="trending-image">
           <h2 style="font-size: 25px">{{ Str::words($item['title'],'3','...') }}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach
    @foreach($electronic as $item)
  <div class="trending-item">
    <a href="electronics/details/{{$item['id']}}">
        <img class="trending-image" style="width: 180px; height:180px;" src="{{ asset('storage/'.$item['image']) }}" onerror="this.onerror=null;
                    this.src='{{env('APP_URL')}}/storage/public/public/noimage.jpg';" />
{{--        <img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" style="width: 180px; height:180px;">--}}
        <div class="trending-image">
          <h2 style="font-size: 25px">{{ Str::words($item['title'],'3','...') }}</h2>
          <h5 style="color: black">{{$item['price']}}</h5>
        </div>
      </a>
  </div>
  @endforeach
            </div>
        </div>
    </div>
</section>

<section class="banner bg-img">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="banner_slider owl-carousel owl-theme">
                    <div class="banner_item">
                        <div class="banner_text">
                            <span>Furniture Collection</span>
                            <h1>Product</h1>
                            <a href="/furniture">Buy Now</a>
                        </div>
                    </div>
                    <div class="banner_item">
                        <div class="banner_text">
                            <span>Electronic Collection</span>
                            <h1>Product</h1>
                            <a href="/electronics">Buy Now</a>
                        </div>
                    </div>
                    <div class="banner_item">
                        <div class="banner_text">
                            <span>Property Collection</span>
                            <h1>Product</h1>
                            <a href="/Property">Buy Now</a>
                        </div>
                    </div>
                    <div class="banner_item">
                        <div class="banner_text">
                            <span>Cars Collection</span>
                            <h1>Product</h1>
                            <a href="/cars">Buy Now</a>
                        </div>
                    </div>
                    <div class="banner_item">
                        <div class="banner_text">
                            <span>Clothes Collection</span>
                            <h1>Product</h1>
                            <a href="/clothes">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

 <section class="discount spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0 ">
                <div class="discount_pic">
                    <img src="/web app project new/images/discount.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-6 p-0 ">
                <div class="discount_text">
                    <div class="discount_text_title">
                        <span>Discount</span>
                         <h2>Summer Sale</h2>
                          <h5><span>Sale</span>50% OFF</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="shop-method-area spad ">
    <div class="container">
        <div class="row d-flex justify-content-between">
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-method mb-40">
                <i class="fa fa-shopping-bag"></i>
                <h6>Free Shipping method</h6>
                <p>Why do we use it?
                    It is a long established fact that a reader will be distracted by the reooking at its layout.
                    The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-method mb-40">
                <i class="fa fa-map-marker"></i>
                <h6>Local area</h6>
                <p>Why do we use it?
                    It is a long established fact that a reader will be distracted by the reooking at its layout.
                    The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-method mb-40">
                <i class="fa fa-user"></i>
                <h6>Face-to-face Payment</h6>
                <p>Why do we use it?
                    It is a long established fact that a reader will be distracted by the reooking at its layout.
                    The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
            </div>
        </div>
        </div>
    </div>
</section>



<section class="newsletter-area">
    <div class="container">
        <form method="POST" action="#">
            <p class="text-center">
                Please send us feedbacks to make ourselves better.
            </p>
            <div class="row subscribe-sec">
                <div class="col-md-9">

                </div>
            </div>
        </form>
    </div>
</section>


<!-- jQuery Library -->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Popper JS -->
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- compiled Javascript -->
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- owl carousel -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
 <!-- javascript -->
<script type="text/javascript" src="/web app project new/main.js"></script>

</body>
</html>
@endsection
