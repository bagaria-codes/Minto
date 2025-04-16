<?php
include 'db_connect.php';

// Fetch investment summary
$total_investments_query = "SELECT SUM(amount) AS total_investments FROM investments";
$total_returns_query = "SELECT SUM(returns) AS total_returns FROM investments";
$current_value_query = "SELECT SUM(amount) + SUM(returns) AS current_value FROM investments";
$average_return_query = "SELECT AVG((returns / amount) * 100) AS average_return FROM investments";

$total_investments_result = $conn->query($total_investments_query);
$total_returns_result = $conn->query($total_returns_query);
$current_value_result = $conn->query($current_value_query);
$average_return_result = $conn->query($average_return_query);

$total_investments = $total_investments_result->fetch_assoc()['total_investments'] ?? 0;
$total_returns = $total_returns_result->fetch_assoc()['total_returns'] ?? 0;
$current_value = $current_value_result->fetch_assoc()['current_value'] ?? 0;
$average_return = $average_return_result->fetch_assoc()['average_return'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Investment Tracker</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles.css">
    <style>
        /* Internal Styles for Investment Tracker Page */
        .investment-section {
            background-color: var(--light-gray);
            padding: 40px 0; /* Reduced padding to reduce space above the heading */
        }

        .investment-section h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center; /* Center the heading */
        }

        .investment-section p {
            font-size: 1.1rem;
            color: var(--dark-gray);
            line-height: 1.6;
            text-align: center; /* Center the paragraph */
        }

        .investment-summary {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .investment-summary h3 {
            color: var(--deep-green);
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .investment-summary .summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }

        .investment-summary .summary-item label {
            font-size: 1.1rem;
            color: var(--dark-gray);
        }

        .investment-summary .summary-item span {
            font-size: 1.1rem;
            font-weight: bold;
        }

        .positive {
            color:rgb(86, 134, 121); /* Blue for positive values */
        }

        .negative {
            color:rgb(138, 18, 30); /* Red for negative values */
        }

        .investment-table {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .investment-table h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .investment-table table {
            width: 100%;
            border-collapse: collapse;
        }

        .investment-table th, .investment-table td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid var(--dark-gray);
        }

        .investment-table th {
            background-color: var(--deep-green);
            color: white;
        }

        .investment-table .investment-row {
            background-color: #eaffd0; /* Light green for investments */
        }

        .investment-table .update-btn, .investment-table .delete-btn {
            background-color: var(--deep-green);
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .investment-table .update-btn:hover, .investment-table .delete-btn:hover {
            background-color: var(--sage-green);
        }

        .investment-table .delete-btn {
            background-color: #ff4d4d; /* Red for delete */
        }

        .investment-table .delete-btn:hover {
            background-color: #ff1a1a; /* Darker red for hover */
        }

        .investment-form {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .investment-form h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .investment-form .form-group label {
            color: var(--dark-gray);
            font-weight: 500;
        }

        .investment-form .form-control {
            border: 1px solid var(--dark-gray);
            border-radius: 5px;
        }

        .investment-form .btn-primary {
            background-color: var(--deep-green);
            border-color: var(--deep-green);
            padding: 10px 20px;
            font-size: 1.1rem;
            border-radius: 5px;
        }

        .investment-form .btn-primary:hover {
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

        .map-link {
            color: var(--dark-gray);
            text-decoration: none;
        }

        .map-link:hover {
            text-decoration: underline;
        }

        .phone-link {
            color: var(--dark-gray);
            text-decoration: none;
        }

        .phone-link:hover {
            text-decoration: underline;
        }

        .investment-chart {
            background-color: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .investment-chart h2 {
            color: var(--deep-green);
            font-size: 2rem;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .investment-chart canvas {
            max-width: 100%;
            height: auto;
        }

        /* Hover Effects for Interactive Elements */
        .investment-table .update-btn:hover {
            background-color: var(--sage-green);
        }

        .investment-table .delete-btn:hover {
            background-color: #ff1a1a;
        }

        .investment-form .form-control:focus {
            border-color: var(--sage-green);
            box-shadow: 0 0 10px rgba(0, 123, 102, 0.25); /* Sage Green Shadow */
        }

        .investment-form .btn-primary:focus {
            box-shadow: 0 0 10px rgba(0, 123, 102, 0.5); /* Sage Green Shadow */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .investment-table table {
                font-size: 0.9rem;
            }

            .investment-form .form-control {
                font-size: 0.9rem;
            }

            .investment-form .btn-primary {
                font-size: 1rem;
            }
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
    <!-- Investment Summary -->
            <section class="investment-section py-5 border-bottom" style="background-color: #6E9277;">
                <div class="container">
                    <div class="text-center mb-4">
                        <h1 class="fw-bold display-5 text-white">Investment Tracker</h1>
                        <p class="lead text-white-50">Monitor and manage your investments with Minto. Stay informed and make strategic financial decisions.</p>
                    </div>
                    <!-- Filter Form -->
                    <form class="row justify-content-center g-3">
                        <!-- Search Bar -->
                        <div class="col-md-6 col-sm-6">
                            <input type="text" class="form-control shadow-sm" id="searchInput" placeholder="Search investments...">
                        </div>
                        <!-- Category -->
                        <div class="col-md-4 col-sm-6">
                            <select class="form-select shadow-sm" id="filter-type">
                                <option value="" selected>All Investment Types</option>
                                <option value="stocks">Stocks</option>
                                <option value="bonds">Bonds</option>
                                <option value="mutual-funds">Mutual Funds</option>
                                <option value="real-estate">Real Estate</option>
                                <option value="crypto">Cryptocurrency</option>
                            </select>
                        </div>
                    </form>
                </div>
            </section>
            <section class="investment-section container">
                            <!-- Investment Summary -->
            <div class="investment-summary">
                <h3>Investment Summary</h3>
                <div class="summary-item">
                    <label>Total Investments:</label>
                    <span class="<?php echo ($total_investments > 0) ? 'positive' : 'negative'; ?>">Rs. <?php echo number_format($total_investments); ?></span>
                </div>
                <div class="summary-item">
                    <label>Total Returns:</label>
                    <span class="<?php echo ($total_returns > 0) ? 'positive' : 'negative'; ?>">Rs. <?php echo number_format($total_returns); ?></span>
                </div>
                <div class="summary-item">
                    <label>Current Value:</label>
                    <span class="<?php echo ($current_value > 0) ? 'positive' : 'negative'; ?>">Rs. <?php echo number_format($current_value); ?></span>
                </div>
                <div class="summary-item">
                    <label>Average Annual Return:</label>
                    <span class="<?php echo ($average_return > 0) ? 'positive' : 'negative'; ?>"><?php echo number_format($average_return, 2); ?>%</span>
                </div>
            </div>
            <!-- Investment Table -->
            <div class="investment-table">
                <h2>Investment History</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Investment Type</th>
                            <th>Description</th>
                            <th>Amount (Rs.)</th>
                            <th>Returns (Rs.)</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="investmentTableBody">
                        <?php
                        // Fetch investment history
                        $investment_history_query = "SELECT * FROM investments";
                        $investment_history_result = $conn->query($investment_history_query);

                        if ($investment_history_result->num_rows > 0) {
                            while ($row = $investment_history_result->fetch_assoc()) {
                                ?>
                                <tr class="investment-row">
                                    <td><?php echo htmlspecialchars($row['date']); ?></td>
                                    <td><?php echo htmlspecialchars($row['type']); ?></td>
                                    <td><?php echo htmlspecialchars($row['description']); ?></td>
                                    <td><?php echo number_format($row['amount']); ?></td>
                                    <td><?php echo number_format($row['returns']); ?></td>
                                    <td>
                                    <a href="update_investment.php?id=<?php echo htmlspecialchars($row['id']); ?>" class="update-btn" style="text-decoration: none;">Update</a>
                                        <form method="POST" action="delete_investment.php" style="display:inline;">
                                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="6" class="text-center">No investments found.</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <!-- Investment Form -->
            <div class="investment-form">
                <h2>Add New Investment</h2>
                <form method="POST" action="add_investment.php">
                    <div class="form-group mb-3">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="type">Investment Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="stocks">Stocks</option>
                            <option value="bonds">Bonds</option>
                            <option value="mutual-funds">Mutual Funds</option>
                            <option value="real-estate">Real Estate</option>
                            <option value="crypto">Cryptocurrency</option>
                        </select>
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Description:</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="e.g., XYZ Corp" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="amount">Amount (Rs.):</label>
                        <input type="number" class="form-control" id="amount" name="amount" placeholder="e.g., 50000" min="0" step="0.01" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="returns">Returns (Rs.):</label>
                        <input type="number" class="form-control" id="returns" name="returns" placeholder="e.g., 3000" min="0" step="0.01" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Investment</button>
                </form>
            </div>

            <!-- Investment Chart -->
            <div class="investment-chart">
                <h2>Investment Performance</h2>
                <canvas id="investmentChart"></canvas>
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <p>"Investing is not about avoiding risk, it's about managing it. Let Minto help you track and grow your investments."</p>
                <small>- John Doe, CEO & Co-Founder</small>
            </div>
    </section>

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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const today = new Date();
            const year = today.getFullYear();
            const month = String(today.getMonth() + 1).padStart(2, '0');
            const day = String(today.getDate()).padStart(2, '0');
            const formattedDate = `${year}-${month}-${day}`;

            document.getElementById('date').value = formattedDate;

            // Fetch data for the chart
            fetch('get_investment_data.php')
                .then(response => response.json())
                .then(data => {
                    const ctx = document.getElementById('investmentChart').getContext('2d');
                    const investmentChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: data.labels,
                            datasets: [{
                                label: 'Investment Value',
                                data: data.values,
                                backgroundColor: 'rgba(72, 112, 90, 0.2)',
                                borderColor: 'rgba(72, 112, 90, 1)',
                                borderWidth: 2,
                                fill: true,
                                tension: 0.1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: false,
                                    ticks: {
                                        callback: function(value, index, values) {
                                            return 'Rs. ' + value.toLocaleString();
                                        }
                                    }
                                }
                            },
                            plugins: {
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            let label = context.dataset.label || '';
                                            if (label) {
                                                label += ': ';
                                            }
                                            if (context.parsed !== null) {
                                                label += 'Rs. ' + context.parsed.toLocaleString();
                                            }
                                            return label;
                                        }
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => console.error('Error fetching investment data:', error));
        });

        // Function to filter investments
        function filterInvestments() {
            const searchInput = document.getElementById('searchInput').value.toLowerCase();
            const filterType = document.getElementById('filter-type').value;
            const filterCategory = document.getElementById('filter-category').value;
            const rows = document.querySelectorAll('#investmentTableBody tr');
            rows.forEach(row => {
                const descriptionCell = row.cells[2]; // Description column
                const typeCell = row.cells[1]; // Investment Type column
                let showRow = true;
                // Filter by search term
                if (searchInput && !descriptionCell.textContent.toLowerCase().includes(searchInput)) {
                    showRow = false;
                }
                // Filter by investment type
                if (filterType && typeCell.textContent !== filterType) {
                    showRow = false;
                }
                // Show or hide the row
                row.style.display = showRow ? '' : 'none';
            });
        }

        // Add event listeners for real-time updates
        document.getElementById('searchInput').addEventListener('input', filterInvestments);
        document.getElementById('filter-type').addEventListener('change', filterInvestments);
        document.getElementById('filter-category').addEventListener('change', filterInvestments);

        // Initial filter when the page loads
        filterInvestments();
    </script>
</body>
</html>