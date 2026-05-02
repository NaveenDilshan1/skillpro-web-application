<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructor Dashboard - SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --warning: #f39c12;
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
        
        .stats-card.warning { border-left-color: var(--warning); }
        
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
                    <h4><i class="fas fa-chalkboard-teacher me-2"></i>Instructor</h4>
                    <hr class="bg-light">
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a class="nav-link" href="#"><i class="fas fa-book me-2"></i>My Courses</a>
                    <a class="nav-link" href="#"><i class="fas fa-users me-2"></i>Students</a>
                    <a class="nav-link" href="#"><i class="fas fa-tasks me-2"></i>Assignments</a>
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
                                <h3>Welcome back, Instructor!</h3>
                                <p class="mb-0">Ready to share your knowledge?</p>
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
                                <h5>Total Courses</h5>
                                <h2 class="text-primary">8</h2>
                                <small class="text-muted">3 active courses</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Total Students</h5>
                                <h2 class="text-success">156</h2>
                                <small class="text-muted">+12 this month</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card warning">
                                <h5>Pending Grading</h5>
                                <h2 class="text-warning">23</h2>
                                <small class="text-muted">Assignments to review</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Earnings</h5>
                                <h2 class="text-info">LKR 125K</h2>
                                <small class="text-muted">This month</small>
                            </div>
                        </div>
                    </div>

                    <!-- Quick Actions -->
                    <div class="card mb-4">
                        <div class="card-header">
                            <h5 class="mb-0">Quick Actions</h5>
                        </div>
                        <div class="card-body">
                            <button class="btn btn-primary"><i class="fas fa-plus me-2"></i>Create Course</button>
                            <button class="btn btn-success"><i class="fas fa-tasks me-2"></i>Grade Assignments</button>
                            <button class="btn btn-warning"><i class="fas fa-calendar me-2"></i>Schedule Class</button>
                            <button class="btn btn-info"><i class="fas fa-chart-line me-2"></i>View Analytics</button>
                        </div>
                    </div>

                    <!-- My Courses -->
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">My Courses</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Course Name</th>
                                            <th>Students</th>
                                            <th>Status</th>
                                            <th>Progress</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Web Development Fundamentals</td>
                                            <td>45</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 75%">75%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Manage</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Advanced JavaScript</td>
                                            <td>32</td>
                                            <td><span class="badge bg-success">Active</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 60%">60%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Manage</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>React Masterclass</td>
                                            <td>18</td>
                                            <td><span class="badge bg-warning">Upcoming</span></td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar" style="width: 0%">0%</div>
                                                </div>
                                            </td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-primary">Setup</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
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