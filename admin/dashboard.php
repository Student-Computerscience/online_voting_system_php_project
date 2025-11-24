<?php 
  session_start();
  include('../includes/connection.php');
  $total_reg_voters = 0;
  $total_act_voters = 0;
  $total_reg_groups = 0;
  $total_act_groups = 0;
  // Get total registered voters
  $query = "SELECT COUNT(*) AS total_reg_voters FROM voters";
  $result = $conn->query($query);
  $voters = $result->fetch_assoc();
  $total_reg_voters = $voters['total_reg_voters'];
  // Get total active voters
  $query = "SELECT COUNT(*) AS total_act_voters FROM voters WHERE active = 1";
  $result = $conn->query($query);
  $voters = $result->fetch_assoc();
  $total_act_voters = $voters['total_act_voters'];
  // Get total registered groups
  $query = "SELECT COUNT(*) AS total_reg_groups FROM groups";
  $result = $conn->query($query);
  $groups = $result->fetch_assoc();
  $total_reg_groups = $groups['total_reg_groups'];
  // Get total active groups
  $query = "SELECT COUNT(*) AS total_act_groups FROM groups WHERE active = 1";
  $result = $conn->query($query);
  $groups = $result->fetch_assoc();
  $total_act_groups = $groups['total_act_groups'];

  if(isset($_POST['register'])){
    // db connectivity
    include('../includes/connection.php');

    // get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $image = $_FILES['image']['name']; // arr. h jisme image store hongi
    $address = $_POST['address'];

    // move voter images into votesr'images folder
    $img_path = "images/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$img_path);

    // prepare and execute query
    $query = "INSERT INTO groups values(null,'$name','$email','$password', '$number','$image','$address',0,1)";

    $result = $conn->query($query);

    if($result){
      echo "<script>
      alert('Groups Register Successfully...');
      window.location.href = 'dashboard.php';
      </script>";
      
    }
    else{
      echo "<script>
      alert('Groups Successfully not Register, try again...');
      window.location.href = 'dashboard.php';
      </script>";
      
    }
    

  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <!-- external css -->
     <link rel="stylesheet"  href="style.css" />
  <!-- Bootstrap -->
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css"/>  
    <!-- JS File --> 
     <script src="bootstrap/js/../bootstrap.min.js"></script>
     <!-- JQuery CDN Link -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>
<body>
  <!-- Header -->
   <div class="container-fluid header">
    <h1>Online Voting System</h1>
  </div>

  <!-- Main container -->
   <div class="container-fluid">
    <div class="row">
      <div class="col-md-2" id="left-side">
         <h3>Menu</h3>
         <a href="dashboard.php" class="btn btn-success mt-3 mr-3">Dashboard</a><br>
         <a id="add_group" class="btn btn-primary mt-3 mr-3">Add group</a><br>
         <a id="view_group" class="btn btn-warning mt-3 mr-3">View group</a><br>
         <a id="view_voter" class="btn btn-success mt-3 mr-3">View Voters</a><br>
         <a id="view_result" class="btn btn-info mt-3 mr-3">View Result</a><br>
         <a href="reset_voting.php" class="btn btn-primary mt-3 mr-3">Reset voting</a><br>
         <a href="../logout.php" class="btn btn-danger mt-3 mr-3">Logout</a>
      </div>

      <div class="col-md-10 mt-5 pt-3 pl-3" id="right-side">
        <h3 class="pb-3 mt-3 pt-3 pl-3 text-decoration-underline">Admin dashboard page</h3>
        <div class="row">
          <div class="col-md-3" id="card">
            <h5>Total Register Voters</h5>
            <hr>
            <h5>
              <?php 
              echo $total_reg_voters
              ?>
            </h5>
          </div>
          <div class="col-md-3" id="card">
            <h5>Total Active Voters</h5>
            <hr>
            <h5>
              <?php 
              echo $total_act_voters
              ?>
            </h5>
          </div>
          <div class="col-md-3" id="card">
            <h5>Total Register Groups</h5>
            <hr>
            <h5>
              <?php 
              echo $total_reg_groups
              ?>
            </h5>
          </div>
          <div class="col-md-3" id="card">
            <h5>Total Active Groups</h5>
            <hr>
            <h5>
              <?php 
              echo $total_act_groups
              ?>
            </h5>
          </div>
        </div>


      </div>
    </div>
</div>

</body>
</html>

<!-- Js (Jquery code -> without refrece hue page admin dashboard pr a jye) -->
<script>
  // add group button
  $(document).ready(function(){
    $("#add_group").click(function(){
      $("#right-side").load("register_group.php");
    });
  });
  // view group page
  $(document).ready(function(){
    $("#view_group").click(function(){
      $("#right-side").load("view_group.php");
    });
  });
   // view voter page
  $(document).ready(function(){
    $("#view_voter").click(function(){
      $("#right-side").load("view_voter.php");
    });
  });
   // view result page
  $(document).ready(function(){
    $("#view_result").click(function(){
      $("#right-side").load("view_result.php");
    });
  });
</script> 