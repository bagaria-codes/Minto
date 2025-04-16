
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minto | Landing</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --light-gray: #f9f9f9;
            --deep-green: #48705A;
            --sage-green: #6E9277;
            --dark-gray: #333;
            --accent-color: #08585a; /* Single accent color */
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            color: var(--dark-gray);
        }
        .footer {
            margin-bottom: None; 
        }
      
        /* Hero Section */
        .hero {
            background-color: var(--deep-green);
            color: white;
            padding: 0;
        }
        .hero-content {
            padding: 6rem 1rem;
            background-color: var(--deep-green);
        }
        .logo {
            max-width: 120px;
        }
        /* Features Section */
        .feature-icon {
            font-size: 2.5rem;
            color: var(--accent-color);
            margin-bottom: 1rem;
            display: block;
        }
        /* How It Works */
        .how-it-works {
            background-color: #e6f1ec;
            padding: 60px 0;
        }
        .how-it-works h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .step-card {
            position: relative;
            transition: transform 0.3s ease;
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
        }
        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }
        .step-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background-color: var(--accent-color);
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-weight: bold;
        }
        /* Section Headings */
        section h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        /* App Preview */
        .app-preview {
            background-color: #e6f1ec;
            padding: 60px 0;
        }
        .app-preview h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .app-preview .shadow {
            box-shadow: 0 0 20px rgba(0,0,0,0.1);
        }
        /* Features */
        .features {
            background-color: #f5f5f5;
            padding: 60px 0;
        }
        .features h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        /* CTA Section */
        .cta-section {
            background-color: #f5f5f5;
            padding: 60px 0;
            text-align: center;
        }
        .cta-wrapper {
            background-color: var(--deep-green);
            color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        .cta-wrapper h2 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 20px;
        }
        .cta-wrapper p {
            font-size: 1.2rem;
            line-height: 1.6;
            margin-bottom: 30px;
            opacity: 0.95;
        }
        .cta-wrapper .btn {
            background-color: rgb(229, 240, 237);
            color: var(--deep-green);
            border: none;
            height: 40px;
            border-radius: 30px;
            padding: 12px 30px;
            font-weight: 600;
            font-size: 1.1rem;
            transition: all 0.3s ease;
        }
        .cta-wrapper .btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .cta-wrapper .btn-outline-light {
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        .cta-wrapper .btn-outline-light:hover {
            background-color: white;
            color: var(--deep-green);
        }
        /* Custom Carousel */
        .carousel-item {
            height: 500px;
            background-size: cover;
            background-position: center;
        }
        .carousel-caption {
            background-color: rgba(0, 0, 0, 0.5);
            padding: 20px;
            border-radius: 10px;
            bottom: 50%;
            transform: translateY(50%);
        }
        .carousel-caption h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 15px;
        }
        .carousel-caption p {
            font-size: 1.2rem;
        }
        .carousel-caption a {
            color: white;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        .carousel-caption a:hover {
            color: var(--accent-color);
        }
        .hero-content.text-center.d-md-none {
            padding: 4rem 1rem;
        }
        .video-container {
            display: flex; /* Enable Flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            max-width: 500px; 
            max-height: 300px; 
            margin: 0 auto; /* Center the container itself horizontally */
            overflow: hidden; 
        }
        .video-container video {
            width: 100%; 
            height: auto; 
            border-radius: 10px; /* Add rounded corners to the video */
        }
        /* Testimonials */
        .testimonials {
            background-color: #f5f5f5;
            padding: 60px 0;
        }
        .testimonials h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        .testimonial-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 50%;
            margin-bottom: 1rem;
        }
        .testimonial-card {
            background-color: white;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.06);
            transition: transform 0.3s ease;
        }
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0,0,0,0.1);
        }
        /* FAQ Styling */
        .faq {
            background-color: #e6f1ec;
            padding: 60px 0;
        }
        .faq h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
        }
        #faqAccordion .accordion-button {
            background-color: #fff;
            border-left: 4px solid var(--accent-color);
            transition: all 0.3s ease;
        }
        #faqAccordion .accordion-button:focus {
            box-shadow: none;
        }
        #faqAccordion .accordion-button:not(.collapsed) {
            background-color: var(--light-gray);
            color: var(--deep-green);
        }
        #faqAccordion .accordion-body {
            font-size: 0.95rem;
            color: #555;
        }
        /* Responsive Fixes */
        @media (max-width: 768px) {
            .hero-content {
                padding: 4rem 1rem;
            }
            .carousel-item {
                height: 400px;
            }
        }
        @media (max-width: 576px) {
            .hero-content {
                padding: 3rem 1rem;
            }
            .carousel-item {
                height: 300px;
            }
        }
    </style>
</head>
<body>

<!-- Landing Page Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
                <img src="images/Logo.jpg" alt="Minto Logo" class="me-2" style="width: 50px; height: 50px; border-radius: 50%; ">
                Minto
            </a>

        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact</a>
                </li>

                <!-- Auth Buttons -->
                <li class="nav-item">
                    <a class="btn btn-outline-light" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-light text-dark ms-0" href="signup.php">Sign Up</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section with Image Carousel -->
<header class="hero">
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" data-bs-wrap="true" >
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url('images/Caro1.png');"></div>
            <div class="carousel-item" style="background-image: url('images/Caro2.png');"></div>
            <div class="carousel-item" style="background-image: url('images/Caro3.png');"></div>
            <div class="carousel-item" style="background-image: url('images/Caro4.png');"></div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</header>

<!-- App Preview Section -->
<section class="app-preview py-5 text-center">
    <div class="container">
        <h2 class="mb-4 fw-bold">See Minto in Action</h2>
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <div class="shadow rounded p-3 bg-white video-container">
                    <video autoplay loop muted playsinline class="img-fluid rounded">
                        <source src="images/preview.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="col-md-6 text-md-start">
                <h3>Beautiful, Intuitive Dashboard</h3>
                <p>Get a clear view of your financial status at a glance. Track spending patterns, monitor your budget, and make smarter decisions with our easy-to-read visualizations.</p>
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Simple expense categorization</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Monthly budget tracking</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Visual spending reports</li>
                </ul>
                <a href="#" class="btn btn-outline-success mt-3">Explore Features</a>
            </div>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="features py-5 bg-white">
    <div class="container text-center">
        <h2 class="mb-4">Why Choose Minto?</h2>
        <div class="row">
            <div class="col-md-4">
                <i class="bi bi-journal-check feature-icon"></i>
                <h4>Simple Tracking</h4>
                <p>Manually log your income and expenses in an easy way.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-ui-checks feature-icon"></i>
                <h4>Clean Interface</h4>
                <p>No complicated settings, just a straightforward finance tracker.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-globe feature-icon"></i>
                <h4>Access Anywhere</h4>
                <p>Use it on any device with a browser, no installation required.</p>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-4">
                <i class="bi bi-shield-lock feature-icon"></i>
                <h4>Secure Data</h4>
                <p>Your financial records remain safe and private.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-graph-up feature-icon"></i>
                <h4>Expense Insights</h4>
                <p>View clear spending trends and take control of your budget.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-lightbulb feature-icon"></i>
                <h4>Minimal Learning Curve</h4>
                <p>Designed for beginners, no financial expertise needed.</p>
            </div>
        </div>
    </div>
</section>

<!-- How It Works -->
<section class="how-it-works py-5 bg-light">
    <div class="container text-center">
        <h2 class="mb-5 fw-bold">How Minto Works</h2>
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="step-card p-4 h-100 bg-white shadow-sm rounded">
                    <div class="step-number">1</div>
                    <i class="bi bi-person-plus mb-3 fs-1 text-success"></i>
                    <h4>Create An Account</h4>
                    <p>Sign up in seconds with just your email. No credit card required.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="step-card p-4 h-100 bg-white shadow-sm rounded">
                    <div class="step-number">2</div>
                    <i class="bi bi-cash-coin mb-3 fs-1 text-success"></i>
                    <h4>Track Your Money</h4>
                    <p>Add your income and expenses with our simple interface.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="step-card p-4 h-100 bg-white shadow-sm rounded">
                    <div class="step-number">3</div>
                    <i class="bi bi-bar-chart mb-3 fs-1 text-success"></i>
                    <h4>Get Insights</h4>
                    <p>View reports and understand where your money goes.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-5 bg-white" id="testimonials">
    <div class="container">
        <h2 class="text-center mb-5 fw-bold">What Our Users Say</h2>
        <div class="row justify-content-center text-center">
    
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm h-100 rounded bg-light">
                    <img src="images/person1.jpg" alt="User 1" class="rounded-circle mb-3 testimonial-img">
                    <p class="fst-italic">"Minto helped me finally get a grip on my spending. It's so simple, I started using it daily without even thinking about it!"</p>
                    <h6 class="fw-bold mb-0">Riya Mehta</h6>
                    <small class="text-muted">Student, Delhi</small>
                </div>
            </div>
    
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm h-100 rounded bg-light">
                    <img src="images/person2.jpg" alt="User 2" class="rounded-circle mb-3 testimonial-img">
                    <p class="fst-italic">"I used to forget where my money went. Minto changed that. The clean interface makes tracking easy and kind of fun."</p>
                    <h6 class="fw-bold mb-0">Aman Verma</h6>
                    <small class="text-muted">Freelancer, Bangalore</small>
                </div>
            </div>
    
            <div class="col-md-4 mb-4">
                <div class="p-4 shadow-sm h-100 rounded bg-light">
                    <img src="images/person3.jpg" alt="User 3" class="rounded-circle mb-3 testimonial-img">
                    <p class="fst-italic">"I never thought I'd enjoy budgeting. Minto's graphs and dashboard made it click for me."</p>
                    <h6 class="fw-bold mb-0">Neha Kulkarni</h6>
                    <small class="text-muted">Entrepreneur, Pune</small>
                </div>
            </div>
    
        </div>
    </div>
</section>

      <!-- faq -->
      <section class="py-5 bg-light" id="faq" data-aos="fade-up">
        <div class="container">
          <h2 class="text-center mb-5 fw-bold">Frequently Asked Questions</h2>
          <div class="accordion" id="faqAccordion">
      
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="faq1">
                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1">
                  🆓 Is Minto free to use?
                </button>
              </h2>
              <div id="collapse1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes! Minto is completely free for individuals. You can track your expenses and income without any subscription.
                </div>
              </div>
            </div>
      
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="faq2">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2">
                  📱 Can I use Minto on my phone or tablet?
                </button>
              </h2>
              <div id="collapse2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Absolutely! Minto is fully responsive and works on all modern browsers, including mobile devices and tablets.
                </div>
              </div>
            </div>
      
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="faq3">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3">
                  🔒 Is my financial data secure?
                </button>
              </h2>
              <div id="collapse3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Yes. We prioritize your privacy. Your data stays in your control and is never shared or uploaded anywhere without your permission.
                </div>
              </div>
            </div>
      
            <div class="accordion-item mb-3">
              <h2 class="accordion-header" id="faq4">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4">
                  🧾 Can I export my data?
                </button>
              </h2>
              <div id="collapse4" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Export feature will be available soon. You'll be able to download your transactions in CSV format to use with spreadsheets.
                </div>
              </div>
            </div>
      
            <div class="accordion-item">
              <h2 class="accordion-header" id="faq5">
                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5">
                  🧠 Do I need finance knowledge to use Minto?
                </button>
              </h2>
              <div id="collapse5" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                <div class="accordion-body">
                  Not at all. Minto is designed for beginners. It's as easy as adding a note — just log income or expenses and we’ll do the rest.
                </div>
              </div>
            </div>
      
          </div>
        </div>
    </section>

<!-- CTA Section with Newsletter -->
<section class="cta-section py-5 text-center bg-light">
    <div class="container">
        <div class="cta-wrapper p-5 rounded">
            <h2 class="fw-bold text-white">Ready to Take Control of Your Finances?</h2>
            <p class="lead mb-4">Join thousands of users who have simplified their financial life with Minto.</p>
            <div class="row justify-content-center">
                <div class="col-md-8 mb-4">
                    <div class="newsletter-form">
                        <h5 class="text-white mb-3">Subscribe to our newsletter</h5>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" placeholder="Your email address" aria-label="Your email address">
                            <button class="btn btn-light" type="button" id="subscribe-btn">Subscribe</button>
                        </div>
                        <small class="text-white-50">Get tips, updates and special offers - no spam!</small>
                    </div>
                </div>
            </div>
            <div class="mt-4">
                <a href="signup.php" class="btn btn-light btn-lg px-4 me-md-2">Get Started for Free</a>
                <a href="#" class="btn btn-outline-light btn-lg px-4">Learn More</a>
            </div>
        </div>
    </div>
</section>

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
<!-- <script src="https://cdn.gpteng.co/gptengineer.js" type="module"></script> -->

<script>
    // Simple newsletter subscription
    document.getElementById('subscribe-btn').addEventListener('click', function() {
        const emailInput = this.previousElementSibling;
        const email = emailInput.value.trim();
        
        if (email && email.includes('@') && email.includes('.')) {
            alert('Thank you for subscribing to our newsletter!');
            emailInput.value = '';
        } else {
            alert('Please enter a valid email address.');
        }
    });
</script>
</body>
</html>
