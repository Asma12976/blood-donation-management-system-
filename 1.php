<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>About Us | DonorSphere</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      line-height: 1.6;
      color: #333;
      background-color: #f8f9fa;
    }

    header {
      background-color: #4287f5;
      color: white;
      padding: 20px;
      text-align: center;
    }

    header h1 {
      font-size: 2.5em;
    }

    .container {
      max-width: 1000px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .intro {
      text-align: center;
      margin-bottom: 40px;
    }

    .intro h2 {
      font-size: 2em;
      color: #4287f5;
      margin-bottom: 10px;
    }

    .intro p {
      font-size: 1.1em;
      color: #555;
    }

    .about-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 30px;
    }

    .card {
      background: white;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      transition: transform 0.3s;
    }

    .card:hover {
      transform: translateY(-5px);
    }

    .card h3 {
      color: #e63946;
      margin-bottom: 10px;
    }

    .card p {
      color: #666;
      font-size: 1em;
    }

    footer {
      background-color: #343a40;
      color: white;
      text-align: center;
      padding: 20px 0;
      margin-top: 40px;
    }

    footer p {
      margin: 5px;
    }
  </style>
</head>
<body>

  <header>
    <h1>About DonorSphere</h1>
    <p>Your trusted partner in saving lives through blood donation</p>
  </header>

  <div class="container">
    <div class="intro">
      <h2>Who We Are</h2>
      <p>
        DonorSphere is a modern, community-driven platform created to connect blood donors with those in urgent need.
        We make blood donation more accessible, efficient, and transparent for all.
      </p>
    </div>

    <div class="about-grid">
      <div class="card">
        <h3>Our Mission</h3>
        <p>
          To ensure no one faces a crisis due to lack of blood. We aim to simplify donation and matchmaking through
          technology and community outreach.
        </p>
      </div>

      <div class="card">
        <h3>What We Do</h3>
        <p>
          We register donors and patients, manage blood stock data, and help hospitals and families find matching blood donors in emergencies.
        </p>
      </div>

      <div class="card">
        <h3>How You Can Help</h3>
        <p>
          Sign up as a donor, spread awareness, or help patients find matches. Every action counts in saving lives.
        </p>
      </div>

      <div class="card">
        <h3>Join the Movement</h3>
        <p>
          Be part of a growing network of heroes. Your single donation can make the difference between life and death.
        </p>
      </div>
    </div>
  </div>

  <footer>
    <p>&copy; 2024 DonorSphere. All rights reserved.</p>
    <p>Contact us at contact@donorsphere.com</p>
  </footer>

</body>
</html>
