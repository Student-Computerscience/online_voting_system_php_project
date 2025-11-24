<?php
include('../includes/connection.php');
?>
<html>
  <body>
    <h3 class="text-center pd-3 text-decoration-underline ">Registered groups for voting</h3>
    <table class="table">
      <thead>
        <tr>
          <th>S.No</th>
          <th>Group id</th>
          <th>Group name</th>
          <th>Group image</th>
          <th>Action</th>
        </tr>
      </thead>
      <?php
      $sno = 1;
      $query = "SELECT * FROM groups";
      $result = $conn->query($query);
      while($groups = $result->fetch_assoc()){
        $isActive = $groups['active'];
        ?>
        <tr>
          <td style="padding-top:40px;"><?php echo $sno; ?></td>
          <td style="padding-top:40px;"><?php echo $groups['gid']; ?></td>
          <td style="padding-top:40px;"><?php echo $groups['name']; ?></td>
          <td>
            <img src="images/<?php echo $groups['image']; ?>" alt="Group image" width="80" height="80">
          </td>
          <td style="padding-top:40px;">
            <a href="delete_group.php?gid=<?php echo $groups['gid']; ?>" class="btn btm-sm btn-danger">Delete</a>
            <a href="block_unblock.php?gid=<?php echo $groups['gid']; ?>&active=<?php echo $groups['active'];?>" class="btn btm-sm btn-success"><?php if($isActive){echo "Block";}else{echo "Unblock";} ?></a>
          </td>
        </tr>
        <?php
        $sno = $sno + 1;
      }
      
      ?>
    </table>
  </body>
</html>