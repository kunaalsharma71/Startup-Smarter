<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');
?>



<div class="container" id="ContactUs">   
  <h1 style="text-align:center;color:grey;font-size:44px;">Contact Us</h1><br><br><br><br>
    <div class="row" style="margin-top: -50px;">
        <div class="col-md-3" style="margin-left:0px;">

      <h3 style="color:grey;">Corporate Headquarters</h3>
      <p class="md" style="color:grey;">
        Gust, Inc.
        <br>44 West 28th St, 7th Floor
        <br>New York, NY 10001 USA
        <br>info@gust.com
      </p>
    </div>
     
        <div class="col-md-3">
    
      <h3 style="color:grey;">Technical Support and Feedback</h3>
      <p class="md" style="color:grey;"> For general questions and feedback,send us a message</a>.</p>
      <p class="md" style="color:grey;"> For support requests,please contact support.</p>
    </div>

   <div class="col-md-3">
      <h3 style="color:grey;">Join the Gust Community</h3>
      <p class="md" style="color:grey;">
        Gust offers collaboration tools to investment organizations and entrepreneurs.
      </p>
    </div>
<div class="col-md-3">
    <h3 style="color:grey;">Partnerships</h3>
	<p class="md" style="color:grey;">
        For partnership or sponsorship inquiries,
        send us a message.
      </p>
    </div>
   </div>
</div>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h4 class="m-0 font-weight-bold text-primary">Any queries, feel free to write us</h4>
  </div>

  <div class="card-body">
  <?php

   if(isset($_SESSION['success5']) && $_SESSION['success5']!=''){
   	echo '<h2>'.$_SESSION['success5'].'</h2>';
   	unset($_SESSION['success5']);
   }
   if(isset($_SESSION['status']) && $_SESSION['status']!=''){
   	echo '<h2>'.$_SESSION['status'].'</h2>';
   	unset($_SESSION['status']);
   }

    ?>
<form action="code.php" method="POST">

  		<div class="form-group">
			    <label>Email</label>
			    <input type="email" name="contact_email" class="form-control" placeholder="Enter Your Email" required>
	        </div>

	        <div class="form-group">
			    <label>Share Your Thoughts</label>
			    <input type="textarea" rows="4" cols="50" name="contact_description" class="form-control" placeholder="Please write here....."  required>
	        </div>

	        <button type="submit" name="contact_btn" class="btn btn-primary">Submit</button>
</form>
</div>	
</div>
</div>
<?php

include('includes/scripts.php');
?>