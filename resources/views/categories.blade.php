@extends('master')
@section('content')

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.vertical-menu {
  width: 200px;
  /*margin-top: 200px;*/
   margin-left: auto;
  margin-right: auto;
}

.vertical-menu a {
  background-color: #eee;
  color: black;
  display: block;
  padding: 12px;
  text-decoration: none;
}

.vertical-menu a:hover {
  background-color: #ccc;
}

.vertical-menu h2 {
  background-color: #04AA6D;
  color: white;
  font-size:15px;
  padding:10px;
}


</style>
<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/> -->

</head>
<body>

<!-- <h1>Categories</h1> -->

<div class="vertical-menu">
  <h2>Categories</h2>
 
  <a href="clothes">Clothes</a>
  <a href="#">Furniture</a>
  <a href="cars">Cars</a>
   <!-- @foreach($categories as $item) -->
  <!-- <a href="#">{{$item['name']}}</a> -->
  <!-- @endforeach -->
</div>

<br><br><br><br>
        
    </div>
</div>

</body>
</html>
@endsection