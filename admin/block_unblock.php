<?php 
  include('../includes/connection.php');
  $isActive = $_GET['active'];
  $gid = $_GET['gid'];

  if($isActive){
    $query = "UPDATE groups SET active = 0 WHERE gid = $gid";
  }
  else{
     $query = "UPDATE groups SET active = 1 WHERE gid = $gid";
  }
  $result = $conn->query($query);
  if($result){
    echo "<script>
      alert('Active status update successfully..');
      window.location.href = 'dashboard.php';
      </script>";
  }
  else{
    echo "<script>
      alert('Error : Try again..');
      window.location.href = 'dashboard.php';
      </script>";
  }
?>