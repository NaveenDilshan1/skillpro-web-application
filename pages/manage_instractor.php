<?php
// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "skillpro";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add new instructor
if (isset($_POST['add_instructor'])) {
    $name = $_POST['name'];
    $education = $_POST['education'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $experience = $_POST['experience'];
    $image = $_POST['image'];
    
    $sql = "INSERT INTO instructors (name, education, specialization, email, phone, experience, image) 
            VALUES ('$name', '$education', '$specialization', '$email', '$phone', '$experience', '$image')";
    
    if ($conn->query($sql) === TRUE) {
        $success = "Instructor added successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Delete instructor
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $sql = "DELETE FROM instructors WHERE id = $delete_id";
    
    if ($conn->query($sql) === TRUE) {
        $success = "Instructor deleted successfully!";
    } else {
        $error = "Error deleting instructor: " . $conn->error;
    }
}

// Fetch all instructors
$sql = "SELECT * FROM instructors";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Instructors</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .instructor-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 15px;
            width: 300px;
            display: inline-block;
            vertical-align: top;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .instructor-card img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
        .action-buttons {
            margin-top: 15px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">Manage Instructors</h2>

    <a href="../pages/dashboard.php" class="btn btn-secondary mb-3">← Back to Dashboard</a>

    <!-- Add Instructor Form -->
    <div class="card mb-4">
        <div class="card-header">
            <h5 class="mb-0">Add New Instructor</h5>
        </div>
        <div class="card-body">
            <?php if (isset($success)): ?>
                <div class="alert alert-success"><?php echo $success; ?></div>
            <?php endif; ?>
            <?php if (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>
            
            <form method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Education</label>
                            <input type="text" class="form-control" name="education" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Specialization</label>
                            <input type="text" class="form-control" name="specialization" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Experience</label>
                            <input type="text" class="form-control" name="experience" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image URL</label>
                            <input type="text" class="form-control" name="image" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="add_instructor" class="btn btn-primary">Add Instructor</button>
            </form>
        </div>
    </div>

    

</script>
</body>
</html>