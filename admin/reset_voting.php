<?php
  include('../includes/connection.php');
   
  //delete all the groups
  $query = "DELETE from groups";
  $result = $conn->query($query);

  //set voting status of all the voters to not voted
  $query = "UPDATE voters SET voting = 'No'";
  $result = $conn->query($query);
  if($result){
    echo "<script>
      alert('Voting Reset successfully..');
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