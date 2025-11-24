<?php 
  include('../includes/connection.php');
  $vid = $_GET['vid'];
  $query = "DELETE FROM voters WHERE vid = $vid";
  $result = $conn->query($query);
  if($result){
    echo "<script>
      alert('voter Delete successfully..');
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