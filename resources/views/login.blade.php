<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script>
      function myFunction() {
  var x = document.getElementById("*passwordbox-id*");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

function visibility3() {
  var x = document.getElementById('login_password');
  if (x.type === 'password') {
    x.type = "text";
    $('#eyeShow').show();
    $('#eyeSlash').hide();
  }else {
    x.type = "password";
    $('#eyeShow').hide();
    $('#eyeSlash').show();
  }
}
    </script>



    

    <title>Login Page</title>
  </head>
  <body>

    {{View::make('login-register-header')}}

<br><br>
             @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif
<!--body-->
    <section>
      <div class="container">
        <div class="user singinBx">
        <div class="imgBx">

           <img src="/web app project new/images/login.png">

        </div>
          <div class="formBx">
            <form action="login" method="POST">  
               
                

              <h2>Sign In</h2>
               
              

              <div class="form-group">
                @csrf
              <input type="email" name="email" placeholder="Email" class="form-control" id="exampleinputemail">

          </div>
          <div class="form-group">

  <div class="password">
  <!-- <div class="form-group" > -->
  <input type="password" class="form-control pwd" id="login_password" placeholder="Password" name="password" required>
  <!-- <span class="text-danger">{{$errors->first('password')}}</span> -->
     <span class="input-group-btn" id="eyeSlash">
            <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
     </span>
    <!--  <span class="input-group-btn" id="eyeShow" style="display: none;">
       <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye" aria-hidden="true"></i></button>
     </span> -->
  <!-- </div> -->
</div>

          </div>

              <input type="submit" name="" value="Login">
              <!-- <button type="submit" class=btn btn-default">Login</button> -->
              <p class="signup">Don't have an account? <a href="register">Sign Up</a></p>
              <p class="signup">Forgot password? click<a href="/forgot-password"> here</a></p>
            </form>
          </div>
        </div>
      </div>
    </section>

<!--footer-->
  <!--   <div class="footer">
      <div class="container">
          <div class="row">
                  <div class="footer_about">
                      <div class="footer_logo">
                          <a href="/">JUBEKAS</a>
                      </div>
                      <p>Why do we use it?
                        It is a long established fact that a reader will be distracted by the reooking at its layout.
                        The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letter.</p>
                        <div class="footer_social">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-instagram"></i>
                            </a>
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </div>
                     </div>
                </div>
            </div>
          </div>
<div class="footer_bottom">
    <p>
        Copyright &copy; 2021 JUBEKAS. All rights reserved.
    </p>
</div> -->
 <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Scanfcode.com <i>CODE WANTS TO BE SIMPLE </i> is an initiative  to help the upcoming programmers with the code. Scanfcode focuses on providing the most efficient code or snippets as the code wants to be simple. We will help programmers build up concepts in different programming languages that include C, C++, Java, HTML, CSS, Bootstrap, JavaScript, PHP, Android, SQL and Algorithm.</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categories</h6>
            <ul class="footer-links">
              <li><a href="#">Clothes</a></li>
              <li><a href="#">Furniture</a></li>
              <li><a href="#">Electornics</a></li>
              <!-- <li><a href="#">Java</a></li>
              <li><a href="#">Android</a></li>
              <li><a href="#">Templates</a></li> -->
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="#">Privacy Policy</a></li>
              <!-- <li><a href="#">Sitemap</a></li> -->
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2021 All Rights Reserved by 
         <a href="#">Jubekas</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="github" href="#"><i class="fa fa-github"></i></a></li>
              <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>   
            </ul>
          </div>
        </div>
      </div>
</footer>



  </body>
</html>






<!-- <!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
<link rel="stylesheet" type="text/css" href="/web app project new/style.css">

</head>
<body>
<h1>Login page</h1>

@if(count($errors))
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach($errors->all() as $error)
      <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif

<div class="container">
  <div class="row">
    <div class="col-sm-4">
      <form action="login" method="POST">
        <div class="form-group">
          @csrf
          <label for="exampleinputemail">Email address</label>
          <input type="email" name="email" placeholder="input email" class="form-control" id="exampleinputemail">
        </div>
        <div class="form-group">
          <label for="exampleinputpassword">Password</label>
          <input type="password" name="password" placeholder="input password" class="form-control" id="exampleinputpassword">
        </div>
        <button type="submit" class="btn btn-default">Login</button>

      </form>
    </div>
  </div>
</div>
</body>
</html>
 -->

