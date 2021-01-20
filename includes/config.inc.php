<?php
// Database connection
define("DBSERVER", 'localhost');
define("DBUSER", 'root');
define("DBPASSWORT", 'root'); // xampp: {empty} / mamp: root
define("DBNAME", 'travelblog');

$conn = mysqli_connect(DBSERVER, DBUSER, DBPASSWORT, DBNAME) OR die('Connection error: '.mysqli_connect_error());

// Session lifetime
define('SESSION_LIFETIME', 180); // session duration in minutes, 180 minutes (3 hours)
?>

