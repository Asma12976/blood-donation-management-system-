<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank System</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: sans-serif;
    }

    /* Navigation Bar */
    .main-nav {
        background-color: #4287f5; /* Dark background color */
        padding: 10px 0; /* Adjust vertical padding */
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 1000;
    }

    .nav-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 90%;
        margin: 0 auto;
    }

    .logo {
      display: flex;
      align-items: center;
    }

    .logo img {
      height: 50px;
      margin-right: 10px;
    }

    .brand-name {
      color:black;
      font-size: 1.5em;
      font-weight: bold;
    }

    .nav-links {
      display: flex;
      list-style-type: none;
    }

    .nav-links li {
      margin-left: 20px;
    }

    .nav-links a {
      color: white;
      text-decoration: none;
      font-size: 1.1em;
    }

    .nav-links a:hover {
      color: red;
    }

    .login-button {
        background-color: black;
        color: white;
        padding: 6px 10px;
        margin-top: -10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        text-transform: uppercase;
        font-size: 0.9em;
    }

    .login-button:hover {
      background-color:red;
    }

    /* Hero Banner Image */
    .about-banner {
      width: 100%;
    }

    .about-banner img {
      width: 100vw;
      height: 300px;
      object-fit: cover;
      display: block;
    }

    /* Breadcrumb */
    .breadcrumb {
      width: 100%;
      text-align: left;
      padding: 10px 20px;
      font-size: 14px;
      color: #555;
      background-color: #F5FFFA;
    }

    .breadcrumb .home {
      color: red;
      font-weight: bold;
    }

    /* Search Form */
    .search-form {
      padding: 20px;
      margin: 20px;
      width: 700px; /* Adjust as needed */
      max-width: 800px;
      border-radius: 8px;
      display: flex;
      flex-direction: column;
      gap: 10px;
      align-items: flex-start; /* Align all items to the left */
      margin-left: 0; /* Align form to the left corner */
    }

    .form-group {
      display: flex;
      justify-content: flex-start; /* Align fields to the left */
      gap: 20px;
      width: 100%;
    }

    .form-group-left,
    .form-group-right {
      width: 48%; /* Adjust width of the fields */
    }

    .form-group select, .form-group input[type="text"] {
      width: 100%; /* Ensure fields take full width of their container */
      padding: 8px;
      margin-bottom: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    /* Submit Button */
    .submit-btn {
      width: 150px; /* Fixed width for the submit button */
      background-color: #4287f5;
      color: white;
      padding: 10px 12px; /* Adjust padding */
      border: none;
      border-radius: 4px;
      cursor: pointer;
      margin-top: 10px; /* Add some space above the button */
      align-self: flex-start; /* Align button to the left */
    }

    .submit-btn:hover {
      background-color: #3366cc;
    }

    /* Footer */
    footer {
      background-color: #4b6584;
      color: white;
      padding: 30px 0;
      text-align: center;
    }

    .footer-container {
      max-width: 1200px;
      margin: 0 auto;
    }

    .footer-logo img {
      height: 50px;
      margin-bottom: 20px;
    }

    .footer-logo h3 {
      margin: 0;
      font-size: 1.8em;
    }

    .footer-links {
      margin-bottom: 20px;
    }

    .footer-links a {
      color: white;
      text-decoration: none;
      margin: 0 15px;
      font-size: 1.1em;
    }

    .footer-links a:hover {
      color: #f1c40f;
    }

    .footer-contact {
      margin-bottom: 20px;
    }

    .footer-contact p {
      margin: 5px 0;
    }

    .footer-social {
      margin-bottom: 20px;
    }

    .footer-social a {
      color: white;
      margin: 0 10px;
    }

    .footer-social a img {
      height: 25px;
      transition: transform 0.3s;
    }

    .footer-social a:hover img {
      transform: scale(1.1);
    }

    .footer-bottom p {
      font-size: 0.9em;
      margin: 0;
    }
  </style>
</head>
<body>

  <!-- Navigation -->
  <nav class="main-nav">
    <div class="nav-content">
      <div class="logo">
        <img src="images/injection-removebg-preview.png" alt="BBMS Logo">
        <span class="brand-name">DonorSphere</span>
      </div>
      <ul class="nav-links">
        <li><a href="landing_page.php">Home</a></li>
        <li><a href="About us.php">About Us</a></li>
        <li><a href="#">Contact Us</a></li>
        <li><a href="#">Donor List</a></li>
        <li><a href="search donor.php">Search Donor</a></li>
        <li><a href="admin/index.php">Admin</a></li>
        <li><button class="login-button">Login</button></li>
      </ul>
    </div>
  </nav>

  <!-- Banner Image -->
  <div class="about-banner">
    <img src="images/banner3.jpg" alt="Banner Image">
  </div>

  <!-- Breadcrumb -->
  <div class="breadcrumb">
    <span class="home">Home</span> / Blood Donor List
  </div>

  <!-- Search Form -->
  <div class="search-form">
    <div class="form-group">
      <div class="form-group-left">
        <label for="bloodGroup">Blood Group <span style="color: red; font-size: 1.2em;">*</span></label>
        <select id="bloodGroup" name="bloodGroup" required>
          <option value="">Select a Blood Group</option> <!-- Option to prompt user to choose -->
          <option value="A+">A+</option>
          <option value="A-">A-</option>
          <option value="B+">B+</option>
          <option value="B-">B-</option>
          <option value="AB+">AB+</option>
          <option value="AB-">AB-</option>
          <option value="O+">O+</option>
          <option value="O-">O-</option>
        </select>
      </div>
      <div class="form-group-right">
        <label for="location">Location</label>
        <input type="text" id="location" name="location" placeholder="Enter Location">
      </div>
    </div>
    
    <button class="submit-btn" type="submit">Submit</button>
  </div>

  <!-- Footer -->
  <footer>
    <div class="footer-container">
      <div class="footer-logo">
        <img src="images/injection-removebg-preview.png" alt="Logo">
        <h3>DonorSphere</h3>
      </div>

      <div class="footer-links">
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <a href="#">Privacy Policy</a>
      </div>

      <div class="footer-contact">
        <p><strong>Email:</strong> contact@donorsphere.com</p>
        <p><strong>Phone:</strong> +65852333222</p>
        <p><strong>Location:</strong> 456 Oak Lane, Riverside, CA</p>
      </div>

      <div class="footer-social">
        <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
        <a href="#"><img src="images/google.png" alt="Google"></a>
        <a href="#"><img src="images/instagram.jpeg" alt="Instagram"></a>
      </div>

      <div class="footer-bottom">
        <p>&copy; 2024 DonorSphere. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>
