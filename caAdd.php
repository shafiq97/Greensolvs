<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
<form id="addForm" action="caInsertToDatabase.php" method="post">
  <br>
  <h1>Add Customer Data</h1><br><br>
  <label for="fname">Name:</label><br>
  <input type="text" id="name" name="name" style="text-transform:uppercase"><br><br>
  <label for="phone">Phone:</label><br>
  <input type="text" id="phone" name="phone"><br><br>
  <label for="date">Date:</label><br>
  <input type="date" id="date" name="date"><br><br>
</form>
<button type="submit" form="addForm" value="Submit">Submit</button>

<form action="ca.php" method="post">
    <br><button type="submit">Menu</button>
</form>
<form action="ca_update.php" method="post">
    <br><button type="submit">View Customer</button>
</form>

</body>
</html>




