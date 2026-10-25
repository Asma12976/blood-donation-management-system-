<?php

session_start(); // Add this at the top of your file
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood donation"; // Corrected typo if any

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
   

    
    // Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $role = mysqli_real_escape_string($conn, $_POST['role']); // <-- NEW
    $password = $_POST['password'];
    

   

    // Hash the password before storing
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Check if email already exists
    $checkEmailQuery = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
        echo "<script>alert('Email already registered!'); window.location.href='sign_up.php';</script>";
        exit;
    }

    // Insert user data with role
    $insertQuery = "INSERT INTO users (fullname, email, password, role) VALUES ('$fullname', '$email', '$hashed_password', '$role')";

    if ($conn->query($insertQuery) === TRUE) {
        $_SESSION['user_id'] = $conn->insert_id; // Save new user ID to session
        echo "<script>alert('Sign-up successful!'); window.location.href='landing_page.php';</script>";
    }
}


}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation Sign Up</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            width: 800px;
            height: 500px;
            display: flex;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            background: #ffffff;
        }

        .form-section {
            width: 50%;
            padding: 40px 30px;
            background-color: #708090;
            color: white;
        }

        .form-section h2 {
            text-align: center;
            margin-bottom: 25px;
            font-size: 26px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
        }
        /* Custom style for select dropdown to match input fields */
.form-group select {
    width: 100%;
    padding: 10px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    background-color: #fff; /* Optional: Set a background color */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Optional: Add slight shadow for consistency */
}


        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #c2185b;
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #e62e32;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #ffcccb;
            text-decoration: underline;
            font-weight: bold;
        }

        .image-section {
            width: 50%;
        }

        .image-section img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Left Side: Form -->
    <div class="form-section">
        <h2>Sign Up</h2>
        <form method="POST">

            <div class="form-group">
                <label for="fullname">Full Name</label>
                <input type="text" id="fullname" name="fullname" required>
            </div>
            <div class="form-group">
                <label for="email">Email ID</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <div class="form-group">
    <label for="role">Role</label>
    <select id="role" name="role" required>
        <option value="">-- Select Role --</option>
        <option value="visitor">Visitor</option>
        <option value="donor">Donor</option>
        <option value="patient">Patient</option>
    </select>
</div>

            
            <button type="submit" class="btn-submit">Sign Up</button>
        </form>

        <div class="login-link">
            <p>Already have an account? <a href="login.php">Login now</a></p>
        </div>
    </div>

    <!-- Right Side: Image -->
    <div class="image-section">
        <img src="images/sign_up_image.jpg" alt="Blood Donation Image">
    </div>
</div>

</body>
</html>
