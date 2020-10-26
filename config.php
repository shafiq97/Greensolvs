lmag6s0zwmcswp5w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'lmag6s0zwmcswp5w.cbetxkdyhwsb.us-east-1.rds.amazonaws.com');
define('DB_USERNAME', 'jqpm9robyw9zdwg3');
define('DB_PASSWORD', 'r6909ozsqlldaggk');
define('DB_NAME', 'e9phc0lb8htjlbs9');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>
