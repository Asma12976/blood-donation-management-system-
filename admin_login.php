<?php
// Start the session
session_start();

// DB connection
$conn = new mysqli("localhost", "root", "", "blood donation");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize inputs
    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);

    // Query the database
    $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Login successful
        $_SESSION['admin'] = $username;
        header("Location: admin_dashboard.php"); // Redirect to admin dashboard
        exit();
    } else {
        echo "<script>alert('Invalid username or password!');</script>";
    }
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Login</title>
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

    .login-container {
      width: 350px;
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 8px;
      color: black;
      position: relative;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
    }

    .close-button {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 24px;
      cursor: pointer;
      color: black;
    }

    .login-header {
      text-align: center;
      margin-bottom: 20px;
    }

    .login-form input[type="text"],
    .login-form input[type="password"] {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 15px;
      width: 100%;
      box-sizing: border-box;
      color: black;
    }

    .login-form input:focus {
      border-color: var(--accent-blue);
    }

    .login-form label {
      display: block;
      margin-bottom: 5px;
      color: black;
      font-weight: bold;
    }

    .login-form button[type="submit"] {
      background-color: var(--primary-red);
      color: white;
      border: none;
      border-radius: 4px;
      padding: 12px 20px;
      cursor: pointer;
      width: 100%;
      transition: background-color 0.3s ease;
    }

    .login-form button[type="submit"]:hover {
      background-color: #b71c1c;
    }

    .login-footer {
      text-align: center;
      margin-top: 20px;
      color: black;
    }

    .login-footer a {
      font-size: 0.9em;
      color: black;
      text-decoration: none;
      font-weight: bold;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container" id="admin-login-container">
    <span class="close-button" onclick="closeAdminLogin()">&times;</span>
    <div class="login-header">
      <h2>Admin Panel</h2>
    </div>
    <form action="" method="post">
    <div class="login-form">
      <label for="username">Username</label>
      <input type="text" id="username" name="username" required />
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      <button type="submit">Login</button>
  </div>
    </form>
    <div class="login-footer">
      <a href="#">Forgot Password?</a>
      <p><a href="landing_page.php">Back to Home</a></p>
    </div>
  </div>

  <script>
    function closeAdminLogin() {
      document.getElementById('admin-login-container').style.display = 'none';
    }
  </script>
  
  
  

 
</body>
</html>
