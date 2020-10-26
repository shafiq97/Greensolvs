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
<style>
input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #588c7e;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}

</style>
</head>
<body>
<form action="ca.php" method="post">
  <br><button type="submit" >Menu</button><br><br>
</form>
<form action="ca_update.php" method="post">
  <button type="submit" >View Customer</button><br><br>
</form>

<form action="ca_search.php" method="post" id="mySearch">
  <label for="name" class="fixed">Search Name</label>
  <input type="text" id="sname" name="sname">
  <input type="submit" value="Search" id="myBtn" name="myBtn" />
</form>



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

function myAlert(){
  console.log("Hello")
}
</script>

<!--<table>
<tr>
<th>Name</th>
<th>Date (YYYY-MM-DD)</th>
<th>Phone</th>
<th>Date and time keyed</th>
</tr>-->

<?php

//$sql = "SELECT * FROM clientsca_date";

/*$sql = "SELECT clientsca.Name, clientsca_date.client_date, clientsca.Phone, clientsca_date.date_keyed
FROM clientsca
INNER JOIN clientsca_date ON clientsca.Name=clientsca_date.client_id
ORDER BY clientsca.Name, clientsca_date.client_date";

$result = $link->query($sql);
if ($result->num_rows > 0) {
// output data of each row
  while($row = $result->fetch_assoc()) {
  echo "<tr><td>" . $row["Name"]. "</td><td>" .  $row["client_date"] . "</td><td>" .  $row["Phone"] . "</td><td>" . $row["date_keyed"] ;
  }
echo "</table>";
} else { echo "0 results"; }*/



$sql1 = "SELECT Name, Phone FROM clientsca ORDER BY Name";
$result1 = $link->query($sql1);
echo "<table>";
if ($result1->num_rows > 0) {
// output data of each row
  while($row1 = $result1->fetch_assoc()) {
    echo '<tr><td>--</td>';
    echo "<tr><td> <b>Name: " . $row1["Name"] . "</b></td>";
    echo "<tr><td> Phone: " . $row1["Phone"] . "</td>";
    $name = $row1["Name"];
    $sql2 = "SELECT client_date, date_keyed FROM clientsca_date WHERE client_id = '$name'";
    $result2 = $link->query($sql2);
    if ($result2->num_rows > 0){
      echo "<tr><td>Date &nbsp&nbsp&nbsp&nbsp&nbsp                |&nbspDate and time keyed in:</td>";
      while($row2 = $result2->fetch_assoc()){
        echo "<tr><td>" . $row2["client_date"] ." | ". $row2["date_keyed"] . "</td>";
      }
    }
    else{
      echo trigger_error('Invalid query: ' . $link->error);
    }
  }
} else { echo "0 results" . trigger_error('Invalid query: ' . $link->error);}
echo "</table>";

$link->close();
?>
</table>
</body>
</html>