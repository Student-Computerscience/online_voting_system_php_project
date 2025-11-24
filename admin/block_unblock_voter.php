<?php 
  include('../includes/connection.php');
  $isActive = $_GET['active'];
  $vid = $_GET['vid'];

  if($isActive){
    $query = "UPDATE voters SET active = 0 WHERE vid = $vid";
  }
  else{
     $query = "UPDATE voters SET active = 1 WHERE vid = $vid";
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