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

// Fetch certificates with student and course information
$sql = "SELECT c.id, c.student_name, c.course_name, c.issue_date, c.certificate_code, 
               c.grade, c.instructor_name, c.download_count
        FROM certificates c 
        ORDER BY c.issue_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Certificates</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .certificate-card {
            border: 1px solid #ddd;
            border-radius: 10px;
            padding: 20px;
            margin: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }
        .certificate-header {
            border-bottom: 2px solid #007bff;
            padding-bottom: 15px;
            margin-bottom: 15px;
        }
        .certificate-code {
            background: #007bff;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-weight: bold;
        }
        .stats-card {
            background: linear-gradient(135deg, #007bff, #0056b3);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
        }
        .action-buttons .btn {
            margin: 2px;
        }
        .search-box {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="mb-4">📜 Certificate Management</h2>

    <a href="../pages/dashboard.php" class="btn btn-secondary mb-3">
        <i class="fas fa-arrow-left"></i> Back to Dashboard
    </a>

    <!-- Statistics Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="stats-card text-center">
                <h4><i class="fas fa-certificate"></i></h4>
                <h5>Total Certificates</h5>
                <h3>
                    <?php 
                    $count_sql = "SELECT COUNT(*) as total FROM certificates";
                    $count_result = $conn->query($count_sql);
                    echo $count_result->fetch_assoc()['total'];
                    ?>
                </h3>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stats-card text-center" style="background: linear-gradient(135deg, #28a745, #1e7e34);">
                <h4><i class="fas fa-download"></i></h4>
                <h5>Total Downloads</h5>
                <h3>
                    <?php 
                    $download_sql = "SELECT SUM(download_count) as total_downloads FROM certificates";
                    $download_result = $conn->query($download_sql);
                    echo $download_result->fetch_assoc()['total_downloads'] ?: 0;
                    ?>
                </h3>
            </div>
        </div>
    </div>

    <!-- Search Box -->
    <div class="search-box">
        <div class="row">
            <div class="col-md-6">
                <input type="text" class="form-control" id="searchInput" placeholder="Search by student name, course, or certificate code...">
            </div>
        </div>
    </div>

    <!-- Certificates List -->
    <div class="row">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='col-md-6 certificate-item'>";
                echo "<div class='certificate-card'>";
                
                echo "<div class='certificate-header'>";
                echo "<div class='d-flex justify-content-between align-items-center'>";
                echo "<h5 class='mb-0'>" . $row["course_name"] . "</h5>";
                echo "<span class='certificate-code'>" . $row["certificate_code"] . "</span>";
                echo "</div>";
                echo "</div>";
                
                echo "<div class='certificate-body'>";
                echo "<p><strong>👤 Student:</strong> " . $row["student_name"] . "</p>";
                echo "<p><strong>🎓 Course:</strong> " . $row["course_name"] . "</p>";
                echo "<p><strong>👨‍🏫 Instructor:</strong> " . $row["instructor_name"] . "</p>";
                echo "<p><strong>📅 Issue Date:</strong> " . $row["issue_date"] . "</p>";
                echo "<p><strong>📊 Grade:</strong> <span class='badge bg-success'>" . $row["grade"] . "</span></p>";
                echo "<p><strong>📥 Downloads:</strong> " . $row["download_count"] . "</p>";
                
                echo "<div class='action-buttons mt-3'>";
                echo "<button class='btn btn-primary btn-sm view-certificate' data-id='" . $row["id"] . "'>
                        <i class='fas fa-eye'></i> View
                      </button>";
                echo "<button class='btn btn-success btn-sm download-certificate' data-id='" . $row["id"] . "'>
                        <i class='fas fa-download'></i> Download
                      </button>";
                echo "<button class='btn btn-info btn-sm share-certificate' data-id='" . $row["id"] . "'>
                        <i class='fas fa-share'></i> Share
                      </button>";
                echo "<button class='btn btn-danger btn-sm delete-certificate' data-id='" . $row["id"] . "'>
                        <i class='fas fa-trash'></i> Delete
                      </button>";
                echo "</div>";
                
                echo "</div>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "<div class='col-12'>";
            echo "<div class='alert alert-warning text-center'>";
            echo "<h4>No certificates found</h4>";
            echo "<p>There are no certificates issued yet.</p>";
            echo "</div>";
            echo "</div>";
        }

        $conn->close();
        ?>
    </div>
</div>

<!-- Certificate Preview Modal -->
<div class="modal fade" id="certificateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Certificate Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <div id="certificatePreview">
                    <!-- Certificate content will be loaded here -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printCertificate">
                    <i class="fas fa-print"></i> Print
                </button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchText = this.value.toLowerCase();
    const certificates = document.querySelectorAll('.certificate-item');
    
    certificates.forEach(card => {
        const text = card.textContent.toLowerCase();
        card.style.display = text.includes(searchText) ? 'block' : 'none';
    });
});

// View Certificate
document.querySelectorAll('.view-certificate').forEach(button => {
    button.addEventListener('click', function() {
        const certificateId = this.getAttribute('data-id');
        // Here you would typically fetch certificate details via AJAX
        // For now, we'll show a sample preview
        document.getElementById('certificatePreview').innerHTML = `
            <div style="border: 2px solid gold; padding: 40px; background: white;">
                <h1 style="color: #007bff;">CERTIFICATE OF COMPLETION</h1>
                <p>This is to certify that</p>
                <h2 style="color: #28a745;">Student Name</h2>
                <p>has successfully completed the course</p>
                <h3 style="color: #007bff;">Course Name</h3>
                <p>with grade: <strong>A+</strong></p>
                <p>Issued on: January 1, 2024</p>
            </div>
        `;
        const modal = new bootstrap.Modal(document.getElementById('certificateModal'));
        modal.show();
    });
});

// Download Certificate
document.querySelectorAll('.download-certificate').forEach(button => {
    button.addEventListener('click', function() {
        const certificateId = this.getAttribute('data-id');
        if(confirm('Are you sure you want to download this certificate?')) {
            // Here you would typically implement download functionality
            alert('Certificate download started!');
            // You can redirect to a download script: window.location.href = 'download_certificate.php?id=' + certificateId;
        }
    });
});

// Delete Certificate
document.querySelectorAll('.delete-certificate').forEach(button => {
    button.addEventListener('click', function() {
        const certificateId = this.getAttribute('data-id');
        if(confirm('Are you sure you want to delete this certificate? This action cannot be undone.')) {
            window.location.href = 'delete_certificate.php?id=' + certificateId;
        }
    });
});

// Print Certificate
document.getElementById('printCertificate').addEventListener('click', function() {
    window.print();
});
</script>
</body>
</html>