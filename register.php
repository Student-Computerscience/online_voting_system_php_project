<!-- php code -->
<?php 
  if(isset($_POST['register'])){
    // db connectivity
    include('includes/connection.php');

    // get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];
    $image = $_FILES['image']['name']; // arr. h jisme image store hongi
    $address = $_POST['address'];

    // move voter images into votesr'images folder
    $img_path = "voters/images/".basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'],$img_path);

    // prepare and execute query
    $query = "INSERT INTO voters values(null,'$name','$email','$password', '$number','$image','$address','No',1)";

    $result = $conn->query($query);

    if($result){
      echo "<script>
      alert('Voter Register Successfully...');
       window.location.href = 'login.php';
      </script>";
      
    }
    else{
      echo "<script>
      alert('Voter Successfully not Register, try again...');
       window.location.href = 'register.php';
      </script>";
      // header('Location:register.php' );
    }
    

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Voting System - registationpage</title>
  <!-- external css -->
     <link rel="stylesheet"  href="css/style.css"/>
  <!-- Bootstrap -->
    <link rel="stylesheet"  href="bootstrap/css/bootstrap.min.css"/>  
    <!-- JS File --> 
     <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <!-- Header -->
  <div class="container-fluid header">
    <h1>Online Voting System</h1>
  </div>

  <!-- Registration Form -->
   <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-mid-3 m-auto voter-registation-form">
       <center> <h4><u>Voter Registation Form</u></h4></center>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">

          <div class="form-group">
            <label for="name">Enter Name:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="Enter your name" required>
            <small id="nameError" class="form-text text-danger"></small>
          </div>

          <div class="form-group">
            <label for="email">Enter Email:</label>
            <input type="email" class="form-control" name="email" placeholder="Enter your email" id="email" required>
            <small id="emailError" class="form-text text-danger"></small>
          </div>

          <div class="form-group">
            <label for="password">Enter Pasword:</label>
            <input type="password" class="form-control" name="password" placeholder="Enter your password" required>
          </div>

          <div class="form-group">
            <label for="number">Enter Number:</label>
            <input type="text" class="form-control" name="number" id="number" placeholder="Enter your number" required>
            <small id="numberError" class="form-text text-danger"></small>
          </div>

          <div class="form-group">
            <label for="name">Upload Photo:</label>
            <input type="file" class="form-control" name="image">
          </div>

          <div class="form-group">
            <label for="name">Enter address:</label>
           <textarea name="address" class="form-control" rows="2" cols="50" id=""></textarea>
          </div>

          <button type="submit" class="btn btn-primary"  name="register">Register</button>
          <span class="mt-3">Already registered</span><a  href="login.php"> Login here</a>

        </form>
      </div>
    </div>
   </div>


</body>
 <!-- JS Code -->
  <!-- Validation code -->
   <script>
    function validateForm(){
      var name = document.getElementById("name").value;
       var email = document.getElementById("email").value;
        var number = document.getElementById("number").value;

        var nameRegex = /^[a-zA-Z\s-]+$/;
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        var numberRegex = /^[6-9]\d{9}$/;

        if(!nameRegex.test(name)){
          document.getElementById("nameError").innerText = "only use alphabets.";
          return false;
        }
        else{
          document.getElementById("nameError").innerText = "";
        }

        if(!emailRegex.test(email)){
          document.getElementById("emailError").innerText = "Please enter valid email id";
          return false;
        }
        else{
          document.getElementById("emailError").innerText = "";
        }

        if(!numberRegex.test(number)){
          document.getElementById("numberError").innerText = "only use 10 dig. number.";
          return false;
        }
        else{
          document.getElementById("numberError").innerText = "";
        }
        return true;

    }
   </script>
</html>