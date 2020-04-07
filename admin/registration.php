<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="CSS/registration.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
  <style>
    .box{
      position: absolute;
      margin-top: 10px;
    }
    .box select{
      background: #38d39f;
      color: #fff;
      padding: 10px;
      width: 350px;
      height: 50px;
      border:none;
      font-size: 20px;
      box-shadow: 0 5px 25px rgba(0,0,0,.5);
      -webkit -appearance: button;
      outline: none;
    }
    .box:before{
      content: '\f0ab';
      font-family: "Font Awesome 5 Free";
      position: absolute;
      top: 0;
      right: 0;
      width: 50px;
      height: 50px;
      line-height: 50px;  
      color:#fff;
      font-size: 28px;
      background: #007ce0;
      pointer-events: none;
    }
    .box:hover:before{
      background: #0472ca;

    }

  </style>
</head>
<body>
  <nav class="navbar navbar-default navbar-fixed-top navbar-light" style="background-color:#38d39f;">
      <a class="navbar-brand" href="Finance.php" style="color:white;font-size:20px;"><b>Startup Smarter<b></a>
      <ul class="nav navbar-nav navbar-right">
        <li style="color: white;">Already Have an Account, <a href="login.php" style="color:white;">LogIn</a></li>  
      </ul>
</nav>
<div class="container-fluid main-content">
	<img class="wave" src="img/wave.png">
	<div class="container">
		<div class="img">
			<img src="img/bg.svg">
		</div>
		<div class="login-content">
			<form action="registration.php" method="POST">
				<img  src="img/avatar.svg">
        <?php
        
    if(isset($_SESSION['success'])&&$_SESSION['success']!=''){
      echo '<h2>'.($_SESSION['success']).'</h2>';
      unset($_SESSION['success']);
    }
    ?>
        <?php include('error.php')?>
        <div style = "margin-bottom:100px;">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Username</h5>
           		   		<input type="text" class="input" name="username">
           		   </div>
           		</div>

                <div class="input-div one">
                 <div class="i"> 
                    <i class="fas fa-user"></i>
                 </div>
                 <div class="div">
                    <h5>Email</h5>
                    <input type="Email" class="input" name="email">
                 </div>
              </div>        
              <div class="box">
              <select name="usertype">
                <option value="-1">Choose....</option>
                <option value="admin">Investor</option>
                <option value="user">Entrepreneur</option>
              </select>
            </div></div>

           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password_1">
            	   </div>
            	</div>

                <div class="input-div pass">
                 <div class="i"> 
                    <i class="fas fa-lock"></i>
                 </div>
                 <div class="div">
                    <h5>Re-enter Password</h5>
                    <input type="password" class="input" name="password_2">
                 </div>
              </div>
              

            	<input type="submit" class="btn" value="Sign Up" name="reg_user">
            </form>
        </div>
    </div>
  </div>
    <script type="text/javascript" src="JS/main.js"></script>
</body>
</html>