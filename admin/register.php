<?php
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="You must Enter Your Correct Username">
            </div>
            <div class="form-group">
                <label>Startup Name</label>
                <input type="text" name="startup_name" class="form-control" placeholder="Enter Startup Name">
            </div>
            <div class="form-group">
                <label>Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter the amount you needed">
            </div>
            <div class="form-group">
                <label>Description</label>
                <input type="textarea" name="description" class="form-control" placeholder="Describe about your Startup">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Financial Requests 
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Add Requests 
            </button>
    </h6>
  </div>

  <div class="card-body">

    <?php

    if(isset($_SESSION['success3'])&&$_SESSION['success3']!=''){
      echo '<h2>'.$_SESSION['success3'].'</h2>';
      unset($_SESSION['success3']);
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
      
      $query = "SELECT * FROM user WHERE username = '{$_SESSION['username']}'";
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
            <th>Status</th>
            <th>EDIT </th>
            <th>DELETE </th>
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
            <td> <?php echo $row['status']; ?></td>
            <td>

                <form action="register_edit.php" method="post">
                    <input type="hidden" name="edit_id" value="<?php  echo $row['id']; ?>">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                </form>
            </td>
            <td>
                <form action="code.php" method="post">
                  <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                  <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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