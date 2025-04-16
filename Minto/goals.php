<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minto - Financial Goals</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Custom Styles -->
    <link rel="stylesheet" href="styles.css">
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
                    <li class="nav-item"><a class="nav-link" href="home.php">Dashboard</a></li>
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
                    <li class="nav-item"><a class="nav-link" href="goals.php">Goals</a></li>
                    <li class="nav-item"><a class="nav-link" href="learn.php">Learn</a></li>
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

    <!-- Goals Section -->
    <section class="container py-5">
        <h2 class="text-center" style="color: var(--deep-green); font-size: 2rem; font-weight: bold;">🎯 Financial Goals</h2>
        <p class="text-center mb-5" style="font-size: 1.2rem; color: var(--dark-gray); line-height: 1.6;">
            Set, track, and achieve your financial aspirations with Minto.
        </p>

        <!-- Existing Goals -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="goal-card p-4" style="background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: var(--deep-green); font-size: 1.5rem; margin-bottom: 10px;">New Car</h3>
                    <p><strong>Target Amount:</strong> Rs. 500,000</p>
                    <p><strong>Saved So Far:</strong> Rs. 300,000</p>
                    <div class="progress-bar" style="height: 10px; background-color: #e0e0e0; border-radius: 5px; overflow: hidden; margin: 10px 0;">
                        <div class="progress-bar-fill" style="height: 100%; background-color: var(--sage-green); width: 60%;"></div>
                    </div>
                    <p><strong>Deadline:</strong> December 31, 2024</p>
                    <p><strong>Priority:</strong> High</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="goal-card p-4" style="background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: var(--deep-green); font-size: 1.5rem; margin-bottom: 10px;">Emergency Fund</h3>
                    <p><strong>Target Amount:</strong> Rs. 200,000</p>
                    <p><strong>Saved So Far:</strong> Rs. 150,000</p>
                    <div class="progress-bar" style="height: 10px; background-color: #e0e0e0; border-radius: 5px; overflow: hidden; margin: 10px 0;">
                        <div class="progress-bar-fill" style="height: 100%; background-color: var(--sage-green); width: 75%;"></div>
                    </div>
                    <p><strong>Deadline:</strong> June 30, 2024</p>
                    <p><strong>Priority:</strong> Medium</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="goal-card p-4" style="background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: var(--deep-green); font-size: 1.5rem; margin-bottom: 10px;">Vacation to Maldives</h3>
                    <p><strong>Target Amount:</strong> Rs. 100,000</p>
                    <p><strong>Saved So Far:</strong> Rs. 20,000</p>
                    <div class="progress-bar" style="height: 10px; background-color: #e0e0e0; border-radius: 5px; overflow: hidden; margin: 10px 0;">
                        <div class="progress-bar-fill" style="height: 100%; background-color: var(--sage-green); width: 20%;"></div>
                    </div>
                    <p><strong>Deadline:</strong> March 15, 2025</p>
                    <p><strong>Priority:</strong> Low</p>
                </div>
            </div>
        </div>

        <!-- Add New Goal Form -->
        <div class="add-goal-form p-4 mt-5" style="background-color: white; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h2 style="color: var(--deep-green); font-size: 2rem; font-weight: bold; margin-bottom: 20px;">➕ Add New Goal</h2>
            <form id="addGoalForm" novalidate>
                <div class="form-group mb-3">
                    <label for="goal-name" style="color: var(--dark-gray); font-weight: 500;">Goal Name:</label>
                    <input type="text" class="form-control" id="goal-name" placeholder="e.g., New Car" required>
                </div>
                <div class="form-group mb-3">
                    <label for="target-amount" style="color: var(--dark-gray); font-weight: 500;">Target Amount (Rs.):</label>
                    <input type="number" class="form-control" id="target-amount" placeholder="e.g., 500000" min="0" step="0.01" required>
                </div>
                <div class="form-group mb-3">
                    <label for="deadline" style="color: var(--dark-gray); font-weight: 500;">Deadline:</label>
                    <input type="date" class="form-control" id="deadline" required>
                </div>
                <div class="form-group mb-3">
                    <label for="category" style="color: var(--dark-gray); font-weight: 500;">Category:</label>
                    <select class="form-control" id="category" required>
                        <option value="travel">Travel</option>
                        <option value="education">Education</option>
                        <option value="home">Home</option>
                        <option value="emergency-fund">Emergency Fund</option>
                        <option value="retirement">Retirement</option>
                    </select>
                </div>
                <div class="form-group mb-3">
                    <label for="priority" style="color: var(--dark-gray); font-weight: 500;">Priority:</label>
                    <select class="form-control" id="priority" required>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color: var(--deep-green); border-color: var(--deep-green); padding: 10px 20px; font-size: 1.1rem; border-radius: 5px;">Add Goal</button>
            </form>
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
    <!-- JavaScript Validation -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const addGoalForm = document.getElementById("addGoalForm");

            // Form submission handler
            addGoalForm.addEventListener("submit", function (event) {
                event.preventDefault();

                // Get form values
                const goalName = document.getElementById("goal-name").value.trim();
                const targetAmount = parseFloat(document.getElementById("target-amount").value.trim());
                const deadline = document.getElementById("deadline").value.trim();
                const category = document.getElementById("category").value.trim();
                const priority = document.getElementById("priority").value.trim();

                // Validate inputs
                let errors = [];
                if (!goalName) errors.push("Goal name is required.");
                if (!targetAmount || targetAmount <= 0) errors.push("Target amount must be a positive number.");
                if (!deadline) errors.push("Deadline is required.");
                if (!category) errors.push("Category is required.");
                if (!priority) errors.push("Priority is required.");

                if (errors.length > 0) {
                    alert(errors.join("\n"));
                    return;
                }

                alert("Goal added successfully!");
                addGoalForm.reset(); // Reset the form
            });
        });
    </script>
</body>
</html>