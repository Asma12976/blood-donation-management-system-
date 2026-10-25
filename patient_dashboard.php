<?php
session_start();

// Check if donor is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: patient_login.php"); // Redirect to login if not logged in
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

// Get donor email from session
$donor_email = $_SESSION['user_email'];

// Query to get donor details from blood_donar table based on email
$sql = "SELECT patient_id, full_name, blood_group, date_registered
        FROM patients
        WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $donor_email); // 's' is for string (email)
$stmt->execute();
$result = $stmt->get_result();

// Check if donor exists
if ($result->num_rows > 0) {
    // Fetch donor details
    $row = $result->fetch_assoc();
    $patient_name = $row['full_name'];
    $patient_blood_group = $row['blood_group'];
    
} else {
    // If no donor found, handle the case (e.g., redirect to login)
    header("Location: patient_login.php");
    exit();
}

$stmt->close();

// Count requests by status for the logged-in patient
$patient_email = $_SESSION['user_email'];
$statuses = ['All', 'Approved', 'Rejected', 'Pending'];
$request_counts = [];

foreach ($statuses as $status) {
    if ($status === 'All') {
        $query = "SELECT COUNT(*) AS count FROM blood_request WHERE email = ?";
    } else {
        $query = "SELECT COUNT(*) AS count FROM blood_request WHERE email = ? AND status = ?";
    }

    $stmt = $conn->prepare($query);
    if ($status === 'All') {
        $stmt->bind_param("s", $patient_email);
    } else {
        $stmt->bind_param("ss", $patient_email, $status);
    }

    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $request_counts[$status] = $row['count'];
    $stmt->close();
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

    /* Top Bar */
    .top-bar {
      background-color:  #3498DB; /* Darker shade */
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Sidebar Styles */
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

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .sidebar .nav-link.active {
      background-color: #34495e;
      color: #fff;
    }

    /* Sidebar line styling */
    .sidebar-line {
      border: 0;
      border-top: 4px solid #ccc;
      margin: 15px 0;
    }

    .main-content {
      padding: 20px 30px;
    }

    .dashboard-header h2 {
      font-size: 2.2rem;
      font-weight: 700;
      color: #3498db;
    }

    .card-title {
      font-size: 1.2rem;
    }
    .card{
        border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: #fff;
      color: #333;
    }

    .card:hover {
      transform: translateY(-10px);
    }

    /* Custom Card Colors */
    .card-total-requests {
      background-color:white; /* Cerulean Blue */
      color: #34495e;
      font-size: 1.3rem;
      font-weight: 600;
    }

    .card-pending-requests {
      background-color:white ; /* Saffron */
      color: #34495e; /* Dark text for contrast */
      font-size: 1.3rem;
      font-weight: 600;
    }

    .card-approved-requests {
      background-color: white ; /* Emerald Green */
      color: #34495e;
      font-size: 1.3rem;
      font-weight: 600;
    }

    .card-text {
      font-size: 2rem;
      font-weight: 600;
      color: #3498db; /* Blue color for the numbers */
    }

    .table th, .table td {
      vertical-align: middle;
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

    <!-- Main Content -->
    <main class="col-md-9 main-content">

      <!-- Welcome Section -->
      <div class="dashboard-header mb-4">
        <h2>Welcome, <?= $patient_name ?>!</h2>
        <p class="text-muted">Your blood health status at a glance.</p>
      </div>

      <!-- Dashboard Cards -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card card-total-requests mb-3">
            <div class="card-body">
              <h5 class="card-title">Total Requests</h5>
              <p class="card-text"><?= $request_counts['All'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-pending-requests mb-3">
            <div class="card-body">
              <h5 class="card-title">Pending Requests</h5>
              <p class="card-text"><?= $request_counts['Pending'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-approved-requests mb-3">
            <div class="card-body">
              <h5 class="card-title">Approved Requests</h5>
              <p class="card-text"><?= $request_counts['Approved'] ?></p>
            </div>
          </div>
        </div>
      </div>

    </main>
  </div>
</div>

</body>
</html>
