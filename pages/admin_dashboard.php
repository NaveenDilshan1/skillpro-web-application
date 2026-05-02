<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --danger: #e74c3c;
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
        
        .stats-card.danger { border-left-color: var(--danger); }
        
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
                    <h4><i class="fas fa-user-cog me-2"></i>Admin Panel</h4>
                    <hr class="bg-light">
                </div>
                <nav class="nav flex-column">
                    <a class="nav-link active" href="#"><i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a class="nav-link" href="#"><i class="fas fa-users me-2"></i>User Management</a>
                    <a class="nav-link" href="#"><i class="fas fa-book me-2"></i>Course Management</a>
                    <a class="nav-link" href="#"><i class="fas fa-money-bill me-2"></i>Financial</a>
                    <a class="nav-link" href="#"><i class="fas fa-cog me-2"></i>System Settings</a>
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
                                <h3>Welcome back, Administrator!</h3>
                                <p class="mb-0">Manage your institute efficiently</p>
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
                                <h5>Total Users</h5>
                                <h2 class="text-primary">1,247</h2>
                                <small class="text-muted">+12% from last month</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Active Courses</h5>
                                <h2 class="text-success">48</h2>
                                <small class="text-muted">23 upcoming courses</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card">
                                <h5>Pending Approvals</h5>
                                <h2 class="text-warning">15</h2>
                                <small class="text-muted">Requires attention</small>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="stats-card danger">
                                <h5>Revenue</h5>
                                <h2 class="text-danger">LKR 2.5M</h2>
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
                            <button class="btn btn-primary"><i class="fas fa-plus me-2"></i>Add User</button>
                            <button class="btn btn-success"><i class="fas fa-book me-2"></i>Create Course</button>
                            <button class="btn btn-warning"><i class="fas fa-file-invoice me-2"></i>Generate Report</button>
                            <button class="btn btn-info"><i class="fas fa-bullhorn me-2"></i>Send Notice</button>
                            <button class="btn btn-danger"><i class="fas fa-cog me-2"></i>System Settings</button>
                        </div>
                    </div>

                    <!-- System Overview -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">Recent Users</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-sm">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Naveen Dilshan</td>
                                                    <td><span class="badge bg-primary">Student</span></td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                                                </tr>
                                                <tr>
                                                    <td>Kusal Perera</td>
                                                    <td><span class="badge bg-warning">Instructor</span></td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                                                </tr>
                                                <tr>
                                                    <td>Mike Johnson</td>
                                                    <td><span class="badge bg-danger">Admin</span></td>
                                                    <td><span class="badge bg-success">Active</span></td>
                                                    <td><button class="btn btn-sm btn-outline-primary">View</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="mb-0">System Status</h5>
                                </div>
                                <div class="card-body">
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Server Load</span>
                                            <span>65%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" style="width: 65%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Database Usage</span>
                                            <span>42%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" style="width: 42%"></div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-between mb-1">
                                            <span>Storage</span>
                                            <span>78%</span>
                                        </div>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" style="width: 78%"></div>
                                        </div>
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