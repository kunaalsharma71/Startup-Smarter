<?php

include('security.php');

include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i
        class="fas fa-clipboard-list  text-white-50"></i> <b>Updated Data</b></a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">


               <h4>Total Request: <?php

                $query = "SELECT id FROM user WHERE username = '{$_SESSION['username']}' ORDER BY id";
                $query_run = mysqli_query($connection,$query);

                $row = mysqli_num_rows($query_run);

                echo $row;

                ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-calendar fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Requested Amount</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">

                <h4>Total : <?php

                $query = "SELECT username, SUM(amount) FROM user WHERE username = '{$_SESSION['username']}' GROUP BY username";
                $query_run = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($query_run)){
                echo " &#8377;".$row['SUM(amount)'];
                echo "<br />";
                }
                

                ?></h4>

              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-rupee-sign fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Additional Information Added</div>
              <div class="row no-gutters align-items-center">
                <h4>Total Info Added: <?php

                $query = "SELECT id FROM info WHERE name = '{$_SESSION['username']}' ORDER BY id";
                $query_run = mysqli_query($connection,$query);

                $row = mysqli_num_rows($query_run);

                echo $row;

                ?></h4>
                
              </div>
            </div>
            <div class="col-auto">
              <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800"><h4>Pending Request:<?php
                $status = "Pending";

                $query = "SELECT id FROM user WHERE status='$status' AND username = '{$_SESSION['username']}'";
                $query_run = mysqli_query($connection,$query);

                $row = mysqli_num_rows($query_run);

                echo $row;

                ?></h4></div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->








  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>