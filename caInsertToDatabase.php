<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require 'config.php';

$name = mysqli_real_escape_string($link, $_POST['name']);
$phone = mysqli_real_escape_string($link, $_POST['phone']);
$date = mysqli_real_escape_string($link, $_POST['date']);


$sql = "INSERT INTO clientsca (name, phone, date)
VALUES ('$name', '$phone', '$date')";

$sql1="";

if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
  $sql1 = "INSERT INTO clientsca_date (client_id, client_date) VALUES ('$name', '$date')";

  if (mysqli_query($link, $sql1)) {
    echo ", record added to database";
  } else {
    echo "Error: " . $sql1 . "<br>" . mysqli_error($link);
  }

} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($link);
}

mysqli_close($link);

?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>
  <form action="ca.php" method="post">
    <br><button type="submit">Menu</button>
  </form>
  <form action="ca_update.php" method="post">
    <button type="submit">View Customer</button>
  </form>
</body>
</html>

