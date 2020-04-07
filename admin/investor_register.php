<?php
include('security.php');
include('includes/header.php'); 
include('includes/investornavbar.php'); 
?>




<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Financial Requests 
            
    </h6>
  </div>

  <div class="card-body">

    <?php

    if(isset($_SESSION['success6'])&&$_SESSION['success6']!=''){
      echo '<h2>'.$_SESSION['success6'].'</h2>';
      unset($_SESSION['success6']);
    }
    if(isset($_SESSION['status'])&&$_SESSION['status']!=''){
      echo '<h2 class="bg-info">'.$_SESSION['status'].'</h2>';
      unset($_SESSION['status']);
    }
     if(isset($_SESSION['status1'])&&$_SESSION['status1']!=''){
      echo '<h2 class="bg-info">'.$_SESSION['status1'].'</h2>';
      unset($_SESSION['status1']);
    }
    ?>

    <div class="table-responsive">

      <?php
      $status = "Pending";
      $query = "SELECT * FROM user WHERE status = '$status'";
      $query_run = mysqli_query($connection,$query);

      ?>

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th> R.ID </th>
            <th> Username </th>
            <th>StartUp </th>
            <th>Amount</th>
            <th>Description</th>
            <th>Status </th>
         
          </tr>
        </thead>
        <tbody>
     
        <?php

        if(mysqli_num_rows($query_run) > 0){
          while($row = mysqli_fetch_assoc($query_run)){
            ?>


          <tr>
            <td><?php  echo $row['id']; ?></td>
            <td> <?php  echo $row['username']; ?></td>
            <td><?php  echo $row['startup']; ?></td>
            <td> <?php echo $row['amount'];  ?> </td>
            <td> <?php echo $row['description'];  ?> </td>
            <td>

                <form action="code.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
             
                    <button  type="submit" name="accept_btn" class="btn btn-success"> Accept</button>
                </form>
            </td>
          </tr>
        <?php
          }
        }
        else{
          echo "No record Found";
        }
        ?>
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>