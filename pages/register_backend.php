<?php
// register_backend.php
session_start();
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "skillpro";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed: ' . $conn->connect_error]));
}

if ($_POST) {
    // Get form data
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $conn->real_escape_string($_POST['role']);
    $firstName = $conn->real_escape_string($_POST['first_name']);
    $lastName = $conn->real_escape_string($_POST['last_name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $dob = !empty($_POST['date_of_birth']) ? $conn->real_escape_string($_POST['date_of_birth']) : NULL;
    $address = $conn->real_escape_string($_POST['address']);

    // Check if username or email already exists
    $check_sql = "SELECT id FROM users WHERE username = '$username' OR email = '$email'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        echo json_encode(['success' => false, 'message' => 'Username or email already exists']);
        exit;
    }

    // Insert into users table
    $sql = "INSERT INTO users (username, email, password_hash, role, first_name, last_name, phone, date_of_birth, address, status) 
            VALUES ('$username', '$email', '$password', '$role', '$firstName', '$lastName', '$phone', '$dob', '$address', 'active')";

    if ($conn->query($sql) === TRUE) {
        $user_id = $conn->insert_id;
        
        // Insert role-specific data
        if ($role == 'student') {
            $education_level = $conn->real_escape_string($_POST['education_level']);
            $guardian_name = $conn->real_escape_string($_POST['guardian_name']);
            $student_id = 'STU' . str_pad($user_id, 6, '0', STR_PAD_LEFT);
            
            $student_sql = "INSERT INTO students (user_id, student_id, guardian_name, previous_education) 
                           VALUES ($user_id, '$student_id', '$guardian_name', '$education_level')";
            $conn->query($student_sql);
            
        } elseif ($role == 'instructor') {
            $specialization = $conn->real_escape_string($_POST['specialization']);
            $experience = $conn->real_escape_string($_POST['experience']);
            $qualifications = $conn->real_escape_string($_POST['qualifications']);
            
            $instructor_sql = "INSERT INTO instructors (user_id, specialization, experience, qualifications) 
                              VALUES ($user_id, '$specialization', '$experience', '$qualifications')";
            $conn->query($instructor_sql);
            
        } elseif ($role == 'admin') {
            $department = $conn->real_escape_string($_POST['department']);
            $position = $conn->real_escape_string($_POST['position']);
            
            $admin_sql = "INSERT INTO admin_profiles (user_id, department, position, permissions) 
                         VALUES ($user_id, '$department', '$position', 'all')";
            $conn->query($admin_sql);
        }
        
        echo json_encode([
            'success' => true, 
            'message' => 'Registration completed successfully. You can now login to your account.',
            'user_id' => $user_id,
            'role' => $role
        ]);
        
    } else {
        echo json_encode(['success' => false, 'message' => 'Error: ' . $conn->error]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No data received']);
}

$conn->close();
?>