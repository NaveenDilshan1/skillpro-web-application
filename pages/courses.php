<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Courses</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: #6eb0ebff;
    }
    header {
      background: #025381ff;
      padding: 15px;
      text-align: center;
    }
    header button {
      background: #cea41bff;
      color: color-mix(in hsl shorter hue, color percentage, color percentage);
      border: none;
      padding: 10px 20px;
      margin: 5px;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      box-shadow: 0 10px 5px rgba(10, 230, 230, 1);
      
    }
    header button:hover {
      background: #45a049;
      box-shadow: 0 50px 80px rgba(253, 253, 253, 0.75);
      
    }
    .container {
      padding: 20px;
    }

    :root {
      --primary: #2c3e50;
      --secondary: #3498db;
      --accent: #e74c3c;
      --light: #ecf0f1;
      --dark: #2c3e50;
    }
    
    body {
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
      color: #333;
    }
    h2 {
      text-align: center;
      color: #222;
    }
    .course-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .course-card:hover {
      transform: translateY(-10px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }
    
    .course-img {
      height: 150px;
      background-color: #e0e0e0;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #666;
      border-top-left-radius: 10px;
      border-top-right-radius: 10px;
      overflow: hidden;
    }
    
    .course-img img {
      width: 100%;
      height: 80%;
      object-fit: cover;
    }
    
    .badge-online {
      background-color: #2ecc71;
    }
    
    .badge-onsite {
      background-color: #e74c3c;
    }
    
    .badge-hybrid {
      background-color: #f39c12;
    }
    
    .branch-card {
      border: none;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
      height: 100%;
    }
    
    .branch-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
    }
    
    .filter-section {
      background: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
      padding: 20px;
      margin-bottom: 30px;
    }
    
    .course-category {
      margin-bottom: 40px;
    }
    
    .category-title {
      color: var(--primary);
      border-bottom: 3px solid var(--secondary);
      padding-bottom: 10px;
      margin-bottom: 20px;
      display: inline-block;
    }

    .course-meta {
      font-size: 14px;
      color: #666;
    }
    
    .course-price {
      font-size: 18px;
      font-weight: bold;
      color: var(--secondary);
    }

  </style>
</head>
<body>

<header>
  <button onclick="window.location.href='lecture.php'">lecture</button>
  <button onclick="window.location.href='courses.html'">Courses</button>
</header>

<!-- Courses Section -->
  <section class="py-5">
    <div class="container">
      <!-- Filter Section -->
      <div class="filter-section">
        <div class="row">
          <div class="col-md-6">
            <h4>Filter Courses</h4>
            <div class="mb-3">
              <label class="form-label">Course Category</label>
              <select class="form-select" id="categoryFilter">
                <option value="all">All Categories</option>
                <option value="ict">Information Technology</option>
                <option value="engineering">Engineering</option>
                <option value="hospitality">Hospitality & Tourism</option>
                <option value="construction">Construction</option>
                <option value="automotive">Automotive</option>
                <option value="business">Business</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="mb-3">
              <label class="form-label">Course Mode</label>
              <select class="form-select" id="modeFilter">
                <option value="all">All Modes</option>
                <option value="online">Online</option>
                <option value="onsite">On-site</option>
                <option value="hybrid">Hybrid</option>
              </select>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="newBatchFilter">
              <label class="form-check-label" for="newBatchFilter">
                Show only courses with upcoming batches
              </label>
            </div>
          </div>
        </div>
      </div>

      <!-- ICT Courses -->
      <div class="course-category" data-category="ict">
        <h2 class="category-title">Information Technology</h2>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Web Development">
              </div>
              <div class="card-body">
                <span class="badge badge-online mb-2">Online</span>
                <h5 class="card-title">Web Development Fundamentals</h5>
                <p class="card-text">Learn HTML, CSS, JavaScript and basic web development concepts.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 3 Months</div>
                  <div><i class="fas fa-user me-1"></i> John Smith</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 25,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="web-dev">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1555949963-aa79dcee981c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Mobile App Development">
              </div>
              <div class="card-body">
                <span class="badge badge-hybrid mb-2">Hybrid</span>
                <h5 class="card-title">Mobile App Development</h5>
                <p class="card-text">Build native and cross-platform mobile applications for iOS and Android.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 4 Months</div>
                  <div><i class="fas fa-user me-1"></i> Sarah Johnson</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 35,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="mobile-dev">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Data Science">
              </div>
              <div class="card-body">
                <span class="badge badge-online mb-2">Online</span>
                <h5 class="card-title">Data Science & Analytics</h5>
                <p class="card-text">Master data analysis, visualization, and machine learning techniques.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 6 Months</div>
                  <div><i class="fas fa-user me-1"></i> Michael Chen</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 45,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="data-science">Details</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Engineering Courses -->
      <div class="course-category" data-category="engineering">
        <h2 class="category-title">Engineering</h2>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1581091226033-d5c48150dbaa?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Welding">
              </div>
              <div class="card-body">
                <span class="badge badge-onsite mb-2">On-site</span>
                <h5 class="card-title">Advanced Welding Techniques</h5>
                <p class="card-text">Master advanced welding methods for industrial applications.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 6 Months</div>
                  <div><i class="fas fa-user me-1"></i> Robert Johnson</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 45,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="welding">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1581092580497-e0d23cbdf1dc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Electrical Installation">
              </div>
              <div class="card-body">
                <span class="badge badge-onsite mb-2">On-site</span>
                <h5 class="card-title">Electrical Installation</h5>
                <p class="card-text">Learn residential and commercial electrical wiring and installation.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 4 Months</div>
                  <div><i class="fas fa-user me-1"></i> David Wilson</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 35,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="electrical">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://thumbs.dreamstime.com/b/plumber-blue-uniform-using-pliers-pipe-fitting-indoor-repairs-plumbing-tools-visible-368758446.jpg" alt="Plumbing">
              </div>
              <div class="card-body">
                <span class="badge badge-onsite mb-2">On-site</span>
                <h5 class="card-title">Plumbing & Pipe Fitting</h5>
                <p class="card-text">Comprehensive training in plumbing systems and pipe installation.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 5 Months</div>
                  <div><i class="fas fa-user me-1"></i> James Anderson</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 32,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="plumbing">Details</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Hospitality Courses -->
      <div class="course-category" data-category="hospitality">
        <h2 class="category-title">Hospitality & Tourism</h2>
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Hotel Management">
              </div>
              <div class="card-body">
                <span class="badge badge-hybrid mb-2">Hybrid</span>
                <h5 class="card-title">Hotel Management Diploma</h5>
                <p class="card-text">Comprehensive training in hotel operations and management.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 1 Year</div>
                  <div><i class="fas fa-user me-1"></i> Sarah Williams</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 60,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="hotel-mgmt">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1414235077428-338989a2e8c0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Culinary Arts">
              </div>
              <div class="card-body">
                <span class="badge badge-onsite mb-2">On-site</span>
                <h5 class="card-title">Culinary Arts & Food Production</h5>
                <p class="card-text">Professional chef training with international cuisine techniques.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 9 Months</div>
                  <div><i class="fas fa-user me-1"></i> Maria Garcia</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 55,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="culinary">Details</button>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="card course-card">
              <div class="course-img">
                <img src="https://images.unsplash.com/photo-1540541338287-41700207dee6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=600&q=80" alt="Tourism">
              </div>
              <div class="card-body">
                <span class="badge badge-online mb-2">Online</span>
                <h5 class="card-title">Tourism & Travel Management</h5>
                <p class="card-text">Learn tour operations, travel agency management, and tourism marketing.</p>
                <div class="course-meta mb-2">
                  <div><i class="far fa-clock me-1"></i> 6 Months</div>
                  <div><i class="fas fa-user me-1"></i> Lisa Thompson</div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <span class="course-price">LKR 28,000.00</span>
                  <button class="btn btn-sm btn-enroll" data-bs-toggle="modal" data-bs-target="#courseDetailModal" data-course="tourism">Details</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="text-center mt-4">
        <a href="insert.php" class="btn btn-primary btn-lg">View All Courses & Enroll</a>
      </div>
    </div>
  </section>

  <!-- Branches Section -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="text-center fw-bold mb-5">Our Branches</h2>
      <div class="row">
        <div class="col-md-4 mb-4">
          <div class="card branch-card h-100">
            <div class="card-body text-center p-4">
              <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
              <h4>Colombo</h4>
              <p class="text-muted">Main Branch</p>
              <p>123 Galle Road, Colombo 03</p>
              <p><i class="fas fa-phone me-2"></i>011 234 5678</p>
              <p><i class="fas fa-envelope me-2"></i>colombo@skillpro.edu</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card branch-card h-100">
            <div class="card-body text-center p-4">
              <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
              <h4>Kandy</h4>
              <p class="text-muted">Central Province Branch</p>
              <p>45 Peradeniya Road, Kandy</p>
              <p><i class="fas fa-phone me-2"></i>081 234 5678</p>
              <p><i class="fas fa-envelope me-2"></i>kandy@skillpro.edu</p>
            </div>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card branch-card h-100">
            <div class="card-body text-center p-4">
              <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
              <h4>Matara</h4>
              <p class="text-muted">Southern Province Branch</p>
              <p>78 Matara Road, Matara</p>
              <p><i class="fas fa-phone me-2"></i>041 234 5678</p>
              <p><i class="fas fa-envelope me-2"></i>matara@skillpro.edu</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Course Detail Modal -->
  <div class="modal fade" id="courseDetailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="courseDetailTitle">Course Details</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div id="courseDetailContent">
            <!-- Content will be populated by JavaScript -->
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a href="insert.php" class="btn btn-primary">Enroll Now</a>
        </div>
      </div>
    </div>
  </div>

  

  <!-- Bootstrap JS and jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Course details modal
    $("#courseDetailModal").on('show.bs.modal', function(e) {
      const button = $(e.relatedTarget);
      const course = button.data('course');
      
      const courseDetails = {
        'web-dev': {
          title: 'Web Development Fundamentals',
          description: 'Learn HTML, CSS, JavaScript and basic web development concepts. This course is designed for beginners who want to start a career in web development. You will build responsive websites and web applications using modern technologies.',
          duration: '3 months',
          fee: 'LKR 25,000.00',
          mode: 'Online',
          schedule: 'Weekends 9AM-12PM',
          instructor: 'Mr.charuka gamage',
          startDate: '2025-09-25',
          requirements: 'Basic computer knowledge',
          certification: 'TVEC Certified Web Developer'
        },
        'mobile-dev': {
          title: 'Mobile App Development',
          description: 'Build native and cross-platform mobile applications for iOS and Android. Learn React Native, Flutter, and native development for both platforms with hands-on projects.',
          duration: '4 months',
          fee: 'LKR 35,000.00',
          mode: 'Hybrid',
          schedule: 'Weekdays 6PM-9PM',
          instructor: 'Mrs.Sadali akashi',
          startDate: '2025-12-05',
          requirements: 'Basic programming knowledge',
          certification: 'TVEC Certified Mobile Developer'
        },
        'data-science': {
          title: 'Data Science & Analytics',
          description: 'Master data analysis, visualization, and machine learning techniques. Work with Python, R, SQL, and popular data science libraries to extract insights from data.',
          duration: '6 months',
          fee: 'LKR 45,000.00',
          mode: 'Online',
          schedule: 'Weekends 1PM-5PM',
          instructor: 'Mr.sadun perera',
          startDate: '2025-12-11',
          requirements: 'Basic statistics knowledge',
          certification: 'TVEC Certified Data Analyst'
        },
        'welding': {
          title: 'Advanced Welding Techniques',
          description: 'Master advanced welding methods for industrial applications. This hands-on course covers MIG, TIG, and arc welding techniques with safety protocols and quality control.',
          duration: '6 months',
          fee: 'LKR 45,000.00',
          mode: 'On-site',
          schedule: 'Weekdays 2PM-5PM',
          instructor: 'Mr.Raju',
          startDate: '2025-12-13',
          requirements: 'Basic welding knowledge',
          certification: 'TVEC Certified Welder'
        },
        'electrical': {
          title: 'Electrical Installation',
          description: 'Learn residential and commercial electrical wiring and installation. This course covers electrical theory, safety procedures, and practical installation techniques.',
          duration: '4 months',
          fee: 'LKR 35,000.00',
          mode: 'On-site',
          schedule: 'Weekdays 9AM-12PM',
          instructor: 'Mrs.Sadu Rajapaksha',
          startDate: '2025-12-16',
          requirements: 'No prior experience needed',
          certification: 'TVEC Certified Electrician'
        },
        'plumbing': {
          title: 'Plumbing & Pipe Fitting',
          description: 'Comprehensive training in plumbing systems and pipe installation. Learn about water supply, drainage systems, fixture installation, and pipe fitting techniques.',
          duration: '5 months',
          fee: 'LKR 32,000.00',
          mode: 'On-site',
          schedule: 'Weekdays 1PM-4PM',
          instructor: 'Mr.chameera dahanayaka',
          startDate: '2025-12-20',
          requirements: 'No prior experience needed',
          certification: 'TVEC Certified Plumber'
        },
        'hotel-mgmt': {
          title: 'Hotel Management Diploma',
          description: 'Comprehensive training in hotel operations and management. Learn front office operations, housekeeping management, food and beverage service, and hospitality marketing.',
          duration: '1 year',
          fee: 'LKR 60,000.00',
          mode: 'Hybrid',
          schedule: 'Weekends 1PM-5PM',
          instructor: 'Mr.kusal Perera',
          startDate: '2025-12-23',
          requirements: 'O/L passed',
          certification: 'TVEC Diploma in Hotel Management'
        },
        
        'tourism': {
          title: 'Tourism & Travel Management',
          description: 'Learn tour operations, travel agency management, and tourism marketing. This course covers destination knowledge, customer service, and travel technology.',
          duration: '6 months',
          fee: 'LKR 28,000.00',
          mode: 'Online',
          schedule: 'Weekends 9AM-1PM',
          instructor: 'Mr.Danushka Gunatilaka',
          startDate: '2025-12-28',
          requirements: 'Good communication skills',
          certification: 'TVEC Certified Travel Consultant'
        }
      };
      
      const detail = courseDetails[course];
      $("#courseDetailTitle").text(detail.title);
      $("#courseDetailContent").html(`
        <div class="row">
          <div class="col-md-6">
            <img src="https://placeholder-image-service.onrender.com/image/400x300?prompt=${encodeURIComponent(detail.title)}&id=${course}-detail" class="img-fluid rounded mb-3" alt="${detail.title} course image">
          </div>
          <div class="col-md-6">
            <p>${detail.description}</p>
            <ul class="list-group list-group-flush">
              <li class="list-group-item d-flex justify-content-between">
                <strong>Duration:</strong> <span>${detail.duration}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Fee:</strong> <span class="text-primary fw-bold">${detail.fee}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Mode:</strong> <span>${detail.mode}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Schedule:</strong> <span>${detail.schedule}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Instructor:</strong> <span>${detail.instructor}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Start Date:</strong> <span>${detail.startDate}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Requirements:</strong> <span>${detail.requirements}</span>
              </li>
              <li class="list-group-item d-flex justify-content-between">
                <strong>Certification:</strong> <span>${detail.certification}</span>
              </li>
            </ul>
          </div>
        </div>
      `);
    });

    // Course filtering functionality
    $(document).ready(function() {
      $('#categoryFilter, #modeFilter').change(function() {
        filterCourses();
      });
      
      function filterCourses() {
        const category = $('#categoryFilter').val();
        const mode = $('#modeFilter').val();
        
        $('.course-category').each(function() {
          const categoryElement = $(this);
          const categoryType = categoryElement.data('category');
          
          // Show/hide based on category filter
          if (category === 'all' || category === categoryType) {
            categoryElement.show();
            
            // Filter courses within this category by mode
            let hasVisibleCourses = false;
            categoryElement.find('.course-card').each(function() {
              const courseCard = $(this);
              const courseMode = courseCard.find('.badge').hasClass('badge-online') ? 'online' : 
                                courseCard.find('.badge').hasClass('badge-onsite') ? 'onsite' : 'hybrid';
              
              if (mode === 'all' || mode === courseMode) {
                courseCard.parent().show();
                hasVisibleCourses = true;
              } else {
                courseCard.parent().hide();
              }
            });
            
            // If no courses visible in this category, hide the category title
            if (!hasVisibleCourses) {
              categoryElement.hide();
            }
          } else {
            categoryElement.hide();
          }
        });
      }
    });
  </script>
</body>
</html>
