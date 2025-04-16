<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            background-color:rgb(244, 249, 246);
        }
        .contact-section {

            padding: 80px 0;
        }

        .contact-section h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .contact-section p {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
        }

        .contact-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .contact-form h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: -20px;
            align: center !important; 
        }

        .contact-form .form-group label {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .contact-form .form-control {
            border: 1px solid var(--dark-gray);
            border-radius: 5px;
        }

        .contact-form .btn-primary {
            background-color: var(--deep-green);
            border-color: var(--deep-green);
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }

        .contact-form .btn-primary:hover {
            background-color: var(--sage-green);
            border-color: var(--sage-green);
        }

        .contact-info {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .contact-info h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .info-grid {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .info-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-item i {
            color: var(--deep-green);
            font-size: 1.5rem;
        }

        .info-item p {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }

        /* Map Link Styling */
        .map-link {
            color: var(--dark-gray);
            text-decoration: none;
        }

        .map-link:hover {
            text-decoration: underline;
        }

        /* Phone Link Styling */
        .phone-link {
            color: var(--dark-gray);
            text-decoration: none;
        }

        .phone-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

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

    <!-- Contact Us Section -->
    <section class="contact-section">
        <div class="container">
            <h2>Contact Us</h2>
            <p>We'd love to hear from you! Whether you have questions, feedback, or just want to say hello, feel free to reach out to us using the form below.</p>

            <!-- Contact Form -->
            <div class="contact-form">
                <h2>Get in Touch</h2>
                <form method="POST">
                    <div class="form-group mb-3">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="message">Message:</label>
                        <textarea class="form-control" id="message" name="message" rows="5" placeholder="Your Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="contact-info">
                <h2>Contact Information</h2>
                <div class="info-grid">
                    <div class="info-item">
                        <i class="bi bi-envelope-fill"></i>
                        <p>Email: <a href="mailto:support@minto.com">support@minto.com</a></p>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-telephone-fill"></i>
                        <p>Phone: <a href="tel:+1234567890" class="phone-link" style="text-decoration: none;">+123 456 7890</a></p>
                    </div>
                    <div class="info-item">
                        <i class="bi bi-geo-alt-fill"></i>
                        <p>Address: <a href="https://www.google.com/maps?q=123+Finance+Street,+Moneyville,+MT+12345" target="_blank" class="map-link" style="text-decoration: none;">123 Finance Street, Moneyville, MT 12345</a></p>
                    </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>