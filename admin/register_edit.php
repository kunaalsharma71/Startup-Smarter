<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Your Request</h6>
  </div>

  <div class="card-body">

  	<?php

  	

  		if(isset($_POST['edit_btn'])){
			$id = $_POST['edit_id'];
			$query = "SELECT * FROM user where id = $id";
			$query_run = mysqli_query($connection,$query);

			foreach ($query_run as $row){
				?>

	<form action="code.php" method="POST">
  		<div class="modal-body">
  			<input type="hidden" name="edit_id" value="<?php echo($row['id'])?>">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="edit_username" value="<?php echo($row['username'])?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>StartUp</label>
                <input type="text" name="edit_startup" value="<?php echo($row['startup'])?>" class="form-control" placeholder="Enter StartUp">
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="edit_amount" value="<?php echo($row['amount'])?>" class="form-control" placeholder="Enter Amount">
            </div>
             <div class="form-group">
                <label>Description</label>
                <input type="text" name="edit_description" value="<?php echo($row['description'])?>" class="form-control" placeholder="Describe about your Idea">
            </div>
            		<a href="register.php" class="btn btn-danger">Cancel</a>
                    <button class="btn btn-primary" name="updatebtn">Update</button>
        </div>
       </form>
				<?php
			}
		}
	?>

</div>
</div>
</div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>