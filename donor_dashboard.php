<?php
session_start();

// Check if donor is logged in
if (!isset($_SESSION['user_email'])) {
    header("Location: donor_login.php"); // Redirect to login if not logged in
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

// Query to get donor details from blood_donor table based on email
$sql = "SELECT donor_id, name, blood_group, date_registered
        FROM blood_donor
        WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $donor_email); // 's' is for string (email)
$stmt->execute();
$result = $stmt->get_result();

// Check if donor exists
if ($result->num_rows > 0) {
    // Fetch donor details
    $row = $result->fetch_assoc();
    $donor_name = $row['name'];
    $donor_blood_group = $row['blood_group'];
    $donor_id = $row['donor_id'];

    // Get last donation date from donation_history
    $sql_last_donation = "SELECT donation_date 
                          FROM donation_history 
                          WHERE donor_id = ? 
                          ORDER BY donation_date DESC 
                          LIMIT 1";
    $stmt2 = $conn->prepare($sql_last_donation);
    $stmt2->bind_param("i", $donor_id);
    $stmt2->execute();
    $result2 = $stmt2->get_result();

    if ($result2->num_rows > 0) {
        $last_donation_row = $result2->fetch_assoc();
        $donor_last_donation = $last_donation_row['donation_date'];
    } else {
        $donor_last_donation = "No donations yet";
    }

    // Calculate eligibility (56 days threshold)
    if ($donor_last_donation != "No donations yet") {
        $last_donation_date = new DateTime($donor_last_donation);
        $current_date = new DateTime();
        $interval = $last_donation_date->diff($current_date);

        // Check if it's more than 56 days
        if ($interval->days >= 56) {
            $eligibility_status = "Eligible to donate";
            $eligibility_class = "status-eligible";
            $donation_link_class = "";  // Enable donation link
            $donation_link_disabled = "";
        } else {
            $eligibility_status = "Not eligible to donate";
            $eligibility_class = "status-not-eligible";
            $donation_link_class = "disabled-link";  // Disable donation link
            $donation_link_disabled = "disabled";   // Disable the link functionality
        }
    } else {
        $eligibility_status = "Eligible to donate"; // If no donation date exists
        $eligibility_class = "status-eligible";
        $donation_link_class = "";  // Enable donation link
        $donation_link_disabled = "";
    }
} else {
    // If no donor found, handle the case (e.g., redirect to login)
    header("Location: donor_login.php");
    exit();
}

$stmt->close();
$conn->close();
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
      padding-top: 20px;
      padding-left: 30px;
      padding-right: 30px;
    }

    .dashboard-header h2 {
      font-size: 2.5rem;
      font-weight: 700;
      color: #3498db;
      margin-bottom: 10px;
    }

    .card {
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: #fff;
      color: #333;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .card-title {
      font-size: 1.3rem;
      font-weight: 600;
      color: #34495e;
    }

    .status-eligible {
      color: #3498db;
      font-weight: 600;
    }

    .status-not-eligible {
      color: #e74c3c;
      font-weight: 600;
    }

    .btn {
      background-color: #34495e;
      border-radius: 8px;
      color: white;
      padding: 10px 20px;
      font-weight: 500;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #2c3e50;
    }

    /* Disabled Link Style */
    .disabled-link {
      color: #7f8c8d;
      pointer-events: none; /* Disable click */
      text-decoration: none;
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
          <a class="nav-link <?php echo $donation_link_class; ?>" href="make_a_donation.php" <?php echo $donation_link_disabled; ?>><i class="bi bi-heart-fill"></i> Make a Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php"><i class="bi bi-box-arrow-right"></i> Logout</a>
        </li>
      </ul>
    </nav>

    <!-- Main Content -->
    <main class="col-md-9 ms-sm-auto px-md-5 pt-4 main-content">
      <div class="dashboard-header">
        <h2>Welcome, <?php echo $donor_name; ?></h2>
        <p class="lead">Here's your recent activity and status.</p>
      </div>

      <!-- Cards Row -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Blood Group</h5>
              <p class="fs-4"><?php echo $donor_blood_group; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Last Donation</h5>
              <p class="fs-4"><?php echo $donor_last_donation; ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Eligibility Status</h5>
              <p class="fs-5 <?php echo $eligibility_class; ?>"><?php echo $eligibility_status; ?></p>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
