<?php
include 'db_connect.php';

$errorMessages = [];
$successMessage = '';

if (!isset($_GET['id'])) {
    echo "User ID is missing.";
    exit();
}

$id = $_GET['id'];

// Fetch the user record to ensure the ID is valid
$sql = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

if (!$user) {
    echo "User not found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    // Validate inputs (basic validation)
    if (empty($newPassword)) {
        $errorMessages[] = "New password is required.";
    } elseif (empty($confirmPassword)) {
        $errorMessages[] = "Confirm password is required.";
    } elseif ($newPassword !== $confirmPassword) {
        $errorMessages[] = "Passwords do not match.";
    } elseif (strlen($newPassword) < 6) {
        $errorMessages[] = "Password must be at least 6 characters long.";
    }

    // If no errors, proceed with updating the password
    if (empty($errorMessages)) {
        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        // Prepare and execute the SQL query to update the password
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $hashedPassword, $id);

        if ($stmt->execute()) {
            $successMessage = "Your password has been successfully reset.";
        } else {
            $errorMessages[] = "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Minto</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        :root {
            --light-gray: #F5F5F5;
            --sage-green: #6E9277;
            --deep-green: #48705A;
            --dark-gray: #333333;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: #d8efe1;
            color: var(--dark-gray);
        }
        .reset-password-container {
            max-width: 450px;
            margin: 50px auto 50px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .form-label {
            text-align: left;
            display: block;
        }
        .reset-password-container h2 {
            color: var(--deep-green);
            margin-bottom: 20px;
        }
        .btn-reset {
            background-color: var(--sage-green);
            color: white;
            font-size: 1.1rem;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        .btn-reset:hover {
            background-color: var(--deep-green);
        }
        .reset-password-links {
            margin-top: 10px;
        }
        .reset-password-links a {
            color: var(--sage-green);
            text-decoration: none;
        }
        .reset-password-links a:hover {
            text-decoration: underline;
        }
        .text-success {
            text-align: left;
            font-size: 0.875rem;
            margin-top: 5px;
            color: green;
        }
        .text-danger {
            text-align: left;
            font-size: 0.875rem;
            margin-top: 5px;
            color: red;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.html">Minto</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.html">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="budget.html">Budget</a></li>
                    <li class="nav-item"><a class="nav-link" href="expense.html">Expenses</a></li>
                    <li class="nav-item"><a class="nav-link active" href="investment-tracker.php">Investments</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaction-history.php">Transactions</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Reset Password Section -->
    <div class="content">
        <div class="reset-password-container">
            <h2><b>Reset Password</b></h2>
            <p>Please enter your new password.</p>
            <form id="resetPasswordForm" method="POST" action="reset_password.php?id=<?php echo htmlspecialchars($id); ?>" novalidate>
                <?php foreach ($errorMessages as $error): ?>
                    <div class="text-danger"><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
                <?php if ($successMessage): ?>
                    <div class="text-success"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php endif; ?>
                <div class="mb-3">
                    <label class="form-label">New Password</label>
                    <input type="password" class="form-control" id="newPassword" name="newPassword">
                    <div class="text-danger" id="newPasswordError"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    <div class="text-danger" id="confirmPasswordError"></div>
                </div>
                <button type="submit" class="btn btn-reset">Reset Password</button>
                <div class="reset-password-links mt-2">
                    <a href="forgot_password.php">Back to Forgot Password</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Company</h5>
                    <ul class="list-unstyled">
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Support</h5>
                    <ul class="list-unstyled">
                        <li><a href="#">Help Center</a></li>
                        <li><a href="contact.html">Contact Us</a></li>
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
            <p class="mt-3">© 2025 Minto. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Reset Password Validation -->
    <script>
        document.getElementById("resetPasswordForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let newPassword = document.getElementById("newPassword").value.trim();
            let confirmPassword = document.getElementById("confirmPassword").value.trim();
            let newPasswordError = document.getElementById("newPasswordError");
            let confirmPasswordError = document.getElementById("confirmPasswordError");

            newPasswordError.textContent = "";
            confirmPasswordError.textContent = "";

            let isValid = true;

            if (!newPassword) {
                newPasswordError.textContent = "New password is required.";
                isValid = false;
            } else if (newPassword.length < 6) {
                newPasswordError.textContent = "Password must be at least 6 characters long.";
                isValid = false;
            }

            if (!confirmPassword) {
                confirmPasswordError.textContent = "Confirm password is required.";
                isValid = false;
            } else if (newPassword !== confirmPassword) {
                confirmPasswordError.textContent = "Passwords do not match.";
                isValid = false;
            }

            if (isValid) {
                this.submit(); // Submit the form if all validations pass
            }
        });
    </script>

</body>
</html>