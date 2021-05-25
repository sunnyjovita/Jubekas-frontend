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
      <img class="detail-img" src="{{$clothes['image']}}" alt="">
    </div>

    <div class="col-sm-6">
      <a href="/clothes">Go Back</a>
      <h2>{{$clothes['title']}}</h2>
      <h3>Type: {{$clothes['type']}}</h3>
      <h4>Price: {{$clothes['price']}}</h4>
      <h4>Condition: {{$clothes['condition']}}</h4>
      <h4>Description: {{$clothes['description']}}</h4>
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
