<?php

include('security.php');

include('includes/header.php'); 
include('includes/investornavbar.php'); 
?>


<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h4 class="m-0 font-weight-bold text-success">Information
		</div>
		<div class="card-body">
		<?php
		if(isset($_SESSION['success2']) && $_SESSION['success2'] !=''){
			echo '<h2 class="bg-success text-white">'.$_SESSION['success2'].'</h2>';
			unset($_SESSION['success2']);
		}

		if(isset($_SESSION['status']) && $_SESSION['status'] !=''){
			echo '<h2 class="bg-danger text-white">'.$_SESSION['status'].'</h2>';
			unset($_SESSION['status']);
		}

?>

		<div class="table-responsive">
			<?php

			$query = "SELECT * FROM info";
			$query_run = mysqli_query($connection,$query);

			if(mysqli_num_rows($query_run) > 0){
				?>
				
			<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Description</th>

						<th>Image</th>
						
					</tr>
				</thead>
				<tbody>
					<?php
					while ($row = mysqli_fetch_assoc($query_run)){
						?>
						<tr>
							
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['design']; ?></td>
							<td><?php echo $row['description']; ?></td>
							<td><?php echo'<img src="upload/'.$row['images'].'" width="100px" height="100px" alt="Image">'?></td>
						
						</tr>
						<?php
					}
				?>
					
				</tbody>
			</table>
			<?php
		}
		else{
			echo "No Record Found";
		}
		?>
		</div>
	</div>
</div>

  <?php
include('includes/scripts.php');
?>
<script>
	function toggleCheckbox(box){
		var id = $(box).attr("value");

		if($(box).prop("checked") == true){
			var visible = 1;
		}
		else{
			var visible = 0;
		}

		var data = {
			"search_data": 1,
			"id": id,
			"Visible": visible
		}

		$.ajax({
			type:"post",
			url:"code.php",
			data:data,
			success: function(response){
				alert("Data Checked");
			}
		});
	}
</script>
<?php
include('includes/footer.php');
?>