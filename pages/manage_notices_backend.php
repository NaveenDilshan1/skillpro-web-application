<?php
// manage_notices_backend.php
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

// Get action from request
$action = $_POST['action'] ?? '';

if ($action == 'get_notices') {
    // Get all active notices
    $sql = "SELECT * FROM notices WHERE status = 'active' ORDER BY date_created DESC";
    $result = $conn->query($sql);
    
    $notices = [];
    while ($row = $result->fetch_assoc()) {
        $notices[] = $row;
    }
    
    echo json_encode(['success' => true, 'notices' => $notices]);
    
} elseif ($action == 'save_notice') {
    // Save new notice
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $priority = $conn->real_escape_string($_POST['priority']);
    $expiry_date = $_POST['expiry_date'] ? $conn->real_escape_string($_POST['expiry_date']) : 'NULL';
    $audience = $conn->real_escape_string($_POST['audience']);
    $created_by = $conn->real_escape_string($_POST['created_by']);
    
    $sql = "INSERT INTO notices (title, content, priority, date_created, expiry_date, audience, created_by) 
            VALUES ('$title', '$content', '$priority', CURDATE(), $expiry_date, '$audience', '$created_by')";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Notice saved successfully', 'id' => $conn->insert_id]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error saving notice: ' . $conn->error]);
    }
    
} elseif ($action == 'update_notice') {
    // Update existing notice
    $id = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $priority = $conn->real_escape_string($_POST['priority']);
    $expiry_date = $_POST['expiry_date'] ? "'" . $conn->real_escape_string($_POST['expiry_date']) . "'" : 'NULL';
    $audience = $conn->real_escape_string($_POST['audience']);
    
    $sql = "UPDATE notices SET 
            title = '$title', 
            content = '$content', 
            priority = '$priority', 
            expiry_date = $expiry_date, 
            audience = '$audience',
            updated_at = CURRENT_TIMESTAMP 
            WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Notice updated successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error updating notice: ' . $conn->error]);
    }
    
} elseif ($action == 'delete_notice') {
    // Delete notice (soft delete by setting status to inactive)
    $id = intval($_POST['id']);
    
    $sql = "UPDATE notices SET status = 'inactive' WHERE id = $id";
    
    if ($conn->query($sql) === TRUE) {
        echo json_encode(['success' => true, 'message' => 'Notice deleted successfully']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Error deleting notice: ' . $conn->error]);
    }
}

$conn->close();
?>