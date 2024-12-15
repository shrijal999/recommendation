<?php
session_start();
if(!isset($_SESSION['fullname'])){
  echo "you are logged out.";
  header('location : login.php');
}
include 'connection.php';

$id = $_GET['id'];

$deletequery = "DELETE FROM register where id=$id";

$query = mysqli_query($con, $deletequery);

if($query){
  ?>
  <<script>
    alert("deleted successfully.");
  </script>
  <?php
}else{
  ?>
  <<script>
    alert("unable to delete");
  </script>
  <?php
}
?>