<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'krishna');
define('DB_PASSWORD', 'krishna');
define('DB_NAME', 'students');
 
/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
?>
 