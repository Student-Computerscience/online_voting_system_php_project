<?php 
  include('../includes/connection.php');

  //count total vote
  $total_votes = 0;
  $query = "SELECT SUM(total_vote) AS total_votes FROM groups";
  $result = $conn->query($query);
  $groups = $result->fetch_assoc();
  $total_votes = $groups['total_votes'];
?>
<html>
  <div class="row">
    <div class="col-md-8">
      <h4>Total Votes Cast = <?php echo $total_votes; ?></h4>

      <?php
      //find the group with the highest voting
      $query = "SELECT name, total_vote FROM groups WHERE total_vote = (SELECT MAX(total_vote) FROM groups)";
      $result = $conn->query($query);
      while($groups = $result->fetch_assoc()){
        ?>
        <hr><h5>Highest Vote Cast to - <?php echo $groups['name']; ?>(<?php echo $groups['total_vote']; ?>)</h5>
        <?php
      }
      ?><hr>

      <table class="table">
        <thead>
          <tr>
            <th>S.no</th>
            <th>Group Name</th>
            <th>Total Votes</th>
          </tr>
        </thead>
        
        <!-- get total votes for each groups -->
        <?php 
        $query = "SELECT gid, name, total_vote FROM groups";
        $result = $conn->query($query);
        $sno = 1;
        while($groups = $result->fetch_assoc()){
          ?> 
          <tr>
            <td><?php echo $sno; ?></td>
            <td><?php echo $groups['name']; ?></td>
            <td><?php echo $groups['total_vote']; ?></td>
          </tr>
          <?php
          $sno = $sno + 1;
        }
        
        ?>

      </table>

    </div>
  </div>
</html>