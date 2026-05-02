<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['user_type'] != 'student') {
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

// Get student's enrolled courses
$courses_sql = "SELECT * FROM student_courses WHERE student_id = ? ORDER BY enrolled_date DESC";
$stmt = $conn->prepare($courses_sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$courses_result = $stmt->get_result();

// Get available courses for enrollment
$available_sql = "SELECT * FROM courses WHERE status = 'active'";
$available_result = $conn->query($available_sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Courses - SkillPro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
    <style>
        .course-card {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
        }
        .course-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .course-header {
            padding: 20px;
            color: white;
            text-align: center;
        }
        .web-dev { background: linear-gradient(135deg, #667eea, #764ba2); }
        .python { background: linear-gradient(135deg, #4facfe, #00f2fe); }
        .data-science { background: linear-gradient(135deg, #43e97b, #38f9d7); }
        .mobile { background: linear-gradient(135deg, #fa709a, #fee140); }
        .ai { background: linear-gradient(135deg, #a8edea, #fed6e3); }
        .cyber { background: linear-gradient(135deg, #ff9a9e, #fecfef); }
        
        .progress {
            height: 8px;
            margin: 15px 0;
        }
        .course-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .badge-completed {
            background: #28a745;
        }
        .badge-ongoing {
            background: #ffc107;
            color: #000;
        }
        .badge-new {
            background: #17a2b8;
        }
        .action-btn {
            margin: 2px;
        }
        .section-title {
            border-left: 5px solid #007bff;
            padding-left: 15px;
            margin: 30px 0 20px 0;
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
                        <a class="nav-link active" href="my_courses.php">
                            <i class="fas fa-book"></i> My Courses
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="my_certificates.php">
                            <i class="fas fa-certificate"></i> Certificates
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">
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
    <div class="bg-primary text-white py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1><i class="fas fa-book-open"></i> My Courses</h1>
                    <p class="lead mb-0">Manage your learning journey and track your progress</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="bg-white text-dark rounded p-3 d-inline-block">
                        <small class="text-muted">Enrolled Courses</small>
                        <br>
                        <strong><?php echo $courses_result->num_rows; ?> Courses</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Enrolled Courses -->
        <h3 class="section-title">My Enrolled Courses</h3>
        
        <?php if ($courses_result->num_rows > 0): ?>
            <div class="row">
                <?php while($course = $courses_result->fetch_assoc()): 
                    $progress = $course['progress'];
                    $status_class = $progress == 100 ? 'badge-completed' : ($progress > 0 ? 'badge-ongoing' : 'badge-new');
                    $status_text = $progress == 100 ? 'Completed' : ($progress > 0 ? 'In Progress' : 'Not Started');
                    $course_class = strtolower(str_replace(' ', '-', $course['course_name']));
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card course-card">
                        <div class="course-header <?php echo $course_class; ?>">
                            <i class="fas fa-laptop-code course-icon"></i>
                            <h5 class="card-title mb-0"><?php echo $course['course_name']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge <?php echo $status_class; ?>"><?php echo $status_text; ?></span>
                                <span class="text-muted"><?php echo $progress; ?>%</span>
                            </div>
                            
                            <div class="progress">
                                <div class="progress-bar 
                                    <?php 
                                        if($progress == 100) echo 'bg-success';
                                        elseif($progress > 50) echo 'bg-primary';
                                        elseif($progress > 0) echo 'bg-warning';
                                        else echo 'bg-secondary';
                                    ?>" 
                                    style="width: <?php echo $progress; ?>%">
                                </div>
                            </div>
                            
                            <div class="course-info mb-3">
                                <small class="text-muted">
                                    <i class="fas fa-calendar"></i> 
                                    Enrolled: <?php echo date('M d, Y', strtotime($course['enrolled_date'])); ?>
                                </small>
                            </div>
                            
                            <div class="action-buttons">
                                <?php if ($progress < 100): ?>
                                    <button class="btn btn-primary btn-sm action-btn continue-learning" data-course="<?php echo $course['course_name']; ?>">
                                        <i class="fas fa-play-circle"></i> Continue
                                    </button>
                                <?php else: ?>
                                    <button class="btn btn-success btn-sm action-btn view-certificate" data-course="<?php echo $course['course_name']; ?>">
                                        <i class="fas fa-certificate"></i> Get Certificate
                                    </button>
                                <?php endif; ?>
                                
                                <button class="btn btn-info btn-sm action-btn course-details" data-course="<?php echo $course['course_name']; ?>">
                                    <i class="fas fa-info-circle"></i> Details
                                </button>
                                
                                <?php if ($progress == 0): ?>
                                    <button class="btn btn-warning btn-sm action-btn start-course" data-course="<?php echo $course['id']; ?>">
                                        <i class="fas fa-play"></i> Start
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-book-open fa-4x text-muted mb-3"></i>
                <h3>No Courses Enrolled Yet</h3>
                <p class="text-muted">Start your learning journey by enrolling in a course.</p>
                <a href="#available-courses" class="btn btn-primary btn-lg">
                    <i class="fas fa-search"></i> Browse Available Courses
                </a>
            </div>
        <?php endif; ?>

        <!-- Available Courses -->
        <h3 class="section-title" id="available-courses">Available Courses</h3>
        <div class="row">
            <?php
            $available_courses = [
                ['name' => 'Web Development', 'icon' => 'fa-code', 'duration' => '8 weeks', 'instructor' => 'Mr. Charuka Gamage'],
                ['name' => 'Python Programming', 'icon' => 'fa-python', 'duration' => '6 weeks', 'instructor' => 'Mrs. Sadali Akashi'],
                ['name' => 'Data Science', 'icon' => 'fa-chart-bar', 'duration' => '10 weeks', 'instructor' => 'Mr. Sadun Perera'],
                ['name' => 'Mobile App Development', 'icon' => 'fa-mobile-alt', 'duration' => '8 weeks', 'instructor' => 'Mr. Raju'],
                ['name' => 'Artificial Intelligence', 'icon' => 'fa-robot', 'duration' => '12 weeks', 'instructor' => 'Mrs. Sadu Rajapaksha'],
                ['name' => 'Cyber Security', 'icon' => 'fa-shield-alt', 'duration' => '8 weeks', 'instructor' => 'Mr. Danushka Gunatilaka']
            ];

            foreach($available_courses as $course): 
                $course_class = strtolower(str_replace(' ', '-', $course['name']));
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="card course-card">
                    <div class="course-header <?php echo $course_class; ?>">
                        <i class="fas <?php echo $course['icon']; ?> course-icon"></i>
                        <h5 class="card-title mb-0"><?php echo $course['name']; ?></h5>
                    </div>
                    <div class="card-body">
                        <div class="course-details mb-3">
                            <p class="mb-1"><i class="fas fa-clock"></i> <strong>Duration:</strong> <?php echo $course['duration']; ?></p>
                            <p class="mb-1"><i class="fas fa-user-tie"></i> <strong>Instructor:</strong> <?php echo $course['instructor']; ?></p>
                        </div>
                        
                        <div class="action-buttons">
                            <button class="btn btn-success btn-sm action-btn enroll-course" data-course="<?php echo $course['name']; ?>">
                                <i class="fas fa-plus-circle"></i> Enroll Now
                            </button>
                            <button class="btn btn-outline-primary btn-sm action-btn view-details" data-course="<?php echo $course['name']; ?>">
                                <i class="fas fa-info-circle"></i> Details
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
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
        // Course action handlers
        document.querySelectorAll('.continue-learning').forEach(button => {
            button.addEventListener('click', function() {
                const courseName = this.getAttribute('data-course');
                alert('Continuing with: ' + courseName);
                // Redirect to course content page
                // window.location.href = 'course_content.php?course=' + encodeURIComponent(courseName);
            });
        });

        document.querySelectorAll('.start-course').forEach(button => {
            button.addEventListener('click', function() {
                const courseId = this.getAttribute('data-course');
                if(confirm('Start this course?')) {
                    // Update course progress to 1%
                    alert('Course started!');
                    // window.location.href = 'update_progress.php?course_id=' + courseId + '&progress=1';
                }
            });
        });

        document.querySelectorAll('.enroll-course').forEach(button => {
            button.addEventListener('click', function() {
                const courseName = this.getAttribute('data-course');
                if(confirm('Enroll in ' + courseName + '?')) {
                    // Enroll student in course
                    alert('Successfully enrolled in ' + courseName);
                    // window.location.href = 'enroll_course.php?course=' + encodeURIComponent(courseName);
                }
            });
        });

        document.querySelectorAll('.view-certificate').forEach(button => {
            button.addEventListener('click', function() {
                const courseName = this.getAttribute('data-course');
                alert('View certificate for: ' + courseName);
                // window.location.href = 'view_certificate.php?course=' + encodeURIComponent(courseName);
            });
        });

        document.querySelectorAll('.course-details, .view-details').forEach(button => {
            button.addEventListener('click', function() {
                const courseName = this.getAttribute('data-course');
                alert('Course details for: ' + courseName + '\n\nThis would show detailed course information.');
            });
        });
    </script>
</body>
</html>