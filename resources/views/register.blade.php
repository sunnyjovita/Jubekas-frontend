<!DOCTYPE html>
<html>
  <head>
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="/web app project new/register.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" 
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <title>Register page</title>



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
    $('#eyeSlashPassword').hide();
  }else {
    x.type = "password";
    $('#eyeShow').hide();
    $('#eyeSlashPassword').show();
  }
}

function visibility() {
  var x = document.getElementById('confirm_password');
  if (x.type === 'password') {
    x.type = "text";
    $('#eyeShow').show();
    $('#eyeSlashConfirm').hide();
  }else {
    x.type = "password";
    $('#eyeShow').hide();
    $('#eyeSlashConfirm').show();
  }
}

    </script>

    <script>
      function validateFormOnSubmit(theForm){
        var reason = "";
        reason += validatePassword(theForm.password, theForm.confirmPassword, theForm.name, theForm.email, theForm.phoneNumber);

        if(reason != ""){
          alert("Some Fields need correction:\n" + reason);
          return false;
        }
        // alert("all fields are filled correctly");
        return false;
      }

      function validatePassword(fld, fld2, name, em, phone){
        var error = "";
        var illegal_phoneNumber = /^08[0-9].*$/;
        // var illegal_phoneNumber = /(^62[0-9].*$)/;
        // var illegalChars = /[\W_]/; // allow only letters and numbers
        if(name.value == ""){
          error = "you didnt enter the name.\n"
        }  
        else if(em.value == ""){
          error = "you didnt enter the email.\n"
        }
        else if(phone.value == ""){
          error = "you didnt enter the phone number.\n"
        }
        else if(fld.value == ""){
          error = "you didnt enter a password.\n";
        }
        else if((fld.value.length < 6 ) || (fld.value.length > 15)){
          error = "the password is the wrong length.\n";
        }
        
        else if(illegal_phoneNumber.test(phone.value)){
          error = 'the phone number should be started with 62.\n';

        }
        else if(fld.value != fld2.value){
          error = 'Password and confirm password are not match';
        }
        return error;
      }
    </script>

  </head>
  <body>

  {{View::make('login-register-header')}}
  <br>

              @if(session('error'))
              <div class="alert alert-danger alert-block">
                {{ session('error') }}
              </div>
              @endif
<!--body-->
    <section>
      <div class="container">
        <div class="user singupBx">
          <div class="formBx">

            <!-- onsubmit= "validateFormOnSubmit(this)" -->
              <!-- <form onsubmit="return validateFormOnSubmit(this)"> -->
            <!-- <form action="register" method="POST"> -->
            <form onsubmit= "validateFormOnSubmit(this)" action="register" method="POST">
              @csrf

              <h2>Create an account</h2>
              
              <input type="text" name="name" placeholder="User Name">
              <input type="email" name="email" placeholder="Email">

              <input type="phonenumber" name="phoneNumber" placeholder="Phone Number">

              <div class="password">
                <input id="login_password" type="password" name="password" placeholder="Password" class="form-control pwd">
      <!-- <input type="password" class="form-control pwd" id="login_password" placeholder="Password" name="password" required> -->
     <span class="input-group-btn" id="eyeSlashPassword">
            <button class="btn btn-default reveal" onclick="visibility3()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
     </span>
    </div>
  
   <div class="confirm-password" style="padding-top: 2px;">
    <input id="confirm_password" type="password" name="confirmPassword" placeholder="Confirm Password" class="form-control pwd">
     <!-- <input type="password" class="form-control pwd" id="confirm_password" placeholder="Confirm Password" name="confirmPassword" required> -->
     <span class="input-group-btn" id="eyeSlashConfirm">
            <button class="btn btn-default reveal" onclick="visibility()" type="button"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
     </span>
     </div>

              <input id="button" type="submit" name="" value="Sign up">
              <p class="signup">Already have an account? <a href="login" >Sign in.</a></p>
            <!-- </form> -->
            </form>
          </div>
          <div class="imgBx">

            <img src="/web app project new/images/login2.png">

          </div>
        </div>
      </div>
    </section>

    <!--footer-->
    <!-- <div class="footer">
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
              <li><a href="#">Cars</a></li>
              <!-- <li><a href="#">Properties</a></li> -->
              <li><a href="#">Clothes</a></li>
              <li><a href="#">Furniture</a></li>
              <!-- <li><a href="#">Electornics</a></li> -->
              <li><a href="#">Electronics</a></li>
              <li><a href="#">Properties</a></li>
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
              <li><a href="privacy-policy">Privacy Policy</a></li>
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
         <a href="/">Jubekas</a>.
            </p>
          </div>

          <div class="col-md-4 col-sm-6 col-xs-12">
            <ul class="social-icons">
              <li><a class="Youtube" href="#"><i class="fa fa-youtube"></i></a></li>
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