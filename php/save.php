<?php
session_start();
if(!isset($_SESSION['fullname'])){
  echo "you are logged out.";
  header('location : login.php');
}
include 'connection.php';

if(isset($_POST['register'])){
  $meal = $_POST['meal'];
  $mealname = $_POST['mealname'];
  $region = $_POST['region'];

  // to prevent sql injection
  $mealtype = mysqli_real_escape_string($con, $meal);
  $mealname = mysqli_real_escape_string($con, $mealname);
  $region = mysqli_real_escape_string($con, $region);
  
      $insertquery = "INSERT INTO register(meal, mealname, region) values('$meal', '$mealname', '$region')";

      $iquery = mysqli_query($con, $insertquery);

      if($iquery){
       ?>
       <<script>
        alert("inserted successfully");
       </script>
       <?php
       header('location:favourite.php');
      }else{
       ?>
       <<script>
        alert(" cannot insert successfully");
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
  <title>Save Your Favourite Meal Here:</title>
  <link rel="stylesheet" href="stylesheet/style.css">
</head>
<body id="S-body">
  <Div id="L-container"> 
    <form method="post" action="save.php">
      <h1>Save Your Favourite Meal Here:</h1>
      <label for="name">Meal:</label><br>
      <input type="text" name="meal" required><br>

      <label for="name">mealname:</label><br>
      <input type="text" name="mealname" required><br>

      <label for="name">Region:</label><br>
      <input type="text" name="region" required><br>

      <input type="submit" name="register" value="submit">
    </form>
  </Div>
  </body>