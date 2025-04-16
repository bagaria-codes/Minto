<?php
include 'db_connect.php';

// Fetch the income record to populate the form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Fetch the transaction record to populate the form
    $sql = "SELECT * FROM transactions WHERE id = ? AND type = 'income'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $income = $result->fetch_assoc();
    } else {
        echo "Income transaction not found.";
        exit();
    }
    $stmt->close();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    // Validate inputs (basic validation)
    if (!empty($date) && !empty($time) && !empty($type) && !empty($category) && !empty($description) && !empty($amount)) {
        // Prepare and execute the SQL query
        $sql = "UPDATE transactions SET date=?, time=?, type=?, category=?, description=?, amount=? WHERE id=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssdi", $date, $time, $type, $category, $description, $amount, $id);

        if ($stmt->execute()) {
            header("Location: income.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "All fields are required.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Income</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Internal Styles for Update Income Page */
        .update-income-section {
            background-color: var(--light-gray);
            padding: 40px 0; /* Reduced padding to reduce space above the heading */
        }
        .update-income-section h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }
        .update-income-section p {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
            text-align: center; /* Center the paragraph */
        }
        .update-income-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .update-income-form h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .update-income-form .form-group label {
            color: var(--dark-gray);
            font-weight: 500;
        }
        .update-income-form .form-control {
            border: 1px solid var(--dark-gray);
            border-radius: 5px;
        }
        .update-income-form .btn-primary {
            background-color: var(--deep-green);
            border-color: var(--deep-green);
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }
        .update-income-form .btn-primary:hover {
            background-color: var(--sage-green);
            border-color: var(--sage-green);
        }
        .info-box {
            background-color: var(--sage-green);
            color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: center;
        }
        .info-box p {
            font-style: italic;
            font-size: 1.2rem;
        }
        /* Responsive Design */
        @media (max-width: 768px) {
            .update-income-form .form-control {
                font-size: 0.9rem;
            }
            .update-income-form .btn-primary {
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
    <!-- Update Income Section -->
    <section class="update-income-section">
        <div class="container">
            <h2>Update Income</h2>
            <p>Update the details of your income transaction below.</p>
            <!-- Update Income Form -->
            <div class="update-income-form">
                <form method="POST" action="update_income.php">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($income['id']); ?>">
                    <div class="form-group mb-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($income['date']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="time">Time:</label>
                        <input type="time" class="form-control" id="time" name="time" value="<?php echo htmlspecialchars($income['time']); ?>" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Transaction Type:</label>
                        <input type="hidden" name="type" value="income">
                        <select class="form-control" id="type" name="type" required disabled>
                            <option value="income" selected>Income</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="category">Category:</label>
                        <select class="form-control" id="category" name="category" required>
                            <option value="salary" data-type="income" <?php if ($income['category'] === 'salary') echo 'selected'; ?>>Salary</option>
                            <option value="bonus" data-type="income" <?php if ($income['category'] === 'bonus') echo 'selected'; ?>>Bonus</option>
                            <option value="freelance" data-type="income" <?php if ($income['category'] === 'freelance') echo 'selected'; ?>>Freelance</option>
                            <option value="investment-income" data-type="income" <?php if ($income['category'] === 'investment-income') echo 'selected'; ?>>Investment Income</option>
                            <option value="other-income" data-type="income" <?php if ($income['category'] === 'other-income') echo 'selected'; ?>>Other Income</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" value="<?php echo htmlspecialchars($income['description']); ?>" placeholder="e.g., Salary from Company X" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount (Rs.):</label>
                        <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($income['amount']); ?>" placeholder="e.g., 20000" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Income</button>
                </form>
            </div>
            <!-- Info Box -->
            <div class="info-box">
                <p>"Understanding your income sources is crucial for financial planning. Let Minto help you track and manage your earnings."</p>
                <small>- Jane Doe, Financial Advisor</small>
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