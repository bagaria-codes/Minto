<?php
session_start();
include 'db_connect.php';

$errorMessages = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate inputs
    if (empty($email)) {
        $errorMessages[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errorMessages[] = "Password is required.";
    } elseif (strlen($password) < 6) {
        $errorMessages[] = "Password must be at least 6 characters long.";
    }

    // If no errors, proceed with authentication
    if (empty($errorMessages)) {
        // Prepare and execute the SQL query
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        $stmt->close();

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: home.php"); // Redirect to home page or dashboard
            exit();
        } else {
            $errorMessages[] = "Invalid email or password.";
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
    <title>Login | Minto</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">

    <style>
        body{
            background-color: #d8efe1;
        }
        .content {
            padding-top: 60px;
            padding-bottom: 60px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 160px); /* Adjusts for navbar and footer */
        }

        .login-container {
            width: 380px;
            height: 440px;
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .login-container h2 {
            color: var(--deep-green);
            margin-bottom: 20px;
        }

        .form-label {
            text-align: left;
            display: block;
        }

        .error {
            color: red;
            font-size: 0.9rem;
            text-align: left;
            margin-top: 5px;
        }

        .btn-login {
            background-color: var(--sage-green);
            color: white;
            font-size: 1.1rem;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }

        .btn-login:hover {
            background-color: var(--deep-green);
        }

        .login-links {
            margin-top: 10px;
        }

        .login-links a {
            color: var(--sage-green);
            text-decoration: none;
        }

        .login-links a:hover {
            text-decoration: underline;
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
                    <li class="nav-item"><a class="nav-link" href="signup.php">Sign Up</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact.php">Help/Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <!-- Login Section -->
    <div class="content">
        <div class="login-container">
            <h2><b>Login to Minto</b></h2>
            <form id="loginForm" method="POST" action="login.php" novalidate>
                <?php foreach ($errorMessages as $error): ?>
                    <div class="error"><?php echo htmlspecialchars($error); ?></div>
                <?php endforeach; ?>
                <div class="mb-3">
                    <label class="form-label">Email Address</label>
                    <input type="email" id="email" class="form-control" name="email">
                    <div class="error" id="emailError"></div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" id="password" class="form-control" name="password">
                    <div class="error" id="passwordError"></div>
                </div>
                <button type="submit" class="btn btn-login">Login</button>
                <div class="login-links">
                    <a href="forgot_password.php">Forgot Password?</a>
                </div>
                <div class="login-links mt-2">
                    Don't have an account? <a href="signup.php">Sign up</a>
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

    <!-- Login Validation -->
    <script>
        document.getElementById("loginForm").addEventListener("submit", function(event) {
            event.preventDefault();

            let email = document.getElementById("email").value.trim();
            let password = document.getElementById("password").value.trim();
            let emailError = document.getElementById("emailError");
            let passwordError = document.getElementById("passwordError");

            emailError.textContent = "";
            passwordError.textContent = "";

            let isValid = true;
            const emailPattern = /[A-Za-z0-9\._%+\-]+@[A-Za-z0-9\.\-]+\.[A-Za-z]{2,}$/;

            if (!email) {
                emailError.textContent = "Email is required.";
                isValid = false;
            } else if (!emailPattern.test(email)) {
                emailError.textContent = "Enter a valid email address.";
                isValid = false;
            }

            if (!password) {
                passwordError.textContent = "Password is required.";
                isValid = false;
            } else if (password.length < 6) {
                passwordError.textContent = "Password must be at least 6 characters.";
                isValid = false;
            }

            if (isValid) {
                this.submit(); // Submit the form if all validations pass
            }
        });
    </script>

</body>
</html>