<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank System</title>
  <style>
    /* Basic Reset */
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
      background-color: #4287f5;
      padding: 10px 20px;
    }

    .nav-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
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
      color: white;
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
      color:red ;
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
      background-color: #333;
    }

    /* Donor Profile Section */
    .donor-profile {
      background-color: #f9f9f9;
      padding: 0;
      text-align: center;
    }

    .donor-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    .donor-banner img {
      width: 100vw;
      height: 300px;
      object-fit: cover;
      display: block;
    }

    /* Breadcrumb after image */
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

    h2 {
      margin-top: 20px;
      font-size: 2em;
    }

    .donor-icon-line {
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 10px 0 30px;
    }

    .short-line {
      width: 50px;
      height: 1px;
      background-color: #999;
      margin: 0 10px;
    }

    .donor-icon img {
      height: 40px;
      width: auto;
    }

    /* Donor Profile Form Section */
    .donor-form-container {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1000px;
      margin: 0 auto;
      padding: 20px;
    }

    .donor-profile-image {
      width: 40%;
      text-align: center;
    }

    .donor-profile-image img {
      width: 100%;
      height: auto;
      border-radius: 8px;
    }

    .donor-form {
      width: 55%;
      text-align: left;
      background-color: #f2f2f2;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .donor-form input,
    .donor-form select {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 1em;
    }

    .donor-form button {
      background-color: #4287f5;
      color: white;
      padding: 10px 20px;
      font-size: 1.1em;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .donor-form button:hover {
      background-color: #333;
    }

    /* Footer Section Styling */
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
        <li><a href="donor_profile.php">Donor Profile</a></li>
        <li><a href="contact_us.php">Contact Us</a></li>
        <li><a href="#">Donor List</a></li>
        <li><a href="#">Search Donor</a></li>
        <li><a href="admin_login.php">Admin</a></li>
        <li><a href="login.php" class="login-button">Login</a></li>
      </ul>
    </div>
  </nav>

  <!-- Donor Profile Section -->
  <section class="donor-profile">
    <div class="donor-content">

      <!-- Banner Image -->
      <div class="donor-banner">
        <img src="images/banner3.jpg" alt="Donor Profile Banner Image">
      </div>

      <!-- Breadcrumb After Image -->
      <div class="breadcrumb">
        <span class="home">Home</span> / Donor Profile
      </div>

      <!-- Heading -->
      <h2>Donor Profile</h2>

      <!-- Short line - icon - short line -->
      <div class="donor-icon-line">
        <div class="short-line"></div>
        <div class="donor-icon">
          <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Profile Icon">
        </div>
        <div class="short-line"></div>
      </div>

      <!-- Donor Profile Form Section -->
      <div class="donor-form-container">
        <!-- Donor Profile Image -->
        <div class="donor-profile-image">
          <img src="images/donor_profile_img.jpg" alt="Donor Profile Image">
        </div>

        <!-- Donor Profile Form -->
        <div class="donor-form">
          <form action="update_profile.php" method="POST">
            <label for="full_name">Full Name:</label>
            <input type="text" id="full_name" name="full_name" required />

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />

            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
              <option value="Other">Other</option>
            </select>

            <label for="blood_group">Blood Group:</label>
            <select id="blood_group" name="blood_group" required>
              <option value="A+" selected>A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
              <option value="AB+">AB+</option>
              <option value="AB-">AB-</option>
            </select>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required />

            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required />

            

            <button type="submit">Update</button>
          </form>
        </div>

      </div>

    </div>
  </section>

  <!-- Footer Section -->
  <footer>
    <div class="footer-container">
      <!-- Footer Logo -->
      <div class="footer-logo">
        <img src="images/injection-removebg-preview.png" alt="Logo">
        <h3>DonorSphere</h3>
      </div>

      <!-- Footer Links -->
      <div class="footer-links">
        <a href="#">About Us</a>
        <a href="#">Services</a>
        <a href="#">Contact</a>
        <a href="#">Privacy Policy</a>
      </div>

      <!-- Footer Contact Info -->
      <div class="footer-contact">
        <p><strong>Email:</strong> contact@donorsphere.com</p>
        <p><strong>Phone:</strong> +65852333222</p>
        <p><strong>Location:</strong> 456 Oak Lane, Riverside, CA</p>
      </div>

      <!-- Footer Social Media -->
      <div class="footer-social">
        <a href="#">
          <img src="images/twitter.png" alt="Twitter">
        </a>
        <a href="#">
          <img src="images/google.png" alt="Google">
        </a>
        <a href="#">
          <img src="images/instagram.jpeg" alt="Instagram">
        </a>
      </div>

      <!-- Footer Bottom -->
      <div class="footer-bottom">
        <p>&copy; 2024 DonorSphere. All Rights Reserved.</p>
      </div>
    </div>
  </footer>

</body>
</html>
