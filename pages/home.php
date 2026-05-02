<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillPro Institute</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        :root {
            --primary: #2c3e50;
            --secondary: #3498db;
            --accent: #e74c3c;
            --light: #ecf0f1;
            --dark: #2c3e50;
        }
        
        body {
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            background-color: var(--primary);
            color: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .navbar h1 {
            font-size: 28px;
            font-weight: 700;
            color: white;
        }
        
        .navbar h1 span {
            color: var(--secondary);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 20px;
            position: relative;
        }
        
        nav ul li a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            padding: 8px 12px;
            border-radius: 4px;
            transition: all 0.3s ease;
        }
        
        nav ul li a:hover {
            background-color: var(--secondary);
            color: white;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(44, 62, 80, 0.8), rgba(44, 62, 80, 0.8)), url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1200&q=80') no-repeat center center/cover;
            height: 250px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: black
            .
            
            
            
            
            
            
            
            
            
            
            
            
            
            ;
            padding: 0 20px;
        }
        
        .hero-content h2 {
            font-size: 48px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero-content p {
            font-size: 20px;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .btn {
            display: inline-block;
            background: var(--secondary);
            color: white;
            padding: 12px 30px;
            border-radius: 5px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 16px;
        }
        
        .btn:hover {
            background: #2980b9;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .btn-accent {
            background: var(--accent);
        }
        
        .btn-accent:hover {
            background: #c0392b;
        }
        
        /* Features Section */
        .features {
            padding: 80px 0;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
            color: var(--primary);
            font-size: 36px;
            position: relative;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--secondary);
        }
        
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .feature-card {
            background: white;
            border-radius: 8px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
        }
        
        .feature-icon {
            font-size: 48px;
            color: var(--secondary);
            margin-bottom: 20px;
        }
        
        .feature-card h3 {
            margin-bottom: 15px;
            color: var(--primary);
        }
        
        /* Courses Section */
        .courses {
            padding: 80px 0;
            background-color: #f5f7fa;
        }
        
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 10px;
        }
        
        .course-card {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-10px);
        }
        
        .course-img {
            height: 100px;
            background-color: #e0e0e0;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 10px;
        }
        
        .course-content {
            padding: 20px;
        }
        
        .course-content h3 {
            margin-bottom: 10px;
            color: var(--primary);
        }
        
        .course-content p {
            color: #666;
            margin-bottom: 15px;
        }
        
        .course-meta {
            display: flex;
            justify-content: space-between;
            color: #888;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        /* Testimonials */
        .testimonials {
            padding: 80px 0;
            background-color: white;
        }
        
        .testimonial-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .testimonial-card {
            background: #f5f7fa;
            border-radius: 8px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .testimonial-text {
            font-style: italic;
            margin-bottom: 20px;
            color: #555;
        }
        
        .testimonial-author {
            display: flex;
            align-items: center;
        }
        
        .author-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background-color: #e0e0e0;
            margin-right: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
        }
        
        .author-info h4 {
            margin-bottom: 5px;
            color: var(--primary);
        }
        
        .author-info p {
            color: #888;
            font-size: 14px;
        }
        
        /* CTA Section */
        .cta {
            padding: 80px 0;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            text-align: center;
        }
        
        .cta h2 {
            font-size: 36px;
            margin-bottom: 20px;
        }
        
        .cta p {
            max-width: 700px;
            margin: 0 auto 30px;
            font-size: 18px;
        }

         
        
        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
            margin-bottom: 40px;
        }
        
        .footer-section h3 {
            margin-bottom: 20px;
            color: var(--secondary);
            font-size: 20px;
        }
        
        .footer-section p, .footer-section a {
            color: #ccc;
            margin-bottom: 10px;
            display: block;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-section a:hover {
            color: white;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        
        .social-icons a:hover {
            background: var(--secondary);
            transform: translateY(-3px);
        }
        
        .copyright {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            color: #999;
            font-size: 14px;
        }
        
        /* Responsive Design */
        @media (max-width: 992px) {
            .navbar {
                flex-direction: column;
                text-align: center;
            }
            
            nav ul {
                margin-top: 20px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 5px 10px;
            }
            
            .hero-content h2 {
                font-size: 36px;
            }
            
            .hero-content p {
                font-size: 18px;
            }
        }
        
        @media (max-width: 768px) {
            .hero {
                height: 400px;
            }
            
            .section-title {
                font-size: 30px;
            }
            
            .features-grid, .courses-grid, .testimonial-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <div class="navbar">
                <h1>Skill<span>Pro</span> Institute</h1>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="calendar.php">Calendar</a></li>
                        <li><a href="feedback.php">Feedback</a></li>
                        <li><a href="login.php">Login</a></li>
                        <li><a href="insert.php">Enroll</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li><a href="dashboard.php">Dashboard</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h2>Advance Your Career with SkillPro</h2>
            <p>Join thousands of students who have transformed their careers through our industry-focused programs and expert instructors.</p>
            <a href="insert.php" class="btn">Enroll Now</a>
            <a href="about.php" class="btn btn-accent">Learn More</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title">Why Choose SkillPro?</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Expert Instructors</h3>
                    <p>Learn from industry professionals with years of practical experience in their fields.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3>Hands-on Learning</h3>
                    <p>Gain practical skills through real-world projects and interactive learning experiences.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Career Support</h3>
                    <p>Get career guidance, resume reviews, and interview preparation to land your dream job.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses">
        <div class="container">
            <h2 class="section-title">Popular Courses</h2>
            <div class="courses-grid">
                <div class="course-card">
                    <div class="course-img">
                       <img src="../Image/23.jpeg" alt="Web Development Image">  
                    </div>
                    <div class="course-content">
                        <h3>Web Development Fundamentals</h3>
                        <p>'Learn HTML, CSS, JavaScript and basic web development concepts. This course is designed for beginners who want to start a career in web development. You will build responsive websites and web applications using modern technologies.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 3 months</span>
                            <span><i class="fas fa-user-graduate"></i> Advanced</span>
                        </div>
                         <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
               
                 <div class="course-card">
                    <div class="course-img">
                      <img src="../Image/25.jpeg" alt="Advanced Welding Techniques Image">  
                    </div>
                    <div class="course-content">
                        <h3>Advanced Welding Techniques</h3>
                        <p>Master advanced welding methods for industrial applications. This hands-on course covers MIG, TIG, and arc welding techniques with safety protocols and quality control.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 6 months</span>
                            <span><i class="fas fa-user-graduate"></i> Intermediate</span>
                        </div>
                       <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-img">
                     <img src="../Image/26.jpeg" alt="Electrical Installation Image">   
                    </div>
                    <div class="course-content">
                        <h3>Electrical Installation</h3>
                        <p>'Learn residential and commercial electrical wiring and installation. This course covers electrical theory, safety procedures, and practical installation techniques.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 4 months</span>
                            <span><i class="fas fa-user-graduate"></i> Intermediate</span>
                        </div>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-img">
                     <img src="../Image/27.jpeg" alt="Plumbing & Pipe Fitting Image">  
                    </div>
                    <div class="course-content">
                        <h3>Plumbing & Pipe Fitting</h3>
                        <p>'Comprehensive training in plumbing systems and pipe installation. Learn about water supply, drainage systems, fixture installation, and pipe fitting techniques.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 4 months</span>
                            <span><i class="fas fa-user-graduate"></i> Intermediate</span>
                        </div>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
                <div class="course-card">
                    <div class="course-img">
                     <img src="../Image/28.jpeg" alt="Hotel Management Diploma Image">   
                    </div>
                    <div class="course-content">
                        <h3>Hotel Management Diploma</h3>
                        <p>'Comprehensive training in hotel operations and management. Learn front office operations, housekeeping management, food and beverage service, and hospitality marketing.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 1 year</span>
                            <span><i class="fas fa-user-graduate"></i> Intermediate</span>
                        </div>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
                


                <div class="course-card">
                    <div class="course-img">
                     <img src="../Image/30.jpeg" alt="Data Science & Analytics Image">   
                    </div>
                    <div class="course-content">
                        <h3>Data Science & Analytics</h3>
                        <p>Master data analysis, visualization, and machine learning techniques. Work with Python, R, SQL, and popular data science libraries to extract insights from data.'</p>
                        <div class="course-meta">
                            <span><i class="far fa-clock"></i> 6 months</span>
                            <span><i class="fas fa-user-graduate"></i> Beginner</span>
                        </div>
                        <a href="#" class="btn">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">What Our Students Say</h2>
            <div class="testimonial-grid">
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The Web Development course at SkillPro completely transformed my career. I went from knowing nothing about coding to landing a job as a junior developer in just 4 months!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Mr.charuka gamage</h4>
                            <p>Web Developer at TechCorp</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "The instructors at SkillPro are exceptional. They don't just teach theory - they share real-world experiences that prepare you for actual job challenges."
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Mr.sadun perera</h4>
                            <p>Data Analyst at DataInsights</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-card">
                    <div class="testimonial-text">
                        "I was hesitant to change careers at 35, but SkillPro's supportive environment and practical curriculum gave me the confidence to make the leap. Best decision ever!"
                    </div>
                    <div class="testimonial-author">
                        <div class="author-img">
                            <i class="fas fa-user"></i>
                        </div>
                        <div class="author-info">
                            <h4>Mr.kusal Perera</h4>
                            <p>Hotel Management Specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <h2>Ready to Transform Your Career?</h2>
            <p>Join SkillPro Institute today and take the first step toward a brighter future. Our admissions team is ready to help you find the perfect program for your goals.</p>
            <a href="insert.php" class="btn btn-accent">Enroll Now</a>
            <a href="about.php" class="btn">Learn More</a>
        </div>
    </section>


   


    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>SkillPro Institute</h3>
                    <p>Providing quality education and career-focused training since 2010. Our mission is to empower individuals with the skills needed for success in today's competitive job market.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="footer-section">
                    <h3>Quick Links</h3>
                    <a href="home.php">Home</a>
                    <a href="about.php">About Us</a>
                    <a href="gallery.php">Gallery</a>
                    <a href="calendar.php">Academic Calendar</a>
                    <a href="feedback.php">Feedback</a>
                </div>
                <div class="footer-section">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Education Street, City, Country</p>
                    <p><i class="fas fa-phone"></i> +1 (555) 123-4567</p>
                    <p><i class="fas fa-envelope"></i> info@skillpro.edu</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 SkillPro Institute. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>