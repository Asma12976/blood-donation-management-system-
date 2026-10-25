<?php
session_start();

$servername = "localhost"; 
$username = "root";         
$password = "";             
$database = "blood donation";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $input_password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password'];

        // ✅ Correct way to verify hashed password
        if (password_verify($input_password, $stored_password)) {
            $_SESSION['user_id'] = $row['id']; // Store user ID for future use (like in contact_us)
            echo "<script>alert('Login Successful!'); window.location.href='landing_page.php';</script>";
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
      background-color: var(--primary-red); /* Same color as the admin button */
      color: white;
      border: none;
      border-radius: 5px; /* Rounded corners like admin button */
      padding: 12px 28px; /* Matching padding for consistency */
      font-size: 16px; /* Similar font size to the admin button */
      font-weight: bold;
      text-align: center;
      width: 100%; /* Full width for consistency */
      cursor: pointer;
      transition: background-color 0.3s ease, transform 0.3s ease;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Soft shadow for consistency */
    }

    .login-form button[type="submit"]:hover {
      background-color: var(#EF9A9A); /* Same hover effect as the admin button */
      transform: scale(1.03); /* Slight scale-up effect on hover */
    }

    .login-form button[type="submit"]:focus {
      outline: none;
      box-shadow: 0 0 8px rgba(0, 123, 255, 0.5); /* Focus effect */
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

    /* Admin Login Link */
    .admin-link {
      color: var(--primary-red);
      font-size: 1.1em;
      font-weight: bold;
      text-decoration: none;
      text-align: center;
    }

    .admin-link:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-container" id="login-container">
    <span class="close-button" onclick="closeLoginModal()">&times;</span>
    <div class="login-header">
      <h2>Login Now</h2>
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
      <a href="forget_password.php">Forgot your password?</a>
      <p>Admin Login: <a href="admin/index.php" class="admin-link">Click here</a></p>
    </div>
  </div>

  <script>
    function closeLoginModal() {
      document.getElementById('login-container').style.display = 'none';
    }
  </script>
</body>
</html>
