<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Management - SkillPro Institute</title>
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
        
        header {
            background: var(--primary);
            padding: 15px 0;
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
        
        .page-header h1 {
            font-size: 42px;
            margin-bottom: 15px;
        }
        
        .page-header p {
            font-size: 18px;
            max-width: 700px;
            margin: 0 auto;
        }
        
        .payment-container {
            background: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            padding: 30px;
            margin-bottom: 30px;
        }
        
        .payment-tabs {
            border-bottom: 1px solid #dee2e6;
            margin-bottom: 20px;
        }
        
        .payment-tabs .nav-link {
            color: var(--primary) !important;
            border: none;
            border-radius: 0;
            padding: 12px 20px !important;
            margin: 0;
        }
        
        .payment-tabs .nav-link.active {
            color: var(--secondary) !important;
            border-bottom: 3px solid var(--secondary);
            background: transparent;
        }
        
        .payment-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            margin-bottom: 20px;
        }
        
        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.12);
        }
        
        .payment-status-paid {
            background: #d4edda;
            color: #155724;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .payment-status-pending {
            background: #fff3cd;
            color: #856404;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .payment-status-overdue {
            background: #f8d7da;
            color: #721c24;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .payment-method-card {
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .payment-method-card:hover, .payment-method-card.selected {
            border-color: var(--secondary);
            background: #f8f9fa;
        }
        
        .payment-summary {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 20px;
        }
        
        .payment-history-table {
            width: 100%;
        }
        
        .payment-history-table th {
            background: var(--primary);
            color: white;
        }
        
        .btn-pay {
            background: var(--secondary);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-pay:hover {
            background: #2980b9;
            transform: translateY(-2px);
        }
        
        .btn-manage {
            background: var(--primary);
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        
        .btn-manage:hover {
            background: #1a252f;
        }
        
        footer {
            background: var(--dark);
            color: white;
            padding: 60px 0 20px;
            margin-top: 60px;
        }
        
        .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
            margin-right: 10px;
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
        
        .payment-amount {
            font-size: 24px;
            font-weight: bold;
            color: var(--secondary);
        }
        
        .success-message {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 20px;
            display: none;
        }
        
        .receipt-container {
            background: white;
            border: 2px solid #e9ecef;
            border-radius: 10px;
            padding: 30px;
            margin-top: 20px;
            display: none;
        }
        
        @media (max-width: 768px) {
            .page-header h1 {
                font-size: 32px;
            }
            
            .nav-link {
                margin: 2px 0;
                text-align: center;
            }
            
            .payment-tabs .nav-link {
                padding: 10px 15px !important;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-dark">
                <a class="navbar-brand" href="home.php">Skill<span>Pro</span> Institute</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="courses.php">Courses</a></li>
                        <li class="nav-item"><a class="nav-link" href="calendar.php">Calendar</a></li>
                        <li class="nav-item"><a class="nav-link active" href="payment.php">Payments</a></li>
                        <li class="nav-item"><a class="nav-link" href="dashboard.php">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Payment Management</h1>
            <p>Manage your course payments, view payment history, and make secure online payments</p>
        </div>
    </section>

    <!-- Payment Management Section -->
    <section class="py-5">
        <div class="container">
            <div class="payment-container">
                <!-- Payment Tabs -->
                <ul class="nav nav-tabs payment-tabs" id="paymentTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="online-payment-tab" data-bs-toggle="tab" data-bs-target="#online-payment" type="button" role="tab">Online Payment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="make-payment-tab" data-bs-toggle="tab" data-bs-target="#make-payment" type="button" role="tab">Make Payment</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="payment-history-tab" data-bs-toggle="tab" data-bs-target="#payment-history" type="button" role="tab">Payment History</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="manage-payment-tab" data-bs-toggle="tab" data-bs-target="#manage-payment" type="button" role="tab">Manage Payments</button>
                    </li>
                </ul>

                <!-- Tab Content -->
                <div class="tab-content" id="paymentTabsContent">
                    <!-- Online Payment Tab -->
                    <div class="tab-pane fade show active" id="online-payment" role="tabpanel">
                        <div class="success-message" id="successMessage">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-2x text-success me-3"></i>
                                <div>
                                    <h4 class="mb-1">Payment Successful!</h4>
                                    <p class="mb-0">Your payment has been processed successfully. You can download your receipt below.</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="mb-4">Secure Online Payment</h3>
                                
                                <!-- Course Selection -->
                                <div class="mb-4">
                                    <h5>Select Course</h5>
                                    <div class="row" id="onlineCourseSelection">
                                        <!-- Course options will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Student Information -->
                                <div class="mb-4">
                                    <h5>Student Information</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Full Name</label>
                                            <input type="text" class="form-control" id="studentName" placeholder="Enter your full name">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Student ID</label>
                                            <input type="text" class="form-control" id="studentId" placeholder="Enter your student ID">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="studentEmail" placeholder="Enter your email">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="text" class="form-control" id="studentPhone" placeholder="Enter your phone number">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Payment Method -->
                                <div class="mb-4">
                                    <h5>Payment Method</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="credit-card">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-credit-card fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Credit/Debit Card</h6>
                                                        <p class="mb-0 text-muted">Visa, MasterCard, American Express</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="digital-wallet">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-mobile-alt fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Digital Wallet</h6>
                                                        <p class="mb-0 text-muted">eZ Cash, mCash, Genie</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Credit Card Form -->
                                <div id="onlineCreditCardForm" class="mb-4" style="display: none;">
                                    <h5>Card Details</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Card Number</label>
                                            <input type="text" class="form-control" id="cardNumber" placeholder="1234 5678 9012 3456" maxlength="19">
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Expiry Month</label>
                                            <select class="form-control" id="expiryMonth">
                                                <option value="">MM</option>
                                                <option value="01">01</option>
                                                <option value="02">02</option>
                                                <option value="03">03</option>
                                                <option value="04">04</option>
                                                <option value="05">05</option>
                                                <option value="06">06</option>
                                                <option value="07">07</option>
                                                <option value="08">08</option>
                                                <option value="09">09</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">Expiry Year</label>
                                            <select class="form-control" id="expiryYear">
                                                <option value="">YY</option>
                                                <option value="23">23</option>
                                                <option value="24">24</option>
                                                <option value="25">25</option>
                                                <option value="26">26</option>
                                                <option value="27">27</option>
                                                <option value="28">28</option>
                                                <option value="29">29</option>
                                                <option value="30">30</option>
                                            </select>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label class="form-label">CVV</label>
                                            <input type="text" class="form-control" id="cvv" placeholder="123" maxlength="3">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Cardholder Name</label>
                                            <input type="text" class="form-control" id="cardholderName" placeholder="John Doe">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Digital Wallet Form -->
                                <div id="digitalWalletForm" class="mb-4" style="display: none;">
                                    <h5>Digital Wallet Details</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Wallet Type</label>
                                            <select class="form-control" id="walletType">
                                                <option value="">Select Wallet</option>
                                                <option value="ezcash">eZ Cash</option>
                                                <option value="mcash">mCash</option>
                                                <option value="genie">Genie</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Mobile Number</label>
                                            <input type="text" class="form-control" id="walletNumber" placeholder="07X XXX XXXX">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Summary -->
                            <div class="col-md-4">
                                <div class="payment-summary">
                                    <h4 class="mb-4">Payment Summary</h4>
                                    <div id="onlinePaymentSummary">
                                        <p class="text-muted">Select a course to see payment details</p>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button class="btn btn-pay" id="onlinePayNowBtn" disabled>Pay Now Securely</button>
                                    </div>
                                    <div class="mt-3 text-center">
                                        <small class="text-muted">
                                            <i class="fas fa-lock me-1"></i>
                                            Your payment is secure and encrypted
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Receipt Section -->
                        <div class="receipt-container" id="receiptContainer">
                            <div class="text-center mb-4">
                                <h3>Payment Receipt</h3>
                                <p class="text-muted">Transaction Date: <span id="receiptDate"></span></p>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Payment Details</h5>
                                    <p><strong>Transaction ID:</strong> <span id="receiptTransactionId"></span></p>
                                    <p><strong>Course:</strong> <span id="receiptCourse"></span></p>
                                    <p><strong>Amount:</strong> <span id="receiptAmount"></span></p>
                                    <p><strong>Payment Method:</strong> <span id="receiptMethod"></span></p>
                                </div>
                                <div class="col-md-6">
                                    <h5>Student Information</h5>
                                    <p><strong>Name:</strong> <span id="receiptStudentName"></span></p>
                                    <p><strong>Student ID:</strong> <span id="receiptStudentId"></span></p>
                                    <p><strong>Email:</strong> <span id="receiptStudentEmail"></span></p>
                                </div>
                            </div>
                            <hr>
                            <div class="text-center mt-4">
                                <button class="btn btn-primary me-2" id="downloadReceiptBtn">
                                    <i class="fas fa-download me-1"></i>Download Receipt
                                </button>
                                <a href="home.php" class="btn btn-outline-primary">
                                    <i class="fas fa-home me-1"></i>Back to Home
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Make Payment Tab -->
                    <div class="tab-pane fade" id="make-payment" role="tabpanel">
                        <!-- Content from previous implementation -->
                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="mb-4">Pay Course Fees</h3>
                                
                                <!-- Course Selection -->
                                <div class="mb-4">
                                    <h5>Select Course</h5>
                                    <div class="row" id="courseSelection">
                                        <!-- Course options will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Payment Method -->
                                <div class="mb-4">
                                    <h5>Payment Method</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="credit-card">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-credit-card fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Credit/Debit Card</h6>
                                                        <p class="mb-0 text-muted">Visa, MasterCard, American Express</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="bank-transfer">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-university fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Bank Transfer</h6>
                                                        <p class="mb-0 text-muted">Direct bank transfer</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="digital-wallet">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-mobile-alt fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Digital Wallet</h6>
                                                        <p class="mb-0 text-muted">eZ Cash, mCash, Genie</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="payment-method-card" data-method="installment">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-calendar-alt fa-2x text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-1">Installment Plan</h6>
                                                        <p class="mb-0 text-muted">Pay in monthly installments</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Credit Card Form (Initially Hidden) -->
                                <div id="creditCardForm" class="mb-4" style="display: none;">
                                    <h5>Card Details</h5>
                                    <div class="row">
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Card Number</label>
                                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Expiry Date</label>
                                            <input type="text" class="form-control" placeholder="MM/YY">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">CVV</label>
                                            <input type="text" class="form-control" placeholder="123">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label class="form-label">Cardholder Name</label>
                                            <input type="text" class="form-control" placeholder="John Doe">
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Bank Transfer Details (Initially Hidden) -->
                                <div id="bankTransferDetails" style="display: none;">
                                    <h5>Bank Transfer Details</h5>
                                    <div class="alert alert-info">
                                        <p><strong>Bank:</strong> Commercial Bank of Sri Lanka</p>
                                        <p><strong>Account Name:</strong> SkillPro Institute</p>
                                        <p><strong>Account Number:</strong> 123456789012</p>
                                        <p><strong>Branch:</strong> Colombo Main Branch</p>
                                        <p class="mb-0"><strong>Reference:</strong> Please use your Student ID as reference</p>
                                    </div>
                                </div>
                                
                                <!-- Installment Plan (Initially Hidden) -->
                                <div id="installmentPlan" style="display: none;">
                                    <h5>Installment Plan</h5>
                                    <div class="alert alert-warning">
                                        <p>You can pay your course fee in 3 monthly installments. A 5% processing fee will be applied.</p>
                                        <p class="mb-0">First installment must be paid to confirm your enrollment.</p>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="agreeInstallment">
                                        <label class="form-check-label" for="agreeInstallment">
                                            I agree to the installment plan terms and conditions
                                        </label>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Summary -->
                            <div class="col-md-4">
                                <div class="payment-summary">
                                    <h4 class="mb-4">Payment Summary</h4>
                                    <div id="paymentSummary">
                                        <p class="text-muted">Select a course to see payment details</p>
                                    </div>
                                    <div class="d-grid mt-4">
                                        <button class="btn btn-pay" id="payNowBtn" disabled>Pay Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment History Tab -->
                    <div class="tab-pane fade" id="payment-history" role="tabpanel">
                        <h3 class="mb-4">Payment History</h3>
                        <div class="table-responsive">
                            <table class="table table-striped payment-history-table">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Description</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                        <th>Receipt</th>
                                    </tr>
                                </thead>
                                <tbody id="paymentHistoryBody">
                                    <!-- Payment history will be populated by JavaScript -->
                                </tbody>
                            </table>
                        </div>
                        <div class="text-center mt-4">
                            <button class="btn btn-outline-primary" id="loadMorePayments">Load More</button>
                        </div>
                    </div>
                    
                    <!-- Manage Payment Tab -->
                    <div class="tab-pane fade" id="manage-payment" role="tabpanel">
                        <h3 class="mb-4">Manage Payments</h3>
                        <div class="row">
                            <div class="col-md-8">
                                <!-- Outstanding Payments -->
                                <div class="mb-5">
                                    <h4 class="mb-3">Outstanding Payments</h4>
                                    <div id="outstandingPayments">
                                        <!-- Outstanding payments will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Payment Plans -->
                                <div class="mb-5">
                                    <h4 class="mb-3">Payment Plans</h4>
                                    <div id="paymentPlans">
                                        <!-- Payment plans will be populated by JavaScript -->
                                    </div>
                                </div>
                                
                                <!-- Payment Settings -->
                                <div>
                                    <h4 class="mb-3">Payment Settings</h4>
                                    <div class="card payment-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Auto-Pay Setup</h5>
                                            <p class="card-text">Set up automatic payments for your installment plans.</p>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="autoPaySwitch">
                                                <label class="form-check-label" for="autoPaySwitch">Enable Auto-Pay</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card payment-card">
                                        <div class="card-body">
                                            <h5 class="card-title">Payment Notifications</h5>
                                            <p class="card-text">Receive notifications for upcoming payments and payment confirmations.</p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="emailNotifications" checked>
                                                <label class="form-check-label" for="emailNotifications">Email Notifications</label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="smsNotifications">
                                                <label class="form-check-label" for="smsNotifications">SMS Notifications</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Payment Statistics -->
                            <div class="col-md-4">
                                <div class="payment-summary">
                                    <h4 class="mb-4">Payment Statistics</h4>
                                    <div class="mb-3">
                                        <p class="mb-1">Total Paid</p>
                                        <h3 class="payment-amount" id="totalPaid">LKR 0.00</h3>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1">Outstanding Balance</p>
                                        <h3 class="payment-amount text-danger" id="outstandingBalance">LKR 0.00</h3>
                                    </div>
                                    <div class="mb-3">
                                        <p class="mb-1">Next Payment Due</p>
                                        <p class="fw-bold" id="nextPaymentDue">-</p>
                                    </div>
                                    <hr>
                                    <div class="d-grid gap-2">
                                        <button class="btn btn-pay" id="payOutstandingBtn">Pay Outstanding Balance</button>
                                        <button class="btn btn-outline-primary" id="downloadStatement">Download Statement</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                    <p>Providing quality TVET education and career-focused training since 2010. Our mission is to empower individuals with the skills needed for success in today's competitive job market.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Quick Links</h3>
                    <a href="home.php" class="d-block text-decoration-none text-light mb-2">Home</a>
                    <a href="courses.php" class="d-block text-decoration-none text-light mb-2">Courses</a>
                    <a href="payment.php" class="d-block text-decoration-none text-light mb-2">Payments</a>
                    <a href="calendar.php" class="d-block text-decoration-none text-light mb-2">Academic Calendar</a>
                    <a href="dashboard.php" class="d-block text-decoration-none text-light mb-2">Student Dashboard</a>
                </div>
                <div class="col-md-4 mb-4">
                    <h3>Contact Us</h3>
                    <p><i class="fas fa-map-marker-alt me-2"></i> 123 Galle Road, Colombo 03</p>
                    <p><i class="fas fa-phone me-2"></i> +94 11 234 5678</p>
                    <p><i class="fas fa-envelope me-2"></i> payments@skillpro.edu</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2023 SkillPro Institute. All rights reserved. Registered under TVEC Sri Lanka.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sample data for courses
        const courses = [
            { id: 1, name: 'Web Development Fundamentals', fee: 25000, duration: '3 months' },
            { id: 2, name: 'Mobile App Development', fee: 35000, duration: '4 months' },
            { id: 3, name: 'Data Science & Analytics', fee: 45000, duration: '6 months' },
            { id: 4, name: 'Advanced Welding Techniques', fee: 45000, duration: '6 months' },
            { id: 5, name: 'Hotel Management Diploma', fee: 60000, duration: '1 year' }
        ];

        // Sample payment history
        const paymentHistory = [
            { id: 1, date: '2023-09-15', description: 'Web Development - Enrollment Fee', amount: 5000, method: 'Credit Card', status: 'Paid' },
            { id: 2, date: '2023-08-20', description: 'Data Science - First Installment', amount: 15000, method: 'Bank Transfer', status: 'Paid' },
            { id: 3, date: '2023-07-10', description: 'Mobile App Development - Full Payment', amount: 35000, method: 'Digital Wallet', status: 'Paid' },
            { id: 4, date: '2023-10-05', description: 'Web Development - Second Installment', amount: 10000, method: 'Credit Card', status: 'Pending' },
            { id: 5, date: '2023-09-28', description: 'Hotel Management - Registration', amount: 10000, method: 'Bank Transfer', status: 'Paid' }
        ];

        // Sample outstanding payments
        const outstandingPayments = [
            { id: 1, course: 'Web Development Fundamentals', dueDate: '2023-11-05', amount: 10000, status: 'Pending' },
            { id: 2, course: 'Data Science & Analytics', dueDate: '2023-10-20', amount: 15000, status: 'Overdue' }
        ];

        // Sample payment plans
        const paymentPlans = [
            { id: 1, course: 'Web Development Fundamentals', total: 25000, paid: 15000, remaining: 10000, installments: 3, nextDue: '2023-11-05' },
            { id: 2, course: 'Data Science & Analytics', total: 45000, paid: 15000, remaining: 30000, installments: 3, nextDue: '2023-10-20' }
        ];

        // Initialize the page
        $(document).ready(function() {
            // Populate course selection for online payment
            populateOnlineCourseSelection();
            
            // Populate course selection for regular payment
            populateCourseSelection();
            
            // Populate payment history
            populatePaymentHistory();
            
            // Populate outstanding payments
            populateOutstandingPayments();
            
            // Populate payment plans
            populatePaymentPlans();
            
            // Calculate and display payment statistics
            updatePaymentStatistics();
            
            // Online Payment method selection
            $('.payment-method-card').click(function() {
                $('.payment-method-card').removeClass('selected');
                $(this).addClass('selected');
                
                // Show/hide relevant forms
                const method = $(this).data('method');
                $('#onlineCreditCardForm').hide();
                $('#digitalWalletForm').hide();
                
                if (method === 'credit-card') {
                    $('#onlineCreditCardForm').show();
                } else if (method === 'digital-wallet') {
                    $('#digitalWalletForm').show();
                }
                
                updateOnlinePayNowButton();
            });
            
            // Online Course selection
            $(document).on('click', '.online-course-option', function() {
                $('.online-course-option').removeClass('selected');
                $(this).addClass('selected');
                
                const courseId = $(this).data('id');
                const course = courses.find(c => c.id === courseId);
                
                // Update payment summary
                $('#onlinePaymentSummary').html(`
                    <div class="d-flex justify-content-between mb-2">
                        <span>Course Fee:</span>
                        <span>LKR ${course.fee.toLocaleString()}.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Registration Fee:</span>
                        <span>LKR 1,000.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total Amount:</strong>
                        <strong class="payment-amount">LKR ${(course.fee + 1000).toLocaleString()}.00</strong>
                    </div>
                `);
                
                updateOnlinePayNowButton();
            });
            
            // Online Pay Now button
            $('#onlinePayNowBtn').click(function() {
                if (validateOnlinePaymentForm()) {
                    processOnlinePayment();
                }
            });
            
            // Download Receipt button
            $('#downloadReceiptBtn').click(function() {
                downloadReceipt();
            });
            
            // Regular payment functionality (from previous implementation)
            $('.payment-method-card').click(function() {
                $('.payment-method-card').removeClass('selected');
                $(this).addClass('selected');
                
                const method = $(this).data('method');
                $('#creditCardForm').hide();
                $('#bankTransferDetails').hide();
                $('#installmentPlan').hide();
                
                if (method === 'credit-card') {
                    $('#creditCardForm').show();
                } else if (method === 'bank-transfer') {
                    $('#bankTransferDetails').show();
                } else if (method === 'installment') {
                    $('#installmentPlan').show();
                }
                
                updatePayNowButton();
            });
            
            $(document).on('click', '.course-option', function() {
                $('.course-option').removeClass('selected');
                $(this).addClass('selected');
                
                const courseId = $(this).data('id');
                const course = courses.find(c => c.id === courseId);
                
                $('#paymentSummary').html(`
                    <div class="d-flex justify-content-between mb-2">
                        <span>Course Fee:</span>
                        <span>LKR ${course.fee.toLocaleString()}.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <span>Registration Fee:</span>
                        <span>LKR 1,000.00</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <strong>Total Amount:</strong>
                        <strong class="payment-amount">LKR ${(course.fee + 1000).toLocaleString()}.00</strong>
                    </div>
                `);
                
                updatePayNowButton();
            });
            
            $('#payNowBtn').click(function() {
                const selectedCourse = $('.course-option.selected');
                const selectedMethod = $('.payment-method-card.selected');
                
                if (selectedCourse.length && selectedMethod.length) {
                    const courseId = selectedCourse.data('id');
                    const course = courses.find(c => c.id === courseId);
                    const method = selectedMethod.data('method');
                    
                    alert(`Payment of LKR ${(course.fee + 1000).toLocaleString()}.00 for ${course.name} via ${method} has been processed successfully!`);
                    
                    $('.course-option').removeClass('selected');
                    $('.payment-method-card').removeClass('selected');
                    $('#paymentSummary').html('<p class="text-muted">Select a course to see payment details</p>');
                    $('#creditCardForm, #bankTransferDetails, #installmentPlan').hide();
                    updatePayNowButton();
                }
            });
            
            $('#loadMorePayments').click(function() {
                alert('Loading more payment records...');
            });
            
            $('#payOutstandingBtn').click(function() {
                const totalOutstanding = outstandingPayments.reduce((sum, payment) => sum + payment.amount, 0);
                alert(`Paying outstanding balance of LKR ${totalOutstanding.toLocaleString()}.00`);
            });
            
            $('#downloadStatement').click(function() {
                alert('Downloading payment statement...');
            });
        });

        // Function to populate online course selection
        function populateOnlineCourseSelection() {
            let html = '';
            courses.forEach(course => {
                html += `
                    <div class="col-md-6 mb-3">
                        <div class="card online-course-option" data-id="${course.id}">
                            <div class="card-body">
                                <h5 class="card-title">${course.name}</h5>
                                <p class="card-text">Duration: ${course.duration}</p>
                                <p class="card-text"><strong>Fee: LKR ${course.fee.toLocaleString()}.00</strong></p>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#onlineCourseSelection').html(html);
        }

        // Function to populate course selection
        function populateCourseSelection() {
            let html = '';
            courses.forEach(course => {
                html += `
                    <div class="col-md-6 mb-3">
                        <div class="card course-option" data-id="${course.id}">
                            <div class="card-body">
                                <h5 class="card-title">${course.name}</h5>
                                <p class="card-text">Duration: ${course.duration}</p>
                                <p class="card-text"><strong>Fee: LKR ${course.fee.toLocaleString()}.00</strong></p>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#courseSelection').html(html);
        }

        // Function to validate online payment form
        function validateOnlinePaymentForm() {
            const studentName = $('#studentName').val();
            const studentId = $('#studentId').val();
            const studentEmail = $('#studentEmail').val();
            const studentPhone = $('#studentPhone').val();
            const selectedCourse = $('.online-course-option.selected');
            const selectedMethod = $('.payment-method-card.selected');
            
            if (!studentName || !studentId || !studentEmail || !studentPhone) {
                alert('Please fill in all student information fields.');
                return false;
            }
            
            if (!selectedCourse.length) {
                alert('Please select a course.');
                return false;
            }
            
            if (!selectedMethod.length) {
                alert('Please select a payment method.');
                return false;
            }
            
            const method = selectedMethod.data('method');
            if (method === 'credit-card') {
                const cardNumber = $('#cardNumber').val();
                const expiryMonth = $('#expiryMonth').val();
                const expiryYear = $('#expiryYear').val();
                const cvv = $('#cvv').val();
                const cardholderName = $('#cardholderName').val();
                
                if (!cardNumber || !expiryMonth || !expiryYear || !cvv || !cardholderName) {
                    alert('Please fill in all credit card details.');
                    return false;
                }
                
                if (cardNumber.replace(/\s/g, '').length !== 16) {
                    alert('Please enter a valid 16-digit card number.');
                    return false;
                }
                
                if (cvv.length !== 3) {
                    alert('Please enter a valid 3-digit CVV.');
                    return false;
                }
            } else if (method === 'digital-wallet') {
                const walletType = $('#walletType').val();
                const walletNumber = $('#walletNumber').val();
                
                if (!walletType || !walletNumber) {
                    alert('Please fill in all digital wallet details.');
                    return false;
                }
                
                if (walletNumber.length !== 10) {
                    alert('Please enter a valid 10-digit mobile number.');
                    return false;
                }
            }
            
            return true;
        }

        // Function to process online payment
        function processOnlinePayment() {
            // Show loading state
            $('#onlinePayNowBtn').html('<i class="fas fa-spinner fa-spin me-2"></i>Processing...').prop('disabled', true);
            
            // Simulate payment processing
            setTimeout(function() {
                // Generate receipt data
                const selectedCourse = $('.online-course-option.selected');
                const courseId = selectedCourse.data('id');
                const course = courses.find(c => c.id === courseId);
                const selectedMethod = $('.payment-method-card.selected');
                const method = selectedMethod.data('method');
                
                const receiptData = {
                    transactionId: 'TXN' + Date.now(),
                    course: course.name,
                    amount: course.fee + 1000,
                    method: method === 'credit-card' ? 'Credit Card' : 'Digital Wallet',
                    studentName: $('#studentName').val(),
                    studentId: $('#studentId').val(),
                    studentEmail: $('#studentEmail').val(),
                    date: new Date().toLocaleDateString('en-US', { 
                        year: 'numeric', 
                        month: 'long', 
                        day: 'numeric',
                        hour: '2-digit',
                        minute: '2-digit'
                    })
                };
                
                // Save to database (simulated)
                savePaymentToDatabase(receiptData);
                
                // Show success message and receipt
                $('#successMessage').show();
                showReceipt(receiptData);
                
                // Reset form
                $('#onlinePayNowBtn').html('Pay Now Securely').prop('disabled', false);
                resetOnlinePaymentForm();
                
            }, 2000);
        }

        // Function to save payment to database (simulated)
        function savePaymentToDatabase(paymentData) {
            // In a real application, this would be an AJAX call to your server
            console.log('Saving payment to database:', paymentData);
            
            // Simulate database save
            const paymentRecord = {
                id: paymentHistory.length + 1,
                date: new Date().toISOString().split('T')[0],
                description: paymentData.course + ' - Online Payment',
                amount: paymentData.amount,
                method: paymentData.method,
                status: 'Paid',
                transactionId: paymentData.transactionId
            };
            
            // Add to payment history
            paymentHistory.unshift(paymentRecord);
            
            // Update payment history display
            populatePaymentHistory();
            updatePaymentStatistics();
        }

        // Function to show receipt
        function showReceipt(receiptData) {
            $('#receiptTransactionId').text(receiptData.transactionId);
            $('#receiptCourse').text(receiptData.course);
            $('#receiptAmount').text('LKR ' + receiptData.amount.toLocaleString() + '.00');
            $('#receiptMethod').text(receiptData.method);
            $('#receiptStudentName').text(receiptData.studentName);
            $('#receiptStudentId').text(receiptData.studentId);
            $('#receiptStudentEmail').text(receiptData.studentEmail);
            $('#receiptDate').text(receiptData.date);
            
            $('#receiptContainer').show();
            
            // Scroll to receipt
            $('html, body').animate({
                scrollTop: $('#receiptContainer').offset().top - 100
            }, 1000);
        }

        // Function to download receipt
        function downloadReceipt() {
            const receiptContent = `
                SkillPro Institute - Payment Receipt
                ==================================
                
                Transaction ID: ${$('#receiptTransactionId').text()}
                Date: ${$('#receiptDate').text()}
                
                Student Information:
                -------------------
                Name: ${$('#receiptStudentName').text()}
                Student ID: ${$('#receiptStudentId').text()}
                Email: ${$('#receiptStudentEmail').text()}
                
                Payment Details:
                ---------------
                Course: ${$('#receiptCourse').text()}
                Amount: ${$('#receiptAmount').text()}
                Payment Method: ${$('#receiptMethod').text()}
                
                Thank you for your payment!
                
                SkillPro Institute
                123 Galle Road, Colombo 03
                +94 11 234 5678
                payments@skillpro.edu
            `;
            
            const blob = new Blob([receiptContent], { type: 'text/plain' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `payment_receipt_${$('#receiptTransactionId').text()}.txt`;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            alert('Receipt downloaded successfully!');
        }

        // Function to reset online payment form
        function resetOnlinePaymentForm() {
            $('.online-course-option').removeClass('selected');
            $('.payment-method-card').removeClass('selected');
            $('#onlinePaymentSummary').html('<p class="text-muted">Select a course to see payment details</p>');
            $('#onlineCreditCardForm, #digitalWalletForm').hide();
            $('#studentName, #studentId, #studentEmail, #studentPhone, #cardNumber, #cvv, #cardholderName, #walletNumber').val('');
            $('#expiryMonth, #expiryYear, #walletType').val('');
            updateOnlinePayNowButton();
        }

        // Function to update online Pay Now button state
        function updateOnlinePayNowButton() {
            const hasSelectedCourse = $('.online-course-option.selected').length > 0;
            const hasSelectedMethod = $('.payment-method-card.selected').length > 0;
            
            if (hasSelectedCourse && hasSelectedMethod) {
                $('#onlinePayNowBtn').prop('disabled', false);
            } else {
                $('#onlinePayNowBtn').prop('disabled', true);
            }
        }

        // Function to update Pay Now button state
        function updatePayNowButton() {
            const hasSelectedCourse = $('.course-option.selected').length > 0;
            const hasSelectedMethod = $('.payment-method-card.selected').length > 0;
            
            if (hasSelectedCourse && hasSelectedMethod) {
                $('#payNowBtn').prop('disabled', false);
            } else {
                $('#payNowBtn').prop('disabled', true);
            }
        }

        // Function to populate payment history
        function populatePaymentHistory() {
            let html = '';
            paymentHistory.forEach(payment => {
                let statusClass = '';
                if (payment.status === 'Paid') {
                    statusClass = 'payment-status-paid';
                } else if (payment.status === 'Pending') {
                    statusClass = 'payment-status-pending';
                } else {
                    statusClass = 'payment-status-overdue';
                }
                
                html += `
                    <tr>
                        <td>${payment.date}</td>
                        <td>${payment.description}</td>
                        <td>LKR ${payment.amount.toLocaleString()}.00</td>
                        <td>${payment.method}</td>
                        <td><span class="${statusClass}">${payment.status}</span></td>
                        <td><a href="#" class="btn btn-sm btn-outline-primary">Download</a></td>
                    </tr>
                `;
            });
            $('#paymentHistoryBody').html(html);
        }

        // Function to populate outstanding payments
        function populateOutstandingPayments() {
            let html = '';
            outstandingPayments.forEach(payment => {
                let statusClass = '';
                if (payment.status === 'Pending') {
                    statusClass = 'payment-status-pending';
                } else {
                    statusClass = 'payment-status-overdue';
                }
                
                html += `
                    <div class="card payment-card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h5 class="card-title">${payment.course}</h5>
                                    <p class="card-text mb-1">Due Date: ${payment.dueDate}</p>
                                    <p class="card-text"><strong>Amount: LKR ${payment.amount.toLocaleString()}.00</strong></p>
                                </div>
                                <div class="text-end">
                                    <span class="${statusClass} mb-2 d-inline-block">${payment.status}</span>
                                    <br>
                                    <button class="btn btn-pay pay-outstanding" data-id="${payment.id}">Pay Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#outstandingPayments').html(html);
            
            // Add event listeners for pay buttons
            $('.pay-outstanding').click(function() {
                const paymentId = $(this).data('id');
                const payment = outstandingPayments.find(p => p.id === paymentId);
                alert(`Paying LKR ${payment.amount.toLocaleString()}.00 for ${payment.course}`);
            });
        }

        // Function to populate payment plans
        function populatePaymentPlans() {
            let html = '';
            paymentPlans.forEach(plan => {
                const progress = Math.round((plan.paid / plan.total) * 100);
                
                html += `
                    <div class="card payment-card">
                        <div class="card-body">
                            <h5 class="card-title">${plan.course}</h5>
                            <div class="mb-3">
                                <div class="d-flex justify-content-between mb-1">
                                    <span>Payment Progress</span>
                                    <span>${progress}%</span>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: ${progress}%"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <p class="mb-1">Total Fee</p>
                                    <p class="fw-bold">LKR ${plan.total.toLocaleString()}.00</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1">Paid</p>
                                    <p class="fw-bold text-success">LKR ${plan.paid.toLocaleString()}.00</p>
                                </div>
                                <div class="col-md-4">
                                    <p class="mb-1">Remaining</p>
                                    <p class="fw-bold text-danger">LKR ${plan.remaining.toLocaleString()}.00</p>
                                </div>
                            </div>
                            <div class="mt-3">
                                <p class="mb-1">Next Installment Due: ${plan.nextDue}</p>
                                <button class="btn btn-pay pay-installment" data-id="${plan.id}">Pay Installment</button>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#paymentPlans').html(html);
            
            // Add event listeners for pay installment buttons
            $('.pay-installment').click(function() {
                const planId = $(this).data('id');
                const plan = paymentPlans.find(p => p.id === planId);
                alert(`Paying installment for ${plan.course}`);
            });
        }

        // Function to update payment statistics
        function updatePaymentStatistics() {
            const totalPaid = paymentHistory
                .filter(p => p.status === 'Paid')
                .reduce((sum, payment) => sum + payment.amount, 0);
                
            const totalOutstanding = outstandingPayments.reduce((sum, payment) => sum + payment.amount, 0);
            
            const nextPayment = outstandingPayments.length > 0 ? 
                outstandingPayments.reduce((earliest, payment) => 
                    payment.dueDate < earliest.dueDate ? payment : earliest, outstandingPayments[0]) : 
                null;
            
            $('#totalPaid').text(`LKR ${totalPaid.toLocaleString()}.00`);
            $('#outstandingBalance').text(`LKR ${totalOutstanding.toLocaleString()}.00`);
            $('#nextPaymentDue').text(nextPayment ? `${nextPayment.dueDate} - LKR ${nextPayment.amount.toLocaleString()}.00` : '-');
        }
    </script>
</body>
</html>