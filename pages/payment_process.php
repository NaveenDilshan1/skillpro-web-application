<?php
// payment_process.php
header('Content-Type: application/json');

// Database configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skillpro";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Database connection failed']));
}

if ($_POST['action'] == 'process_payment') {
    // Get form data
    $transaction_id = 'TXN' . time() . rand(1000, 9999);
    $student_name = $conn->real_escape_string($_POST['student_name']);
    $student_id = $conn->real_escape_string($_POST['student_id']);
    $student_email = $conn->real_escape_string($_POST['student_email']);
    $course_name = $conn->real_escape_string($_POST['course_name']);
    $amount = floatval($_POST['amount']);
    $payment_method = $conn->real_escape_string($_POST['payment_method']);
    
    // Insert payment into database
    $sql = "INSERT INTO payments (transaction_id, student_name, student_id, student_email, course_name, amount, payment_method, payment_status) 
            VALUES ('$transaction_id', '$student_name', '$student_id', '$student_email', '$course_name', $amount, '$payment_method', 'completed')";
    
    if ($conn->query($sql) === TRUE) {
        $payment_id = $conn->insert_id;
        
        // Insert into payment history
        $history_sql = "INSERT INTO payment_history (payment_id, status, description) 
                       VALUES ($payment_id, 'completed', 'Online payment for $course_name')";
        $conn->query($history_sql);
        
        echo json_encode([
            'success' => true,
            'transaction_id' => $transaction_id,
            'payment_id' => $payment_id,
            'message' => 'Payment processed successfully'
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Error processing payment: ' . $conn->error
        ]);
    }
}

$conn->close();
?>