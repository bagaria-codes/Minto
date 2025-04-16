<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Internal Styles for Learn Page */
        :root {
            --light-gray: #f9f9f9;
            --deep-green: #48705A;
            --sage-green: #6E9277;
            --dark-gray: #333;
            --light-accent: #E5DEFF;
            --soft-green: #F2FCE2;
            --soft-blue: #D3E4FD;
        }
        body {
 
            background: linear-gradient(135deg, #f5f9f7 0%, #e6f0ec 100%);
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .hero-section {
            background: linear-gradient(to right, var(--deep-green), var(--sage-green));
            padding: 100px 0 80px;
            text-align: center;
            color: white;
            margin-bottom: 10px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }
        .hero-section h1 {
            font-size: 3.2rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: -0.5px;
        }
        .hero-section p {
            font-size: 1.5rem;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto;
            opacity: 0.95;
        }
        .section-heading {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        .section-heading:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--sage-green);
            border-radius: 2px;
        }
        .content-section {
            padding: 40px 0;
        }
        .content-card {
            background: white;
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            margin-bottom: 20px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .content-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }
        .content-section p {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #555;
        }
        .check-list {
            list-style: none;
            padding: 0;
            margin-top: 20px;
        }
        .check-list li {
            margin-bottom: 2px;
            display: flex;
            align-items: flex-start;
        }
        .check-list li i {
            margin-right: 15px;
            color: var(--deep-green);
            font-size: 1.2rem;
            padding: 6px;
            border-radius: 50%;
            min-width: 32px;
            text-align: center;
        }
        .check-list li p {
            font-size: 1.1rem;
            margin: 0;
        }

        .video-section {
            background-color: var(--light-accent);
            padding: 80px 0;
            margin: 60px 0;
            border-radius: 20px;
        }
        .video-card {
            background-color: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            margin-bottom: 30px;
            height: 100%;
            transition: transform 0.3s ease;
        }
        .video-card:hover {
            transform: translateY(-5px);
        }
        .video-card h3 {
            color: var(--deep-green);
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }
        .video-card iframe {
            width: 100%;
            height: 215px;
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .video-card p {
            margin-top: 15px;
            font-weight: 500;
        }
        .topic-card {
            background-color: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            margin-bottom: 30px;
            height: 100%;
            padding: 30px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .topic-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
            border-top: 4px solid var(--sage-green);
        }
        .topic-card-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--deep-green);
            margin-bottom: 15px;
        }
        .topic-card-text {
            font-size: 1.1rem;
            color: #555;
        }
        .resources-section {
            background-color: var(--soft-blue);
            padding: 60px 0;
            border-radius: 20px;
            margin: 60px 0;
        }
        .recommended-reads {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            height: 100%;
        }
        .recommended-reads h3 {
            color: var(--deep-green);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }
        .recommended-reads ul {
            list-style: none;
            padding: 0;
        }
        .recommended-reads ul li {
            margin-bottom: 15px;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }
        .recommended-reads ul li:hover {
            background-color: var(--light-gray);
            border-radius: 8px;
        }
        .recommended-reads ul li a {
            color: var(--deep-green);
            text-decoration: none;
            font-weight: 500;
            display: block;
        }
        .tools-calculators {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            height: 100%;
        }
        .tools-calculators h3 {
            color: var(--deep-green);
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 30px;
            text-align: center;
        }
        .tools-calculators ul {
            list-style: none;
            padding: 0;
        }
        .tools-calculators ul li {
            margin-bottom: 15px;
            padding: 15px;
            border-bottom: 1px solid #eee;
            transition: background-color 0.3s ease;
        }
        .tools-calculators ul li:hover {
            background-color: var(--light-gray);
            border-radius: 8px;
        }
        .tools-calculators ul li a {
            color: var(--deep-green);
            text-decoration: none;
            font-weight: 500;
            display: block;
        }
        .cta-section {
            margin: 60px 0;
        }
        .cta-box {
            background: linear-gradient(to right, var(--deep-green), var(--sage-green));
            color: white;
            padding: 60px 40px;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            text-align: center;
        }
        .cta-box h3 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .cta-box p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            opacity: 0.95;
        }
        .btn-cta {
            background-color: white;
            color: var(--deep-green);
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
            margin: 0 10px 10px;
        }
        .btn-cta:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .btn-outline {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        .btn-outline:hover {
            background-color: white;
            color: var(--deep-green);
        }
        .progress-section {
            margin: 60px 0;
        }
        .progress-bar-container {
            background-color: white;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }
        .progress-bar-bg {
            height: 12px;
            background-color: #eee;
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 10px;
        }
        .progress-bar-fill {
            background: linear-gradient(to right, var(--sage-green), var(--deep-green));
            width: 33%;
            height: 100%;
            border-radius: 10px;
            transition: width 1.5s ease-in-out;
        }
        .progress-text {
            font-size: 1rem;
            color: #666;
            font-weight: 500;
            text-align: center;
        }
        .feedback-button {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: var(--deep-green);
            color: white;
            border: none;
            padding: 15px 25px;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            z-index: 100;
        }
        .feedback-button i {
            margin-right: 8px;
        }
        .feedback-button:hover {
            background-color: var(--sage-green);
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        
        @media (max-width: 991px) {
            .hero-section {
                padding: 70px 0 50px;
            }
            .hero-section h1 {
                font-size: 2.5rem;
            }
            .hero-section p {
                font-size: 1.2rem;
            }
            .section-heading {
                font-size: 2rem;
            }
            .content-card {
                padding: 30px;
            }
            .carousel-item {
                height: 300px;
            }
        }
        @media (max-width: 767px) {
            .hero-section {
                padding: 50px 0 40px;
            }
            .hero-section h1 {
                font-size: 2rem;
            }
            .hero-section p {
                font-size: 1rem;
            }
            .section-heading {
                font-size: 1.8rem;
            }
            .content-section {
                padding: 40px 0;
            }
            .content-card {
                padding: 20px;
                margin-bottom: 30px;
            }
            .carousel-item {
                height: 250px;
            }
            .video-card iframe {
                height: 200px;
            }
            .cta-box {
                padding: 40px 20px;
            }
            .cta-box h3 {
                font-size: 1.8rem;
            }
            .carousel-caption h2 {
                font-size: 1.5rem;
            }
            .carousel-caption p {
                font-size: 1rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
                <img src="images/Logo.jpg" alt="Minto Logo" class="me-2" style="width: 50px; height: 50px; border-radius: 50%">
                Minto
            </a>
            <!-- Toggler for mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-3">
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="trackersDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Trackers
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="trackersDropdown">
                            <li><a class="dropdown-item" href="income.php">Income</a></li>
                            <li><a class="dropdown-item" href="expenses.php">Expenses</a></li>
                            <li><a class="dropdown-item" href="transaction-history.php">Transactions</a></li>
                            <li><a class="dropdown-item" href="investment-tracker.php">Investments</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="goals.php">Goals</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="learn.php">Learn</a>
                    </li>
                    <!-- Profile Dropdown -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="images/person1.jpg" alt="User" width="32" height="32" class="rounded-circle">
                            <span>Profile</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a class="dropdown-item" href="profile.php">View Profile</a></li>
                            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
                            <li><a class="dropdown-item" href="notifications.php">Notifications</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>Welcome to Minto's Financial Literacy Hub</h1>
            <p class="lead">Empower your financial journey with knowledge and tools.</p>
        </div>
    </section>


    <!-- Embedded YouTube Videos -->
    <section class="video-section">
        <div class="container">
            <h2 class="section-heading">Expert Insights</h2>
            <div class="row">
                <div class="col-md-4">
                    <div class="video-card">
                        <h3>Basics of Stock Market</h3>
                        <iframe src="https://www.youtube.com/embed/Xn7KWR9EOGQ" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="text-center mt-3">By CA Rachana Ranade</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="video-card">
                        <h3>10 Personal Finance Rules</h3>
                        <iframe src="https://www.youtube.com/embed/NvkS7O7yNcQ" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="text-center mt-3">By Pranjal Kamra</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="video-card">
                        <h3>Trading vs Investing</h3>
                        <iframe src="https://www.youtube.com/embed/dmqoqVwFopE" title="YouTube video player" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <p class="text-center mt-3">By The Plain Bagel</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Essential Topics Cards -->
    <section class="content-section">
        <div class="container">
            <h2 class="section-heading">Essential Topics</h2>
            <div class="row">
                <div class="col-md-4" style="height: 160px">
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-cash-stack"></i> Emergency Funds</h5>
                        <p class="topic-card-text">Learn why having an emergency fund is crucial for financial stability.</p>
                    </div>
                </div>
                <div class="col-md-4" style="height: 160px">
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-mortarboard"></i> How to Save as a Student</h5>
                        <p class="topic-card-text">Tips for saving money while studying.</p>
                    </div>
                </div>
                <div class="col-md-4" style="height: 160px">
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-receipt"></i> Managing Monthly Bills</h5>
                        <p class="topic-card-text">Strategies to keep your bills under control.</p>
                    </div>
                </div>
                <div class="col-md-12" style="height: 30px">
                    <br>
                </div>
                <div class="col-md-4" >
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-bank"></i> Difference Between Assets and Liabilities</h5>
                        <p class="topic-card-text">Understand the difference to improve your financial health.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-credit-card"></i> Credit Card Do's and Don'ts</h5>
                        <p class="topic-card-text">Learn how to use credit cards responsibly.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="topic-card">
                        <h5 class="topic-card-title"><i class="bi bi-piggy-bank"></i> Understanding Compound Interest</h5>
                        <p class="topic-card-text">Discover how compound interest works and benefits investments.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Resources Section -->
    <section class="resources-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="recommended-reads">
                        <h3>Recommended Reads</h3>
                        <ul>
                            <li><a href="https://www.amazon.com/Rich-Dad-Poor-Dad-Robert-Kiyosaki/dp/0743273565" target="_blank">Rich Dad Poor Dad by Robert Kiyosaki</a></li>
                            <li><a href="https://www.amazon.com/Psychology-Money-Morgan-Housel-ebook/dp/B07QZ6B9Q4" target="_blank">The Psychology of Money by Morgan Housel</a></li>
                            <li><a href="https://www.amazon.com/Lets-Talk-Money-Monika-Halan/dp/0143434235" target="_blank">Let's Talk Money by Monika Halan</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="tools-calculators">
                        <h3>Tools & Calculators</h3>
                        <ul>
                            <li><a href="https://groww.in/calculators/emi-calculator" target="_blank" class="d-flex justify-content-between align-items-center">EMI Calculator <i class="bi bi-arrow-right"></i></a></li>
                            <li><a href="https://groww.in/calculators/sip-calculator" target="_blank" class="d-flex justify-content-between align-items-center">SIP Planner <i class="bi bi-arrow-right"></i></a></li>
                            <li><a href="https://groww.in/calculators/income-tax-calculator" target="_blank" class="d-flex justify-content-between align-items-center">Income Tax Calculator <i class="bi bi-arrow-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Progress Tracker -->
    <section class="progress-section">
        <div class="container">
            <h2 class="section-heading">Track Your Journey</h2>
            <div class="progress-bar-container">
                <div class="progress-bar-bg">
                    <div class="progress-bar-fill"></div>
                </div>
                <p class="progress-text">Completed 2/6 Modules</p>
            </div>
        </div>
    </section>

    <!-- Call-to-Action Box -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-box">
                <h3>Still Confused?</h3>
                <p>Explore more resources or get personalized guidance.</p>
                <div class="d-flex justify-content-center flex-wrap">
                    <a href="contact.php" class="btn btn-cta"><i class="bi bi-envelope-fill"></i> Contact Us</a>
                    <a href="#" class="btn btn-cta btn-outline"><i class="bi bi-link"></i> More Resources</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="index.php">Features</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="contact.php">Contact Us</a></li>
                        <li><a href="#">Terms of Service</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Follow Us</h5>
                    <div class="social-icons">
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-twitter"></i></a>
                    </div>
                </div>
            </div>
            <p class="text-center mt-4">© 2025 Minto. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>