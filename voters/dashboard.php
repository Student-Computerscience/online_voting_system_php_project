<?php 
  session_start();
  include('../includes/connection.php');
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
  <!-- Header -->
   <div class="container-fluid header">
    <h1>Online Voting System</h1>
  </div>

  <!-- Main container -->
   <div class="row ">
    <div class="col-md-4"  id="left-side">
      <h3>Voter Details</h3>
       <div>
        <table class="table">
            <?php 
            $voting_flag = "";
              $query = "SELECT * FROM voters WHERE vid = '$_SESSION[vid]'";
              $result = $conn->query($query);
              while($voters = $result->fetch_assoc()){
                $voting_flag = $voters['voting'];
                ?>
                <tr>
                  <td>
                    <img src="images/<?php echo $voters['image'] ?>" alt="Voter Image" width="150" height="100" class="img-thumbnail">
                  </td>
                </tr>
                <tr>
                  <td>Name:</td>
                  <td>
                    <?php 
                      echo $voters['name'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Email:</td>
                  <td>
                    <?php 
                      echo $voters['email'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Number:</td>
                  <td>
                    <?php 
                      echo $voters['number'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Address:</td>
                  <td>
                    <?php 
                      echo $voters['address'];
                    ?>
                  </td>
                </tr>
                <tr>
                  <td>Voting Status:</td>
                  <td class="text-danger">
                    <?php 
                    if($voters['voting'] == 'No'){
                      echo 'Not Voted';
                     }
                     else{
                      echo "Voted";
                     }
                    ?>
                  </td>
                </tr>
                <?php
              }
            ?>

        </table>

        <a href="edit_profile.php" class="btn btn-primary">Edit Profile</a>
        <a href="../logout.php" class="btn btn-danger">Logout</a>
       </div>
    </div>

    <div class="col-md-6" id="right-side">
      <center><h3>Availabel for group Voting</h3></center>

      <table class="table">
        <thead>
          <tr>
            <th>S.No</th>
            <th>Group Image</th>
            <th>Group Name</th>
            <th>Action</th>
          </tr>
        </thead>
         <?php 
            $sno = 1;
              $query = "SELECT * FROM groups";
              $result = $conn->query($query);
              while($groups = $result->fetch_assoc()){
                ?>
                 <tr>
                  <td class="pt-4">
                    <?php echo $sno ?>
                  </td>
                  <td>
                    <img src="../admin/images/<?php echo $groups['image'];?>" alt="Group Image" width="80" height="80">
                  </td>
                  <td class="pt-4">
                    <?php echo $groups['name']?>
                  </td>
                  <td class="pt-4">
                    <?php 
                    if($voting_flag == 'Yes'){
                      ?>
                      <a href="vote.php?gid=<?php echo $groups['gid']; ?>&tv=<?php echo $groups['total_vote']; ?>"  class="btn btn-sm btn-primary" style="pointer-events:none;">Vote</a>
                      <?php
                    }
                    else{
                      ?>
                      <a href="vote.php?gid=<?php echo $groups['gid']; ?>&tv=<?php echo $groups['total_vote']; ?>"  class="btn btn-sm btn-primary">Vote</a>
                       <?php
                    }
                    ?>
                  </td>
                 </tr>
                <?php
                $sno = $sno + 1 ;
              }
                ?>
      </table>
    </div>
   </div>

</body>