<?php

session_start();

include('database/dbconfig.php');

if($dbconfig){
	//echo "Database Connected";
}
else{
	header("Location: Database/dbconfig.php");
}

if(!$_SESSION['username']){
	header('Location: login.php');
}
?>