<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salary Calculator - Indian Rupees (INR)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Base Styles */
        :root {
            --primary-color:rgb(228, 22, 194);
            --secondary-color:rgb(103, 16, 209);
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --success-color: #27ae60;
            --danger-color: #e74c3c;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --border-radius: 8px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f7fa;
            color: #333;
            line-height: 1.6;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        /* Header Styles */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            padding: 1rem 0;
            box-shadow: var(--shadow);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .logo i {
            font-size: 1.8rem;
        }

        nav ul {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        nav a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.5rem 0;
            border-bottom: 2px solid transparent;
        }

        nav a:hover, nav a.active {
            border-bottom: 2px solid white;
        }

        /* Main Content */
        main {
            flex: 1;
            padding-top: 80px;
            padding-bottom: 60px;
        }

        .hero {
            background: linear-gradient(rgba(119, 11, 136, 0.9), rgba(41, 128, 185, 0.9)), 
                        url('https://images.unsplash.com/photo-1450101499163-c8848c66ca85?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 4rem 1rem;
            margin-bottom: 2rem;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .calculator-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 3rem;
        }

        /* Calculator Form */
        .calculator-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        .calculator-card h2 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.8rem;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 1.2rem;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        label {
            font-weight: 600;
            color: var(--dark-color);
        }

        input[type="number"] {
            padding: 0.8rem;
            border: 1px solid #ddd;
            border-radius: var(--border-radius);
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input[type="number"]:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(52, 152, 219, 0.2);
            outline: none;
        }

        button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 1rem;
            border-radius: var(--border-radius);
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 0.5rem;
        }

        button:hover {
            background-color: var(--secondary-color);
            transform: translateY(-2px);
        }

        /* Results Section */
        .results-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 2rem;
        }

        .results-card h3 {
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            text-align: center;
            font-size: 1.5rem;
        }

        .result-item {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 0;
            border-bottom: 1px solid #eee;
        }

        .result-item:last-child {
            border-bottom: none;
        }

        .result-label {
            font-weight: 600;
            color: var(--dark-color);
        }

        .result-value {
            font-weight: bold;
            color: var(--primary-color);
        }

        .net-salary {
            font-size: 1.2rem;
            color: var(--success-color);
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 2px solid #eee;
        }

        /* Features Section */
        .features {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin: 3rem 0;
        }

        .feature-card {
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            padding: 1.5rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .feature-card h3 {
            margin-bottom: 1rem;
            color: var(--dark-color);
        }

        /* Footer */
        footer {
            background: var(--dark-color);
            color: white;
            padding: 2rem 0;
            margin-top: auto;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-column h3 {
            margin-bottom: 1.5rem;
            font-size: 1.2rem;
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 0.8rem;
        }

        .footer-column a {
            color: #ddd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column a:hover {
            color: white;
        }

        .social-links {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .social-links a {
            color: white;
            font-size: 1.2rem;
        }

        .copyright {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.9rem;
            color: #bbb;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .calculator-section {
                grid-template-columns: 1fr;
            }
            
            .hero h1 {
                font-size: 2rem;
            }
        }

        @media (max-width: 768px) {
            .header-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }
            
            nav ul {
                gap: 1rem;
            }
            
            .hero {
                padding: 3rem 1rem;
            }
            
            .hero h1 {
                font-size: 1.8rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .container {
                padding: 0 1rem;
            }
        }

        @media (max-width: 576px) {
            nav ul {
                flex-direction: column;
                align-items: center;
                gap: 0.5rem;
            }
            
            .features {
                grid-template-columns: 1fr;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        /* Animation */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .calculator-card, .results-card, .feature-card {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .feature-card:nth-child(2) {
            animation-delay: 0.2s;
        }

        .feature-card:nth-child(3) {
            animation-delay: 0.4s;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-container">
            <div class="logo">
                <i class="fas fa-calculator"></i>
                <span>SalaryCalc</span>
            </div>
            <nav>
                <ul>
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#">Calculator</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        <!-- Hero Section -->
        <section class="hero">
            <h1>Calculate Your Monthly Salary in INR</h1>
            <p>Get accurate estimates of your gross and net salary based on your hourly rate and working days</p>
        </section>

        <div class="container">
            <!-- Calculator Section -->
            <section class="calculator-section">
                <!-- Calculator Form -->
                <div class="calculator-card">
                    <h2>Salary Calculator</h2>
                    <form method="post" id="salary-form">
                        <div class="form-group">
                            <label for="hours_per_day">Hours Worked per Day:</label>
                            <input type="number" id="hours_per_day" name="hours_per_day" min="1" max="24" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="rate_per_hour">Hourly Rate (₹):</label>
                            <input type="number" id="rate_per_hour" name="rate_per_hour" min="1" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="working_days">Working Days per Month:</label>
                            <input type="number" id="working_days" name="working_days" min="1" max="31" value="22" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="deductions">Deductions (₹):</label>
                            <input type="number" id="deductions" name="deductions" min="0" value="0">
                        </div>
                        
                        <button type="submit">
                            <i class="fas fa-calculator"></i> Calculate Salary
                        </button>
                    </form>
                </div>

                <!-- Results Section -->
                <div class="results-card">
                    <h3>Your Salary Breakdown</h3>
                    <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Collect form data
                        $hours_per_day = $_POST['hours_per_day'];
                        $rate_per_hour = $_POST['rate_per_hour'];
                        $working_days = $_POST['working_days'];
                        $deductions = $_POST['deductions'] ?? 0;

                        // Calculate salaries
                        $gross_salary = $hours_per_day * $rate_per_hour * $working_days;
                        $net_salary = $gross_salary - $deductions;
                        $per_day_salary = $gross_salary / $working_days;
                        $per_hour_salary = $rate_per_hour;

                        echo '<div class="result-item">
                                <span class="result-label">Gross Salary:</span>
                                <span class="result-value">₹' . number_format($gross_salary, 2) . '</span>
                              </div>';
                              
                        echo '<div class="result-item">
                                <span class="result-label">Deductions:</span>
                                <span class="result-value">₹' . number_format($deductions, 2) . '</span>
                              </div>';
                              
                        echo '<div class="result-item">
                                <span class="result-label">Per Day Salary:</span>
                                <span class="result-value">₹' . number_format($per_day_salary, 2) . '</span>
                              </div>';
                              
                        echo '<div class="result-item">
                                <span class="result-label">Per Hour Salary:</span>
                                <span class="result-value">₹' . number_format($per_hour_salary, 2) . '</span>
                              </div>';
                              
                        echo '<div class="result-item net-salary">
                                <span class="result-label">Net Salary:</span>
                                <span class="result-value">₹' . number_format($net_salary, 2) . '</span>
                              </div>';

                        // Reset the form data using JavaScript
                        echo "<script>document.getElementById('salary-form').reset();</script>";
                    } else {
                        echo '<p style="text-align: center; color: #666;">Enter your details in the calculator to see your salary breakdown</p>';
                    }
                    ?>
                </div>
            </section>

            <!-- Features Section -->
            <section class="features">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3>Hourly Calculation</h3>
                    <p>Calculate your salary based on your exact hourly rate and hours worked per day.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Flexible Days</h3>
                    <p>Adjust the number of working days to match your actual work schedule.</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-rupee-sign"></i>
                    </div>
                    <h3>Deductions</h3>
                    <p>Account for any deductions to get an accurate net salary calculation.</p>
                </div>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-column">
                <h3>SalaryCalc</h3>
                <p>Your trusted tool for accurate salary calculations in Indian Rupees.</p>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-linkedin"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <div class="footer-column">
                <h3>Quick Links</h3>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Calculator</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Resources</h3>
                <ul>
                    <li><a href="#">Salary Guides</a></li>
                    <li><a href="#">Tax Information</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </div>
            
            <div class="footer-column">
                <h3>Contact</h3>
                <ul>
                    <li><i class="fas fa-envelope"></i> info@salarycalc.com</li>
                    <li><i class="fas fa-phone"></i> +91 9876543210</li>
                    <li><i class="fas fa-map-marker-alt"></i> Sakoli, Nagpure India</li>
                </ul>
            </div>
        </div>
        
        <div class="copyright">
            <p>&copy; 2025 SalaryCalc. All rights reserved.</p>
            <p>Develop by Himanshu Girhepunje</p>
        </div>
    </footer>
</body>
</html>