@extends('master')
     
@section('content')
 <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1">
    <title>My products</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/web app project new/show-product.css">

</head>
 @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif


              @if(session('success'))
              <div class="alert alert-success alert-block">
                {{ session('message') }}
              </div>
              @endif

             

<body>
    <section>
    <div class="row">
        <div class="col-lg-12">
            <div class="pull-left">
                <h2>My products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="/sell-category"> Create New Product</a>
            </div>
        </div>
    </div>
    

    <table class="table table-bordered" >
        <tr>
            <!-- <th>No</th> -->
            <th width="200px">Image</th>
            <th width="200px">Name</th>
            <th width="200px">Price</th>
            <th width="200px">Action</th>
        </tr>

        <div class="trending-wrapper">
  <!-- <h3>Trending products</h3> -->

   @foreach($cars as $item)
        <tr>
           
            <td><img src="{{ asset('storage/'.$item['image']) }}" width="150px"></td>
            <td> <a href="/cars/details/{{$item['id']}}">
        <!-- <div class="trending-image"> -->
          <h3>{{$item['title']}}</h3>
        <!-- </div> -->
      </a></td>

            <td>{{$item['price']}}</td>
            <td>
                <form action="/delete/car/{{$item['id']}}" method="POST">
                    <!-- <a class="btn btn-info" href="#">Show</a> -->

                    <a class="btn btn-primary" href="/update/car/{{$item['id']}}">Edit</a>

                {{method_field('DELETE')}} 
                {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                <!-- </form> -->
            </td>
        </tr>
  @endforeach 

  @foreach($clothes as $item)

  <tr>
            <td><img class="trending-image" src="{{ asset('storage/'.$item['image']) }}" width="150px"></td>
            <td> <a href="/clothes/details/{{$item['id']}}">
        <!-- <div class="trending-image"> -->
          <h3>{{$item['title']}}</h3>
        <!-- </div> -->
      </a></td>
            <td>{{$item['price']}}</td>
            <td>
                <form action="/delete/clothes/{{$item['id']}}" method="POST">
     
                    <!-- <a class="btn btn-info" href="#">Show</a> -->
      
                    <a class="btn btn-primary" href="/update/clothes/{{$item['id']}}">Edit</a>
                     {{method_field('DELETE')}} 
                {!! csrf_field() !!}
                   
        
                     <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                </form>
            </td>
        </tr>
  @endforeach 

  @foreach($furniture as $item)
        <tr>
           
            <td><img src="{{ asset('storage/'.$item['image']) }}" width="150px"></td>
            <td> <a href="/furniture/details/{{$item['id']}}">
        <!-- <div class="trending-image"> -->
          <h3>{{$item['title']}}</h3>
        <!-- </div> -->
      </a></td>

            <td>{{$item['price']}}</td>
            <td>
                <form action="/delete/furniture/{{$item['id']}}" method="POST">
                    <!-- <a class="btn btn-info" href="#">Show</a> -->
                    <a class="btn btn-primary" href="/update/furniture/{{$item['id']}}">Edit</a>
                    {{method_field('DELETE')}} 
                {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                </form>
            </td>
        </tr>
  @endforeach 

  @foreach($electronics as $item)
        <tr>
           
            <td><img src="{{ asset('storage/'.$item['image']) }}" width="150px"></td>
            <td> <a href="/electronic/details/{{$item['id']}}">
        <!-- <div class="trending-image"> -->
          <h3>{{$item['title']}}</h3>
        <!-- </div> -->
      </a></td>

            <td>{{$item['price']}}</td>
            <td>
                <form action="/delete/electronic/{{$item['id']}}" method="POST">
                    <!-- <a class="btn btn-info" href="#">Show</a> -->
                    <a class="btn btn-primary" href="/update/electronic/{{$item['id']}}">Edit</a>
                     {{method_field('DELETE')}} 
                {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                </form>
            </td>
        </tr>
  @endforeach 

    @foreach($property as $item)
        <tr>
           
            <td><img src="{{ asset('storage/'.$item['image']) }}" width="150px"></td>
            <td> <a href="/property/details/{{$item['id']}}">
        <!-- <div class="trending-image"> -->
          <h3>{{$item['title']}}</h3>
        <!-- </div> -->
      </a></td>

            <td>{{$item['price']}}</td>
            <td>
                <form action="/delete/property/{{$item['id']}}" method="POST">
                    <!-- <a class="btn btn-info" href="#">Show</a> -->
                    <a class="btn btn-primary" href="/update/property/{{$item['id']}}">Edit</a>
                     {{method_field('DELETE')}} 
                {!! csrf_field() !!}
                    <button type="submit" class="btn btn-danger" value="delete">Delete</button>
                </form>
            </td>
        </tr>
  @endforeach 
      
    </table>

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