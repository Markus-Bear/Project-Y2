<!--
    Name of screen: 	db.inc.php
    Purpose of screen: 	Used to connect to the database
    Student ID:			C00166672
    Name:				Mark Mukiiza
    Date Written:		February 2025
-->
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