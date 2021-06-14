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
  
  <style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>

<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>



</head>
<body>
	<h2>Welcome, {{Session::get('name')}}</h2>
  <div class="col-sm-6">
      <a href="/">Go Back</a>
     <h1>name: {{Session::get('name')}}</h1>
     <h1>email: {{Session::get('email')}}</h1>
     <h1>phone number: {{Session::get('phoneNumber')}}</h1>
    </div>
  </div>
<br><br>
<div class="sidebar-nav">


  <div class="dropdown">
  <button onclick="myFunction()" class="dropbtn">Product</button>
  <div id="myDropdown" class="dropdown-content">
    <a href="#">My Products</a>
    <a href="#">Add products</a>
    <!-- <a href="#contact">Contact</a> -->
  </div>
    </div>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!-- <button type="button" class="btn btn-primary btn-sm">Sell</button> -->
 

</body>
</html>

@endsection