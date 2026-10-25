<?php
// support.php - Handles both displaying the form and submitting the support request

// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$database = "blood donation";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $support_message = mysqli_real_escape_string($conn, $_POST['support_message']);
    $user_email = $_SESSION['user_email']; // Get the logged-in user's email from session (assuming session is started)

    // Insert the support request into the database
    $sql = "INSERT INTO support_requests (user_email, message) VALUES ('$user_email', '$support_message')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
                alert('Support request submitted successfully!');
                window.location.href = 'donor_dashboard.php'; // Redirect back to the dashboard
              </script>";
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

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
      background-color: #3498DB; /* Darker shade */
      color: white;
      padding: 15px 30px;
      font-size: 1.5rem;
      font-weight: 600;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
    }

    /* Sidebar Styles */
    .sidebar {
      height: 100vh;
      width: 320px; /* Fixed width */
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

    /* Main Content Styling */
    .content {
      margin-left: 10px; /* Same width as sidebar */
      padding: 50px;
      width: 720px;
    }

    /* Styling for Support Form to match Report Form */
    .support-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 720px; /* Matching width */
      margin: 0 auto;
    }

    textarea {
      width: 100%;
      height: 110px;
      margin-bottom: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
    }

    button {
      width: 40%;
      padding: 12px;
      background-color: #3498DB;
      color: white;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }

    button:hover {
      background-color: #3498DB;
    }

    h2 {
      font-size: 24px;
      margin-bottom: 20px;
      color: #3498DB;
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
      <nav class="sidebar col-md-3 d-none d-md-block">
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
            <a class="nav-link" href="#"><i class="bi bi-bell-fill"></i> Notifications</a>
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
      <div class="content col-md-9">
        <div class="support-container">
          <h2>Submit Your Support Request</h2>
          <form action="support.php" method="POST">
            <textarea name="support_message" placeholder="Describe your issue or support request..." required></textarea>
            <button type="submit">Submit Support Request</button>
          </form>
        </div>
      </div>

    </div>
  </div>

</body>
</html>
