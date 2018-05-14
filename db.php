<?php
session_start();
$servername = "localhost";
$username = "1249237";
$password = "yogesh090909";
$dbname = "1249237";
$con = new mysqli($servername, $username, $password, $dbname);
if ($con->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	echo"this is going side ways";
}

?>