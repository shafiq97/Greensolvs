<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>


<?php 

require 'config.php';

$date = mysqli_real_escape_string($link, $_POST['myDate']);
$name = mysqli_real_escape_string($link, $_POST['myName']);


$sql = "INSERT INTO clientsca_date (client_id, client_date) VALUES ('$name', '$date')";


if (mysqli_query($link, $sql)) {
  echo "New record created successfully";
} 
else {
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





