<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DonorSphere</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
    }
    .top-bar {
      display: flex;
      align-items: center;
      padding: 10px 40px;
      background-color: #ffffff;
      border-bottom: 1px solid #ccc;
    }
    .logo {
      display: flex;
      align-items: center;
    }
    .logo img {
      width: 40px;
      margin-right: 10px;
    }
    .logo-text {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    nav {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 40px;
      background-color: #f6f9fc;
      flex-wrap: wrap;
    }
    .nav-links {
      display: flex;
      gap: 25px;
      flex-wrap: wrap;
    }
    .nav-links a {
      text-decoration: none;
      color: #000;
      font-weight: 600;
    }
    .cta {
      background-color: #f44336;
      color: #fff;
      padding: 10px 20px;
      border: none;
      text-transform: uppercase;
      font-weight: bold;
      cursor: pointer;
    }
    .socials {
      display: flex;
      gap: 10px;
    }
    .socials img {
      width: 24px;
    }

    /* Hero Section */
    .hero {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 60px 40px;
      background: linear-gradient(to right, #2b8ed9, #8bc6ec);
      flex-wrap: wrap;
    }

    .hero-text {
      max-width: 50%;
      color: #fff;
    }

    .tagline {
      font-weight: 600;
      letter-spacing: 1px;
      margin-bottom: 10px;
    }

    .hero-text h1 {
      font-size: 48px;
      font-weight: bold;
      margin-bottom: 20px;
    }

    .subtext {
      font-size: 18px;
      margin-bottom: 30px;
    }

    .hero-buttons {
      display: flex;
      gap: 20px;
      flex-wrap: wrap;
    }

    .btn-red {
      background-color: #e63946;
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
    }

    .btn-outline {
      background-color: transparent;
      border: 2px solid white;
      color: white;
      padding: 12px 20px;
      text-decoration: none;
      font-weight: bold;
      border-radius: 5px;
    }

    .hero-image img {
      width: 500px;
      max-width: 100%;
      border-radius: 10px;
      box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.2);
    }

    /* Who We Are Section */
    .impact-section {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 60px 40px;
      background-color: #f2f6fc;
      flex-wrap: wrap;
    }

    .impact-image {
      flex: 1;
      max-width: 45%;
    }

    .impact-image img {
      width: 650px;
      height: 400px;
      object-fit: cover;
      margin-left: -30px;
      margin-top: 20px;
    }

    .impact-text {
      flex: 1;
      max-width: 50%;
      padding-left: 40px;
    }

    .impact-text h2 {
      font-size: 36px;
      color: #e63946;
      margin-bottom: 20px;
    }

    .impact-text p {
      font-size: 18px;
      color: #333;
      line-height: 1.6;
      margin-bottom: 30px;
    }

    .impact-text .cta {
      font-size: 16px;
      padding: 12px 25px;
      border-radius: 5px;
    }

    /* Get Involved Section */
    .support-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 80px 40px;
      background-color: #f9f9f9;
      text-align: center;
      margin-top: 0;
    }

    .section-heading {
      color: #2b8ed9;
      font-size: 0.9em;
      font-weight: bold;
      letter-spacing: 1px;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    .main-title {
      font-size: 2.5em;
      font-weight: bold;
      color: #333;
      margin-bottom: 15px;
    }

    .divider {
      width: 50px;
      height: 3px;
      background-color: #e63946;
      margin-bottom: 20px;
    }

    .description {
      color: #555;
      font-size: 1.1em;
      line-height: 1.6;
      margin-bottom: 0;
    }

    /* Ways to Help Section */
    .ways-to-help {
      display: flex;
      justify-content: center;
      gap: 50px;
      padding: 40px;
      background-color: #f9f9f9;
    }

    .help-card {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      width: 350px;
      overflow: hidden;
      border: 2px solid white;
      padding: 15px;
    }

    .card-image {
      width: 100%;
      height: 200px;
      overflow: hidden;
      border-radius: 8px;
    }

    .card-image img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .card-content {
      padding: 20px;
      text-align: left;
    }

    .card-content h3 {
      color: #333;
      margin-top: 0;
      margin-bottom: 10px;
      font-size: 1.8em;
    }

    .card-content p {
      color: #555;
      font-size: 1.2em;
      line-height: 1.6;
      margin-bottom: 20px;
    }

    .learn-more-btn {
      background-color: #e63946;
      color: white;
      padding: 10px 20px;
      font-weight: bold;
      text-align: center;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }

    /* Mission Section */
.mission-section {
  padding: 60px 40px;
  background-color: #ffffff;
}

.mission-content {
  display: flex;
  align-items: center;
  justify-content: space-between;
  flex-wrap: wrap;
}

.mission-text {
  flex: 1;
  max-width: 50%;
  padding-right: 40px;
}

.mission-text h2 {
  color: #e63946;
  font-size: 32px;
  margin-bottom: 10px;
}

.mission-text h3 {
  color: #2b8ed9;
  font-size: 24px;
  margin-bottom: 15px;
}

.mission-text p {
  font-size: 16px;
  color: #555;
  line-height: 1.6;
  margin-bottom: 20px;
}

.mission-image {
  flex: 1;
  max-width: 45%;
}

.mission-image img {
  width: 100%;
  height: 600px;
  border-radius: 10px;
  box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);
}


  </style>
</head>
<body>

  <!-- Top Bar -->
  <div class="top-bar">
    <div class="logo">
      <img src="images/injection-removebg-preview.png" alt="DonorSphere Logo" />
      <div class="logo-text">DonorSphere</div>
    </div>
  </div>

  <!-- Navigation -->
  <nav>
    <div class="nav-links">
      <a href="#">ABOUT US</a>
      <a href="#">DONATE BLOOD</a>
      <a href="#">GET INVOLVED</a>
      <a href="#">OUR MISSION</a>
      <a href="#">HOW TO HELP</a>
      <a href="#">CONTACTS</a>
    </div>
    <button class="cta">DONATE NOW</button>
    <div class="socials">
      <a href="#"><img src="images/facebook.png" alt="Facebook"></a>
      <a href="#"><img src="images/twitter.png" alt="Twitter"></a>
      <a href="#"><img src="images/google.png" alt="Google"></a>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-text">
      <p class="tagline">LET'S DONATE</p>
      <h1>Your Blood Donation Matters. Give Today!</h1>
      <p class="subtext">All types of blood are needed to help patients.</p>
      <div class="hero-buttons">
        <a href="#" class="btn-red">DONATION PROCESS</a>
        <a href="#" class="btn-outline">ELIGIBILITY CRITERIA</a>
      </div>
    </div>
  </section>

  <!-- Who We Are Section -->
  <section class="impact-section">
    <div class="impact-image">
      <img src="images/friendly-hospital-phlebotomist-collecting-blood-sample-from-patient-lab-preparation-blood-test-by-female-doctor-medical-uniform-table-white-bright-room.jpg" alt="Make an Impact Image" />
    </div>
    <div class="impact-text">
      <h2>MAKE AN IMPACT</h2>
      <p><strong>Who We Are</strong><br>
      We are a dedicated nonprofit blood donation center committed to saving lives and strengthening communities.</p>
      <p>We believe in the power of community and the life-saving impact of blood donation. Our mission is to ensure a steady supply of safe and accessible blood for patients in need. We are dedicated to raising awareness about the importance of blood donation and providing support to donors throughout their journey.</p>
      <button class="cta">DONATE NOW</button>
    </div>
  </section>

  <!-- Get Involved Section -->
  <section class="support-section">
    <h2 class="section-heading">GET INVOLVED</h2>
    <h1 class="main-title">Your Support is Invaluable</h1>
    <div class="divider"></div>
    <p class="description">There are several ways you can help us achieve our mission of saving lives through safe and regular blood donation efforts.</p>
  </section>

  <!-- Ways to Help Section -->
  <section class="ways-to-help">
    <div class="help-card">
        <div class="card-image">
            <img src="images/images.jpeg" alt="Donate Blood Supplies">
        </div>
        <div class="card-content">
            <h3>Donate Blood</h3>
            <p>The most impactful way to help is by donating blood—each unit you give can potentially save up to three precious lives.</p>
            <a href="#" class="learn-more-btn">Learn More</a>
        </div>
    </div>

    <div class="help-card">
        <div class="card-image">
            <img src="images/download (1) (1).jpeg" alt="Volunteer Team Shirt">
        </div>
        <div class="card-content">
            <h3>Volunteer Team</h3>
            <p>Join our team of volunteers to support events, outreach, and tasks. Your time and skills truly help save lives daily.</p>
            <a href="#" class="learn-more-btn">Learn More</a>
        </div>
    </div>

    <div class="help-card">
        <div class="card-image">
            <img src="images/images (1).jpeg" alt="Phone with Blood Donation App">
        </div>
        <div class="card-content">
            <h3>Spread Awareness</h3>
            <p>Share blood donation facts with friends and family. Post on social media to inspire, and motivate others to donate blood.</p>
            <a href="#" class="learn-more-btn">Learn More</a>
        </div>
    </div>
  </section>


  <!-- Our Mission and History Section -->
<section class="mission-section">
  <div class="mission-content">
    <div class="mission-text">
      <h2>Our Mission and History</h2>
      <h3>Our Commitment to Health & Community</h3>
      <p>Discover the vital role of Blood Center as a leading nonprofit organization dedicated to blood donation.</p>
      <p>Blood Center is a public donation center with blood donation members in the changing health care system. 
      Founded in 1978, Blood Center is one of the nation’s oldest and largest nonprofit transfusion medicine organizations. 
      We provide blood and volunteer services across the US. With our national footprint, deep community roots, and specialized services, 
      we are the thread that connects people and resources together to fuel progress in transfusion medicine.</p>
    </div>
    <div class="mission-image">
      <img src="images/doctors-discussing-work-with-coffee-cups (1).jpg" alt="Our Mission Image" />
    </div>
  </div>
</section>


</body>
</html>
