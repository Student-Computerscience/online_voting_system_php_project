<?php
include('../includes/connection.php');
?>
<html>
  <body>
    <h3 class="text-center pd-3 text-decoration-underline ">List of register voters</h3>
    <table class="table">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Name</th>
          <th>Email id</th>
          <th>Number</th>
          <th>Address</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      $sno = 1;
      $query = "SELECT * FROM voters";
      $result = $conn->query($query);
      while($voters = $result->fetch_assoc()){
        $isActive = $voters['active'];
        ?>
        <tr>
          <td><?php echo $sno; ?></td>
          <td><?php echo $voters['name']; ?></td>
          <td><?php echo $voters['email']; ?></td>
          <td><?php echo $voters['number']; ?></td>
          <td><?php echo $voters['address']; ?></td>

          
          <td >
            <a href="delete_voter.php?vid=<?php echo $voters['vid']; ?>" class="btn btm-sm btn-danger">Delete</a>
            <a href="edit_voter.php?vid=<?php echo $voters['vid']; ?>" class="btn btm-sm btn-primary">edit</a>
            <a href="block_unblock_voter.php?vid=<?php echo $voters['vid']; ?>&active=<?php echo $voters['active'];?>" class="btn btm-sm btn-success"><?php if($isActive){echo "Block";}else{echo "Unblock";} ?></a>
          </td>
        </tr>
        <?php
        $sno = $sno + 1;
      }
      
      ?>
    </table>
  </body>
</html>