<?php
// Include database connection if needed
include 'db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Noto+Serif:wght@400;700&display=swap');
        :root {
            --light-gray: #d8efe1; /* Light greenish background */
            --sage-green: #6E9277;
            --deep-green: #48705A;
            --dark-gray: #333333;
            --off-white: #FAFAFA;
            --gold-accent: #D4B483;
            --light-sage: #A3C4B1;
            --transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            --box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: var(--light-gray);
            color: var(--dark-gray);
            line-height: 1.6;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: 700;
        }
       
        /* Team Hero Section */
        .team-hero-section {
            background-color: var(--deep-green);
            padding: 60px 0 80px;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
        }
        .team-hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/api/placeholder/1600/800');
            background-size: cover;
            opacity: 0.1;
            z-index: 0;
        }
        .team-hero-content {
            position: relative;
            z-index: 1;
        }
        .team-section-title {
            color: white;
            font-size: 3rem;
            margin-bottom: 40px;
            text-align: center;
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto;
        }
        .member {
            background-color: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            transition: var(--transition);
        }
        .member:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
        }
        .member-image {
            position: relative;
            height: 280px;
            overflow: hidden;
        }
        .member-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        .member:hover .member-image img {
            transform: scale(1.05);
        }
        .member-content {
            padding: 25px;
            text-align: center;
        }
        .member-name {
            font-size: 1.5rem;
            color: var(--deep-green);
            margin-bottom: 5px;
        }
        .member-social {
            margin: 15px 0;
        }
        .member-social a {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background-color: rgba(110, 146, 119, 0.1);
            color: var(--sage-green);
            border-radius: 50%;
            margin: 0 5px;
            transition: var(--transition);
            text-decoration: none;
        }
        .member-social a:hover {
            background-color: var(--sage-green);
            color: white;
            transform: translateY(-3px);
        }
        .member-quote {
            font-style: italic;
            font-size: 0.95rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }
        /* About Section */
        .about-section {
            padding: 60px 0;
        }
        .section-title {
            font-size: 2.5rem;
            color: var(--deep-green);
            margin-bottom: 40px;
            text-align: center;
            position: relative;
            padding-bottom: 15px;
        }
        .section-title::after {
            content: '';
            position: absolute;
            width: 60px;
            height: 3px;
            background-color: var(--gold-accent);
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .intro-container {
            background-color: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            margin-bottom: 60px;
            position: relative;
        }
        .intro-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 8px;
            background: linear-gradient(90deg, var(--deep-green), var(--sage-green));
        }
        .intro-header {
            background-color: var(--deep-green);
            padding: 25px 40px;
            position: relative;
            overflow: hidden;
        }
        .intro-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 120px;
            height: 120px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
            transform: translate(40px, 60px);
        }
        .intro-header::before {
            content: '';
            position: absolute;
            top: -20px;
            left: -20px;
            width: 80px;
            height: 80px;
            background-color: rgba(255, 255, 255, 0.05);
            border-radius: 50%;
        }
        .intro-header h2 {
            color: white;
            font-size: 2.5rem;
            margin: 0;
            position: relative;
            z-index: 1;
        }
        .intro-content {
            padding: 40px;
            position: relative;
        }
        .intro-accent {
            position: absolute;
            width: 80px;
            height: 80px;
            background-color: rgba(110, 146, 119, 0.1);
            border-radius: 50%;
            z-index: 0;
        }
        .intro-accent-1 {
            top: 20px;
            right: 40px;
        }
        .intro-accent-2 {
            bottom: 50px;
            left: 30px;
            width: 120px;
            height: 120px;
            opacity: 0.08;
        }
        .intro-content p {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.8;
            margin-bottom: 20px;
            position: relative;
            z-index: 1;
        }
        .intro-content p em {
            color: var(--sage-green);
            font-weight: 500;
            font-style: italic;
        }
        .intro-content p strong {
            color: var(--deep-green);
            font-weight: 600;
        }
        .intro-divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--sage-green), var(--gold-accent));
            margin: 30px auto;
        }
        .closing-quote {
            font-style: italic;
            font-size: 1.3rem;
            text-align: center;
            margin-top: 30px;
            color: var(--deep-green);
            font-weight: 600;
            letter-spacing: 1px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(72, 112, 90, 0.2);
            display: inline-block;
        }
        .closing-quote-container {
            text-align: center;
        }
        .closing-quote span {
            font-weight: bold;
        }
        /* Cards */
        .card {
            border: none;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
            margin-bottom: 40px;
            transition: var(--transition);
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
        }
        .card-header {
            background-color: var(--deep-green);
            padding: 25px 30px;
            border-bottom: none;
        }
        .card-header h3 {
            color: white;
            font-size: 1.8rem;
            margin: 0;
        }
        .card-body {
            padding: 30px;
            background-color: white;
        }
        .card-body p {
            font-size: 1.05rem;
            color: var(--dark-gray);
            line-height: 1.7;
            margin-bottom: 15px;
        }
        .card-body p:last-child {
            margin-bottom: 0;
        }
        .card-body p strong {
            color: var(--sage-green);
            font-weight: 600;
        }
        /* Quote Card */
        .quote-card {
            background: linear-gradient(135deg, var(--deep-green), var(--sage-green));
            color: white;
            position: relative;
            overflow: hidden;
            margin-bottom: -50px;
        }
        .quote-card::before {
            content: '\201C';
            position: absolute;
            top: -20px;
            left: 20px;
            font-size: 120px;
            font-family: Georgia, serif;
            opacity: 0.2;
            color: white;
        }
        .quote-card .card-header {
            background: transparent;
        }
        .quote-card .card-body {
            background: transparent;
            padding: 0 30px 30px;
        }
        .quote-card p {
            font-size: 1.3rem;
            font-style: italic;
            color: white;
            margin-bottom: 20px;
        }
        .quote-card small {
            font-size: 1rem;
            opacity: 0.8;
            color: white;
        }

        /* Responsive */
        @media (max-width: 991px) {
            .team-section-title {
                font-size: 2.5rem;
            }
            .section-title {
                font-size: 2.2rem;
            }
            .team-grid {
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            }
            .intro-header h2 {
                font-size: 2.2rem;
            }
        }
        @media (max-width: 767px) {
            .team-hero-section {
                padding: 100px 0 60px;
            }
            .team-section-title {
                font-size: 2rem;
            }
            .section-title {
                font-size: 1.8rem;
            }
            .card-header h3 {
                font-size: 1.5rem;
            }
            .quote-card p {
                font-size: 1.1rem;
            }
            .member-image {
                height: 240px;
            }
            .intro-content {
                padding: 30px;
            }
            .intro-header {
                padding: 20px 30px;
            }
            .intro-header h2 {
                font-size: 1.8rem;
            }
        }
        /* Animation Classes */
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }
        .fade-in.active {
            opacity: 1;
            transform: translateY(0);
        }
        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }
        .delay-4 { transition-delay: 0.4s; }
        .delay-5 { transition-delay: 0.5s; }
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
    <!-- Team Hero Section -->
    <section class="team-hero-section">
        <div class="container team-hero-content">
            <h1 class="team-section-title fade-in">Meet Our Team</h1>
            <div class="team-grid">
                <div class="member fade-in delay-1">
                    <div class="member-image">
                        <img src="images/team1.jpg" alt="Khushi Bagaria">
                    </div>
                    <div class="member-content">
                        <h3 class="member-name">Khushi Bagaria</h3>
                        <div class="member-social">
                            <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                        </div>
                        <p class="member-quote">
                            "My vision is to create a world where finance is accessible and empowering for everyone. At Minto, we're building tools that democratize financial literacy and control, helping users achieve financial freedom."
                        </p>
                    </div>
                </div>
                <div class="member fade-in delay-2">
                    <div class="member-image">
                        <img src="images/team2.jpg" alt="Ayush Anthwal">
                    </div>
                    <div class="member-content">
                        <h3 class="member-name">Ayush Anthwal</h3>
                        <div class="member-social">
                            <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                        </div>
                        <p class="member-quote">
                            "Innovation meets simplicity. I'm passionate about crafting technology that makes complex financial tasks effortless. Let's build a future where everyone can manage their finances with ease."
                        </p>
                    </div>
                </div>
                <div class="member fade-in delay-3">
                    <div class="member-image">
                        <img src="images/team3.jpg" alt="Nishchay Shetty">
                    </div>
                    <div class="member-content">
                        <h3 class="member-name">Nishchay Shetty</h3>
                        <div class="member-social">
                            <a href="#" target="_blank"><i class="bi bi-linkedin"></i></a>
                            <a href="#" target="_blank"><i class="bi bi-twitter"></i></a>
                        </div>
                        <p class="member-quote">
                            "Empowering individuals to make smart financial decisions is my passion. With Minto, we're bridging the gap between knowledge and action, helping users achieve financial freedom."
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section class="about-section">
        <div class="container" >
            <div class="intro-container fade-in" style="margin-top: -40px;  height: 550px;">
                <div class="intro-header" style="margin-top: 0px;">
                    <h2 >About Minto</h2>
                </div>
                <div class="intro-content">
                    <div class="intro-accent intro-accent-1"></div>
                    <div class="intro-accent intro-accent-2"></div>
                    <section class="about-section">
        <!-- <h1>About Minto</h1> -->
            <p style="margin-top: -55px;">
                <strong>Minto</strong> — rooted in <em>Clarity, Control and Growth</em> — is more than just a platform. It is a journey towards the goal of financial empowerment.
            </p>
            <p>
                Built for the dreamer, the planner, and the seeker, Minto is your companion in navigating the often overwhelming world of personal finance. We believe managing money shouldn’t be complicated — it should feel natural, intuitive, and deeply personal.
            </p>
            <hr>
            <p>
                In a world of complex financial tools, <strong>Minto</strong> gently reminds us of the importance of understanding and managing our money. Our mission is simple: to equip individuals with the tools and knowledge to take control of their financial journey — to save wisely, invest mindfully, budget effectively, and manage debt confidently.
            </p>
            <p>
                 Whether you’re starting fresh or refining your path, <strong>Minto</strong> is your gateway to financial wellness.
            </p>
        <div class="closing-quote" style="margin-top: 0px;">
            Manage. Grow. Thrive.
        </div>
                    <div class="closing-quote-container">
                        <!-- <span class="closing-quote">Manage. Grow. Thrive.</span> -->
                    </div>
                </div>
            </div>
            <!-- Mission and Vision Cards -->
            <div class="row">
                <div class="col-md-6 fade-in delay-1">
                    <div class="card">
                        <div class="card-header">
                            <h3>Our Mission</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                To equip individuals and families with smart, intuitive tools and the financial knowledge they need to thrive — encouraging confidence, control, and clarity in their money matters.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 fade-in delay-2">
                    <div class="card">
                        <div class="card-header">
                            <h3>Our Vision</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                To create a world where financial wellness is universal — where every person has access to tools that make money management easy, accessible, and empowering.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Core Values Card -->
            <div class="card fade-in delay-3">
                <div class="card-header">
                    <h3>Our Core Values</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <p><strong>Integrity</strong><br> We're committed to honesty, transparency, and trust in everything we do.</p>
                            <p><strong>User First</strong><br> Every feature is built with simplicity, accessibility, and real user needs in mind.</p>
                        </div>
                        <div class="col-md-6">
                            <p><strong>Innovation</strong><br> We embrace change and continuously evolve to meet the financial needs of today and tomorrow.</p>
                            <p><strong>Community</strong><br> We believe in the power of support and shared knowledge to build lasting financial confidence.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Brief History Card -->
            <div class="card fade-in delay-4">
                <div class="card-header">
                    <h3>Our Journey</h3>
                </div>
                <div class="card-body">
                    <p>
                        Minto was founded in 2025 by Khushi Bagaria, Ayush Anthwal, and Nishchay Shetty with the goal of making financial tracking simple and accessible. Our journey began with a shared belief that financial management should be intuitive and user-friendly, enabling individuals to take control of their financial futures.
                    </p>
                    <p>
                        Over the years, we have expanded our team of experts in finance, technology, and user experience to deliver comprehensive financial tracking solutions. We are proud to serve a growing community of users who trust Minto to help them manage their finances effectively.
                    </p>
                </div>
            </div>
            <!-- Quote Card -->
            <div class="card quote-card fade-in delay-5">
                <div class="card-body">
                    <p class="quote-text" style="padding-top: 60px;">
                        "Investing in your financial future is the best decision you can make. Let Minto guide you every step of the way."
                    </p>
                    <small>- The Minto Team</small>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <footer class="footer" style="margin-top: 30px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Company</h5>
                    <ul>
                        <li><a href="about.php">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Animate elements when they come into view
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                    }
                });
            }, { threshold: 0.1 });
            // Observe all elements with fade-in class
            document.querySelectorAll('.fade-in').forEach(el => {
                observer.observe(el);
            });
            // Finance quotes functionality
            const quoteBox = document.querySelector(".quote-card p");
            const quoteAuthor = document.querySelector(".quote-card small");
            const fallbackQuotes = [
                { quote: "An investment in knowledge pays the best interest.", author: "Benjamin Franklin" },
                { quote: "It's not your salary that makes you rich, it's your spending habits.", author: "Charles A. Jaffe" },
                { quote: "Financial freedom is available to those who learn about it and work for it.", author: "Robert Kiyosaki" },
                { quote: "Do not save what is left after spending, but spend what is left after saving.", author: "Warren Buffett" },
                { quote: "A budget is telling your money where to go instead of wondering where it went.", author: "Dave Ramsey" },
                { quote: "The goal isn't more money. The goal is living life on your terms.", author: "Chris Brogan" },
                { quote: "Money is a terrible master but an excellent servant.", author: "P.T. Barnum" },
                { quote: "Wealth consists not in having great possessions, but in having few wants.", author: "Epictetus" },
                { quote: "The best way to predict your future is to create it.", author: "Peter Drucker" }
            ];
            const showFallbackQuote = () => {
                const random = fallbackQuotes[Math.floor(Math.random() * fallbackQuotes.length)];
                quoteBox.textContent = `"${random.quote}"`;
                quoteAuthor.textContent = `- ${random.author}`;
            };
            const fetchFinancialQuote = () => {
                const controller = new AbortController();
                const timeoutId = setTimeout(() => controller.abort(), 3000); // 3 second timeout
                fetch('https://api.quotable.io/random?tags=money|business|finance', { signal: controller.signal })
                    .then(response => {
                        if (!response.ok) throw new Error("Network response was not ok.");
                        return response.json();
                    })
                    .then(data => {
                        clearTimeout(timeoutId);
                        quoteBox.textContent = `"${data.content}"`;
                        quoteAuthor.textContent = `- ${data.author}`;
                    })
                    .catch(err => {
                        showFallbackQuote();
                    });
            };
            fetchFinancialQuote();
        });
    </script>
</body>
</html>