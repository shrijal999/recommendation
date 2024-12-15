<?php
session_start();
if(!isset($_SESSION['fullname'])){
  echo "you are logged out.";
  header('location : login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <table>
  <h1>list of favourite items</h1>
    <thead>
      <tr>
        <th>id</th>
        <th>Meal</th>
        <th>Mealname</th>
        <th>Region</th>
        <th colspan="2">Operation</th>
      </tr>
    </thead>
    <tbody>
    <?php
include 'connection.php';

$selectquery = "SELECT * from register";

$query = mysqli_query($con, $selectquery);

$num = mysqli_num_rows($query);

while($res = mysqli_fetch_array($query)){
?>
  <tr>
        <td><?php echo $res['id']; ?></td>
        <td><?php echo $res['meal']; ?></td>
        <td><?php echo $res['mealname']; ?></td>
        <td><?php echo $res['region']; ?></td>
       <td><a href="update.php?id=<?php echo $res['id']; ?>">Update</a></td>
        <td><a href="delete.php?id=<?php echo $res['id']; ?>">Delete</a></td>
      </tr>
    <?php
}
?>
    </tbody>
  </table>
</body>
</html>