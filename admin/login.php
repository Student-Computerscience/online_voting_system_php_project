<!-- php code mathch data -->
<?php
session_start();
// db connect
include('../includes/connection.php');
if(isset($_POST['login'])){
   
  // get form data
  $email = $_POST['email'];
  $password = $_POST['password'];

  //prepare and execute the query to check if the user exists in database

  $query = "SELECT * FROM admins WHERE email = '$email' AND pasword = '$password'";

  $result = $conn->query($query);

  if($result->num_rows > 0){
    $admin = $result->fetch_assoc();

    //create session variables
    $_SESSION['email'] = $voter['email'];
    $_SESSION['password'] = $voter['password'];
    $_SESSION['id'] = $voter['id'];

    //rediract to deshboard
    header('Location:dashboard.php ');
  }
  else{
    echo "<script>
    alert('Invalid Credentials....');
    window.location.href = '../index.php';
    </script>";
    
  }
}
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Voting System-login page</title>
  <!-- external css -->
     <link rel="stylesheet"  href="../css/style.css"/>
  <!-- Bootstrap -->
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css"/>  
    <!-- JS File --> 
     <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Header -->
  <div class="container-fluid header">
    <h1>Online Voting System</h1>
  </div>

  <!-- Registration Form -->
   <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-mid-3 m-auto voter-login-form">
       <center> <h4><u>Admin login Form</u></h4></center>
        <form action="" method="POST">

          <div class="form-group">
            <label for="email">Enter Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" required>
          </div>

          <div class="form-group">
            <label for="password">Enter Pasword:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>

          <button type="submit" class="btn btn-primary"  name="login" name="register">login</button>
          

        </form>
      </div>
    </div>
   </div>


</body>
</html>