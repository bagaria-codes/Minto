<?php
include 'db_connect.php';

$errorMessages = [];
$successMessage = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];

    // Validate inputs (basic validation)
    if (empty($email)) {
        $errorMessages[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email format.";
    }

    // If no errors, proceed with checking the email
    if (empty($errorMessages)) {
        // Prepare and execute the SQL query to check if the email exists
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user) {
            // Email exists, send a password reset link
            // For simplicity, we'll just display a success message
            $successMessage = "A password reset link has been sent to your email address.";
            
            // Here you can add the logic to send an actual email with a reset link
            // Example:
            $resetToken = bin2hex(random_bytes(50));
            $resetLink = "http://yourdomain.com/reset_password.php?token=$resetToken";
            // Insert the reset token into the database
            // Send an email with the reset link
        } else {
            $errorMessages[] = "Email not found.";
        }
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
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
        .forgot-password-container {
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
        .forgot-password-container h2 {
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
        .forgot-password-links {
            margin-top: 10px;
        }
        .forgot-password-links a {
            color: var(--sage-green);
            text-decoration: none;
        }
        .forgot-password-links a:hover {
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
        <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
                <img src="images/Logo.jpg" alt="Minto Logo" class="me-2" style="width: 50px; height: 50px; border-radius: 50%">
                Minto
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="login.php">Log In</a></li>
                    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Help/Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Forgot Password Section -->
    <div class="content">
        <div class="forgot-password-container">
            <h2><b>Forgot Password</b></h2>
            <p>Please enter your email address to receive a password reset link.</p>
            <form id="forgotPasswordForm" method="POST" action="forgot_password.php" novalidate>
                <?php foreach ($errorMessages as $error): ?>
                    <div class="text-danger"><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
                <?php if ($successMessage): ?>
                    <div class="text-success"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php endif; ?>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email">
                    <div class="text-danger" id="emailError"></div>
                </div>
                <button type="submit" class="btn btn-reset">Reset Password</button>
                <div class="forgot-password-links mt-2">
                    Remembered your password? <a href="login.php">Login</a>
                </div>
            </form>
        </div>
    </div>

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

    <!-- Forgot Password Validation -->
    <script>
        document.getElementById("forgotPasswordForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let email = document.getElementById("email").value.trim();
            let emailError = document.getElementById("emailError");

            emailError.textContent = "";

            let isValid = true;
            const emailPattern = /^[^@]+@[^@]+\.[^@]+$/;

            if (!email) {
                emailError.textContent = "Email is required.";
                isValid = false;
            } else if (!emailPattern.test(email)) {
                emailError.textContent = "Enter a valid email address.";
                isValid = false;
            }

            if (isValid) {
                this.submit(); // Submit the form if all validations pass
            }
        });
    </script>

</body>
</html>