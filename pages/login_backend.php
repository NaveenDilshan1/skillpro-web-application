<?php
// login_backend.php
session_start();
header('Content-Type: application/json');

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "skillpro";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if ($_POST) {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Check user in database
    $sql = "SELECT * FROM users WHERE (username = '$username' OR email = '$username') AND status = 'active'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        if (password_verify($password, $user['password_hash'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            
            // Redirect based on role
            switch($user['role']) {
                case 'admin':
                    $redirect = 'admin_dashboard.php';
                    break;
                case 'instructor':
                    $redirect = 'instructor_dashboard.php';
                    break;
                case 'student':
                    $redirect = 'student_dashboard.php';
                    break;
                default:
                    $redirect = 'index.php';
            }
            
            echo json_encode([
                'success' => true, 
                'message' => 'Login successful',
                'redirect' => $redirect,
                'role' => $user['role']
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'User not found or inactive']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No data received']);
}

$conn->close();
?>