<?php
$servername = "localhost";
$username = "eitv";
$password = "12345";
$dbname = "bdeitv";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$conn->set_charset("utf-8");
$conn2 = new mysqli($servername, $username, $password, $dbname);
$conn2->set_charset("utf-8");
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>