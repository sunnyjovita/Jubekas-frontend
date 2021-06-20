
@extends('master')
@section('content')

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>JUBEKAS</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/web app project new/add_categories.css">

</head>
<body>

    <section class="categories">
        <div class="container-fluid">
            <h2>Categories</h2>
                <div class="categories1">
                        <div class="asd" >
                            <div class="categories_item">
                                <img src="/web app project new/images/cactus.jpg" alt="" class="img-fluid">
                                <div class="categories_text">
                                    <h4>Automotive</h4>
                                    <!-- <p>15 items</p> -->
                                    <a href="/cars">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="ad" >
                            <div class="categories_item">
                                <img src="/web app project new/images/cactus.jpg" alt="" class="img-fluid">
                                <div class="categories_text">
                                    <h4>Clothes</h4>
                                    <!-- <p>15 items</p> -->
                                    <a href="/clothes">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="asd" >
                            <div class="categories_item">
                                <img src="/web app project new/images/cactus.jpg" alt="" class="img-fluid">
                                <div class="categories_text">
                                    <h4>Furniture</h4>
                                    <!-- <p>15 items</p> -->
                                    <a href="/furniture">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="asd" >
                            <div class="categories_item">
                                <img src="/web app project new/images/cactus.jpg" alt="" class="img-fluid">
                                <div class="categories_text">
                                    <h4>Properties</h4>
                                    <!-- <p>1 items</p> -->
                                    <a href="/property">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="asd" >
                            <div class="categories_item">
                                <img src="/web app project new/images/cactus.jpg" alt="" class="img-fluid">
                                <div class="categories_text">
                                    <h4>Electronics</h4>
                                    <!-- <p>24 items</p> -->
                                    <a href="/electronics">More</a>
                                </div>
                            </div>
                        </div>          
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