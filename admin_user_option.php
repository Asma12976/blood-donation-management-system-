<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Welcome to DonorSphere</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(120deg, #ffffff, #ffe6e6);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .container {
      display: flex;
      width: 90%;
      max-width: 1150px;
      height: 550px;
      border-radius: 16px;
      box-shadow: 0 8px 24px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      background-color: #fff;
    }

    .left-side {
      flex: 1;
      background-color: #fff5f5;
      padding: 50px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }

    .left-side h1 {
      font-size: 38px;
      margin-bottom: 20px;
      color: #b71c1c;
    }

    .left-side h3 {
      font-size: 22px;
      margin-bottom: 20px;
      color: #d32f2f;
    }

    .left-side p {
      font-size: 17px;
      line-height: 1.7;
      color: #444;
      margin-bottom: 35px;
    }

    .buttons {
      display: flex;
      gap: 20px;
    }

    .buttons a {
      text-decoration: none;
      background-color: #b71c1c;
      color: #fff;
      padding: 12px 30px;
      border-radius: 8px;
      font-weight: bold;
      transition: all 0.3s ease;
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.15);
    }

    .buttons a:hover {
      background-color: #8b0000;
      transform: scale(1.05);
    }

    .right-side {
      flex: 1;
      background-color: #fff;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 20px;
    }

    .right-side img {
      max-width: 90%;
      height: auto;
      border-radius: 12px;
      animation: float 3s ease-in-out infinite alternate;
    }

    @keyframes float {
      0% { transform: translateY(0); }
      100% { transform: translateY(-5px); }
    }

    @media (max-width: 768px) {
      .container {
        flex-direction: column;
        height: auto;
      }

      .left-side, .right-side {
        width: 100%;
        text-align: center;
        padding: 30px 20px;
      }

      .left-side h1 {
        font-size: 30px;
      }

      .left-side h3 {
        font-size: 20px;
      }

      .left-side p {
        font-size: 16px;
      }

      .buttons {
        flex-direction: column;
        gap: 15px;
        align-items: center;
      }

      .right-side img {
        max-width: 80%;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="left-side">
      <h1>Welcome to DonorSphere</h1>
      <h3>A Blood Donation Management System</h3>
      <p>
        DonorSphere is your platform for life-saving connections. Whether you're a donor 
        ready to give the gift of life, or an admin managing blood supplies and requests – 
        this platform is built for you. Let's make a difference together.
      </p>
      <div class="buttons">
        <a href="sign_up.php">User</a>
        <a href="admin_login.php">Admin</a>
      </div>
    </div>
    <div class="right-side">
      <img src="images/tanishi_23_05_01.jpg" alt="Blood Donation Image" />
    </div>
  </div>
</body>
</html>
