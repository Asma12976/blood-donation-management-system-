<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank System</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
      background-color: #4287f5;
      padding: 10px 20px;
    }

    .nav-content {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
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
      padding-top: 10px;
      color: #E0FFFF;
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
      background-color: #333;
    }

    /* About Us Section */
    .about-us {
      background-color: #f9f9f9;
      padding: 0;
      text-align: center;
    }

    .about-content {
      display: flex;
      flex-direction: column;
      align-items: center;
      width: 100%;
    }

    .about-banner img {
      width: 100vw;
      height: 300px;
      object-fit: cover;
      display: block;
    }

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

    .about-icon-line {
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

    .about-icon img {
      height: 40px;
      width: auto;
    }

    .about-text {
      max-width: 800px;
      margin: 20px auto;
      font-size: 1.2em;
      color: #555;
      line-height: 1.6;
    }

    /* Info Card Styling with Transform */
    .info-card {
      flex: 1 1 250px;
      max-width: 300px;
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
      text-align: center;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-card:hover {
      transform: translateY(-10px) scale(1.03);
      box-shadow: 0 6px 15px rgba(0, 0, 0, 0.2);
    }

    /* Footer Styling */
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

    .footer-contact p {
      margin: 5px 0;
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
        <li><a href="landing_page.php"><i class="fas fa-home"></i> Home</a></li>
        <li><a href="about_us.php"><i class="fas fa-info-circle"></i> About Us</a></li>
        <li><a href="contact_us.php"><i class="fas fa-envelope"></i> Contact Us</a></li>
        <li><a href="donor_register.php"><i class="fas fa-hand-holding-medical"></i> Donor</a></li>
        <li><a href="patient_register.php"><i class="fas fa-user-injured"></i> Patient</a></li>
        <li><a href="admin/index.php"><i class="fas fa-user-shield"></i> Admin</a></li>
      </ul>
    </div>
  </nav>

  <!-- About Us Section -->
  <section class="about-us">
    <div class="about-content">
      <div class="about-banner">
        <img src="images/banner3.jpg" alt="About Us Banner Image">
      </div>
      <div class="breadcrumb">
        <span class="home">Home</span> / About Us
      </div>
      <h2>About Us</h2>
      <div class="about-icon-line">
        <div class="short-line"></div>
        <div class="about-icon">
          <img src="images/blood_donar_image-removebg-preview.png" alt="About Us Icon">
        </div>
        <div class="short-line"></div>
      </div>

      <!-- Short Centered Paragraph -->
      <p style="max-width: 700px; margin: 0 auto 30px; font-size: 1.2em; color: #555;">
        DonorSphere is committed to bridging the gap between blood donors and those in urgent need. We provide a fast, secure, and reliable platform to save lives through timely blood donations.
      </p>

      <!-- Info Cards -->
      <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; padding: 20px;">
        <div class="info-card">
          <i class="fas fa-hand-holding-heart" style="font-size: 2em; color: red;"></i>
          <h3 style="margin: 15px 0 10px;">Donate Blood</h3>
          <p>Every drop counts — become a donor and help save lives in your community.</p>
        </div>

        <div class="info-card">
          <i class="fas fa-hospital-user" style="font-size: 2em; color: #2c3e50;"></i>
          <h3 style="margin: 15px 0 10px;">Request Blood</h3>
          <p>In need of blood? Post a request and connect with verified donors quickly.</p>
        </div>

        <div class="info-card">
          <i class="fas fa-shield-alt" style="font-size: 2em; color: green;"></i>
          <h3 style="margin: 15px 0 10px;">Safe & Secure</h3>
          <p>Our platform ensures safety and privacy for both donors and recipients.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer Section -->
  <footer>
        <div class="footer-container">
            <div class="footer-logo">
                <img src="images/injection-removebg-preview.png" alt="Logo">
                <h3>DonorSphere</h3>
            </div>
            <div class="footer-links">
            <a href="landing_page.php">Home</a>
                <a href="about_us.php">About Us</a>
                <a href="contact_us.php">Contact us</a>
                <a href="donor_register.php">Become a Donor </a>
                
            </div>
            <div class="footer-contact">
                <p><strong>Email:</strong> contact@donorsphere.com</p>
                <p><strong>Phone:</strong> +65852333222</p>
                <p><strong>Location:</strong>456 Oak Lane, Riverside, CA</p>
            </div>
            <div class="footer-social">
                <a href=" https://twitter.com"><img src="images/twitter.png" alt="Twitter"></a>
                <a href="https://www.google.com"><img src="images/google.png" alt="Google"></a>
                <a href=" https://www.instagram.com"><img src="images/instagram.jpeg" alt="Instagram"></a>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 DonorSphere. All Rights Reserved</p>
            </div>
        </div>
    </footer>

</body>
</html>
