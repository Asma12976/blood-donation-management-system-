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

        /* Navigation Styling */
        .main-nav {
      background-color: #4287f5;
      padding: 10px 0;
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
      gap: 10px;
    }

    .logo img {
      height: 50px;
    }

    .brand-name {
      font-size: 1.5em;
      font-weight: bold;
      color: black;
    }

    .nav-links {
      list-style: none;
      display: flex;
    }

    .nav-links li {
      margin-left: 20px;
    }

    .nav-links a {
      text-decoration: none;
      color: white;
      font-weight: bold;
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

        /* Contact For Blood Section */
        .contact-for-blood {
            background-color: #f9f9f9;
            padding: 0;
            text-align: center;
            margin-top: 60px; /* To avoid overlap with the fixed nav */
        }

        .contact-content {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
        }

        .contact-banner img {
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

        h2 {
            margin-top: 20px;
            font-size: 2em;
        }

        .contact-icon-line {
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

        .contact-icon img {
            height: 40px;
            width: auto;
        }

        .form-container {
            display: flex;
            justify-content: space-between;
            width: 80%;
            margin: 20px auto;
        }

        .blood-form {
            width: 45%;
            text-align: left;
            height: 100%;
        }

        .form-image {
            width: 65%;
            text-align: center;
            height: 380px;
            order: -1;
            margin-left: -125px;
        }

        .form-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .form-row {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 15px;
        }

        .form-group {
            flex: 1;
            min-width: 150px;
        }

        .blood-form label {
            display: block;
            margin-bottom: 5px;
        }

        .blood-form input[type="text"],
        .blood-form input[type="email"],
        .blood-form select,
        .blood-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .blood-form button {
            background-color: #4287f5;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .blood-form button:hover {
            background-color: #45a049;
        }

        .form-notice {
            font-size: 1.2em;
            color: #333;
            margin-top: 20px;
            margin-bottom: 20px;
            padding-left: 500px;
        }

        .breadcrumb .home {
            color: red;
            font-weight: bold;
        }

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
                <li><a href="about_us.php">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="#">Donor List</a></li>
                <li><a href="search donor.php">Search Donor</a></li>
                <li><a href="admin/index.php">Admin</a></li>
                <li><a href="login.php" class="login-button">Login</a></li>

            </ul>
        </div>
    </nav>

<section class="contact-for-blood">
    <div class="contact-content">

        <!-- Banner Image -->
        <div class="contact-banner">
            <img src="images/banner3.jpg" alt="Contact Banner Image">
        </div>

        <!-- Breadcrumb After Image -->
        <div class="breadcrumb">
            <span class="home">Home</span> / Blood Needed Person
        </div>

        <!-- Heading -->
        <h2>Contact For Blood</h2>

        <!-- Short line - icon - short line -->
        <div class="contact-icon-line">
            <div class="short-line"></div>
            <div class="contact-icon">
                <img src="images/blood_donar_image-removebg-preview.png" alt="Blood Donor Icon">
            </div>
            <div class="short-line"></div>
        </div>

        <!-- Notice Text: Fill the following form for blood -->
        <div class="form-notice">
            <h4>Fill the following form for blood:</h4>
        </div>

        <!-- Form and Image Container -->
        <div class="form-container">

            <!-- Image Section on the Left -->
            <div class="form-image">
                <img src="images/1.jpg" alt="Blood Donation Image">
            </div>

            <!-- Form Section on the Right -->
            <form class="blood-form">
                <!-- Name and Phone Number Fields on the Same Line -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="name">Your Name:</label>
                        <input type="text" id="name" name="name" placeholder="Please enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="text" id="phone" name="phone" placeholder="Please enter your phone number" required>
                    </div>
                </div>

                <!-- Email and Blood Required For Fields on the Same Line -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" id="email" name="email" placeholder="Please enter your email address" required>
                    </div>
                    <div class="form-group">
                        <label for="bloodFor">Blood Require For:</label>
                        <select id="bloodFor" name="bloodFor" required>
                            <option value="">Select an option</option>
                            <option value="patient">Patient</option>
                            <option value="relative">Relative</option>
                            <option value="friend">Friend</option>
                        </select>
                    </div>
                </div>

                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="4" placeholder="Please enter your message" required></textarea>

                <button type="submit">Send Message</button>
            </form>

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
            <p><strong>Location:</strong>456 Oak Lane, Riverside, CA</p>
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
