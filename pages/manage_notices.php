<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Notices - SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --success: #2ecc71;
            --warning: #f39c12;
            --light: #ecf0f1;
            --dark: #2c3e50;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f8f9fa;
            color: #333;
        }
        
        .dashboard-header {
            background: var(--primary);
            color: white;
            padding: 20px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .navbar-brand {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }
        
        .navbar-brand span {
            color: var(--secondary);
        }
        
        .nav-link {
            color: white !important;
            font-weight: 500;
            padding: 8px 15px !important;
            border-radius: 4px;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        
        .nav-link:hover, .nav-link.active {
            background-color: var(--secondary);
            color: white !important;
        }
        
        .page-header {
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 60px 0;
            text-align: center;
        }
        
        .notice-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .notice-tabs {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
        }
        
        .notice-tabs .nav-link {
            color: var(--primary) !important;
            border: none;
            border-radius: 0;
            padding: 12px 20px !important;
            margin: 0;
        }
        
        .notice-tabs .nav-link.active {
            color: var(--secondary) !important;
            border-bottom: 3px solid var(--secondary);
            background: transparent;
        }
        
        .notice-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }
        
        .notice-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }
        
        .notice-priority-high {
            border-left: 4px solid #e74c3c;
        }
        
        .notice-priority-medium {
            border-left: 4px solid #f39c12;
        }
        
        .notice-priority-low {
            border-left: 4px solid #3498db;
        }
        
        .btn-primary {
            background: var(--secondary);
            border: none;
            padding: 10px 20px;
        }
        
        .btn-primary:hover {
            background: #2980b9;
        }
        
        footer {
            background: var(--dark);
            color: white;
            padding: 40px 0 20px;
            margin-top: 60px;
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #999;
            font-size: 14px;
        }
        
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            display: none;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="dashboard-header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="home.php">Skill<span>Pro</span> Institute</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active" href="manage_notices.php">Manage Notices</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Logout</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Manage Notices</h1>
            <p>Create, edit, and manage institute notices and announcements</p>
        </div>
    </section>

    <!-- Notice Management Section -->
    <section class="py-5">
        <div class="container">
            <div class="notice-container">
                <!-- Success Message -->
                <div class="success-message" id="successMessage">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x text-success me-3"></i>
                        <div>
                            <h4 class="mb-1" id="successTitle">Success!</h4>
                            <p class="mb-0" id="successText">Operation completed successfully.</p>
                        </div>
                    </div>
                </div>

                <!-- Notice Tabs -->
                <ul class="nav nav-tabs notice-tabs" id="noticeTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="view-notices-tab" data-bs-toggle="tab" data-bs-target="#view-notices" type="button" role="tab">View Notices</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="add-notice-tab" data-bs-toggle="tab" data-bs-target="#add-notice" type="button" role="tab">Add New Notice</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="noticeTabsContent">
                    <!-- View Notices Tab -->
                    <div class="tab-pane fade show active" id="view-notices" role="tabpanel">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h3>All Notices</h3>
                            <div class="btn-group">
                                <button class="btn btn-outline-primary btn-sm" id="filterAll">All</button>
                                <button class="btn btn-outline-danger btn-sm" id="filterHigh">High Priority</button>
                                <button class="btn btn-outline-warning btn-sm" id="filterMedium">Medium</button>
                                <button class="btn btn-outline-info btn-sm" id="filterLow">Low</button>
                            </div>
                        </div>
                        
                        <div id="noticesList">
                            <!-- Notices will be loaded here -->
                        </div>
                    </div>
                    
                    <!-- Add Notice Tab -->
                    <div class="tab-pane fade" id="add-notice" role="tabpanel">
                        <h3 class="mb-4">Create New Notice</h3>
                        <form id="noticeForm">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-3">
                                        <label for="noticeTitle" class="form-label">Notice Title *</label>
                                        <input type="text" class="form-control" id="noticeTitle" required>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="noticeContent" class="form-label">Notice Content *</label>
                                        <textarea class="form-control" id="noticeContent" rows="6" required></textarea>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="noticePriority" class="form-label">Priority Level *</label>
                                                <select class="form-control" id="noticePriority" required>
                                                    <option value="">Select Priority</option>
                                                    <option value="high">High (Urgent)</option>
                                                    <option value="medium">Medium (Important)</option>
                                                    <option value="low">Low (General)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="noticeExpiry" class="form-label">Expiry Date</label>
                                                <input type="date" class="form-control" id="noticeExpiry">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label for="noticeAudience" class="form-label">Target Audience</label>
                                        <select class="form-control" id="noticeAudience" multiple>
                                            <option value="all">All Students</option>
                                            <option value="web_dev">Web Development Students</option>
                                            <option value="data_science">Data Science Students</option>
                                            <option value="welding">Welding Students</option>
                                            <option value="hotel_mgmt">Hotel Management Students</option>
                                            <option value="staff">Teaching Staff</option>
                                            <option value="admin">Administrative Staff</option>
                                        </select>
                                        <small class="text-muted">Hold Ctrl to select multiple options</small>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Notice Preview</h5>
                                            <div id="noticePreview" class="p-3 border rounded bg-light">
                                                <p class="text-muted">Preview will appear here...</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="mt-3">
                                        <button type="submit" class="btn btn-primary w-100">
                                            <i class="fas fa-save me-2"></i>Publish Notice
                                        </button>
                                        <button type="button" class="btn btn-outline-secondary w-100 mt-2" id="previewBtn">
                                            <i class="fas fa-eye me-2"></i>Update Preview
                                        </button>
                                        <button type="reset" class="btn btn-outline-danger w-100 mt-2">
                                            <i class="fas fa-times me-2"></i>Reset Form
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h3>SkillPro Institute</h3>
                    <p>Providing quality TVET education and career-focused training since 2010.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Quick Links</h3>
                    <a href="home.php" class="d-block text-decoration-none text-light mb-2">Home</a>
                    <a href="dashboard.php" class="d-block text-decoration-none text-light mb-2">Dashboard</a>
                    <a href="manage_notices.php" class="d-block text-decoration-none text-light mb-2">Manage Notices</a>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Contact</h3>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Galle Road, Colombo 03</p>
                    <p><i class="fas fa-phone me-2"></i> +94 11 234 5678</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 SkillPro Institute. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sample notices data
        let notices = [
            {
                id: 1,
                title: 'Semester Final Exams Schedule',
                content: 'The final examination schedule for the current semester has been published. Please check the academic calendar for your specific exam dates and times. All students are required to bring their student ID cards to the examination hall.',
                priority: 'high',
                date_created: '2023-10-15',
                expiry_date: '2023-11-30',
                audience: ['all'],
                status: 'active',
                created_by: 'Admin'
            },
            {
                id: 2,
                title: 'Holiday Notice - Deepavali',
                content: 'The institute will remain closed on November 12th, 2023 for Deepavali celebrations. All classes and administrative functions will resume on November 13th. Wishing everyone a joyful celebration!',
                priority: 'medium',
                date_created: '2023-10-12',
                expiry_date: '2023-11-12',
                audience: ['all', 'staff'],
                status: 'active',
                created_by: 'Admin'
            },
            {
                id: 3,
                title: 'Workshop on Advanced Web Development',
                content: 'A special workshop on advanced web development techniques will be conducted on October 28th from 2:00 PM to 5:00 PM. Topics include React.js, Node.js, and database integration. Limited seats available.',
                priority: 'medium',
                date_created: '2023-10-10',
                expiry_date: '2023-10-28',
                audience: ['web_dev', 'data_science'],
                status: 'active',
                created_by: 'Web Dept.'
            },
            {
                id: 4,
                title: 'Library Hours Extension',
                content: 'Starting from next week, the library will remain open until 8:00 PM on weekdays to accommodate students preparing for exams.',
                priority: 'low',
                date_created: '2023-10-08',
                expiry_date: '2023-12-31',
                audience: ['all'],
                status: 'active',
                created_by: 'Library'
            }
        ];

        // Initialize the page
        $(document).ready(function() {
            loadNotices();
            
            // Form submission
            $('#noticeForm').submit(function(e) {
                e.preventDefault();
                saveNotice();
            });
            
            // Preview button
            $('#previewBtn').click(function() {
                updatePreview();
            });
            
            // Filter buttons
            $('#filterAll').click(function() { filterNotices('all'); });
            $('#filterHigh').click(function() { filterNotices('high'); });
            $('#filterMedium').click(function() { filterNotices('medium'); });
            $('#filterLow').click(function() { filterNotices('low'); });
            
            // Auto-update preview when typing
            $('#noticeTitle, #noticeContent').on('input', function() {
                updatePreview();
            });
        });

        // Function to load notices
        function loadNotices(filter = 'all') {
            let filteredNotices = notices;
            
            if (filter !== 'all') {
                filteredNotices = notices.filter(notice => notice.priority === filter);
            }
            
            let html = '';
            
            if (filteredNotices.length === 0) {
                html = `
                    <div class="alert alert-info text-center">
                        <i class="fas fa-info-circle me-2"></i>
                        No notices found for the selected filter.
                    </div>
                `;
            } else {
                filteredNotices.forEach(notice => {
                    const priorityClass = `notice-priority-${notice.priority}`;
                    const priorityBadge = notice.priority === 'high' ? 'danger' : 
                                         notice.priority === 'medium' ? 'warning' : 'info';
                    
                    html += `
                        <div class="card notice-card ${priorityClass}">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <h5 class="card-title">${notice.title}</h5>
                                    <span class="badge bg-${priorityBadge}">${notice.priority.toUpperCase()}</span>
                                </div>
                                <p class="card-text">${notice.content}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <small class="text-muted">
                                            <i class="far fa-calendar me-1"></i>
                                            Created: ${new Date(notice.date_created).toLocaleDateString()}
                                        </small>
                                        ${notice.expiry_date ? `
                                            <small class="text-muted ms-3">
                                                <i class="far fa-clock me-1"></i>
                                                Expires: ${new Date(notice.expiry_date).toLocaleDateString()}
                                            </small>
                                        ` : ''}
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-outline-primary edit-notice" data-id="${notice.id}">
                                            <i class="fas fa-edit me-1"></i>Edit
                                        </button>
                                        <button class="btn btn-sm btn-outline-danger delete-notice" data-id="${notice.id}">
                                            <i class="fas fa-trash me-1"></i>Delete
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <small class="text-muted">
                                        <i class="fas fa-users me-1"></i>
                                        Audience: ${notice.audience.join(', ')}
                                    </small>
                                    <small class="text-muted ms-3">
                                        <i class="fas fa-user me-1"></i>
                                        By: ${notice.created_by}
                                    </small>
                                </div>
                            </div>
                        </div>
                    `;
                });
            }
            
            $('#noticesList').html(html);
            
            // Add event listeners for edit and delete buttons
            $('.edit-notice').click(function() {
                const noticeId = $(this).data('id');
                editNotice(noticeId);
            });
            
            $('.delete-notice').click(function() {
                const noticeId = $(this).data('id');
                deleteNotice(noticeId);
            });
        }

        // Function to filter notices
        function filterNotices(priority) {
            loadNotices(priority);
            
            // Update active filter button
            $('.btn-group .btn').removeClass('active');
            $(`#filter${priority.charAt(0).toUpperCase() + priority.slice(1)}`).addClass('active');
        }

        // Function to save new notice
        function saveNotice() {
            const title = $('#noticeTitle').val();
            const content = $('#noticeContent').val();
            const priority = $('#noticePriority').val();
            const expiry = $('#noticeExpiry').val();
            const audience = $('#noticeAudience').val();
            
            if (!title || !content || !priority) {
                showMessage('Error', 'Please fill in all required fields.', 'error');
                return;
            }
            
            const newNotice = {
                id: notices.length > 0 ? Math.max(...notices.map(n => n.id)) + 1 : 1,
                title: title,
                content: content,
                priority: priority,
                date_created: new Date().toISOString().split('T')[0],
                expiry_date: expiry || null,
                audience: audience.length > 0 ? audience : ['all'],
                status: 'active',
                created_by: 'Admin' // In real app, this would be the logged-in user
            };
            
            // Save to database (simulated)
            saveNoticeToDatabase(newNotice);
            
            // Add to local array
            notices.unshift(newNotice);
            
            // Show success message
            showMessage('Success', 'Notice published successfully!', 'success');
            
            // Reset form
            $('#noticeForm')[0].reset();
            updatePreview();
            
            // Switch to view tab and reload notices
            $('#view-notices-tab').tab('show');
            loadNotices();
        }

        // Function to save notice to database (simulated)
        function saveNoticeToDatabase(notice) {
            // In a real application, this would be an AJAX call to your server
            console.log('Saving notice to database:', notice);
            
            // Simulate API call
            setTimeout(() => {
                console.log('Notice saved successfully with ID:', notice.id);
            }, 500);
        }

        // Function to edit notice
        function editNotice(noticeId) {
            const notice = notices.find(n => n.id === noticeId);
            if (notice) {
                // Populate form with notice data
                $('#noticeTitle').val(notice.title);
                $('#noticeContent').val(notice.content);
                $('#noticePriority').val(notice.priority);
                $('#noticeExpiry').val(notice.expiry_date);
                $('#noticeAudience').val(notice.audience);
                
                // Update preview
                updatePreview();
                
                // Switch to add notice tab
                $('#add-notice-tab').tab('show');
                
                // Change form submit to update instead of create
                $('#noticeForm').off('submit').submit(function(e) {
                    e.preventDefault();
                    updateNotice(noticeId);
                });
                
                // Change button text
                $('#noticeForm button[type="submit"]').html('<i class="fas fa-save me-2"></i>Update Notice');
            }
        }

        // Function to update notice
        function updateNotice(noticeId) {
            const title = $('#noticeTitle').val();
            const content = $('#noticeContent').val();
            const priority = $('#noticePriority').val();
            const expiry = $('#noticeExpiry').val();
            const audience = $('#noticeAudience').val();
            
            if (!title || !content || !priority) {
                showMessage('Error', 'Please fill in all required fields.', 'error');
                return;
            }
            
            const noticeIndex = notices.findIndex(n => n.id === noticeId);
            if (noticeIndex !== -1) {
                notices[noticeIndex] = {
                    ...notices[noticeIndex],
                    title: title,
                    content: content,
                    priority: priority,
                    expiry_date: expiry || null,
                    audience: audience.length > 0 ? audience : ['all']
                };
                
                // Show success message
                showMessage('Success', 'Notice updated successfully!', 'success');
                
                // Reset form and button
                $('#noticeForm')[0].reset();
                $('#noticeForm button[type="submit"]').html('<i class="fas fa-save me-2"></i>Publish Notice');
                
                // Revert form to create mode
                $('#noticeForm').off('submit').submit(function(e) {
                    e.preventDefault();
                    saveNotice();
                });
                
                // Switch to view tab and reload notices
                $('#view-notices-tab').tab('show');
                loadNotices();
            }
        }

        // Function to delete notice
        function deleteNotice(noticeId) {
            if (confirm('Are you sure you want to delete this notice? This action cannot be undone.')) {
                notices = notices.filter(n => n.id !== noticeId);
                
                // Show success message
                showMessage('Success', 'Notice deleted successfully!', 'success');
                
                // Reload notices
                loadNotices();
            }
        }

        // Function to update preview
        function updatePreview() {
            const title = $('#noticeTitle').val() || 'Notice Title';
            const content = $('#noticeContent').val() || 'Notice content will appear here...';
            const priority = $('#noticePriority').val();
            
            let priorityBadge = '';
            if (priority) {
                const badgeClass = priority === 'high' ? 'danger' : 
                                 priority === 'medium' ? 'warning' : 'info';
                priorityBadge = `<span class="badge bg-${badgeClass} float-end">${priority.toUpperCase()}</span>`;
            }
            
            const previewHtml = `
                <h6>${title} ${priorityBadge}</h6>
                <p class="mb-2">${content}</p>
                <small class="text-muted">
                    <i class="far fa-calendar me-1"></i>
                    Published: ${new Date().toLocaleDateString()}
                </small>
            `;
            
            $('#noticePreview').html(previewHtml);
        }

        // Function to show message
        function showMessage(title, text, type) {
            $('#successTitle').text(title);
            $('#successText').text(text);
            
            if (type === 'error') {
                $('#successMessage').removeClass('bg-success text-white').addClass('bg-danger text-white');
            } else {
                $('#successMessage').removeClass('bg-danger text-white').addClass('bg-success text-white');
            }
            
            $('#successMessage').fadeIn();
            
            setTimeout(() => {
                $('#successMessage').fadeOut();
            }, 5000);
        }
    </script>
</body>
</html>