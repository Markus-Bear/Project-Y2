<?php
$hostname = "localhost";
$username = "Team";
$password = "dbpassword_123";

$dbname = "Hotel_DB";

$con = mysqli_connect($hostname, $username, $password, $dbname);

if (!$con) {
    die("Failed to connect to MySQL: " . mysqli_connect_error());
}
?>