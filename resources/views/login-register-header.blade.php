<?php
use App\Http\Controllers\ClothesController;

// $total=0;
// if(Session::has('user')){
// $total = ClothesController::chatSeller();
// }

?>



<!-- <div style="clear:both" class="panel panel-default"> -->
	<!-- <div class="panel-header"> -->
		<!DOCTYPE html>
        <html>
        <head>
            <title></title>
            
        </head>
        <body>
        
        
		<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3">
                <div class="header_logo">
                    <a href="/">JUBEKAS</a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header_menu">
                    <ul>
                        <li class="active"><a href="/">HOME</a></li>
                        <li><a href="/category">CATEGORIES</a></li>
                        <li><a href="/contact-us">CONTACT</a></li>
                        <li><a href="sell-category">SELL</a></li>
                        <li><a href="#">CHAT</a></li>
                    </ul>
                </nav>

            </div>

            @if(Session::has('user'))
            <div class="col-lg-3">
                <div class="header_right">
                    <div class="header_right_auth">
                        <a href="#">{{Session::get('user')['name']}}</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            </div>
            @else
            <div class="col-lg-3">
                <div class="header_right">
                    <div class="header_right_auth">
                        <a href="/login">Login</a>
                        <a href="/register">Register</a>
                    </div>
                </div>
            </div>
            @endif


        </div>
    </div>
</header>
</body>
        </html>
	<!-- </div> -->
<!-- </div> -->
