
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        .settings-section {
            padding: 60px 0;
            background-color: var(--light-gray);
        }

        .settings-container {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .settings-header {
            margin-bottom: 30px;
        }

        .settings-header h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
        }

        .settings-group {
            margin-bottom: 30px;
            padding: 20px;
            border-radius: 8px;
            background-color: var(--light-gray);
        }

        .settings-group h3 {
            color: var(--deep-green);
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        .form-check {
            margin-bottom: 15px;
        }

        .save-button {
            background-color: var(--sage-green);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1.1rem;
        }

        .save-button:hover {
            background-color: var(--deep-green);
        }

        .currency-select {
            max-width: 200px;
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

    <!-- Settings Section -->
    <section class="settings-section">
        <div class="container">
            <div class="settings-container">
                <div class="settings-header">
                    <h2>Settings</h2>
                    <p class="text-muted">Customize your Minto experience</p>
                </div>

                <form id="settingsForm">
                    <!-- Account Settings -->
                    <div class="settings-group">
                        <h3>Account Settings</h3>
                        <div class="mb-3">
                            <label class="form-label">Email Notifications</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="monthlyReport">
                                <label class="form-check-label" for="monthlyReport">Monthly expense report</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="budgetAlerts">
                                <label class="form-check-label" for="budgetAlerts">Budget threshold alerts</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="newsUpdates">
                                <label class="form-check-label" for="newsUpdates">News and updates</label>
                            </div>
                        </div>
                    </div>

                    <!-- Display Settings -->
                    <div class="settings-group">
                        <h3>Display Settings</h3>
                        <div class="mb-3">
                            <label class="form-label">Currency</label>
                            <select class="form-select currency-select">
                                <option value="INR">Indian Rupee (₹)</option>
                                <option value="USD">US Dollar ($)</option>
                                <option value="EUR">Euro (€)</option>
                                <option value="GBP">British Pound (£)</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date Format</label>
                            <select class="form-select currency-select">
                                <option value="DD/MM/YYYY">DD/MM/YYYY</option>
                                <option value="MM/DD/YYYY">MM/DD/YYYY</option>
                                <option value="YYYY/MM/DD">YYYY/MM/DD</option>
                            </select>
                        </div>
                    </div>

                    <!-- Privacy Settings -->
                    <div class="settings-group">
                        <h3>Privacy Settings</h3>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dataAnalytics">
                            <label class="form-check-label" for="dataAnalytics">Share anonymous data for analytics</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="saveHistory">
                            <label class="form-check-label" for="saveHistory">Save transaction history</label>
                        </div>
                    </div>

                    <button type="submit" class="save-button">Save Changes</button>
                </form>
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
    <script>
        document.getElementById('settingsForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Settings saved successfully!');
        });
    </script>
</body>
</html>
