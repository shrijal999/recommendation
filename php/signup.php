<?php

session_start();

include 'connection.php';

if(isset($_POST['signin'])){
  $fullname = $_POST['name'];
  $password = $_POST['pass'];
  $email = $_POST['email'];
  $gender = $_POST['gender'];

  $fullnam = mysqli_real_escape_string($con, $fullname);
  $passwor = mysqli_real_escape_string($con, $password);
  $emai = mysqli_real_escape_string($con, $email);
  $gende = mysqli_real_escape_string($con, $gender);

  $emailquery = "SELECT * FROM signup where email = '$email'";

  $query = mysqli_query($con, $emailquery);

  $emailcount = mysqli_num_rows($query);

  if($emailcount>0){
    ?>
    <script>
       alert("email already exists");
      </script>
      <?php
  }else{
      $insertquery = "INSERT INTO signup(fullname, password, email, gender) VALUES('$fullname', '$password', '$email', '$gender')";

      $iquery = mysqli_query($con, $insertquery);

      if($iquery){
       ?>
       <script>
        alert("inserted successfully");
       </script>
       <?php
       header("location:login.php");
      }else{
       ?>
       <<script>
        alert(" cannot insert successfully");
       </script>
       <?php
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="stylesheet/style.css">
</head>

<body id="S-body">
  <Div id="S-container"> 
    <form method="post" action="signup.php" id="form">
      <h1>Sign Up</h1>
      <div class="form-control">
      <label for="name">Fullname:</label><br>
      <input type="text" name="name" id="fullname" placeholder="Enter Your Full Name" required><br><br>
      <small>Error Msg</small>
      </div>

      <div class="form-control">
      <label for="pass">Password:</label>
      <input type="password" name="pass" id="password"required><br><br>
      <small>Error Msg</small>
      </div>

      <div class="form-control">
      <label for="email">Email:</label>
      <input type="email" name="email" id="email"required><br><br>
      <small>Error Msg</small>
      </div>

      <div class="form-control">
      <label for="gender">Gender:</label>
      <label for="gender">Male:</label>
      <input type="radio" name="gender" id="gender" value="male">
      <label for="gender">Female:</label>
      <input type="radio" name="gender" id="gender" value="female"><br><br>
      <small>Error Msg</small>
      </div>

      <input type="submit" name="signin" value="submit">
    </form>
  </Div>
  <script src="script/script.js"></script>
</body>
</html>