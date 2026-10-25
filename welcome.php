<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome | DonorSphere Blog</title>
  <!-- Font Awesome for icons -->
  <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f4;
      color: #333;
      line-height: 1.6;
    }

    header {
      position: relative;
      width: 100%;
      height: 80vh;
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                  url('images/bloodi.jpeg') no-repeat center center/cover;
      text-align: center;
      color: white;
      padding-top: 15vh;
    }

    header h1 {
      font-size: 4rem;
      font-weight: bold;
      margin-bottom: 1rem;
      text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.6);
    }

    header p {
      font-size: 1.5rem;
      margin-bottom: 2rem;
      opacity: 0.85;
      text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
    }

    header a {
      display: inline-block;
      padding: 1rem 2.5rem;
      background-color: #cc0000;
      color: white;
      text-decoration: none;
      font-weight: bold;
      border-radius: 50px;
      font-size: 1.2rem;
      transition: background 0.3s ease, transform 0.3s ease;
    }

    header a:hover {
      background-color: #a30000;
      transform: scale(1.05);
    }

    .intro {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 3rem;
      flex-wrap: wrap;
      padding: 3rem 2rem;
      background-color: #fff5f5;
      margin-top: -40px;
    }

    .intro-text {
      flex: 1;
      min-width: 300px;
      text-align: center;
    }

    .intro-text h2 {
      font-size: 2.5rem;
      color: #cc0000;
      margin-bottom: 1.5rem;
      text-transform: uppercase;
    }

    .intro-text p {
      max-width: 600px;
      margin: 0 auto;
      font-size: 1.2rem;
      color: #555;
      line-height: 1.8;
    }

    .cta-section {
      margin-top: 2rem;
    }

    .cta-button {
      display: inline-block;
      background-color: #cc0000;
      color: white;
      padding: 1rem 2.5rem;
      font-size: 1.1rem;
      text-decoration: none;
      border-radius: 50px;
      transition: background-color 0.3s ease, transform 0.3s ease;
      margin: 0.5rem;
    }

    .cta-button:hover {
      background-color: #a30000;
      transform: scale(1.05);
    }

    .intro-image {
      flex: 1;
      max-width: 500px;
      width: 100%;
      text-align: center;
    }

    .intro-image img {
      width: 100%;
      border-radius: 12px;
    }

    .info-boxes {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 3rem;
      padding: 5rem 2rem;
      background-color: #fff0f0;
    }

    .info-box {
      background-color: #ffffff;
      padding: 2.5rem;
      text-align: center;
      border-radius: 12px;
      box-shadow: 0 6px 18px rgba(204, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .info-box:hover {
      transform: translateY(-10px);
      box-shadow: 0 12px 24px rgba(204, 0, 0, 0.2);
    }

    .info-box i {
      font-size: 3.5rem;
      color: #cc0000;
      margin-bottom: 1.5rem;
    }

    .info-box h3 {
      color: #cc0000;
      font-size: 1.5rem;
      margin-bottom: 1rem;
    }

    .info-box p {
      color: #555;
      font-size: 1.1rem;
    }

    .facts-myths {
      padding: 4rem 2rem;
      background-color: #fef2f2;
      text-align: center;
    }

    .facts-myths h2 {
      color: #cc0000;
      font-size: 2.3rem;
      margin-bottom: 2.5rem;
    }

    .myth-boxes {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 2rem;
      max-width: 1000px;
      margin: 0 auto;
    }

    .myth-box {
      background: #ffffff;
      padding: 2rem;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(204, 0, 0, 0.1);
    }

    .myth-box h3 {
      color: #cc0000;
    }

    .myth-box h4 {
      color: green;
      margin-top: 1rem;
    }

    footer {
      background-color: #222;
      color: #ccc;
      padding: 3rem;
      text-align: center;
    }

    footer a {
      color: #ccc;
      text-decoration: none;
      margin: 0 0.5rem;
    }

    footer a:hover {
      text-decoration: underline;
    }

    @media (max-width: 768px) {
      header h1 {
        font-size: 3rem;
      }

      header p {
        font-size: 1.3rem;
      }

      .intro {
        flex-direction: column;
        text-align: center;
      }

      .intro-image img {
        margin: 0 auto;
      }

      .intro-text p {
        font-size: 1.1rem;
      }
    }
  </style>
</head>
<body>

  <!-- Header Section -->
  <header>
    <h1>Welcome to DonorSphere</h1>
    <p>Connecting donors and patients to save lives, one donation at a time</p>
    <a href="#intro">Explore More</a>
  </header>

  <!-- Introduction Section -->
  <section id="intro" class="intro">
    <div class="intro-image">
      <img src="images/tanishi_23_05_01-removebg-preview.png" alt="Change a Life Through Donation">
    </div>
    <div class="intro-text">
      <h2>Change a Life Through Your Donation</h2>
      <p>
        Every drop counts. Join DonorSphere and take part in a movement that transforms lives through generosity. With just a few minutes of your time, you can make a lasting impact and bring hope to those in urgent need.
      </p>
      <div class="cta-section">
        <a href="#info-boxes" class="cta-button">Learn More</a>
        <a href="sign_up.php" class="cta-button">Sign Up</a>
      </div>
    </div>
  </section>

  <!-- Info Boxes Section -->
  <section id="info-boxes" class="info-boxes">
    <div class="info-box">
      <i class="fas fa-heartbeat"></i>
      <h3>Why Donate Blood?</h3>
      <p>Blood donation is a simple yet powerful way to save lives. A single donation can help multiple patients.</p>
    </div>

    <div class="info-box">
      <i class="fas fa-users"></i>
      <h3>How It Helps</h3>
      <p>Your donation can provide crucial support for surgeries, cancer treatments, accident victims, and more.</p>
    </div>

    <div class="info-box">
      <i class="fas fa-laptop-medical"></i>
      <h3>Technology at Work</h3>
      <p>Our system ensures that blood donations are tracked, stored, and distributed efficiently to those in need.</p>
    </div>
  </section>

  <!-- Facts and Myths Section -->
  <section class="facts-myths">
    <h2>Blood Donation: Facts vs. Myths</h2>
    <div class="myth-boxes">
      <div class="myth-box">
        <h3>Myth</h3>
        <p>"Donating blood hurts a lot."</p>
        <hr />
        <h4>Fact</h4>
        <p>The pain is minimal — just a quick pinch, and it’s over in seconds.</p>
      </div>
      <div class="myth-box">
        <h3>Myth</h3>
        <p>"I can’t donate because I’m not perfectly healthy."</p>
        <hr />
        <h4>Fact</h4>
        <p>Many minor conditions don’t disqualify you. A quick screening ensures your eligibility.</p>
      </div>
      <div class="myth-box">
        <h3>Myth</h3>
        <p>"I don’t have enough blood to spare."</p>
        <hr />
        <h4>Fact</h4>
        <p>The body replaces lost blood within 24–48 hours — you’re safe and healthy after donating.</p>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; 2025 DonorSphere | Empowering Blood Donation Everywhere</p>
  </footer>

</body>
</html>
