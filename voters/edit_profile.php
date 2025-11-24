<?php 
session_start();
include('../includes/connection.php');
// Uppdate button code
if(isset($_POST['update'])){
  //get form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $number = $_POST['number'];
  $address = $_POST['address'];

  //execute query
  $query = "UPDATE voters SET 
                  name = '$name', 
                  email = '$email', 
                  number = '$number', 
                  address = '$address' 
                  WHERE vid = '$_SESSION[vid]'";
  $result = $conn->query($query);

  if($result){
    echo "<script>
    alert('Succesfully update voter data...');
    window.location.href = 'dashboard.php';
    </script>";
    
  }
   else{
    echo "<script>
    alert('Error: try again');
    window.location.href = 'dashboard.php';
    </script>";
    
   }
}


$query = "SELECT * FROM voters WHERE vid = '$_SESSION[vid]'";
$result = $conn->query($query);
$voters = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>edit profile</title>
  <!-- external css -->
     <link rel="stylesheet"  href="./styles.css"/>
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

  <div class="container">
    <div class="row mt-4 ">
      <div class="col-md-4 m-auto" id="edit_profile">
        <center><h4><u>Edit Profile</u></h4></center>
         
        <form action="" method="POST"  onsubmit="return validateForm()">

          <div class="form-group">
            <label for="name">Enter Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="<?php echo $voters['name']; ?>" required>
            <small id="nameError" class="form-text text-danger"></small>
          </div>

          <div class="form-group">
            <label for="email">Enter Email:</label>
            <input type="email" class="form-control" name="email"  value="<?php echo $voters['email']; ?>" id="email" required>
            <small id="emailError" class="form-text text-danger"></small>
          </div>


          <div class="form-group">
            <label for="number">Enter Number:</label>
            <input type="text" class="form-control" name="number" id="number"  value="<?php echo $voters['number']; ?>" required>
            <small id="numberError" class="form-text text-danger"></small>
          </div>


          <div class="form-group">
            <label for="name">Enter address:</label>
           <textarea name="address" class="form-control" rows="2" cols="50" id=""><?php echo $voters['address']; ?></textarea>
          </div>

          <button type="submit" class="btn btn-primary"   name="update">Update</button>
          <a href="dashboard.php" class="btn btn-danger ">Go to Dashboard</a>

        </form>

      </div>
    </div>
  </div>
</body>
</html>