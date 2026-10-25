<?php
// Step 1: Connect to the database
$servername = "localhost"; 
$username = "root";         
$password = "";             
$database = "blood donation"; // <-- replace this with your database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $age = (int)$_POST['age'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $password = mysqli_real_escape_string($conn, $_POST['password']); // plain text password

    // Insert into database
    $sql = "INSERT INTO blooddonar (name, email, age, gender, blood_group, address, message, password)
            VALUES ('$name', '$email', '$age', '$gender', '$blood_group', '$address', '$message', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration Successful!'); window.location.href='login.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blood Donation Registration</title>
    <style>
        :root {
            --primary-red: #d32f2f;
            --accent-blue: #009688;
            --light-gray: #f0f0f0;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            height: 100vh;
            background: url('images/blood.jpeg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }

        .form-section {
            position: relative;
            width: 400px;
            max-height: 90vh;
            overflow-y: auto;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.95);
            padding: 30px;
            color: black;
        }

        .form-section h2 {
    text-align: center;
    margin-bottom: 25px;
    font-size: 26px;
    font-weight: bold;
    color: var(--primary-red); /* Make heading red */
}


        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: var(--primary-red);
            border: none;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .btn-submit:hover {
            background-color: #b71c1c;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: black;
            text-decoration: underline;
            font-weight: bold;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 15px;
            background: transparent;
            border: none;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }

        .close-btn:hover {
            color: var(--primary-red);
        }
    </style>
</head>
<body>

<div class="form-section" id="formContainer">
    <button class="close-btn" onclick="closeForm()">×</button>
    <h2>Register Now</h2>
    <form method="POST">
        <div class="form-group">
            <label for="fullname">Full Name</label>
            <input type="text" id="fullname" name="fullname" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="age">Age</label>
            <input type="number" id="age" name="age" required>
        </div>
        <div class="form-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="form-group">
            <label for="blood_group">Blood Group</label>
            <select id="blood_group" name="blood_group" required>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
            </select>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" rows="4" required></textarea>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-submit">Register</button>
    </form>

    <div class="login-link">
        <p>Already have an account? <a href="login.php">Login now</a></p>
    </div>
</div>

<script>
    function closeForm() {
        document.getElementById('formContainer').style.display = 'none';
    }
</script>

</body>
</html>
