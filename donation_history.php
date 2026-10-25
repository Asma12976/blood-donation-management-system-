<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blood donation";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Make sure user is logged in
if (!isset($_SESSION['user_email'])) {
    die("Unauthorized access. Please log in.");
}
$user_email = $_SESSION['user_email'];

// Get the donor ID from the blood_donar table
$donorQuery = "SELECT donor_id FROM blood_donor WHERE email = ?";
$stmt = $conn->prepare($donorQuery);
$stmt->bind_param("s", $user_email);
$stmt->execute();
$resultDonor = $stmt->get_result();

if ($resultDonor->num_rows === 0) {
    die("No donor found with this email.");
}

$donorData = $resultDonor->fetch_assoc();
$donor_id = $donorData['donor_id'];

// Fetch only the blood donation requests of the logged-in donor
$sql = "SELECT r.* FROM blood_donation_requests r
        WHERE r.donor_id = ?
        ORDER BY r.date_requested DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $donor_id);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donor Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      margin: 0;
      padding: 0;
    }

    .top-bar {
      background-color: #3498DB;
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      font-weight: 600;
    }

    .sidebar {
      height: 100vh;
      background: #2C3E50;
      color: #fff;
      padding-top: 20px;
    }

    .sidebar .nav-link {
      color: #fff;
      padding: 12px 20px;
      border-radius: 8px;
      margin: 6px 0;
      font-weight: 500;
    }

    .sidebar .nav-link:hover {
      background-color: #1a252f;
    }

    .sidebar .nav-link.active {
      background-color: #34495e;
    }

    .sidebar-line {
      border: 0;
      border-top: 4px solid #ccc;
      margin: 15px 0;
    }

    .content {
      padding: 30px;
    }

    table {
      background: white;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    th {
      background-color: #3498DB;
      color: white;
    }

    td, th {
      text-align: center;
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
    <nav class="col-md-3 d-none d-md-block sidebar">
      <div class="text-center mb-4">
        <h4>Donor Features</h4>
      </div>
      <hr class="sidebar-line">
      <ul class="nav flex-column px-3">
        <li class="nav-item">
          <a class="nav-link active" href="donor_dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donor_profile.php"><i class="bi bi-person-circle"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donation_history.php"><i class="bi bi-clock-history"></i> Donation History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php"><i class="bi bi-bell-fill"></i> Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="make_a_donation.php"><i class="bi bi-heart-fill"></i> Make a Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto col-lg-9 content">
    <h2 style='color: #3498DB;'>Donation History</h2>

      <div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Date of Donation</th>
              <th>Blood Type</th>
              <th>Units</th>
              <th>Donation Type</th>
              <th>Status</th>
              <th>Message</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          <?php
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                $donation_date = date("Y-m-d", strtotime($row["date_requested"]));
                $next_eligibility = date("Y-m-d", strtotime($row["date_requested"] . " +56 days"));
                echo "<tr>
                    <td>{$donation_date}</td>
                    <td>{$row['blood_group']}</td>
                    <td>{$row['units']}</td>
                    <td>{$row['donation_type']}</td>
                    <td>{$row['status']}</td>
                    <td>{$row['message']}</td>
                    <td>
                      <a href='report.php?request_id={$row['request_id']}'>Report</a> 
                      
                    </td>
                  </tr>";
              }
            } else {
              echo "<tr><td colspan='7'>No donation history found.</td></tr>";
            }
          ?>
          </tbody>
        </table>
      </div>
    </main>

  </div>
</div>

</body>
</html>
