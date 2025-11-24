<?php 
session_start();
include('../includes/connection.php');

// fatch total vote from db
$total_vote = 0;
$query = "SELECT total_vote FROM groups WHERE gid = '$_GET[gid]'";
$result = $conn->query($query);
$groups = $result->fetch_assoc();
$total_vote = $groups['total_vote'];

// update total vote status in group table and see status group deshboard
  
$query = "UPDATE groups SET total_vote = $total_vote + 1  WHERE gid = '$_GET[gid]'";
$result = $conn->query($query);
  if($result){
    $query = "UPDATE voters SET voting = 'Yes' WHERE vid = '$_SESSION[vid]'";

    $result = $conn->query($query);
    echo "<script>
    alert('Vote Save Successfully...');
    </script>";
  }
  else{
     echo "<script>
    alert('Error: Try again...');
    </script>";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Voter Dashboard</title>
  <!-- external css -->
     <link rel="stylesheet"  href="styles.css"/>
  <!-- Bootstrap -->
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css"/>  
    <!-- JS File --> 
     <script src="bootstrap/js/../bootstrap.min.js"></script>
</head>
<body>
  <a href="dashboard.php" class="btn btn-danger" style="margin-top: 150px; margin-left: 400px;">Go to dashboard</a>
</body>
</html>