<?php
session_start();
include 'connection.php';
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['pass'];

  $email_search = "SELECT * from signup where email = '$email'";

  $query = mysqli_query($con, $email_search);
  
  $emailcount = mysqli_num_rows($query);
  
  if($emailcount>0){
    $emailpass = mysqli_fetch_assoc($query);

    $pass = $emailpass['password'];

    $_SESSION['fullname'] = $emailpass['fullname'];

    if($pass){
      ?>
      <<script>
        alert("login successful.");
      </script>
      <?php
      header("location:index.php");
    }else{
      ?>
      <<script>
        alert("Incorrect Password.");
      </script>
      <?php
    }
  }else{
    ?>
      <<script>
        alert("Invalid email.");
      </script>
      <?php
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
  <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body id="S-body">
  <Div id="L-container"> 
    <form method="post" action="">
      <h1>Log In</h1>
      <label for="name" class="form-control">username:</label><br>
      <input type="text" name="email" placeholder="Enter Your Name"required><br><br>

      <label for="pass" class="form-control">Password:</label>
      <input type="password" name="pass" required><br><br>

      <input type="submit" name="login" value="submit">
    </form>
  </Div>
  </body>