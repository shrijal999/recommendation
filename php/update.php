<?php
session_start();
if(!isset($_SESSION['fullname'])){
  echo "you are logged out.";
  header('location : login.php');
}
include 'connection.php';

if(isset($_GET['id'])){
$ids = intval($_GET['id']); // convert id to an integer to ensure its a valid number
}else{
  die("error:id is not provided in the url.");
}
$showquery = "SELECT * from register where id= $ids";

$showdata = mysqli_query($con, $showquery);

$data = mysqli_fetch_array($showdata);


if(isset($_POST['register'])){
  $meal = mysqli_real_escape_string($con,$_POST['meal']);
  $mealname = mysqli_real_escape_string($con,$_POST['mealname']);
  $region = mysqli_real_escape_string($con,$_POST['region']);

      $query = "UPDATE register SET meal='$meal', mealname='$mealname', region='$region' WHERE id=$$ids ";

      $iquery = mysqli_query($con, $query);

      if($iquery){
       ?>
       <<script>
        alert("Data updated properly");
       </script>
       <?php
      }else{
       ?>
       <<script>
        alert("Data cannot be updated");
       </script>
       <?php
       mysqli_error($con);
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
    <form method="post">
      <h1>Save Your Favourite Meal Here:</h1>
      <label for="name">Meal:</label><br>
      <input type="text" name="meal" value="<?php echo $data['meal']; ?>" required><br>

      <label for="name">mealname:</label><br>
      <input type="text" name="mealname" value="<?php echo $data['mealname']; ?>"required><br>

      <label for="name">Region:</label><br>
      <input type="text" name="region" value="<?php echo $data['region']; ?>"required><br>

      <input type="submit" name="register" value="update">
    </form>
  </Div>
  </body>