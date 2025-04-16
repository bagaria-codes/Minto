<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Logout | Minto</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link rel="stylesheet" href="styles.css" />
  <style>
    body{
      background-color:#d8efe1;
    }
    .feedback-form {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
    }

    .btn-minto {
      background-color: var(--sage-green);
      color: white;
      border: none;
      transition: 0.3s;
    }

    .btn-minto:hover {
      background-color: var(--deep-green);
    }
  </style>
</head>
<body>

    <!-- Navigation Bar -->
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

  <!-- Feedback Form Section -->
  <section class="py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4 fw-bold" style="color: rgb(16, 102, 63);">We'd Love Your Feedback!</h2>
          <div class="feedback-form">
            <form action="index.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Name</label>
                <input type="text" class="form-control" id="name" placeholder="Your name" required>
              </div>
              <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com" required>
              </div>
              <div class="mb-3">
                <label for="rating" class="form-label fw-semibold">How would you rate Minto?</label>
                <select class="form-select" id="rating" required>
                  <option value="" disabled selected>Select a rating</option>
                  <option value="5">⭐️⭐️⭐️⭐️⭐️ - Excellent</option>
                  <option value="4">⭐️⭐️⭐️⭐️ - Very Good</option>
                  <option value="3">⭐️⭐️⭐️ - Good</option>
                  <option value="2">⭐️⭐️ - Fair</option>
                  <option value="1">⭐️ - Poor</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="comments" class="form-label fw-semibold">Comments</label>
                <textarea class="form-control" id="comments" rows="4" placeholder="Your suggestions, feedback or experience" required></textarea>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-minto px-4">Submit Feedback</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="footer mt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h5>Company</h5>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Careers</a></li>
            <li><a href="#">Press</a></li>
          </ul>
        </div>
        <div class="col-md-4">
          <h5>Support</h5>
          <ul>
            <li><a href="#">Help Center</a></li>
            <li><a href="#">Contact Us</a></li>
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
      <p class="mt-4">© 2025 Minto. All rights reserved.</p>
    </div>
  </footer>
  <script>
    document.getElementById('feedbackForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const formData = new FormData(this);
        
        fetch('submit_feedback.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                alert('Thank you for your feedback!');
                window.location.href = 'index.php';
            } else {
                alert('Error submitting feedback. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error submitting feedback. Please try again.');
        });
    });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
