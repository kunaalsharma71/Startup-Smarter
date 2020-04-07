<!DOCTYPE php>
<php lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' 
integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
 <script>
  $(window).scroll(function () {
    $('.animation-test').each(function () {
        var imagePos = $(this).offset().top;
        var imageHeight = $(this).height();
        var topOfWindow = $(window).scrollTop();

        if (imagePos < topOfWindow + imageHeight && imagePos + imageHeight > topOfWindow) {
            $(this).addClass("slideRight");
        } else {
            $(this).removeClass("slideRight");
        }
    });
});</script>
<style>
.navbar-default .navbar-nav > li > a {
    color:white;
	font-family: "Raleway", sans-serif;}
.container{color:grey;}
.wrapper{color:grey;}
.container-fluid{color:grey;}
p{color:grey;
}
</style>
<style>
.element-to-hide{
    visibility:hidden;
}

.slideRight {
    visibility: visible;
    animation-name: slideRight;
    -webkit-animation-name: slideRight;
    animation-duration: 1.5s;
    -webkit-animation-duration: 1.5s;
    animation-timing-function: ease-in-out;
    -webkit-animation-timing-function: ease-in-out;
}
@keyframes slideRight {
    0% {
        transform: translateX(-150%);
    }
    50% {
        transform: translateX(8%);
    }
    65% {
        transform: translateX(-4%);
    }
    80% {
        transform: translateX(4%);
    }
    95% {
        transform: translateX(-2%);
    }
    100% {
        transform: translateX(0%);
    }
}
@-webkit-keyframes slideRight {
    0% {
        -webkit-transform: translateX(-150%);
    }
    50% {
        -webkit-transform: translateX(8%);
    }
    65% {
        -webkit-transform: translateX(-4%);
    }
    80% {
        -webkit-transform: translateX(4%);
    }
    95% {
        -webkit-transform: translateX(-2%);
    }
    100% {
        -webkit-transform: translateX(0%);
    }
}

</style>
<style>
body{overflow-x:hidden;}
</style>
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top navbar-light" style="background-color:#38d39f;" role="navigation" >
  <div class="container-fluid">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="Finance.php" style="color:white;font-size:30px;"><b>Startup Smarter<b></a>
    </div>

   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="Finance.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="contactus.php">Contact Us</a></li>
        <li><a href="Career.php">Career</a></li>
        </li>
      </ul>
     
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav><br><br><br><br><br>