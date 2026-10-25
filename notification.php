<?php
session_start();

// Check if donor is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: donor_login.php");
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

$donor_email = $_SESSION['user_email'];

// Fetch donor's id using their email
$sql = "SELECT donor_id FROM blood_donor WHERE email = '$donor_email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    // Get donor_id
    $row = $result->fetch_assoc();
    $donor_id = $row['donor_id'];

    // Fetch notifications for this donor
    $notification_sql = "SELECT donor_request_id,message,date_sent FROM notification WHERE donor_id = $donor_id ORDER BY date_sent DESC";
    $notifications_result = $conn->query($notification_sql);
} else {
    // If donor doesn't exist in the table, log out
    header("Location: donor_login.php");
    exit();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Donation Request</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f8f9fa;
      color: #333;
      margin: 0;
      padding: 0;
    }

    .top-bar {
      background-color:  #3498DB;
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      height: 700px;
      background:#2C3E50;
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
      background-color: #34495e;
      transform: scale(1.05);
    }

    .sidebar .nav-link i {
      margin-right: 10px;
    }

    .sidebar .nav-link.active {
      background-color: #34495e;
      color: #fff;
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

    table {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border: 1px solid #ddd;
    }

    th {
      background-color: #2980B9;
      color: white;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
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
    <div class="col-md-9">
      <div class="container mt-4">
        <h3 class="section-title">Notifications</h3>

        <!-- Display Notifications in Table -->
        <?php if ($notifications_result->num_rows > 0): ?>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Request ID</th>
                <th>Message</th>
                <th>Date Sent</th>
              </tr>
            </thead>
            <tbody>
              <?php while($notification = $notifications_result->fetch_assoc()): ?>
                <tr>
                  <td><?php echo $notification['donor_request_id']; ?></td>
                  <td><?php echo $notification['message']; ?></td>
                  <td><?php echo $notification['date_sent']; ?></td>
                </tr>
              <?php endwhile; ?>
            </tbody>
          </table>
        <?php else: ?>
          <p>No notifications yet.</p>
        <?php endif; ?>
      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
