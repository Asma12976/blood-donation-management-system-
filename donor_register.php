<?php
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
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $contact_no = mysqli_real_escape_string($conn, $_POST['contact_no']);
    $age = (int)$_POST['age'];
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $blood_group = mysqli_real_escape_string($conn, $_POST['blood_group']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $plain_password = $_POST['password'];
    $hashed_password = password_hash($plain_password, PASSWORD_DEFAULT);

    // Step 3: Check if email already exists in users table
    $check_user_sql = "SELECT id FROM users WHERE email = '$email'";
    $user_result = $conn->query($check_user_sql);

    if ($user_result->num_rows > 0) {
        // Email exists, get user ID
        $user_row = $user_result->fetch_assoc();
        $sign_up_id = $user_row['id'];

        // Check if already in blood_donor table
        $check_donor_sql = "SELECT donor_id FROM blood_donor WHERE sign_up_id = '$sign_up_id'";
        $donor_result = $conn->query($check_donor_sql);

        if ($donor_result->num_rows > 0) {
            echo "<script>alert('This user is already registered as a donor.'); window.location.href='donor_register.php';</script>";
        } else {
            // Insert only into blood_donor table
            $donor_sql = "INSERT INTO blood_donor (sign_up_id, name, email, contact_no, age, gender, blood_group, address, message, password)
                          VALUES ('$sign_up_id', '$fullname', '$email', '$contact_no', '$age', '$gender', '$blood_group', '$address', '$message', '$hashed_password')";

            if ($conn->query($donor_sql) === TRUE) {
                echo "<script>alert('Registered as donor successfully!'); window.location.href='donor_login.php';</script>";
            } else {
                echo "Error inserting into blood_donor: " . $conn->error;
            }
        }
    } else {
        // Email doesn't exist — insert into users and then blood_donor
        $insert_user_sql = "INSERT INTO users (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

        if ($conn->query($insert_user_sql) === TRUE) {
            $sign_up_id = $conn->insert_id;

            $donor_sql = "INSERT INTO blood_donor (sign_up_id, name, email, contact_no, age, gender, blood_group, address, message, password)
                          VALUES ('$sign_up_id', '$fullname', '$email', '$contact_no', '$age', '$gender', '$blood_group', '$address', '$message', '$hashed_password')";

            if ($conn->query($donor_sql) === TRUE) {
                echo "<script>alert('Registration successful!'); window.location.href='donor_login.php';</script>";
            } else {
                // Rollback user insert if donor insert fails
                $conn->query("DELETE FROM users WHERE id = $sign_up_id");
                echo "Error inserting into blood_donor: " . $conn->error;
            }
        } else {
            echo "Error inserting into users: " . $conn->error;
        }
    }
}

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
    <h2>Donor Registration</h2>
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
            <label for="contact_no">Contact Number</label>
            <input type="text" id="contact_no" name="contact_no" required>
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
        <p>Already have an account? <a href="donor_login.php">Login now</a></p>
    </div>
</div>

<script>
    function closeForm() {
        document.getElementById('formContainer').style.display = 'none';
    }
</script>

</body>
</html>
