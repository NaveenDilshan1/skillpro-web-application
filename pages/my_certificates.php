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

// Get student's certificates
$cert_sql = "SELECT * FROM certificates WHERE student_id = ? ORDER BY issue_date DESC";
$stmt = $conn->prepare($cert_sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$cert_result = $stmt->get_result();

// Get certificate statistics
$stats_sql = "SELECT 
    COUNT(*) as total_certs,
    SUM(download_count) as total_downloads,
    AVG(CASE WHEN grade = 'A+' THEN 100 
             WHEN grade = 'A' THEN 90 
             WHEN grade = 'B' THEN 80 
             WHEN grade = 'C' THEN 70 
             ELSE 60 END) as avg_score
    FROM certificates WHERE student_id = ?";
$stmt = $conn->prepare($stats_sql);
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stats_result = $stmt->get_result();
$stats = $stats_result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Certificates - SkillPro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome@6.4.0/css/all.min.css">
    <style>
        .certificate-card {
            border-radius: 15px;
            overflow: hidden;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s, box-shadow 0.3s;
            border: none;
            background: linear-gradient(135deg, #ffffff, #f8f9fa);
        }
        .certificate-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.15);
        }
        .certificate-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px;
            text-align: center;
        }
        .certificate-icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        .stats-card {
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 20px;
            color: white;
            text-align: center;
            transition: transform 0.3s;
        }
        .stats-card:hover {
            transform: translateY(-5px);
        }
        .card-1 { background: linear-gradient(135deg, #007bff, #0056b3); }
        .card-2 { background: linear-gradient(135deg, #28a745, #1e7e34); }
        .card-3 { background: linear-gradient(135deg, #ffc107, #e0a800); }
        .badge-grade {
            font-size: 0.9rem;
            padding: 5px 10px;
        }
        .grade-a-plus { background: linear-gradient(135deg, #28a745, #20c997); }
        .grade-a { background: linear-gradient(135deg, #17a2b8, #6f42c1); }
        .grade-b { background: linear-gradient(135deg, #ffc107, #fd7e14); }
        .grade-c { background: linear-gradient(135deg, #dc3545, #e83e8c); }
        .action-btn {
            margin: 2px;
        }
        .section-title {
            border-left: 5px solid #007bff;
            padding-left: 15px;
            margin: 30px 0 20px 0;
        }
        .certificate-preview {
            border: 2px dashed #dee2e6;
            border-radius: 10px;
            padding: 20px;
            margin: 10px 0;
            background: #f8f9fa;
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
                        <a class="nav-link active" href="my_certificates.php">
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
                    <h1><i class="fas fa-certificate"></i> My Certificates</h1>
                    <p class="lead mb-0">Your achievements and completed courses</p>
                </div>
                <div class="col-md-4 text-end">
                    <div class="bg-white text-dark rounded p-3 d-inline-block">
                        <small class="text-muted">Total Certificates</small>
                        <br>
                        <strong><?php echo $cert_result->num_rows; ?> Certificates</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mt-4">
        <!-- Statistics Cards -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="stats-card card-1">
                    <i class="fas fa-certificate certificate-icon"></i>
                    <h3><?php echo $stats['total_certs']; ?></h3>
                    <p>Total Certificates</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card card-2">
                    <i class="fas fa-download certificate-icon"></i>
                    <h3><?php echo $stats['total_downloads'] ?: 0; ?></h3>
                    <p>Total Downloads</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-card card-3">
                    <i class="fas fa-chart-line certificate-icon"></i>
                    <h3><?php echo round($stats['avg_score'], 1) ?: 'N/A'; ?>%</h3>
                    <p>Average Score</p>
                </div>
            </div>
        </div>

        <!-- Certificates List -->
        <h3 class="section-title">My Certificates</h3>
        
        <?php if ($cert_result->num_rows > 0): ?>
            <div class="row">
                <?php while($cert = $cert_result->fetch_assoc()): 
                    $grade_class = 'grade-' . strtolower(str_replace('+', '-plus', $cert['grade']));
                ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card certificate-card">
                        <div class="certificate-header">
                            <i class="fas fa-award certificate-icon"></i>
                            <h5 class="card-title mb-0"><?php echo $cert['course_name']; ?></h5>
                        </div>
                        <div class="card-body">
                            <!-- Certificate Preview -->
                            <div class="certificate-preview text-center mb-3">
                                <div style="border: 2px solid gold; padding: 15px; background: white; border-radius: 5px;">
                                    <h6 style="color: #007bff; margin: 0;">CERTIFICATE</h6>
                                    <small style="color: #666;"><?php echo $cert['certificate_code']; ?></small>
                                </div>
                            </div>
                            
                            <div class="certificate-details">
                                <p class="mb-1"><strong>Student:</strong> <?php echo $cert['student_name']; ?></p>
                                <p class="mb-1"><strong>Course:</strong> <?php echo $cert['course_name']; ?></p>
                                <p class="mb-1"><strong>Instructor:</strong> <?php echo $cert['instructor_name']; ?></p>
                                <p class="mb-1"><strong>Issued:</strong> <?php echo date('M d, Y', strtotime($cert['issue_date'])); ?></p>
                                <p class="mb-3">
                                    <strong>Grade:</strong> 
                                    <span class="badge badge-grade <?php echo $grade_class; ?>">
                                        <?php echo $cert['grade']; ?>
                                    </span>
                                </p>
                                
                                <div class="download-info mb-3">
                                    <small class="text-muted">
                                        <i class="fas fa-download"></i> 
                                        Downloaded <?php echo $cert['download_count']; ?> times
                                    </small>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <button class="btn btn-primary btn-sm action-btn view-certificate" 
                                        data-certificate='<?php echo json_encode($cert); ?>'>
                                    <i class="fas fa-eye"></i> View
                                </button>
                                <button class="btn btn-success btn-sm action-btn download-certificate" 
                                        data-id="<?php echo $cert['id']; ?>">
                                    <i class="fas fa-download"></i> Download
                                </button>
                                <button class="btn btn-info btn-sm action-btn share-certificate" 
                                        data-id="<?php echo $cert['id']; ?>">
                                    <i class="fas fa-share-alt"></i> Share
                                </button>
                                <button class="btn btn-outline-secondary btn-sm action-btn verify-certificate" 
                                        data-code="<?php echo $cert['certificate_code']; ?>">
                                    <i class="fas fa-qrcode"></i> Verify
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="fas fa-certificate fa-4x text-muted mb-3"></i>
                <h3>No Certificates Yet</h3>
                <p class="text-muted">Complete courses to earn certificates.</p>
                <a href="my_courses.php" class="btn btn-primary btn-lg">
                    <i class="fas fa-book-open"></i> Browse Courses
                </a>
            </div>
        <?php endif; ?>

        <!-- Certificate Verification Section -->
        <h3 class="section-title">Verify Certificate</h3>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-qrcode"></i> Certificate Verification
                        </h5>
                    </div>
                    <div class="card-body">
                        <p>Verify the authenticity of any SkillPro certificate by entering the certificate code below.</p>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" id="verifyCode" placeholder="Enter certificate code">
                            <button class="btn btn-primary" type="button" id="verifyBtn">
                                <i class="fas fa-search"></i> Verify
                            </button>
                        </div>
                        <div id="verificationResult"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">
                            <i class="fas fa-share-alt"></i> Share Your Achievements
                        </h5>
                    </div>
                    <div class="card-body">
                        <p>Share your certificates on social media and showcase your skills!</p>
                        <div class="social-share-buttons">
                            <button class="btn btn-primary btn-sm me-2">
                                <i class="fab fa-linkedin"></i> LinkedIn
                            </button>
                            <button class="btn btn-info btn-sm me-2">
                                <i class="fab fa-twitter"></i> Twitter
                            </button>
                            <button class="btn btn-facebook btn-sm me-2" style="background: #3b5998; color: white;">
                                <i class="fab fa-facebook"></i> Facebook
                            </button>
                            <button class="btn btn-dark btn-sm">
                                <i class="fab fa-github"></i> GitHub
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Certificate Modal -->
    <div class="modal fade" id="certificateModal" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Certificate Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <div id="certificateContent">
                        <!-- Certificate content will be loaded here -->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="printCertificate">
                        <i class="fas fa-print"></i> Print
                    </button>
                    <button type="button" class="btn btn-success" id="downloadPdf">
                        <i class="fas fa-download"></i> Download PDF
                    </button>
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
        // View Certificate
        document.querySelectorAll('.view-certificate').forEach(button => {
            button.addEventListener('click', function() {
                const certificate = JSON.parse(this.getAttribute('data-certificate'));
                
                const certificateHTML = `
                    <div style="border: 3px solid gold; padding: 40px; background: white; max-width: 800px; margin: 0 auto;">
                        <div style="text-align: center; border-bottom: 2px solid #eee; padding-bottom: 20px; margin-bottom: 20px;">
                            <h1 style="color: #007bff; margin: 0;">CERTIFICATE OF COMPLETION</h1>
                            <p style="color: #666; font-size: 1.1rem;">This is to certify that</p>
                        </div>
                        
                        <div style="text-align: center; margin: 30px 0;">
                            <h2 style="color: #28a745; font-size: 2.5rem; margin: 0;">${certificate.student_name}</h2>
                            <p style="color: #666;">has successfully completed the course</p>
                            <h3 style="color: #007bff; font-size: 2rem; margin: 10px 0;">${certificate.course_name}</h3>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; margin: 30px 0;">
                            <div style="text-align: center;">
                                <p style="margin: 0;"><strong>Grade Achieved</strong></p>
                                <div style="font-size: 2rem; color: #28a745; font-weight: bold;">${certificate.grade}</div>
                            </div>
                            <div style="text-align: center;">
                                <p style="margin: 0;"><strong>Certificate Code</strong></p>
                                <div style="font-size: 1.2rem; color: #666;">${certificate.certificate_code}</div>
                            </div>
                        </div>
                        
                        <div style="display: flex; justify-content: space-between; margin-top: 40px; border-top: 2px solid #eee; padding-top: 20px;">
                            <div style="text-align: center;">
                                <p style="margin: 0;"><strong>Instructor</strong></p>
                                <p style="margin: 0;">${certificate.instructor_name}</p>
                            </div>
                            <div style="text-align: center;">
                                <p style="margin: 0;"><strong>Date Issued</strong></p>
                                <p style="margin: 0;">${new Date(certificate.issue_date).toLocaleDateString()}</p>
                            </div>
                        </div>
                    </div>
                `;
                
                document.getElementById('certificateContent').innerHTML = certificateHTML;
                const modal = new bootstrap.Modal(document.getElementById('certificateModal'));
                modal.show();
            });
        });

        // Download Certificate
        document.querySelectorAll('.download-certificate').forEach(button => {
            button.addEventListener('click', function() {
                const certificateId = this.getAttribute('data-id');
                if(confirm('Download this certificate?')) {
                    // Increment download count and download
                    alert('Certificate download started!');
                    // window.location.href = 'download_certificate.php?id=' + certificateId;
                }
            });
        });

        // Share Certificate
        document.querySelectorAll('.share-certificate').forEach(button => {
            button.addEventListener('click', function() {
                const certificateId = this.getAttribute('data-id');
                alert('Share options for certificate ID: ' + certificateId);
            });
        });

        // Verify Certificate
        document.querySelectorAll('.verify-certificate').forEach(button => {
            button.addEventListener('click', function() {
                const certCode = this.getAttribute('data-code');
                document.getElementById('verifyCode').value = certCode;
                verifyCertificate();
            });
        });

        // Certificate Verification
        document.getElementById('verifyBtn').addEventListener('click', verifyCertificate);

        function verifyCertificate() {
            const code = document.getElementById('verifyCode').value.trim();
            const resultDiv = document.getElementById('verificationResult');
            
            if (!code) {
                resultDiv.innerHTML = '<div class="alert alert-warning">Please enter a certificate code.</div>';
                return;
            }
            
            // Simulate verification
            resultDiv.innerHTML = `
                <div class="alert alert-info">
                    <i class="fas fa-spinner fa-spin"></i> Verifying certificate...
                </div>
            `;
            
            setTimeout(() => {
                // This would be an AJAX call to verify the certificate
                resultDiv.innerHTML = `
                    <div class="alert alert-success">
                        <h5><i class="fas fa-check-circle"></i> Certificate Verified</h5>
                        <p><strong>Certificate Code:</strong> ${code}</p>
                        <p><strong>Status:</strong> Valid and Authentic</p>
                        <p><strong>Issued To:</strong> ${'<?php echo $_SESSION["full_name"]; ?>'}</p>
                        <p><strong>Course:</strong> Web Development</p>
                        <p><strong>Issue Date:</strong> ${new Date().toLocaleDateString()}</p>
                    </div>
                `;
            }, 1500);
        }

        // Print Certificate
        document.getElementById('printCertificate').addEventListener('click', function() {
            window.print();
        });

        // Download PDF
        document.getElementById('downloadPdf').addEventListener('click', function() {
            alert('PDF download would start here');
            // Implement PDF generation and download
        });
    </script>
</body>
</html>