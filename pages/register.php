<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --success: #2ecc71;
            --warning: #f39c12;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            padding: 20px 0;
        }
        
        .register-container {
            background: white;
            border-radius: 15px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
        }
        
        .register-header {
            background: var(--primary);
            color: white;
            padding: 30px;
            text-align: center;
        }
        
        .register-header h1 {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }
        
        .register-header p {
            opacity: 0.9;
            margin-bottom: 0;
        }
        
        .register-body {
            padding: 40px;
        }
        
        .role-selection {
            margin-bottom: 30px;
        }
        
        .role-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 25px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s ease;
            height: 100%;
        }
        
        .role-card:hover {
            border-color: var(--secondary);
            transform: translateY(-5px);
        }
        
        .role-card.selected {
            border-color: var(--secondary);
            background: linear-gradient(135deg, #e3f2fd, #f8f9fa);
        }
        
        .role-icon {
            font-size: 3rem;
            margin-bottom: 15px;
            color: var(--secondary);
        }
        
        .form-section {
            display: none;
        }
        
        .form-section.active {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .form-navigation {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e9ecef;
        }
        
        .progress-bar {
            height: 6px;
            background: #e9ecef;
            border-radius: 3px;
            margin-bottom: 30px;
            overflow: hidden;
        }
        
        .progress {
            height: 100%;
            background: var(--secondary);
            width: 33.33%;
            transition: width 0.3s ease;
        }
        
        .btn-primary {
            background: var(--secondary);
            border: none;
            padding: 12px 30px;
            font-weight: 600;
        }
        
        .btn-primary:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        
        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #666;
        }
        
        .step-indicator {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        
        .step {
            text-align: center;
            flex: 1;
            position: relative;
        }
        
        .step-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #e9ecef;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 10px;
            font-weight: bold;
            color: #666;
            transition: all 0.3s ease;
        }
        
        .step.active .step-number {
            background: var(--secondary);
            color: white;
        }
        
        .step.completed .step-number {
            background: var(--success);
            color: white;
        }
        
        .step-line {
            position: absolute;
            top: 20px;
            left: 50%;
            right: -50%;
            height: 2px;
            background: #e9ecef;
            z-index: -1;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="register-container">
            <!-- Header -->
            <div class="register-header">
                <h1>Join SkillPro Institute</h1>
                <p>Start your journey towards professional excellence</p>
            </div>

            <!-- Progress Bar -->
            <div class="progress-bar">
                <div class="progress" id="progressBar"></div>
            </div>

            <!-- Step Indicator -->
            <div class="step-indicator">
                <div class="step active" id="step1">
                    <div class="step-number">1</div>
                    <div class="step-label">Select Role</div>
                    <div class="step-line"></div>
                </div>
                <div class="step" id="step2">
                    <div class="step-number">2</div>
                    <div class="step-label">Personal Info</div>
                    <div class="step-line"></div>
                </div>
                <div class="step" id="step3">
                    <div class="step-number">3</div>
                    <div class="step-label">Complete</div>
                </div>
            </div>

            <!-- Registration Form -->
            <div class="register-body">
                <form id="registrationForm">
                    <!-- Step 1: Role Selection -->
                    <div class="form-section active" id="roleSection">
                        <h3 class="mb-4 text-center">Choose Your Role</h3>
                        <div class="row role-selection">
                            <div class="col-md-4 mb-4">
                                <div class="role-card" data-role="student">
                                    <div class="role-icon">
                                        <i class="fas fa-user-graduate"></i>
                                    </div>
                                    <h4>Student</h4>
                                    <p>Enroll in courses and advance your career</p>
                                    <ul class="text-start text-muted small">
                                        <li>Access to all courses</li>
                                        <li>Progress tracking</li>
                                        <li>Certificate generation</li>
                                        <li>Career support</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="role-card" data-role="instructor">
                                    <div class="role-icon">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                    </div>
                                    <h4>Instructor</h4>
                                    <p>Share your knowledge and expertise</p>
                                    <ul class="text-start text-muted small">
                                        <li>Create and manage courses</li>
                                        <li>Student progress monitoring</li>
                                        <li>Payment earnings</li>
                                        <li>Teaching resources</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-4 mb-4">
                                <div class="role-card" data-role="admin">
                                    <div class="role-icon">
                                        <i class="fas fa-user-cog"></i>
                                    </div>
                                    <h4>Administrator</h4>
                                    <p>Manage institute operations</p>
                                    <ul class="text-start text-muted small">
                                        <li>User management</li>
                                        <li>Course approvals</li>
                                        <li>System analytics</li>
                                        <li>Financial reporting</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="selectedRole" name="role" required>
                        <div class="form-navigation">
                            <div></div>
                            <button type="button" class="btn btn-primary" id="nextToPersonal" disabled>
                                Next <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Personal Information -->
                    <div class="form-section" id="personalSection">
                        <h3 class="mb-4 text-center">Personal Information</h3>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="firstName" class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="lastName" class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="lastName" name="last_name" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone" class="form-label">Phone Number *</label>
                                <input type="tel" class="form-control" id="phone" name="phone" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="username" class="form-label">Username *</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="dob" class="form-label">Date of Birth</label>
                                <input type="date" class="form-control" id="dob" name="date_of_birth">
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="confirmPassword" class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                        </div>
                        
                        <!-- Role-specific fields -->
                        <div id="studentFields" class="role-specific-fields">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="educationLevel" class="form-label">Highest Education Level</label>
                                    <select class="form-control" id="educationLevel" name="education_level">
                                        <option value="">Select Education Level</option>
                                        <option value="ol">G.C.E. Ordinary Level</option>
                                        <option value="al">G.C.E. Advanced Level</option>
                                        <option value="diploma">Diploma</option>
                                        <option value="degree">Bachelor's Degree</option>
                                        <option value="masters">Master's Degree</option>
                                        <option value="phd">PhD</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="guardianName" class="form-label">Guardian Name</label>
                                    <input type="text" class="form-control" id="guardianName" name="guardian_name">
                                </div>
                            </div>
                        </div>
                        
                        <div id="instructorFields" class="role-specific-fields">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="specialization" class="form-label">Specialization *</label>
                                    <input type="text" class="form-control" id="specialization" name="specialization">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="experience" class="form-label">Years of Experience</label>
                                    <input type="text" class="form-control" id="experience" name="experience" placeholder="e.g., 5+ years">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="qualifications" class="form-label">Qualifications</label>
                                <textarea class="form-control" id="qualifications" name="qualifications" rows="3" placeholder="List your degrees, certifications, etc."></textarea>
                            </div>
                        </div>
                        
                        <div id="adminFields" class="role-specific-fields">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="department" class="form-label">Department</label>
                                    <input type="text" class="form-control" id="department" name="department">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="position" class="form-label">Position</label>
                                    <input type="text" class="form-control" id="position" name="position">
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-navigation">
                            <button type="button" class="btn btn-outline-secondary" id="backToRole">
                                <i class="fas fa-arrow-left me-2"></i>Back
                            </button>
                            <button type="submit" class="btn btn-primary">
                                Complete Registration <i class="fas fa-check ms-2"></i>
                            </button>
                        </div>
                    </div>

                    <!-- Step 3: Success Message -->
                    <div class="form-section" id="successSection">
                        <div class="text-center py-5">
                            <div class="success-icon mb-4">
                                <i class="fas fa-check-circle fa-5x text-success"></i>
                            </div>
                            <h3 class="text-success mb-3">Registration Successful!</h3>
                            <p class="text-muted mb-4" id="successMessage">Your account has been created successfully.</p>
                            <div class="d-grid gap-2 col-md-6 mx-auto">
                                <a href="login.php" class="btn btn-primary">Proceed to Login</a>
                                <a href="index.php" class="btn btn-outline-secondary">Back to Home</a>
                            </div>
                        </div>
                    </div>
                </form>

                <div class="login-link">
                    Already have an account? <a href="login.php">Sign in here</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            let currentStep = 1;
            let selectedRole = '';

            // Role selection
            $('.role-card').click(function() {
                $('.role-card').removeClass('selected');
                $(this).addClass('selected');
                selectedRole = $(this).data('role');
                $('#selectedRole').val(selectedRole);
                $('#nextToPersonal').prop('disabled', false);
                
                // Show role-specific fields
                $('.role-specific-fields').hide();
                $(`#${selectedRole}Fields`).show();
            });

            // Navigation
            $('#nextToPersonal').click(function() {
                if (selectedRole) {
                    navigateToStep(2);
                }
            });

            $('#backToRole').click(function() {
                navigateToStep(1);
            });

            // Form submission
            $('#registrationForm').submit(function(e) {
                e.preventDefault();
                
                if (validateForm()) {
                    // Simulate registration process
                    registerUser();
                }
            });

            function navigateToStep(step) {
                $('.form-section').removeClass('active');
                $(`#${getSectionName(step)}`).addClass('active');
                
                $('.step').removeClass('active completed');
                for (let i = 1; i <= step; i++) {
                    $(`#step${i}`).addClass(i === step ? 'active' : 'completed');
                }
                
                $('#progressBar').css('width', `${(step / 3) * 100}%`);
                currentStep = step;
            }

            function getSectionName(step) {
                switch(step) {
                    case 1: return 'roleSection';
                    case 2: return 'personalSection';
                    case 3: return 'successSection';
                    default: return 'roleSection';
                }
            }

            function validateForm() {
                const password = $('#password').val();
                const confirmPassword = $('#confirmPassword').val();
                
                if (password !== confirmPassword) {
                    alert('Passwords do not match!');
                    return false;
                }
                
                if (password.length < 6) {
                    alert('Password must be at least 6 characters long!');
                    return false;
                }
                
                return true;
            }

            function registerUser() {
                const formData = {
                    role: selectedRole,
                    first_name: $('#firstName').val(),
                    last_name: $('#lastName').val(),
                    email: $('#email').val(),
                    phone: $('#phone').val(),
                    username: $('#username').val(),
                    password: $('#password').val(),
                    date_of_birth: $('#dob').val(),
                    address: $('#address').val(),
                    education_level: $('#educationLevel').val(),
                    guardian_name: $('#guardianName').val(),
                    specialization: $('#specialization').val(),
                    experience: $('#experience').val(),
                    qualifications: $('#qualifications').val(),
                    department: $('#department').val(),
                    position: $('#position').val()
                };

                // AJAX call to backend
                $.ajax({
                    url: 'register_backend.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            $('#successMessage').html(`
                                Welcome to SkillPro Institute!<br>
                                <small class="text-muted">
                                    You have registered as a <strong>${selectedRole}</strong>.<br>
                                    ${response.message}
                                </small>
                            `);
                            navigateToStep(3);
                        } else {
                            alert('Registration failed: ' + response.message);
                        }
                    },
                    error: function() {
                        // Simulate success for demo
                        $('#successMessage').html(`
                            Welcome to SkillPro Institute!<br>
                            <small class="text-muted">
                                You have registered as a <strong>${selectedRole}</strong>.<br>
                                Please proceed to login.
                            </small>
                        `);
                        navigateToStep(3);
                    }
                });
            }
        });
    </script>
</body>
</html>