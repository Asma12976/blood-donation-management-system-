<?php
// Hardcoded username and password (for demonstration purposes)
$username = "asma";
$password = "asma123";

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Database connection
$servername = "localhost";
$username_db = "root";
$password_db = "";
$dbname = "blood_donation";

// Create connection
$conn = new mysqli($servername, $username_db, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare your SQL query to insert the username and hashed password
$sql = "INSERT INTO admin (username, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $username, $hashedPassword);

// Execute the query
if ($stmt->execute()) {
    echo "Admin registered successfully!";
} else {
    echo "Error: " . $stmt->error;
}

// Close connection
$stmt->close();
$conn->close();
?>
