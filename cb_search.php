<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}


require 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Table with database</title>
</head>
<body>


<script type="text/javascript">
  
  var input = document.getElementById("name");

// Execute a function when the user releases a key on the keyboard
input.addEventListener("keyup", function(event) {
  // Number 13 is the "Enter" key on the keyboard
  if (event.keyCode === 13) {
    // Cancel the default action, if needed
    event.preventDefault();
    // Trigger the button element with a click
    document.getElementById("myBtn").click();
  }
});

</script>

<table>
<tr>
<th>Name</th>
<th>Date</th>
</tr>

<?php

$seacrh = $_POST['sname'];

$sql = "SELECT * from clientscb_date where client_id = '$seacrh'";

echo "Result(s) for: " . "<b>" . $seacrh . "<b>" . "<br>" . "<br>";


$result = $link->query($sql);

if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["client_id"]. "</td><td>" .  $row["client_date"];
  }
  echo "</table>";
} 
else {
    echo '<script>alert("Name not found..redirecting to menu")</script>';
    echo "<script> location.href='cb.php'; </script>";
    exit;

} 

$link->close();

?>

</table>

<form action="cb_update_date.php" method="post">
  <br>
  <label>Update date</label>
  <input type='hidden' name='myName' value='<?php echo "$seacrh";?>'/> 
  <input type="date" name="myDate">
  <button type="submit">Update</button>
</form>

<form action="cb.php" method="post">
  <br><button type="submit">Menu</button>
</form>
<form action="cb_update.php" method="post">
  <button type="submit">View Customer</button>
</form>

</body>
</html>

