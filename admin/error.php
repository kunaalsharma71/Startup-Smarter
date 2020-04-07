 <?php
include('code.php');
function function_alert($message) { 
      
    // Display the alert box  
    echo "<script>alert('$message');</script>"; 
} 
if(count($errors) > 0) :?>
	<div>
		<?php foreach ($errors as $error) : ?>
			<p><?php function_alert($error); ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?>