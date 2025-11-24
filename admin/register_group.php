<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Online Voting System - registationpage</title>
  <!-- external css -->
     <link rel="stylesheet"  href="../css/style.css"/>
  <!-- Bootstrap -->
    <link rel="stylesheet"  href="../bootstrap/css/bootstrap.min.css"/>  
    <!-- JS File --> 
     <script src="../bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 
  <!-- Registration Form -->
   <div class="container-fluid mt-5">
    <div class="row">
      <div class="col-mid-3 m-auto voter-registation-form">
       <center> <h4><u>Group Registation Form</u></h4></center>
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

          <button type="submit" class="btn btn-primary"   name="register">Register</button>
          

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