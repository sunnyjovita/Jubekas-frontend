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
<div class="container">
  <div class="row">
    <div class="col-sm-6">
      <img class="detail-img" src="{{$cars['image']}}" alt="">
    </div>

    <div class="col-sm-6">
      <a href="/cars">Go Back</a>
      <h2>{{$cars['title']}}</h2>
      <h3>Brand: {{$cars['brand']}}</h3>
       <h4>Year: {{$cars['year']}}</h4>
        <h4>Distance: {{$cars['distance']}}</h4>
      <h4>Price: Rp  {{$cars['price']}}</h4>
      <h4>Condition: {{$cars['condition']}}</h4>
      <h4>Description: {{$cars['description']}}</h4>
      <br><br>

      <form action="/chat-seller" method="POST">
        @csrf
      <button class="btn btn-primary">Chat Seller</button>
    </form>
      <br><br>

    </div>
  </div>
      
</div>

</body>
</html>
@endsection
