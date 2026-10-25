<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>DonorSphere</title>
  <style>
    body {
      font-family: sans-serif;
      margin: 0;
      padding-top: 60px; /* Push content below the fixed header */
      display: flex;
      flex-direction: column;
    }

    .header {
      background-color: #f00;
      color: white;
      padding: 0px 30px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      width: 100%;
      position: fixed;
      top: 0;
      left: 0;
      z-index: 1000;
      height: 60px;
      box-sizing: border-box;
    }

    .logout-btn {
      background-color: black;
      color: white;
      border: none;
      padding: 8px 16px;
      cursor: pointer;
      border-radius: 4px;
      font-size: 14px;
      font-weight: bold; 
    }

    .logout-btn:hover {
      background-color: #333;
    }

    .main-container {
      display: flex;
    }

    .sidebar {
      width: 200px;
      background-color: #333;
      color: white;
      padding: 20px;
      height: calc(100vh - 60px); /* Subtract header height */
      box-sizing: border-box;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
    }

    .sidebar li {
      padding: 10px 0;
      cursor: pointer;
    }

    .sidebar li:hover {
      background-color: #555;
    }

    .content {
      flex: 1;
      padding: 20px;
    }

    .dashboard-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 20px;
    }

    .dashboard-item {
      background-color: #f9f9f9;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .dashboard-item h2 {
      margin-bottom: 10px;
      color: #f00;
    }

    .dashboard-item p {
      font-size: 2em;
      margin: 0;
    }

    .footer-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 20px;
      margin-top: 20px;
    }

    .footer-item {
      background-color: #f9f9f9;
      padding: 20px;
      text-align: center;
      border-radius: 5px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .footer-item h3 {
      margin-bottom: 10px;
    }

    .footer-item p {
      font-size: 1.5em;
      margin: 0;
    }
  </style>
</head>
<body>

  <!-- Header -->
  <div class="header">
    <h1>DonorSphere</h1>
    <button class="logout-btn">Logout</button>
  </div>

  <!-- Sidebar + Main Content -->
  <div class="main-container">
    <div class="sidebar">
      <ul>
        <li>Home</li>
        <li>Donor</li>
        <li>Patient</li>
        <li>Donations</li>
        <li>Blood Requests</li>
        <li>Request History</li>
        <li>Blood Stock</li>
      </ul>
    </div>

    <div class="content">
      <div class="dashboard-grid">
        <div class="dashboard-item">
          <h2>A+ <span style="color: red;">🩸</span></h2>
          <p>1</p>
        </div>
        <div class="dashboard-item">
          <h2>B+ <span style="color: red;">🩸</span></h2>
          <p>2</p>
        </div>
        <div class="dashboard-item">
          <h2>O+ <span style="color: red;">🩸</span></h2>
          <p>37</p>
        </div>
        <div class="dashboard-item">
          <h2>AB+ <span style="color: red;">🩸</span></h2>
          <p>8</p>
        </div>
        <div class="dashboard-item">
          <h2>A- <span style="color: red;">🩸</span></h2>
          <p>7</p>
        </div>
        <div class="dashboard-item">
          <h2>B- <span style="color: red;">🩸</span></h2>
          <p>1</p>
        </div>
        <div class="dashboard-item">
          <h2>O- <span style="color: red;">🩸</span></h2>
          <p>10</p>
        </div>
        <div class="dashboard-item">
          <h2>AB- <span style="color: red;">🩸</span></h2>
          <p>32</p>
        </div>
      </div>

      <div class="footer-grid">
        <div class="footer-item">
          <h3>Total Donors <span style="color: blue;">👥</span></h3>
          <p>3</p>
        </div>
        <div class="footer-item">
          <h3>Total Requests <span style="color: blue;">⚙️</span></h3>
          <p>3</p>
        </div>
        <div class="footer-item">
          <h3>Approved Requests <span style="color: green;">✔️</span></h3>
          <p>2</p>
        </div>
        <div class="footer-item">
          <h3>Total Blood Unit (in ml) <span style="color: purple;">💤</span></h3>
          <p>98</p>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
