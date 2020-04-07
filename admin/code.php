<?php

session_start();

$errors = array();

$connection = mysqli_connect('localhost','root','','adminpanel');

//user registration form
if(isset($_POST['reg_user'])){
$username = mysqli_real_escape_string($connection,$_POST['username']);
$email = mysqli_real_escape_string($connection,$_POST['email']);
$password_1 = mysqli_real_escape_string($connection,$_POST['password_1']);
$password_2 = mysqli_real_escape_string($connection,$_POST['password_2']);
$usertype = mysqli_real_escape_string($connection,$_POST['usertype']);

//form validation

if(empty($username)){array_push($errors, "Username is required");}	
elseif(empty($email)){array_push($errors, "Email is required");}
elseif(empty($password_1)){array_push($errors, "Password is required");}
if($password_1 != $password_2){array_push($errors, "Password donot match");}
if($usertype=='-1'){array_push($errors, "please select the role");}


//check db for existing user for same username

$user_check_query = "SELECT * FROM register WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($connection,$user_check_query);
$user = mysqli_fetch_assoc($results);

if($user){
	if($user['username'] === $username){array_push($errors, "Username already exists");}
	if($user['email'] === $email){array_push($errors, "Email already exists");}
}

//Register the user if no error

if(count($errors) == 0 ){
	$password = $password_1; //this will encrypt password
	$query = "INSERT into register(username,email,password,usertype) 
	VALUES('$username','$email','$password','$usertype')";
	
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['username'] = $username;
		$_SESSION['success'] = "Registered Successfully";
		header('location: login.php');
	}
}
}

//login to dashboard 

if(isset($_POST['login_user'])){
	$username = mysqli_real_escape_string($connection,$_POST['username']);
	$password = mysqli_real_escape_string($connection,$_POST['password']);
	$usertype = mysqli_real_escape_string($connection,$_POST['usertype']);

	if(empty($username)){
		array_push($errors, "Username is required");
	}
	if(empty($password)){
		array_push($errors, "password is required");
	}
	if($usertype == '-1'){
		array_push($errors, "Role is required");
	}

	if(count($errors) == 0){
		$password1 = $password;

		$query = "SELECT * FROM register WHERE username = '$username' AND password = '$password1' AND usertype = '$usertype'"; 
		$results = mysqli_query($connection,$query);

		if(mysqli_num_rows($results)){
			while ($row=mysqli_fetch_array($results)) {
            if($usertype == "user"){
            	$_SESSION['username'] = $username;
                header('Location:index.php');
            }
            elseif ($usertype == "admin") {
            	$_SESSION['username'] = $username;
                header('Location:investor.php');
            }
            else{
                echo "please select the role";
            }   
        }
		}else{
			array_push($errors, "Wrong username/password/Role combination. Please try again.");
		}
	}
}



//request form



if(isset($_POST['registerbtn'])){

	$username = $_POST['username'];
	$startup_name = $_POST['startup_name'];
	$amount = $_POST['amount'];
	$description = $_POST['description'];
	$status = "Pending";

	if($username == $_SESSION['username']){

	$query = "INSERT INTO user(username,startup,amount,description,status)VALUES('$username','$startup_name','$amount','$description','$status')";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		
		$_SESSION['success3'] = "Request Added";
		header('Location: register.php');
	}
	else{
		$_SESSION['status'] = "Failed to Add Request";
		header('Location: register.php');
	}
}
else{
	$_SESSION['status1'] = "Username not matched";
		header('Location: register.php');
}
}
//edit button

if(isset($_POST['edit_btn'])){
	$id = $_POST['edit_id'];
	$query = "SELECT * FROM register where id = $id";
	$query_run = mysqli_query($connection,$query);
}


//update button

if(isset($_POST['updatebtn'])){
	$id = $_POST['edit_id'];
	$username = $_POST['edit_username'];
	$startup = $_POST['edit_startup'];
	$amount = $_POST['edit_amount'];
	$description = $_POST['edit_description'];

	if($username == $_SESSION['username']){

	$query = "UPDATE user SET username = '$username',startup = '$startup',amount= '$amount',description='$description' WHERE id='$id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success3'] = "Your data is updated";
		header("Location:register.php");
	}
	else{
		$_SESSION['status'] = "Your data is not updated";
		header("Location:register.php");
	}
}
else{
	$_SESSION['status1'] = "Username not matched";
		header('Location: register.php');
}
}


//DELETE BUTTON

if(isset($_POST['delete_btn'])){
	$id = $_POST['delete_id'];

	$query = "DELETE FROM user WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success3'] = "Your data is Deleted";
		header("Location:register.php");
	}
	else{
		$_SESSION['status'] = "Your data is not Deleted";
		header("Location:register.php");
	}
}

//INFO FORM
if(isset($_POST['save_info'])){
	$name = $_POST['info_name'];
	$design = $_POST['info_designation'];
	$description = $_POST['info_description'];
	$images = $_FILES['info_image']['name'];


	if((file_exists("upload/".$_FILES['info_image']['name']))||($name != $_SESSION['username']))
	{	
		$store = $_FILES['info_image']['name'];
		$_SESSION['status'] = "Either Username didn't match OR Image already exists. '.$store.'";
		header('Location:information.php');

	}
	else{
		$query ="INSERT INTO info(name,design,description,images)VALUES('$name','$design','$description','$images')";
		$query_run = mysqli_query($connection,$query);

		if($query_run){
			move_uploaded_file($_FILES['info_image']['tmp_name'], "upload/".$_FILES['info_image']['name']);
			$_SESSION['success2'] = 'Info Added';
			header('Location:information.php');
		}
		else{
			$_SESSION['success2'] = "Info not Added";
			header('Location:information.php');
		}
	}
	$Image = $_FILES['info_image']['name'];
	$folder = "upload/".$Image;

}

//info_edit update button

if(isset($_POST['info_update_btn'])){

	$edit_id = $_POST['edit_id'];
	$edit_name = $_POST['edit_name'];
	$edit_designation = $_POST['edit_designation'];
	$edit_description = $_POST['edit_description'];
	$edit_info_image = $_FILES['info_image']['name'];

	if($username == $_SESSION['username']){

	$query = "UPDATE info SET name = '$edit_name', design = '$edit_designation', description = '$edit_description', images = '$edit_info_image' WHERE id = '$edit_id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
			move_uploaded_file($_FILES['info_image']['tmp_name'], "upload/".$_FILES['info_image']['name']);
			$_SESSION['success2'] = 'Info Updated';
			header('Location:information.php');
		}
	else{
		$_SESSION['success2'] = "Info not Updated";
		header('Location:information.php');
		}
}
else{
	$_SESSION['status1'] = "Username not matched";
		header('Location: register.php');
}
}

//info DELETE BUTTON

if(isset($_POST['info_delete_btn'])){

	$id = $_POST['delete_id'];

	$query = "DELETE FROM info WHERE id = '$id' ";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success2'] = "Info is Deleted";
		header('Location:information.php');
	}
	else{
		$_SESSION['status'] = "Info is not Deleted";
		header('Location:information.php');
	}
}



//delete multiple button

if(isset($_POST['search_data'])){
	$id = $_POST['id'];
	$visible = $_POST['Visible'];

	$query = "UPDATE info SET Visible = '$visible' WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);
}

if(isset($_POST['delete_multiple_data'])){
	$id = 1;
	$query = "DELETE FROM info WHERE Visible = '$id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success2'] = "Your data is DELETED";
		header('Location:information.php');
	}
	else{
		$_SESSION['status'] = "Your data is not deleted";
		header('Location:information.php');
	}
}


//change password

if(isset($_POST['reset_password'])){
	$old_password = $_POST['old_password'];
	$new_password = $_POST['new_password'];

	$query = "SELECT password from register WHERE username = '{$_SESSION['username']}' AND password = '$old_password'";
	$query_run = mysqli_query($connection,$query);

	$row = mysqli_fetch_array($query_run);

	if(($row > 0)&&($old_password != $new_password)){
		$query = "UPDATE register SET password = '$new_password' WHERE username = '{$_SESSION['username']}'";
		$query_run = mysqli_query($connection,$query);

		if($query_run){
			$_SESSION['success4'] = "Password Changed";
			header('Location:Resetpassword.php');
		}
		else{
			$_SESSION['status'] = "Password not Changed";
			haeder('Location:Reserpassword.php');
		}
	}
	else{
		$_SESSION['status1'] = "Old and New Password must not be same.";
		header('Location:Resetpassword.php');
	}
}

//contact form

if(isset($_POST['contact_btn'])){
	$contact_email = $_POST['contact_email'];
	$contact_description = $_POST['contact_description'];

	$query = "INSERT INTO contact(email,query)VALUES('$contact_email','$contact_description')";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success5'] = "Thanks for writing to us";
		header('Location:contactus.php');
	}
	else{
		$_SESSION['status'] = "Error, Please try again";
		header('Location:contactus.php');
	}
}


//accept button

if(isset($_POST['accept_btn'])){
	$id = $_POST['edit_id'];
	$status = "Approved";

	$query = "UPDATE user SET status = '$status' WHERE id = '$id'";
	$query_run = mysqli_query($connection,$query);

	if($query_run){
		$_SESSION['success6'] = "Request Accepted";
		header('Location:investor_register.php'); 
	}else{
		$_SESSION['status'] = "Request not Accepted";
		header('Location:investor_register.php');
	}
}
?>