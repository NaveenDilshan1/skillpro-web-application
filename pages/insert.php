<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillpro";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['enroll'])) {
    $name = $conn->real_escape_string($_POST["name"]);
    $email = $conn->real_escape_string($_POST["email"]);
    $phone = $conn->real_escape_string($_POST["phone"]);
    $course = $conn->real_escape_string($_POST["course"]);

    // First check if table exists, if not create it
    $table_check = $conn->query("SHOW TABLES LIKE 'enrollments'");
    if ($table_check->num_rows == 0) {
        $create_table = "CREATE TABLE enrollments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) NOT NULL,
            phone VARCHAR(20) NOT NULL,
            course VARCHAR(100) NOT NULL,
            enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        $conn->query($create_table);
    }

    // Insert enrollment data
    $sql = "INSERT INTO enrollments (name, email, phone, course) 
            VALUES ('$name', '$email', '$phone', '$course')";
    
    if ($conn->query($sql) === TRUE) {
        $enrollment_success = "Enrollment successful! Thank you, $name!";
    } else {
        $enrollment_error = "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enroll - SkillPro Institute</title>
    <style>
        .form-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 8px;
            border: 1px solid #68d0f0ff;
            border-radius: 5px;
        }
        button {
            background: #0b74da;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .error { color: red; }
        .success { color: green; }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Course Enrollment</h2>
        
        <?php if (isset($enrollment_success)): ?>
            <div class="success"><?php echo $enrollment_success; ?></div>
        <?php elseif (isset($enrollment_error)): ?>
            <div class="error"><?php echo $enrollment_error; ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="form-group">
                <label for="name">Full Name *</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div class="form-group">
                <label for="course">Select Course *</label>
                <select id="course" name="course" required>
                    <option value="">Please select a course</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Graphic Design">Graphic Design</option>
                    <option value="Digital Marketing">Digital Marketing</option>
                    <option value="Mobile App Development">Mobile App Development</option>
                </select>
            </div>

            <button type="submit" name="enroll">Enroll Now</button>
        </form>
    </div>
</body>
</html>