<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Blood Bank System</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
      flex-wrap: wrap; /* Add this */
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
      color: #E0FFFF;
      text-decoration: none;
      font-size: 1.1em;
    }
    .nav-links {
  padding-top: 10px; /* Applies to the whole nav list */
  color: #E0FFFF;
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
        .about-banner {
  height: 400px; /* Set a height for the parent container */
}


.carousel-inner .carousel-item img {
  width: 1250px; /* Adjust to your desired width (e.g., percentage or pixels) */
  height: 500px; /* Maintain aspect ratio */
  /* or */
  
  
}





        .hero-section {
    background-image: url('images/banner3.jpg');
    background-size: cover;
    background-position: center;
    height: 500px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    margin-top: 100px;
}


.hero-content {
    width: 80%;
}

.hero-content h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

.hero-content p {
    font-size: 1.2em;
    margin-bottom: 30px;
}

.hero-content button {
    background-color: #c2185b;
    color: white;
    padding: 15px 30px;
    border: none;
    border-radius: 5px;
    font-size: 1.1em;
    cursor: pointer;
}

.hero-content button:hover {
    background-color: #e62e32;
}

.main-footer {
    text-align: center;
    padding: 20px 0;
    background-color: #f0f0f0;
}

@media (max-width: 768px) {
    .nav-content {
        flex-direction: column;
        align-items: flex-start;
    }

    .nav-links {
        flex-direction: column;
        padding-left: 0;
    }

    .nav-links li {
        margin: 10px 0;
    }
}

.doctor-section {
    background-color: #4287f5; /* Blue background */
    color: white;
    padding: 50px 20px;
    text-align: left; /* Align text to the left */
}

.doctor-content {
    display: flex;
    align-items: center; /* Aligns content vertically in the middle */
    gap: 40px; /* Adds space between image and text */
    margin-left: 110px; /* Adjust as needed */

}

.doctor-image img {
    height: 200px; /* Increased the height to 400px, adjust as needed */
    width: auto; /* Ensures the image maintains its aspect ratio */
    border-radius: 10px; /* Optional: Adds rounded corners to the image */
    

    
}

.doctor-text {
    max-width: 600px; /* Optional: Restricts the text width for better readability */
}

.doctor-section h2 {
    font-size: 2.5em;
    margin-bottom: 20px;
}

.doctor-section p {
    font-size: 1.1em;
    margin-bottom: 30px;
}

.doctor-section .read-more {
    background-color: transparent;
    color: white;
    border: 1px solid white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.doctor-section .read-more:hover {
    background-color: white;
    color: #4287f5;
}

.doctor-section .become-donor {
    background-color: transparent;
    color: white;
    border: 1px solid white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: bold;
}

.doctor-section .become-donor:hover {
    background-color: white;
    color: #4287f5;
}

.donor-section {
    padding: 40px 20px;
    text-align: center;
    background-image: url('images/bg4.jpg'); /* Corrected the path */
    background-size: cover; /* Ensure it covers the section */
    background-position: center; /* Ensure it is centered */
    background-repeat: no-repeat; /* Ensure it does not repeat */
    color: #333; /* Adjust text color for visibility */
}

.donor-section h2 {
    font-size: 2em;
    margin-bottom: 20px;
    color: white; /* Changed the color to white */
}

.donor-cards {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap; /* Allows cards to wrap into multiple lines */
    gap: 20px; /* Adds space between the cards */
    margin-top: 20px; /* Optional: Adds some spacing at the top */
}

.donor-card {
    background-color: #f0f0f0;
    padding: 20px;
    border-radius: 8px;
    width: 20%; /* Ensures 3 cards per row */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px; /* Ensures there's space between rows */
}

@media (max-width: 768px) {
    .donor-cards {
        flex-direction: column;
        align-items: center; /* Centers the cards on small screens */
    }

    .donor-card {
        width: 80%; /* Adjust width on smaller screens */
    }
}

.donor-card img {
    height: 80px;
    margin-bottom: 10px;
}

.donor-card h3 {
    font-size: 1.2em;
    margin-bottom: 5px;
}

.donor-card p {
    font-size: 1em;
    margin-bottom: 10px;
}

.donor-card .request-button {
    background-color:rgb(11, 8, 9);
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.blood-groups-section {
    background-color: #e3f2fd;
    padding: 40px 20px;
    text-align: center;
}

.blood-groups-content {
    width: 80%;
    margin: 0 auto;
    display: flex;
    align-items: center; /* Ensures vertical alignment */
    justify-content: center; /* Ensures content is centered */
    flex-wrap: wrap; /* Allow wrapping for responsiveness */
    gap: 20px; /* Space between text and image */
}

.blood-groups-text {
flex: 1;
}

.blood-groups-image {
flex: 1;
text-align: right;
}


.blood-groups-image img {
    max-width: 100%; /* You can adjust this value to a specific percentage if needed */
    height: 350px; /* Set the height as per your requirement */
    width: 80%; /* Ensures the image maintains its aspect ratio */
}


.donate-blood-heading {
    color: black; /* Sets the text color to red */
    font-weight: bold; /* Optional: makes the text bold */
    font-size: 2em; /* Optional: adjust the font size */
}


.blood-groups-content ul {
list-style-type: disc;
padding-left: 20px;
}

.blood-groups-content li {
font-size: 1em;
line-height: 1.6;
}





/* Get Involved Section */
.support-section {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 80px 40px;
      background-color: #f0f0f0;
      text-align: center;
      margin-top: 0;
    }

    .section-heading {
      color: #4287f5;
      font-size: 0.9em;
      font-weight: bold;
      letter-spacing: 1px;
      margin-bottom: 10px;
      text-transform: uppercase;
    }

    .main-title {
      font-size: 2.5em;
      font-weight: bold;

       color: #333; /* Dark color for better contrast */
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
      background-color: #e3f2fd;
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








/* Footer Section Styling */
footer {
background-color: #4b6584;
color: white;
padding: 30px 0;
text-align: center;
}

/* Footer Container */
.footer-container {
max-width: 1200px;
margin: 0 auto;
}

/* Footer Logo */
.footer-logo img {
height: 50px;
margin-bottom: 20px;
}

.footer-logo h3 {
margin: 0;
font-size: 1.8em;
}


/* Footer Links */
.footer-links {
margin-bottom: 20px;
}
.footer-links {
margin: 5px 0;
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

/* Footer Contact Info */
.footer-contact {
margin-bottom: 20px;
}

.footer-contact p {
margin: 5px 0;
}

/* Footer Social Media */
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

/* Footer Bottom */
.footer-bottom p {
font-size: 0.9em;
margin: 0;
}
        </style>
</head>
<body>
    

<head>
  <!-- Other head content -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>


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
    <!---Slider-->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/ravi24_may_8.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\7233454.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\vecteezy_human-blood-donate-and-heart-rate-on-white-background_8191708.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\7295730.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images\ravi25_may_7.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

    

    <!-- Doctor Section -->
    <section class="doctor-section">
        <div class="doctor-content">
            <div class="doctor-image">
                <img src="images\t3-removebg-preview.png" alt="Doctor Image">
            </div>
            <div class="doctor-text">
                <h2>High professional doctors</h2>
                <p>All specialists have extensive practical experience and regularly training courses in educational centers of the world.</p>
                <a href="about_us.php" class="read-more">Read More &#10148;</a>
                <a href="donor_register.php" class="become-donor"> Become a Donor &#10148;</a>
            </div>
        </div>
    </section>

    <!-- Donor Section -->
    <section class="donor-section">
        <h2>Some of the Donors</h2>
        <div class="donor-cards">
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Ami</h3>
                <p>Gender: Male</p>
                <p>Blood Group: A+</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Anuj Kumar</h3>
                <p>Gender: Male</p>
                <p>Blood Group: O+</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Ashu Misra</h3>
                <p>Gender: Male</p>
                <p>Blood Group: O-</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Nitesh Kumart</h3>
                <p>Gender: Male</p>
                <p>Blood Group: A+</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Ethan Carter</h3>
                <p>Gender: Male</p>
                <p>Blood Group: AB-</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Liam Davis</h3>
                <p>Gender: Male</p>
                <p>Blood Group: A-</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Noah Anderson</h3>
                <p>Gender: Male</p>
                <p>Blood Group: B+</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
            <div class="donor-card">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Donor Icon">
                <h3>Mason Bennett</h3>
                <p>Gender: Male</p>
                <p>Blood Group: B-</p>
                <button class="request-button" onclick="goToRequestPage()">Request</button>
            </div>
        </div>
    </section>

    <!-- Blood Group Section -->
    <section class="blood-groups-section">
        <div class="blood-groups-content">
            <div class="blood-groups-text">
            <h2 class="donate-blood-heading">Donate Blood, Save Life</h2>

                <p>
    You have the power to save lives.<br>
    At <strong>DonorSphere</strong>, we make blood donation simple, safe, and meaningful.<br>
    Together, we can make a difference.
</p>

                
                <p>
    🩸 <strong>Your blood can be someone’s second chance at life.</strong><br>
    Join <strong>DonorSphere</strong> to donate or request blood quickly and safely.<br>
    It only takes a moment to become someone’s hero. 💖
</p>


            </div>
            <div class="blood-groups-image">
                <img src="images\tanishi_23_05_01-removebg-preview.png" alt="Blood Groups">
            </div>
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
            <a href="about_us.php" class="learn-more-btn">Learn More</a>
        </div>
    </div>

    <div class="help-card">
        <div class="card-image">
            <img src="images/download (1) (1).jpeg" alt="Volunteer Team Shirt">
        </div>
        <div class="card-content">
            <h3>Volunteer Team</h3>
            <p>Join our team of volunteers to support events, outreach, and tasks. Your time and skills truly help save lives daily.</p>
            <a href="about_us.php" class="learn-more-btn">Learn More</a>
        </div>
    </div>

    <div class="help-card">
        <div class="card-image">
            <img src="images/images (1).jpeg" alt="Phone with Blood Donation App">
        </div>
        <div class="card-content">
            <h3>Spread Awareness</h3>
            <p>Share blood donation facts with friends and family. Post on social media to inspire, and motivate others to donate blood.</p>
            <a href="about_us.php" class="learn-more-btn">Learn More</a>
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
                <p>&copy; 2024 DonorSphere. All Rights Reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript to handle Request button click -->
    <script>
    

    function goToRequestPage() {
        window.location.href = "patient_register.php"; // Change to the correct request page
    }
</script>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html> 