<?php
include 'db_connect.php';

// Fetch the expense record to populate the form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM transactions WHERE id = ? AND type = 'expense'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $expense = $result->fetch_assoc();
    } else {
        echo "Expense not found.";
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
            header("Location: expenses.php");
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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Update Expense</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
  <link rel="stylesheet" href="styles.css">
  <style>
    .update-transaction-section {
      background-color: var(--light-gray);
      padding: 40px 0;
    }

    .update-transaction-section h2 {
      color: var(--deep-green);
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 20px;
      text-align: center;
    }

    .update-transaction-section p {
      font-size: 1.1rem;
      color: var(--dark-gray);
      line-height: 1.6;
      text-align: center;
    }

    .update-transaction-form {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .update-transaction-form label {
      color: var(--dark-gray);
      font-weight: 500;
    }

    .update-transaction-form .form-control {
      border: 1px solid var(--dark-gray);
      border-radius: 5px;
    }

    .update-transaction-form .btn-primary {
      background-color: var(--deep-green);
      border-color: var(--deep-green);
      padding: 10px 20px;
      font-size: 1.1rem;
      border-radius: 5px;
    }

    .update-transaction-form .btn-primary:hover {
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

    @media (max-width: 768px) {
      .update-transaction-form .form-control {
        font-size: 0.9rem;
      }

      .update-transaction-form .btn-primary {
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

<!-- Update Expense Section -->
<section class="update-transaction-section">
  <div class="container">
    <h2>Update Expense</h2>
    <p>Update the details of your expense below.</p>

    <div class="update-transaction-form">
      <form method="POST" action="update_expense.php">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($expense['id']); ?>">

        <div class="mb-3">
          <label for="date">Date:</label>
          <input type="date" class="form-control" id="date" name="date" value="<?php echo htmlspecialchars($expense['date']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="time">Time:</label>
          <input type="time" class="form-control" id="time" name="time" value="<?php echo htmlspecialchars($expense['time']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="type">Transaction Type:</label>
          <select class="form-control" id="type" name="type" required onchange="filterCategories()">
            <option value="income" <?php if ($expense['type'] === 'income') echo 'selected'; ?>>Income</option>
            <option value="expense" <?php if ($expense['type'] === 'expense') echo 'selected'; ?>>Expense</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="category">Category:</label>
          <select class="form-control" id="category" name="category" required>
            <!-- List income and expense categories with data-type -->
            <option value="salary" data-type="income" <?php if ($expense['category'] === 'salary') echo 'selected'; ?>>Salary</option>
            <option value="bonus" data-type="income" <?php if ($expense['category'] === 'bonus') echo 'selected'; ?>>Bonus</option>
            <option value="rent" data-type="expense" <?php if ($expense['category'] === 'rent') echo 'selected'; ?>>Rent</option>
            <option value="groceries" data-type="expense" <?php if ($expense['category'] === 'groceries') echo 'selected'; ?>>Groceries</option>
            <option value="transport" data-type="expense" <?php if ($expense['category'] === 'transport') echo 'selected'; ?>>Transport</option>
            <option value="shopping" data-type="expense" <?php if ($expense['category'] === 'shopping') echo 'selected'; ?>>Shopping</option>
            <option value="entertainment" data-type="expense" <?php if ($expense['category'] === 'entertainment') echo 'selected'; ?>>Entertainment</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="description">Description:</label>
          <input type="text" class="form-control" id="description" name="description" value="<?php echo htmlspecialchars($expense['description']); ?>" required>
        </div>

        <div class="mb-3">
          <label for="amount">Amount (Rs.):</label>
          <input type="number" class="form-control" id="amount" name="amount" value="<?php echo htmlspecialchars($expense['amount']); ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update Expense</button>
      </form>
    </div>

    <div class="info-box">
      <p>"Understanding your expenses is the first step towards financial freedom. Let Minto help you manage smarter."</p>
      <small>- Sam Johnson, Financial Advisor</small>
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
        document.addEventListener("DOMContentLoaded", function () {
            filterCategories(); // Initialize category filtering
        });

        function filterCategories() {
            const transactionTypeSelect = document.getElementById('type');
            const categorySelect = document.getElementById('category');
            const selectedType = transactionTypeSelect.value;

            // Show all categories initially
            categorySelect.querySelectorAll('option').forEach(option => {
                option.style.display = 'block';
            });

            // Hide categories that don't match the selected type
            categorySelect.querySelectorAll('option').forEach(option => {
                if (selectedType && option.dataset.type !== selectedType) {
                    option.style.display = 'none';
                }
            });

            // Reset the category selection
            categorySelect.value = '';
        }
    </script>
</body>
</html>

