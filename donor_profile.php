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

$sql = "SELECT donor_id, name, blood_group, contact_no, age, gender, address, message, date_registered FROM blood_donor WHERE email = ?";
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
    $donor_last_donation = $row['date_registered'];
} else {
    header("Location: donor_login.php");
    exit();
}

$stmt->close();

// Update the donor details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get updated donor information from the form
    $donor_id = $_POST['donor_id'];
    $name = $_POST['name'];
    $contact_no = $_POST['contact_no'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $blood_group = $_POST['blood_group'];
    $message = $_POST['message'];

    // Prepare the SQL update statement
    $update_sql = "UPDATE blood_donor SET name = ?, contact_no = ?, age = ?, gender = ?, blood_group = ?, message = ? WHERE donor_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("ssssssi", $name, $contact_no, $age, $gender, $blood_group, $message, $donor_id);

    if ($update_stmt->execute()) {
        $_SESSION['message'] = "Profile updated successfully.";
        $_SESSION['message_type'] = "success";
        header("Location: donor_profile.php");
        exit();
    } else {
        $_SESSION['message'] = "Error updating profile: " . $conn->error;
        $_SESSION['message_type'] = "error";
        header("Location: donor_profile.php");
        exit();
    }

    $update_stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Donor Profile</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
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
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    .sidebar {
      height: 1010px;
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
      background-color: #34495e;
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

    .main-content {
      padding: 20px 30px;
      display: flex;
      justify-content: center;
      align-items: flex-start;
    }

    .edit-profile-container {
      width: 100%;
      max-width: 900px;
      padding: 20px;
    }

    .section-title {
      margin-top: 20px;
      font-size: 1.5rem;
      font-weight: 600;
      color: #3498DB;
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      margin-bottom: 8px;
      color: #555;
      font-weight: bold;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
      width: 100%;
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      box-sizing: border-box;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus,
    .form-group textarea:focus {
      border-color: #3498DB;
      box-shadow: 0 0 8px rgba(52, 152, 219, 0.3);
    }

    .form-group input[readonly] {
      background-color: #f0f0f0;
      color: #777;
      cursor: not-allowed;
    }

    .form-actions {
      text-align: center;
    }

    .btn-save {
      padding: 12px 30px;
      border: none;
      border-radius: 8px;
      font-size: 1.1rem;
      cursor: pointer;
      background-color: #3498db;
      color: white;
      transition: background-color 0.3s ease;
    }

    .btn-save:hover {
      background-color: #2980b9;
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

<div class="top-bar">DonorSphere</div>

<div class="container-fluid">
  <div class="row">

    <nav class="col-md-3 sidebar">
      <div class="text-center mb-2">
        <h4>Donor Features</h4>
        <hr class="sidebar-line">
      </div>
      <ul class="nav flex-column px-3">
        <li class="nav-item">
          <a class="nav-link active" href="donor_dashboard.php"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donor_profile.php"><i class="fas fa-user"></i> Profile</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="donation_history.php"><i class="fas fa-history"></i> Donation History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="notification.php"><i class="fas fa-bell"></i> Notifications</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="make_a_donation.php"><i class="fas fa-heart"></i> Make a Donation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-danger" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </li>
      </ul>
    </nav>

    <main class="col-md-9 ms-sm-auto px-md-5 pt-4 main-content">
      <div class="edit-profile-container">
        <!-- Display message -->
        <?php if (isset($_SESSION['message'])): ?>
          <div class="alert alert-<?= $_SESSION['message_type']; ?> mt-3" role="alert">
            <?= htmlspecialchars($_SESSION['message']); ?>
          </div>
          <?php unset($_SESSION['message']); unset($_SESSION['message_type']); ?>
        <?php endif; ?>

        <h3 class="section-title">Edit Profile</h3>

        <form action="" method="POST">
          <input type="hidden" name="donor_id" value="<?= $donor_id ?>">

          <div class="card mb-4">
            <div class="card-body">
              <div class="section-title">Personal Information</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($donor_name) ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="email">Email (cannot be changed)</label>
                    <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($donor_email) ?>" readonly>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <div class="section-title">Contact Information</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="contact_no">Contact Number</label>
                    <input type="text" class="form-control" name="contact_no" value="<?= htmlspecialchars($donor_contact_no) ?>" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" value="<?= htmlspecialchars($donor_age) ?>" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card mb-4">
            <div class="card-body">
              <div class="section-title">Blood Donation Details</div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="blood_group">Blood Group</label>
                    <select name="blood_group" class="form-control" required>
                      <option value="A+" <?= $donor_blood_group == 'A+' ? 'selected' : ''; ?>>A+</option>
                      <option value="A-" <?= $donor_blood_group == 'A-' ? 'selected' : ''; ?>>A-</option>
                      <option value="B+" <?= $donor_blood_group == 'B+' ? 'selected' : ''; ?>>B+</option>
                      <option value="B-" <?= $donor_blood_group == 'B-' ? 'selected' : ''; ?>>B-</option>
                      <option value="O+" <?= $donor_blood_group == 'O+' ? 'selected' : ''; ?>>O+</option>
                      <option value="O-" <?= $donor_blood_group == 'O-' ? 'selected' : ''; ?>>O-</option>
                      <option value="AB+" <?= $donor_blood_group == 'AB+' ? 'selected' : ''; ?>>AB+</option>
                      <option value="AB-" <?= $donor_blood_group == 'AB-' ? 'selected' : ''; ?>>AB-</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="message">Additional Message</label>
                    <textarea name="message" class="form-control" rows="3"><?= htmlspecialchars($donor_message) ?></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn-save">Save Changes</button>
          </div>
        </form>
      </div>
    </main>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
