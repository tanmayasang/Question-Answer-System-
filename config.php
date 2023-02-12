<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'username defined in XAMPP sql db ');
define('DB_PASSWORD', 'password you define in your XAMPP sql db');
define('DB_NAME', 'qasystem');
 
/* Attempt to connect to MySQL database procedural style */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME, 3307);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>