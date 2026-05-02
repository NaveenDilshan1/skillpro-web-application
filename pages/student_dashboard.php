<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard - SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --success: #2ecc71;
        }
        
        .sidebar {
            background: var(--primary);
            color: white;
            min-height: 100vh;
            padding: 0;
        }
        
        .sidebar .nav-link {
            color: white;
            padding: 15px 20px;
            border-left: 4px solid transparent;
        }
        
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            border-left-color: var(--secondary);
        }
        
        .main-content {
            background: #f8f9fa;
            min-height: 100vh;
        }
        
        .stats-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 3px 10px rgba(0,0,0,0.1);
            border-left: 4px solid var(--secondary);
        }
        
        .user-welcome {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 col-lg-2 sidebar">
                <div class="p-3">
                    <h4><i class="fas fa-graduation-cap me-2"></i>SkillPro</h4>
                    <hr class="bg-light">
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a class="nav-link" href="courses.php"><i class="fas fa-book me-2"></i>My Courses</a>
                    <a class="nav-link" href="#"><i class="fas fa-calendar me-2"></i>Schedule</a>
                    <a class="nav-link" href="#"><i class="fas fa-file-invoice me-2"></i>Payments</a>
                    <a class="nav-link" href="#"><i class="fas fa-certificate me-2"></i>Certificates</a>
                    <a class="nav-link" href="#"><i class="fas fa-user me-2"></i>Profile</a>
                    <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                </nav>
            </div>

            <!-- Main Content -->
            <div class="col-md-9 col-lg-10 main-content">
                <div class="p-4">
                    <!-- Welcome Section -->
                    <div class="user-welcome">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h3>Welcome back, Student!</h3>
                                <p class="mb-0">Ready to continue your learning journey?</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <div class="btn-group">
                                    <button class="btn btn-light"><i class="fas fa-bell"></i></button>
                                    <button class="btn btn-light"><i class="fas fa-cog"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Stats Cards -->
                    <div class="row mb-4">
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Enrolled Courses</h5>
                                <h2 class="text-primary">3</h2>
                                <small class="text-muted">Active enrollments</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Completed</h5>
                                <h2 class="text-success">1</h2>
                                <small class="text-muted">Courses finished</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Assignments</h5>
                                <h2 class="text-warning">5</h2>
                                <small class="text-muted">Pending work</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Certificates</h5>
                                <h2 class="text-info">2</h2>
                                <small class="text-muted">Earned</small>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activity -->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Activity</h5>
                                </div>
                                <div class="card-body">
                                    <div class="list-group">
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">Web Development Course</h6>
                                                <small>2 hours ago</small>
                                            </div>
                                            <p class="mb-1">Completed Chapter 3: HTML & CSS Fundamentals</p>
                                        </div>
                                        <div class="list-group-item">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h6 class="mb-1">New Assignment</h6>
                                                <small>1 day ago</small>
                                            </div>
                                            <p class="mb-1">JavaScript Basics assignment due in 3 days</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Upcoming Events</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <strong>Web Development Exam</strong><br>
                                        <small class="text-muted">Oct 25, 2023 • 9:00 AM</small>
                                    </div>
                                    <div class="mb-3">
                                        <strong>Python Workshop</strong><br>
                                        <small class="text-muted">Oct 28, 2023 • 2:00 PM</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>