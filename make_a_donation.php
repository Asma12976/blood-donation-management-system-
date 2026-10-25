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

$sql = "SELECT donor_id, name, blood_group, contact_no, age, gender, address, message FROM blood_donor WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $donor_email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $donor_id = $row['donor_id'];
    $donor_name = $row['name'];
    $donor_blood_group = $row['blood_group'];
    $donor_contact_no = $row['contact_no'];
    $donor_age = $row['age'];
    $donor_gender = $row['gender'];
    $donor_address = $row['address'];
    $donor_message = $row['message'];
} else {
    $_SESSION['message'] = "Donor not found!";
    $_SESSION['message_type'] = "error";
    header("Location: donor_dashboard.php");
    exit();
}

$stmt->close();

// Handle donation request form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get donation request information from the form
    $donation_blood_group = $_POST['blood_group'];
    $units = $_POST['units'];
    $donation_type = $_POST['donation_type'];
    $message = $_POST['message'];

    // Check eligibility (age validation can be added here)
    $is_eligible = ($donor_age >= 18);  // Example eligibility check, can add more conditions like health status

    // Insert donation request into the database
    if ($is_eligible) {
        $insert_sql = "INSERT INTO blood_donation_requests (donor_id, blood_group, units, donation_type, message, status) VALUES (?, ?, ?, ?, ?, 'Pending')";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("issss", $donor_id, $donation_blood_group, $units, $donation_type, $message);

        if ($insert_stmt->execute()) {
            $_SESSION['message'] = "Donation request submitted successfully!";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error submitting donation request: " . $conn->error;
            $_SESSION['message_type'] = "error";
        }
        $insert_stmt->close();
    } else {
        $_SESSION['message'] = "You are not eligible to donate. Please check your eligibility criteria.";
        $_SESSION['message_type'] = "error";
    }
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
  color:#2980B9;
}

    .card h5 {
      color:#2980B9;
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

    <main class="col-md-9 ms-sm-auto px-md-5 pt-4 main-content">
      <div class="container">
        <h3 class="section-title">Donation Request</h3>

        <!-- Display message -->
        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?= $_SESSION['message_type']; ?> mt-3" role="alert">
            <?= htmlspecialchars($_SESSION['message']); ?>
          </div>
          <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
        <?php endif; ?>

        <form action="" method="POST">
          <div class="card mb-4">
            <div class="card-body">
              <h5>Personal Information</h5>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($donor_name) ?>" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" class="form-control" name="contact_no" value="<?= htmlspecialchars($donor_contact_no) ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <h5>Donation Details</h5>
              <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select name="blood_group" class="form-control" required>
                  <option value="<?= htmlspecialchars($donor_blood_group) ?>" selected><?= htmlspecialchars($donor_blood_group) ?></option>
                </select>
              </div>

              <div class="form-group">
                <label for="units">Units of Blood</label>
                <input type="number" class="form-control" name="units" required>
              </div>

              <div class="form-group">
                <label for="donation_type">Donation Type</label>
                <select name="donation_type" class="form-control" required>
                  <option value="Whole Blood">Whole Blood</option>
                  <option value="Plasma">Plasma</option>
                  <option value="Platelets">Platelets</option>
                </select>
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea class="form-control" name="message" rows="4" placeholder="Add any message or special requests here..."></textarea>
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
