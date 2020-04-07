<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Change Password</h4>
  </div>

  <div class="card-body">
  	<?php
		if(isset($_SESSION['success4']) && $_SESSION['success4'] !=''){
			echo '<h2 class="bg-success text-white">'.$_SESSION['success4'].'</h2>';
			unset($_SESSION['success4']);
		}

		if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
			echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
			unset($_SESSION['status']);
		}
		if(isset($_SESSION['status1']) && $_SESSION['status1'] !=''){
			echo '<h2 class="bg-danger text-white">'.$_SESSION['status1'].'</h2>';
			unset($_SESSION['status1']);
		}

?>

  	<form action="code.php" method="POST">

  		<div class="form-group">
			    <label>Old Password</label>
			    <input type="password" name="old_password" class="form-control" placeholder="Enter Your old Password" required>
	        </div>

	        <div class="form-group">
			    <label>New Password</label>
			    <input type="password" name="new_password" class="form-control" placeholder="Enter Your New Password" required>
	        </div>

	        <button type="submit" name="reset_password" class="btn btn-primary">Submit</button>
</form>
  </div>	
<?php
include('includes/footer.php');
include('includes/scripts.php');
?>