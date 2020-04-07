<?php

session_start();

//Logout Button

if(isset($_POST['logout_btn'])){
	session_destroy();
	unset($_SESSION['username']);
	header('Location: login.php');
}

?>