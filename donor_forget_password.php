<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood donation";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle password update
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new-password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm-password']);

    // Check if new passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match. Please try again.');</script>";
    } else {
        // Check if email exists in blood_donor table
        $check_sql = "SELECT * FROM blood_donor WHERE email = '$email'";
        $result = $conn->query($check_sql);

        if ($result->num_rows > 0) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password
            $update_sql = "UPDATE blood_donor SET password = '$hashed_password' WHERE email = '$email'";
            if ($conn->query($update_sql) === TRUE) {
                echo "<script>alert('Password updated successfully. You can now login.');</script>";
            } else {
                echo "<script>alert('Error updating password. Please try again later.');</script>";
            }
        } else {
            echo "<script>alert('Email not found. Please enter a registered email.');</script>";
        }
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <style>
    :root {
      --primary-red: #d32f2f;
      --accent-blue: #009688;
      --light-gray: #f0f0f0;
    }

    body {
      font-family: sans-serif;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-image: url('images/blood.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      background-color: #ffffff;
    }

    .reset-container {
      width: 350px;
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 8px;
      color: black;
      position: relative;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .reset-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .reset-form input[type="email"],
    .reset-form input[type="password"] {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 15px;
      width: 100%;
      box-sizing: border-box;
      color: black;
    }

    .reset-form input[type="email"]:focus,
    .reset-form input[type="password"]:focus {
      border-color: var(--accent-blue);
    }

    .reset-form label {
      display: block;
      margin-bottom: 5px;
      color: black;
      font-weight: bold;
    }

    .reset-form button[type="submit"] {
      background-color: var(--primary-red);
      color: white;
      border: none;
      border-radius: 4px;
      padding: 12px 20px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .reset-form button[type="submit"]:hover {
      background-color: #b71c1c;
    }

    .reset-footer {
      text-align: center;
      margin-top: 20px;
      color: black;
    }

    .reset-footer a {
      font-size: 0.9em;
      color: black;
      text-decoration: none;
      font-weight: bold;
    }

    .reset-footer p {
      font-size: 0.9em;
      font-weight: bold;
    }

    .reset-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="reset-container">
    <div class="reset-header">
      <h2>Forgot Password</h2>
    </div>
    <form class="reset-form" method="POST">
      <label for="email">Enter your Email ID</label>
      <input type="email" id="email" name="email" required />
      
      <label for="new-password">Enter New Password</label>
      <input type="password" id="new-password" name="new-password" required />
      
      <label for="confirm-password">Confirm New Password</label>
      <input type="password" id="confirm-password" name="confirm-password" required />
      
      <button type="submit" name="submit">Update Password</button>
    </form>
    <div class="reset-footer">
      <p>Remembered your password? <a href="login.php">Login here</a></p>
    </div>
  </div>
</body>
</html>
