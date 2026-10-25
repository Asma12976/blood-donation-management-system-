<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BloodBank & Donor Management System - Admin Dashboard</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
    }
    .sidebar {
      width: 250px;
      background-color: #343a40;
      height: 100vh;
      position: fixed;
      top: 0;
      left: 0;
      color: #fff;
      padding-top: 20px;
      overflow-y: auto;
    }
    .sidebar h2 {
      text-align: center;
      font-size: 20px;
      margin-bottom: 30px;
    }
    .sidebar a, .sidebar button {
      display: block;
      color: #c2c7d0;
      padding: 12px 20px;
      text-decoration: none;
      font-size: 15px;
      background: none;
      border: none;
      width: 100%;
      text-align: left;
      cursor: pointer;
    }
    .sidebar a:hover, .sidebar button:hover {
      background-color: #495057;
      color: #fff;
    }
    .submenu {
      display: none;
      flex-direction: column;
      padding-left: 30px;
    }
    .submenu a {
      padding: 8px 20px;
      font-size: 14px;
    }
    .topbar {
      margin-left: 250px;
      height: 60px;
      background-color: #343a40;
      color: #fff;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 20px;
      position: relative;
      z-index: 10;
    }
    .brand-name {
      font-size: 18px;
      font-weight: bold;
    }
    .topbar img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      margin-right: 8px;
    }
    .main {
      margin-left: 250px;
      padding: 20px;
    }
    .dashboard-title {
      font-size: 32px;
      margin-bottom: 20px;
    }
    .card-container {
      display: flex;
      flex-wrap: wrap;
      gap: 20px;
      justify-content: space-between;
    }
    .card {
      background: #fff;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      flex: 1 1 calc(25% - 20px);
      min-height: 150px;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .card .number {
      font-size: 40px;
      margin-bottom: 10px;
      font-weight: bold;
    }
    .card .label {
      font-size: 16px;
    }
    .card-footer {
      width: 94%;
      background: #f1f1f1;
      padding: 10px;
      font-size: 14px;
      color: #6c757d;
      border-top: 1px solid #ddd;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    .card-footer i {
      font-size: 16px;
      margin-left: 5px;
    }
    .blue { background: #245580; color: #fff; }
    .green { background: #78C000; color: #fff; }
    .lightblue { background: #00B5E9; color: #fff; }

    /* Account Dropdown */
    .account-container {
      position: relative;
      display: flex;
      align-items: center;
      cursor: pointer;
      gap: 5px;
      user-select: none;
    }
    .account-text {
      display: flex;
      align-items: center;
      gap: 5px;
    }
    .account-dropdown {
      display: none;
      position: absolute;
      top: 60px;
      right: 0;
      background-color: #343a40;
      border: 1px solid #495057;
      min-width: 160px;
      flex-direction: column;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
      z-index: 100;
    }
    .account-dropdown a {
      color: #c2c7d0;
      padding: 12px 16px;
      text-decoration: none;
      font-size: 14px;
    }
    .account-dropdown a:hover {
      background-color: #495057;
      color: #fff;
    }
    .arrow {
      font-size: 14px;
      transition: transform 0.3s ease;
    }
    .rotate {
      transform: rotate(180deg);
    }

    /* Special card */
    .blood-request-card {
      flex: 1 1 100%;
      max-width: 320px;
    }
  </style>
</head>
<body>

<div class="sidebar">
  <a href="#"><span class="material-icons">dashboard</span> Dashboard</a>
  <button onclick="toggleSubMenu()"><span class="material-icons">folder</span> Blood Group</button>
  <div class="submenu" id="bloodSubMenu">
    <a href="#">Add Blood Group</a>
    <a href="#">Manage Blood Group</a>
  </div>
  <a href="#"><span class="material-icons">group</span> Donor List</a>
  <a href="#"><span class="material-icons">mail</span> Manage Contactus Query</a>
  <a href="#"><span class="material-icons">pages</span> Manage Pages</a>
  <a href="#"><span class="material-icons">contact_phone</span> Update Contact Info</a>
  <a href="#"><span class="material-icons">assignment</span> Blood Requests</a>
  <a href="#"><span class="material-icons">search</span> Search Blood Request</a>
</div>

<div class="topbar">
  <span class="brand-name">DonorSphere</span>
  <div class="account-container" id="accountContainer">
    <img src="images/download__3_-removebg-preview.png" alt="Account">
    <div class="account-text">
      <span>Account</span>
      <span class="arrow" id="arrow">^</span>
    </div>
    <div class="account-dropdown" id="accountDropdown">
      <a href="#">Profile</a>
      <a href="#">Change Password</a>
      <a href="#">Logout</a>
    </div>
  </div>
</div>

<div class="main">
  <div class="dashboard-title">Dashboard</div>
  <div class="card-container">
    <div class="card blue">
      <div class="number">6</div>
      <div class="label">LISTED BLOOD GROUPS</div>
      <div class="card-footer">FULL DETAIL <i class="material-icons">arrow_right_alt</i></div>
    </div>
    <div class="card green">
      <div class="number">7</div>
      <div class="label">REGISTERED BLOOD GROUP</div>
      <div class="card-footer">FULL DETAIL <i class="material-icons">arrow_right_alt</i></div>
    </div>
    <div class="card lightblue">
      <div class="number">0</div>
      <div class="label">TOTAL QUERIES</div>
      <div class="card-footer">FULL DETAIL <i class="material-icons">arrow_right_alt</i></div>
    </div>
    <div class="card lightblue blood-request-card">
      <div class="number">5</div>
      <div class="label">TOTAL BLOOD REQUEST RECEIVED</div>
      <div class="card-footer">FULL DETAIL <i class="material-icons">arrow_right_alt</i></div>
    </div>
  </div>
</div>

<script>
  function toggleSubMenu() {
    var submenu = document.getElementById("bloodSubMenu");
    submenu.style.display = submenu.style.display === "flex" ? "none" : "flex";
  }

  function toggleAccountDropdown() {
    var dropdown = document.getElementById("accountDropdown");
    var arrow = document.getElementById("arrow");
    if (dropdown.style.display === "flex") {
      dropdown.style.display = "none";
      arrow.classList.remove('rotate');
    } else {
      dropdown.style.display = "flex";
      arrow.classList.add('rotate');
    }
  }

  // Click outside to close the account dropdown
  document.addEventListener('click', function(event) {
    var accountContainer = document.getElementById('accountContainer');
    var dropdown = document.getElementById('accountDropdown');
    var arrow = document.getElementById('arrow');

    if (!accountContainer.contains(event.target)) {
      dropdown.style.display = 'none';
      arrow.classList.remove('rotate');
    }
  });

  // Prevent immediate closing when clicking inside accountContainer
  document.getElementById('accountContainer').addEventListener('click', function(event) {
    event.stopPropagation();
    toggleAccountDropdown();
  });
</script>

</body>
</html>
