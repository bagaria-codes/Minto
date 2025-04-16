<?php
include 'db_connect.php';

$errorMessages = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $dob = $_POST['dob'];
    $currency = $_POST['currency'];
    $income = $_POST['income'];
    $goal = $_POST['goal'];
    $securityQuestion = $_POST['securityQuestion'];
    $answer = $_POST['answer'];

    // Validate inputs (basic validation)
    if (empty($name)) {
        $errorMessages[] = "Full name is required.";
    }
    if (empty($email)) {
        $errorMessages[] = "Email is required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMessages[] = "Invalid email format.";
    }
    if (strlen($password) < 6) {
        $errorMessages[] = "Password must be at least 6 characters.";
    }
    if ($password !== $confirmPassword) {
        $errorMessages[] = "Passwords do not match.";
    }
    if (empty($dob)) {
        $errorMessages[] = "Date of birth is required.";
    }
    if (empty($currency)) {
        $errorMessages[] = "Please select a currency.";
    }
    if (empty($income)) {
        $errorMessages[] = "Please select your income range.";
    }
    if (empty($goal)) {
        $errorMessages[] = "Please select a financial goal.";
    }
    if (empty($securityQuestion)) {
        $errorMessages[] = "Please select a security question.";
    }
    if (empty($answer)) {
        $errorMessages[] = "Answer is required.";
    }

    // If no errors, proceed with insertion
    if (empty($errorMessages)) {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Prepare and execute the SQL query
        $sql = "INSERT INTO users (name, email, password, dob, currency, income_range, financial_goal, security_question, security_answer) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $name, $email, $hashedPassword, $dob, $currency, $income, $goal, $securityQuestion, $answer);

        if ($stmt->execute()) {
            header("Location: login.php"); // Redirect to login.php after successful signup
            exit();
        } else {
            $errorMessages[] = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up | Minto</title>
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
        .signup-container {
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
        .signup-container h2 {
            color: var(--deep-green);
            margin-bottom: 20px;
        }
        .btn-signup {
            background-color: var(--sage-green);
            color: white;
            font-size: 1.1rem;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
        }
        .btn-signup:hover {
            background-color: var(--deep-green);
        }
        .signup-links {
            margin-top: 10px;
        }
        .signup-links a {
            color: var(--sage-green);
            text-decoration: none;
        }
        .signup-links a:hover {
            text-decoration: underline;
        }
        .text-danger {
            text-align: left;
            font-size: 0.875rem;
            margin-top: 5px;
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
                    <li class="nav-item"><a class="nav-link" href="contact.php">Help/Contact</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="signup-container">
        <h2><b>Create Your Minto Account</b></h2>
        <form id="signupForm" method="POST" action="signup.php" novalidate>
            <?php foreach ($errorMessages as $error): ?>
                <div class="text-danger"><?php echo htmlspecialchars($error); ?></div>
            <?php endforeach; ?>
            <div class="mb-3">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-control" id="name" name="name">
                <div class="text-danger" id="nameError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" id="email" name="email">
                <div class="text-danger" id="emailError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
                <div class="text-danger" id="passwordError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                <div class="text-danger" id="confirmPasswordError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob">
                <div class="text-danger" id="dobError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Currency Preference</label>
                <select class="form-select" id="currency" name="currency">
                    <option value="">-- Select Currency --</option>
                    <option value="INR">INR (₹)</option>
                    <option value="USD">USD ($)</option>
                    <option value="EUR">EUR (€)</option>
                    <option value="GBP">GBP (£)</option>
                </select>
                <div class="text-danger" id="currencyError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Monthly Income Range</label>
                <select class="form-select" id="income" name="income">
                    <option value="">-- Select Income --</option>
                    <option value="<10K">Less than 10K</option>
                    <option value="10K-50K">10K - 50K</option>
                    <option value="50K-100K">50K - 100K</option>
                    <option value=">100K">More than 100K</option>
                </select>
                <div class="text-danger" id="incomeError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Primary Financial Goal</label>
                <select class="form-select" id="goal" name="goal">
                    <option value="">-- Select Goal --</option>
                    <option value="Saving">Saving</option>
                    <option value="Investing">Investing</option>
                    <option value="Debt Management">Debt Management</option>
                    <option value="Budgeting">Budgeting</option>
                </select>
                <div class="text-danger" id="goalError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Security Question</label>
                <select class="form-select" id="securityQuestion" name="securityQuestion">
                    <option value="">-- Select Question --</option>
                    <option value="pet">What was your first pet's name?</option>
                    <option value="school">What was the name of your first school?</option>
                    <option value="city">In which city were you born?</option>
                </select>
                <div class="text-danger" id="securityError"></div>
            </div>
            <div class="mb-3">
                <label class="form-label">Answer</label>
                <input type="text" class="form-control" id="answer" name="answer">
                <div class="text-danger" id="answerError"></div>
            </div>
            <button type="submit" class="btn btn-signup">Sign Up</button>
            <div class="signup-links mt-2">
                Already have an account? <a href="login.php">Login</a>
            </div>
        </form>
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
    <script>
        document.getElementById("signupForm").addEventListener("submit", function(event) {
            event.preventDefault();
            let isValid = true;
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("confirmPassword").value.trim();
            const dob = document.getElementById("dob").value;
            const currency = document.getElementById("currency").value;
            const income = document.getElementById("income").value;
            const goal = document.getElementById("goal").value;
            const securityQuestion = document.getElementById("securityQuestion").value;
            const answer = document.getElementById("answer").value.trim();
            const fields = ["name", "email", "password", "confirmPassword", "dob", "currency", "income", "goal", "securityQuestion", "answer"];
            fields.forEach(f => {
                const err = document.getElementById(`${f}Error`);
                if (err) err.textContent = "";
            });
            if (name === "") {
                document.getElementById("nameError").textContent = "Full name is required.";
                isValid = false;
            }
            const emailPattern = /^[^@]+@[^@]+\.[^@]+$/;
            if (email === "") {
                document.getElementById("emailError").textContent = "Email is required.";
                isValid = false;
            } else if (!emailPattern.test(email)) {
                document.getElementById("emailError").textContent = "Invalid email format.";
                isValid = false;
            }
            if (password.length < 6) {
                document.getElementById("passwordError").textContent = "Password must be at least 6 characters.";
                isValid = false;
            }
            if (password !== confirmPassword) {
                document.getElementById("confirmPasswordError").textContent = "Passwords do not match.";
                isValid = false;
            }
            if (dob === "") {
                document.getElementById("dobError").textContent = "Date of birth is required.";
                isValid = false;
            }
            if (currency === "") {
                document.getElementById("currencyError").textContent = "Please select a currency.";
                isValid = false;
            }
            if (income === "") {
                document.getElementById("incomeError").textContent = "Please select your income range.";
                isValid = false;
            }
            if (goal === "") {
                document.getElementById("goalError").textContent = "Please select a financial goal.";
                isValid = false;
            }
            if (securityQuestion === "") {
                document.getElementById("securityError").textContent = "Please select a security question.";
                isValid = false;
            }
            if (answer === "") {
                document.getElementById("answerError").textContent = "Answer is required.";
                isValid = false;
            }
            if (isValid) {
                this.submit(); // Submit the form if all validations pass
            }
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>