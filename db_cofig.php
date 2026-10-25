<?php
$host = "localhost";
$username = "root";
$password = ""; // Leave blank if no password
$database = "Blood Donation"; // Must match the database name exactly

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
