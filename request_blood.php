<?php
session_start();

// Check if patient is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: patient_login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood donation";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$patient_email = $_SESSION['user_email'];

$sql = "SELECT patient_id, full_name, blood_group, contact_no, age, gender, address, medical_conditions FROM patients WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patient_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $patient_id = $row['patient_id'];
    $patient_name = $row['full_name'];
    $patient_blood_group = $row['blood_group'];
    $patient_contact_no = $row['contact_no'];
    $patient_age = $row['age'];
    $patient_gender = $row['gender'];
    $patient_address = $row['address'];
    $patient_medical_conditions = $row['medical_conditions'];
} else {
    $_SESSION['message'] = "Patient not found!";
    $_SESSION['message_type'] = "error";
    header("Location: patient_dashboard.php");
    exit();
}

$stmt->close();

// Handle donation request form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get donation request information from the form
    $request_blood_group = $_POST['blood_group'];
    $required_units = $_POST['required_units'];
$request_message = $_POST['request_message'];


    // Eligibility check (you can enhance this logic)
    $is_eligible = ($patient_age >= 18);

    if ($is_eligible) {
      $insert_sql = "INSERT INTO blood_request (patient_id, blood_group, required_units, contact_no, email, request_message) 
                     VALUES (?, ?, ?, ?, ?, ?)";
      $insert_stmt = $conn->prepare($insert_sql);
      $insert_stmt->bind_param("isisss", $patient_id, $request_blood_group, $required_units, $patient_contact_no, $patient_email, $request_message);
  

        if ($insert_stmt->execute()) {
            $_SESSION['message'] = "Blood request submitted successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error submitting request: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        $insert_stmt->close();
    } else {
        $_SESSION['message'] = "You are not eligible to request blood. Please check your eligibility.";
        $_SESSION['message_type'] = "error";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      color: #333;
      margin: 0;
      padding: 0;
    }
    .top-bar {
      background-color: #3498DB;
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .sidebar {
      height: 100vh;
      background: #2C3E50;
      color: #fff;
      padding-top: 20px;
      box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
    }
    .sidebar .nav-link {
      color: #fff;
      padding: 12px 20px;
      border-radius: 8px;
      margin: 6px 0;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }
    .sidebar .nav-link:hover {
      background-color: #2c3e50;
      transform: scale(1.05);
    }
    .sidebar .nav-link.active {
      background-color: #34495e;
    }
    .sidebar-line {
      border: 0;
      border-top: 4px solid #ccc;
      margin: 15px 0;
    }
    .btn-save {
      background-color: #3498DB;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
    }
    .btn-save:hover {
      background-color: #2980B9;
    }
    .section-title {
      font-weight: bold;
      color: #2980B9;
    }
    .card h5 {
      color: #2980B9;
      font-weight: bold;
    }
    .alert {
      font-size: 1rem;
      padding: 15px;
      border-radius: 8px;
      margin-bottom: 20px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }
    .alert-success {
      background-color: #28a745;
      color: white;
    }
    .alert-error {
      background-color: #dc3545;
      color: white;
    }
  </style>
</head>
<body>

<!-- Top Bar -->
<div class="top-bar">
  DonorSphere
</div>

<div class="container-fluid">
  <div class="row">
    
    <!-- Sidebar -->
    <nav class="col-md-3 sidebar">
      <div class="text-center mb-4">
        <h4>Patient Features</h4>
      </div>
      <hr class="sidebar-line">
      <ul class="nav flex-column px-3">
        <li class="nav-item">
          <a class="nav-link active" href="patient_dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patient_profile.php"><i class="bi bi-person-circle"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="request_blood.php"><i class="bi bi-heart-fill"></i> Request Blood</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="request_history.php"><i class="bi bi-clock-history"></i> Request History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="patient_notifications.php"><i class="bi bi-bell-fill"></i> Notifications</a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </nav>

    <main class="col-md-9 ms-sm-auto px-md-5 pt-4 main-content">
      <div class="container">
        <h3 class="section-title">Blood Request</h3>

        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?= $_SESSION['message_type']; ?> mt-3" role="alert">
            <?= htmlspecialchars($_SESSION['message']); ?>
          </div>
          <?php unset($_SESSION['message'], $_SESSION['message_type']); ?>
        <?php endif; ?>

        <form action="" method="POST">
  <div class="card mb-4">
    <div class="card-body">
      <h5>Patient Information</h5>
      <div class="row">
        <div class="col-md-6">
          <label for="patient_name">Full Name</label>
          <input type="text" class="form-control" name="patient_name" value="<?= htmlspecialchars($patient_name) ?>" readonly>
        </div>
        <div class="col-md-6">
          <label for="email">Email</label>
          <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($patient_email) ?>" readonly>
        </div>
      </div>
      <div class="row mt-3">
        <div class="col-md-4">
          <label for="age">Age</label>
          <input type="number" class="form-control" name="age" value="<?= htmlspecialchars($patient_age) ?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="gender">Gender</label>
          <input type="text" class="form-control" name="gender" value="<?= htmlspecialchars($patient_gender) ?>" readonly>
        </div>
        <div class="col-md-4">
          <label for="contact_no">Contact Number</label>
          <input type="text" class="form-control" name="contact_no" value="<?= htmlspecialchars($patient_contact_no) ?>" readonly>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-4">
    <div class="card-body">
      <h5>Request Details</h5>
      <div class="form-group mb-3">
        <label for="blood_group">Blood Group</label>
        <select name="blood_group" class="form-control" required>
          <option value="<?= htmlspecialchars($patient_blood_group) ?>" selected><?= htmlspecialchars($patient_blood_group) ?></option>
        </select>
      </div>

      <div class="form-group mb-3">
        <label for="required_units">Required Units</label>
        <input type="number" class="form-control" name="required_units" min="1" required>
      </div>

      

      <div class="form-group mb-3">
        <label for="request_message">Request Message</label>
        <textarea class="form-control" name="request_message" rows="4" placeholder="Add any message or reason for the blood request..."></textarea>
      </div>
    </div>
  </div>

  <button type="submit" class="btn-save">Submit Request</button>
</form>

      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
