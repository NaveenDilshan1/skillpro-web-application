<?php
session_start();
if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$host = "localhost";
$user = "root";
$password = "";
$dbname = "skillpro";

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get user data
$user_sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($user_sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$user_result = $stmt->get_result();
$user_data = $user_result->fetch_assoc();

// Get user statistics
$stats_sql = "SELECT 
    (SELECT COUNT(*) FROM student_courses WHERE student_id = ?) as course_count,
    (SELECT COUNT(*) FROM certificates WHERE student_id = ?) as cert_count,
    (SELECT COUNT(*) FROM certificates WHERE student_id = ? AND grade = 'A+') as a_plus_count";
$stmt = $conn->prepare($stats_sql);
$stmt->bind_param("iii", $_SESSION['user_id'], $_SESSION['user_id'], $_SESSION['user_id']);
$stmt->execute();
$stats_result = $stmt->get_result();
$stats = $stats_result->fetch_assoc();

$success = "";
$error = "";

// Update profile
if (isset($_POST['update_profile'])) {
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    
    if (empty($full_name) || empty($email)) {
        $error = "Full name and email are required!";
    } else {
        $update_sql = "UPDATE users SET full_name = ?, email = ?, phone = ? WHERE id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sssi", $full_name, $email, $phone, $_SESSION['user_id']);
        
        if ($stmt->execute()) {
            $success = "Profile updated successfully!";
            $_SESSION['full_name'] = $full_name;
            // Refresh user data
            $user_data['full_name'] = $full_name;
            $user_data['email'] = $email;
            $user_data['phone'] = $phone;
        } else {
            $error = "Error updating profile: " . $conn->error;
        }
        $stmt->close();
    }
}

// Change password
if (isset($_POST['change_password'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $error = "All password fields are required!";
    } elseif ($new_password !== $confirm_password) {
        $error = "New passwords do not match!";
    } elseif (strlen($new_password) < 6) {
        $error = "New password must be at least 6 characters long!";
    } else {
        // Verify current password
        if (password_verify($current_password, $user_data['password'])) {
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $update_sql = "UPDATE users SET password = ? WHERE id = ?";
            $stmt = $conn->prepare($update_sql);
            $stmt->bind_param("si", $hashed_password, $_SESSION['user_id']);
            
            if ($stmt->execute()) {
                $success = "Password changed successfully!";
            } else {
                $error = "Error changing password: " . $conn->error;
            }
            $stmt->close();
        } else {
            $error = "Current password is incorrect!";
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - SkillPro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
    <style>
        .profile-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 40px 0;
            margin-bottom: 30px;
        }
        .profile-card {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            border: none;
        }
        .profile-sidebar {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 30px;
            text-align: center;
        }
        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            border: 5px solid rgba(255,255,255,0.2);
        }
        .profile-avatar i {
            font-size: 3rem;
        }
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            text-align: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .stats-number {
            font-size: 2rem;
            font-weight: bold;
            color: #007bff;
            margin-bottom: 5px;
        }
        .nav-pills .nav-link {
            color: #bdc3c7;
            margin: 5px 0;
            border-radius: 5px;
        }
        .nav-pills .nav-link.active {
            background: #3498db;
            color: white;
        }
        .nav-pills .nav-link:hover {
            background: #34495e;
            color: white;
        }
        .tab-content {
            padding: 30px;
        }
        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
        }
        .section-title {
            border-left: 5px solid #007bff;
            padding-left: 15px;
            margin: 0 0 20px 0;
        }
        .badge-user-type {
            font-size: 0.8rem;
            padding: 5px 10px;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="student_dashboard.php">
                <i class="fas fa-user-graduate"></i> SkillPro Student
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="student_dashboard.php">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_courses.php">
                            <i class="fas fa-book"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_certificates.php">
                            <i class="fas fa-certificate"></i> Certificates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="profile.php">
                            <i class="fas fa-user"></i> Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link text-danger">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <div class="profile-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-user-cog"></i> My Profile</h1>
                    <p class="lead mb-0">Manage your account settings and preferences</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="bg-white text-dark rounded p-3 d-inline-block">
                        <small class="text-muted">Member Since</small>
                        <br>
                        <strong><?php echo date('M Y', strtotime($user_data['created_at'])); ?></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="profile-card">
                    <div class="profile-sidebar">
                        <div class="profile-avatar">
                            <i class="fas fa-user"></i>
                        </div>
                        <h4><?php echo $user_data['full_name']; ?></h4>
                        <p class="text-muted">@<?php echo $user_data['username']; ?></p>
                        <span class="badge badge-user-type 
                            <?php 
                                if($user_data['user_type'] == 'student') echo 'bg-success';
                                elseif($user_data['user_type'] == 'instructor') echo 'bg-primary';
                                else echo 'bg-warning';
                            ?>">
                            <?php echo ucfirst($user_data['user_type']); ?>
                        </span>
                        
                        <div class="mt-4">
                            <div class="stats-card">
                                <div class="stats-number"><?php echo $stats['course_count']; ?></div>
                                <small>Enrolled Courses</small>
                            </div>
                            <div class="stats-card">
                                <div class="stats-number"><?php echo $stats['cert_count']; ?></div>
                                <small>Certificates</small>
                            </div>
                            <div class="stats-card">
                                <div class="stats-number"><?php echo $stats['a_plus_count']; ?></div>
                                <small>A+ Grades</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div class="profile-card">
                    <div class="card-body">
                        <h6 class="section-title">Quick Links</h6>
                        <div class="list-group">
                            <a href="student_dashboard.php" class="list-group-item list-group-item-action">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                            <a href="my_courses.php" class="list-group-item list-group-item-action">
                                <i class="fas fa-book me-2"></i>My Courses
                            </a>
                            <a href="my_certificates.php" class="list-group-item list-group-item-action">
                                <i class="fas fa-certificate me-2"></i>My Certificates
                            </a>
                            <a href="settings.php" class="list-group-item list-group-item-action">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-8">
                <div class="profile-card">
                    <!-- Navigation Tabs -->
                    <ul class="nav nav-pills mb-3" id="profileTabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="profile-tab" data-bs-toggle="pill" data-bs-target="#profile" type="button">
                                <i class="fas fa-user-edit"></i> Edit Profile
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="password-tab" data-bs-toggle="pill" data-bs-target="#password" type="button">
                                <i class="fas fa-lock"></i> Change Password
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="preferences-tab" data-bs-toggle="pill" data-bs-target="#preferences" type="button">
                                <i class="fas fa-cog"></i> Preferences
                            </button>
                        </li>
                    </ul>

                    <!-- Tab Content -->
                    <div class="tab-content" id="profileTabsContent">
                        <!-- Alerts -->
                        <?php if ($success): ?>
                            <div class="alert alert-success alert-dismissible fade show">
                                <?php echo $success; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>
                        
                        <?php if ($error): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <?php echo $error; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        <?php endif; ?>

                        <!-- Edit Profile Tab -->
                        <div class="tab-pane fade show active" id="profile" role="tabpanel">
                            <h4 class="section-title">Personal Information</h4>
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" class="form-control" name="full_name" 
                                               value="<?php echo $user_data['full_name']; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" value="<?php echo $user_data['username']; ?>" disabled>
                                        <small class="text-muted">Username cannot be changed</small>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" name="email" 
                                               value="<?php echo $user_data['email']; ?>" required>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" 
                                               value="<?php echo $user_data['phone'] ?: ''; ?>">
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">User Type</label>
                                        <input type="text" class="form-control" value="<?php echo ucfirst($user_data['user_type']); ?>" disabled>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Member Since</label>
                                        <input type="text" class="form-control" 
                                               value="<?php echo date('F j, Y', strtotime($user_data['created_at'])); ?>" disabled>
                                    </div>
                                </div>
                                
                                <button type="submit" name="update_profile" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Update Profile
                                </button>
                            </form>
                        </div>

                        <!-- Change Password Tab -->
                        <div class="tab-pane fade" id="password" role="tabpanel">
                            <h4 class="section-title">Change Password</h4>
                            <form method="POST" action="">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Current Password *</label>
                                        <input type="password" class="form-control" name="current_password" required>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">New Password *</label>
                                        <input type="password" class="form-control" name="new_password" required minlength="6">
                                        <small class="text-muted">Minimum 6 characters</small>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label class="form-label">Confirm New Password *</label>
                                        <input type="password" class="form-control" name="confirm_password" required>
                                    </div>
                                </div>
                                
                                <button type="submit" name="change_password" class="btn btn-primary">
                                    <i class="fas fa-key"></i> Change Password
                                </button>
                            </form>
                            
                            <div class="mt-4">
                                <h6>Password Requirements:</h6>
                                <ul class="text-muted">
                                    <li>Minimum 6 characters long</li>
                                    <li>Should contain letters and numbers</li>
                                    <li>Avoid using common words</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Preferences Tab -->
                        <div class="tab-pane fade" id="preferences" role="tabpanel">
                            <h4 class="section-title">Account Preferences</h4>
                            <form>
                                <div class="mb-3">
                                    <label class="form-label">Email Notifications</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifyCourses" checked>
                                        <label class="form-check-label" for="notifyCourses">
                                            New courses and updates
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifyCertificates" checked>
                                        <label class="form-check-label" for="notifyCertificates">
                                            Certificate availability
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="notifyPromotions">
                                        <label class="form-check-label" for="notifyPromotions">
                                            Promotional offers
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Language Preference</label>
                                    <select class="form-select">
                                        <option selected>English</option>
                                        <option>Sinhala</option>
                                        <option>Tamil</option>
                                    </select>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Time Zone</label>
                                    <select class="form-select">
                                        <option selected>(GMT+5:30) Sri Lanka Time</option>
                                        <option>(GMT+0:00) UTC</option>
                                    </select>
                                </div>
                                
                                <button type="button" class="btn btn-primary">
                                    <i class="fas fa-save"></i> Save Preferences
                                </button>
                            </form>
                            
                            <hr class="my-4">
                            
                            <h6 class="text-danger">Danger Zone</h6>
                            <div class="alert alert-warning">
                                <h6><i class="fas fa-exclamation-triangle"></i> Warning</h6>
                                <p class="mb-2">These actions are irreversible. Please proceed with caution.</p>
                                <button class="btn btn-outline-danger btn-sm me-2">
                                    <i class="fas fa-file-export"></i> Export Data
                                </button>
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure? This cannot be undone!')">
                                    <i class="fas fa-user-slash"></i> Delete Account
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white mt-5 py-4">
        <div class="container text-center">
            <p>&copy; 2024 SkillPro Learning Platform. All rights reserved.</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto hide alerts after 5 seconds
        setTimeout(function() {
            var alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                alert.style.display = 'none';
            });
        }, 5000);

        // Tab functionality
        const triggerTabList = document.querySelectorAll('#profileTabs button');
        triggerTabList.forEach(triggerEl => {
            const tabTrigger = new bootstrap.Tab(triggerEl);
            triggerEl.addEventListener('click', event => {
                event.preventDefault();
                tabTrigger.show();
            });
        });
    </script>
</body>
</html>