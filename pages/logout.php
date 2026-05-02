<?php
// logout.php
session_start();

// Destroy all session data
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Logout - SkillPro Institute</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #1fc7b9ff;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }
    .logout-box {
      background: #fff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      text-align: center;
      max-width: 400px;
    }
    h1 {
      color: #0b74da;
      margin-bottom: 15px;
    }
    p {
      color: #555;
      margin-bottom: 20px;
    }
    .btn {
      background: #0b74da;
      color: white;
      padding: 10px 20px;
      border-radius: 6px;
      text-decoration: none;
      font-weight: bold;
      display: inline-block;
    }
    .btn:hover {
      background: #095ab1;
    }
  </style>
</head>
<body>
  <div class="logout-box">
    <h1>You have logged out</h1>
    <p>ඔබ system එකෙන් සාර්ථකව logout වුණා ✅</p>
    <a href="login.php" class="btn">Sign in</a>
  </div>
</body>
</html>
