<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillpro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Process query parameters
$submitted = false;
$success_message = "";
$error_message = "";

// Check if query parameters exist (GET method)
if (isset($_GET['name']) && isset($_GET['email']) && isset($_GET['hotline']) && isset($_GET['message'])) {
    // Get data from query parameters
    $name = $conn->real_escape_string($_GET["name"]);
    $email = $conn->real_escape_string($_GET["email"]);
    $hotline = $conn->real_escape_string($_GET["hotline"]);
    $message = $conn->real_escape_string($_GET["message"]);
    
    // Insert query
    $sql = "INSERT INTO feedback (name, email, hotline, message, submitted_at) 
            VALUES ('$name', '$email', '$hotline', '$message', NOW())";
    
    // Execute query
    if ($conn->query($sql) === TRUE) {
        $submitted = true;
        $success_message = "Thank you for your feedback, $name!";
    } else {
        $error_message = "Error: " . $conn->error;
    }
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Feedback - SkillPro Institute</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #c2d8e6ff;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    img {
            width: 800px;
            height: auto;
            margin-top: 10px;
            border-radius: 60px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.4);
            animation: zoomIn 6s ease-in-out;
    }

    .feedback-box {
      background: #fff;
      padding: 30px;
      border-radius: 50px;
      box-shadow: 10px 20px rgba(59, 138, 228, 0.97);
      max-width: 500px;
      width: 100%;
    }
    h1 {
      color: #0b74da;
      margin-bottom: 20px;
      text-align: center;
    }
    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
    }
    input, textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
    }
    button {
      background: #0b74da;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: #240202ff;
    }
    .thank-you {
      text-align: center;
      color: green;
      font-weight: bold;
      font-size: 18px;
    }
    .error {
      text-align: center;
      color: red;
      font-weight: bold;
      font-size: 14px;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <img src="../image/21.jpeg" alt="feedback">
  <div class="feedback-box">
    <?php if (!empty($success_message)): ?>
      <div class="thank-you">
        ✅ <?php echo $success_message; ?>
      </div>
    <?php elseif (!empty($error_message)): ?>
      <div class="thank-you">
        ❌ <?php echo $error_message; ?>
      </div>
    <?php else: ?>
      <h1>Student Feedback</h1>
      <form method="GET" action="feedback.php">
        <label for="name">Full Name</label>
        <input type="text" id="name" name="name" placeholder="Your name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="example@domain.com" required>

        <label for="hotline">Hotline Number</label>
        <input type="tel" id="hotline" name="hotline" placeholder="071-1234567" required>

        <label for="message">Your Feedback</label>
        <textarea id="message" name="message" placeholder="Enter your feedback here..." required></textarea>

        <button type="submit">Submit</button>
      </form>
      
      <?php if (isset($_GET['test'])): ?>
        <div style="margin-top: 20px; padding: 10px; background: #f5f5f5; border-radius: 5px;">
          <h3>Query URL Example:</h3>
          <p>feedback.php?name=John&email=john@example.com&hotline=0711234567&message=Test+feedback</p>
        </div>
      <?php endif; ?>
    <?php endif; ?>
  </div>
</body>
</html>