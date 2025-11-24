<?php 
  include('../includes/connection.php');
  $gid = $_GET['gid'];
  $query = "DELETE FROM groups WHERE gid = $gid";
  $result = $conn->query($query);
  if($result){
    echo "<script>
      alert('Group Delete successfully..');
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