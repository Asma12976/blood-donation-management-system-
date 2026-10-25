<?php
session_start(); // Start the session at the top of your PHP script

// Step 1: Connect to the database
$servername = "localhost"; 
$username = "root";         
$password = "";             
$database = "blood donation"; 

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the email and password from the form
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $input_password = mysqli_real_escape_string($conn, $_POST['password']); // password entered by the user

    // Step 3: Fetch the user from blood_donar
    $sql = "SELECT * FROM blood_donor WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // User found
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // Step 4: Use password_verify to check the password
        if (password_verify($input_password, $stored_password)) {
            // Step 5: Set session variable and show login success message
            $_SESSION['user_email'] = $email;  // Store the user's email in session
            echo "<script>
                    alert('Login Successful! Redirecting to your dashboard...');
                    window.location.href = 'donor_dashboard.php'; // Redirect to the donor dashboard
                  </script>";
            exit();  // Ensure the rest of the code does not execute after redirection
        } else {
            echo "<script>alert('Incorrect password. Please try again.');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email. Please register.');</script>";
    }
}

// Step 6: Close connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Login Page</title>
  <style>
    /* Example Color Palette */
    :root {
      --primary-red: #d32f2f; /* A softer red */
      --accent-blue: #009688; /* Teal accent */
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

    /* Input Fields */
    .login-form input[type="email"],
    .login-form input[type="password"] {
      border: 1px solid #ccc;
      border-radius: 4px;
      padding: 10px;
      margin-bottom: 15px;
      width: 100%;
      box-sizing: border-box;
      color: black;
    }

    .login-form input[type="email"]:focus,
    .login-form input[type="password"]:focus {
      border-color: var(--accent-blue);
    }

    .login-form label {
      display: block;
      margin-bottom: 5px;
      color: black;
      font-weight: bold;
    }

    /* Login Button */
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
      background-color: #b71c1c; /* Darker red on hover */
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

    .login-footer p {
      font-size: 0.9em;
      font-weight: bold;
    }

    .login-footer a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container" id="login-container">
    <span class="close-button" onclick="closeLoginModal()">&times;</span>
    <div class="login-header">
      <h2>Donor Login </h2>
    </div>

    <!-- Form now submits to the same page (login.php) -->
    <form class="login-form" method="POST">
      <label for="email">Email ID</label>
      <input type="email" id="email" name="email" required />
      <label for="password">Password</label>
      <input type="password" id="password" name="password" required />
      <button type="submit">Login</button>
    </form>

    <div class="login-footer">
      <a href="donor_forget_password.php">Forgot your password?</a>
      <p>Don't have an account? <a href="donor_register.php">Create one</a></p>
    </div>
  </div>

  <script>
    function closeLoginModal() {
      document.getElementById('login-container').style.display = 'none';
    }
  </script>
</body>
</html>
