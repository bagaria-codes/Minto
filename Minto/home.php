<?php
session_start();
include 'db_connect.php';

// Add this code after database connection and before the HTML
$user_name = 'User'; // Default value
if (isset($_SESSION['user_id'])) {
    $user_query = "SELECT name FROM users WHERE id = ?";  
    $stmt = $conn->prepare($user_query);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $user_name = $row['name'];  
    }
    $stmt->close();
}


// Fetch total income, total expense, and net savings
$total_income_query = "SELECT SUM(amount) AS total_income FROM transactions WHERE type = 'income'";
$total_expense_query = "SELECT SUM(amount) AS total_expense FROM transactions WHERE type = 'expense'";
$net_savings_query = "SELECT SUM(CASE WHEN type = 'income' THEN amount ELSE -amount END) AS net_savings FROM transactions";

$total_income_result = $conn->query($total_income_query);
$total_expense_result = $conn->query($total_expense_query);
$net_savings_result = $conn->query($net_savings_query);

$total_income = $total_income_result->fetch_assoc()['total_income'] ?? 0;
$total_expense = $total_expense_result->fetch_assoc()['total_expense'] ?? 0;
$net_savings = $net_savings_result->fetch_assoc()['net_savings'] ?? 0;

// Fetch spending data for the charts
$spending_data_query = "SELECT category, SUM(amount) AS total_amount FROM transactions WHERE type = 'expense' GROUP BY category";
$spending_data_result = $conn->query($spending_data_query);

$spending_categories = [];
$spending_values = [];

if ($spending_data_result->num_rows > 0) {
    while ($row = $spending_data_result->fetch_assoc()) {
        $spending_categories[] = htmlspecialchars($row['category']);
        $spending_values[] = (float)$row['total_amount'];
    }
}

// Fetch income and expense data for the past 7 days
$past_7_days_income_query = "SELECT DATE(date) as date, SUM(amount) as amount 
                             FROM transactions 
                             WHERE type = 'income' AND date >= CURDATE() - INTERVAL 7 DAY 
                             GROUP BY DATE(date)";
$past_7_days_expense_query = "SELECT DATE(date) as date, SUM(amount) as amount 
                              FROM transactions 
                              WHERE type = 'expense' AND date >= CURDATE() - INTERVAL 7 DAY 
                              GROUP BY DATE(date)";

$past_7_days_income_result = $conn->query($past_7_days_income_query);
$past_7_days_expense_result = $conn->query($past_7_days_expense_query);

$past_7_days_income = [];
$past_7_days_expense = [];

while ($row = $past_7_days_income_result->fetch_assoc()) {
    $past_7_days_income[$row['date']] = $row['amount'];
}
while ($row = $past_7_days_expense_result->fetch_assoc()) {
    $past_7_days_expense[$row['date']] = $row['amount'];
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Dashboard</title>
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Chart.js & jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="styles.css">

    <style>
        :root {
            --light-gray: #f9f9f9;
            --deep-green: #48705A;
            --sage-green: #6E9277;
            --dark-gray: #333;
        }
        body {
            background-color:rgb(244, 249, 246);
            font-family:Arial, sans-serif;
            color: var(--dark-gray);
        }
       
        .dashboard-summary {
            background-color:rgb(244, 249, 246);
            margin-top: 0;
        }
        .card-income {
            background-color: #d5f6e0;
            color: #2f6846;
            border: 0.5px solid #2f6846;
        }
        .card-expense {
            background-color: #fbe4e6;
            color: #82252d;
            border: 0.5px solid #82252d;
        }
        .card-balance {
            background-color: #e4ecfb;
            color: #244c8c;
            border: 0.5px solid #244c8c;
        }
        .card h5 {
            font-weight: 600;
        }
        .display-6 {
            font-weight: bold;
        }
        .form-section select,
        .form-section input {
            font-size: 0.95rem;
        }
        .quick-links a {
            font-size: 0.9rem;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            width: auto; 
            display: inline-block; /* Ensure buttons are not stretched */
            margin-bottom: 40px;
        }

        .quick-links a:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            border-radius: 16px;
            transition: transform 0.2s ease-in-out;
        }
        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.1);
        }
        .form-section .form-control,
        .form-section .form-select {
            border-radius: 10px;
            padding: 0.6rem 0.9rem;
            border: 1px solid #ccc;
        }
        .form-section button {
            font-weight: 500;
        }
        .card-title {
            font-size: 1.2rem;
            margin-bottom: 1rem;
        }
        canvas {
            max-height: 280px;
        }
        .bg-light {
            background-color: var(--light-gray) !important;
        }

        /* Style for section headings */
        section h2 {
            color: var(--deep-green);
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 30px;
            text-align: center;
        }
        .quote-box {
            background: linear-gradient(135deg, var(--deep-green), var(--sage-green)); /* Gradient background */
            color: white; 
            padding: 30px; 
            border-radius: 16px; 
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1); 
            position: relative; 
            overflow: hidden; 
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-top: 0px;
            text-align: left;
        }

        .quote-box::before {
            content: '\201C'; /* Large quotation mark */
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 170px;
            color: rgba(255, 255, 255, 0.1);
            font-family: Georgia, serif;
            line-height: 1;
        }

        .quote-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.2); 
        }

        .quote-box h6 {
            font-size: 1.6rem; 
            font-style: italic; 
            margin-bottom: 10px;
            color: #ffffff !important; /* Force white text color */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); 
            line-height: 1.5; 
            margin-left: 50px;
        }

        .quote-box small {
            display: block;
            font-size: 1rem; 
            color: #d1e7dd !important; 
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); 
            margin-top: 10px; 
            margin-left: 60px;
        }
                .card-title {
            font-size: 1.1rem;
        }
        .form-section .form-control,
        .form-section .form-select {
            font-size: 0.9rem;
        }
        .form-section button {
            font-size: 0.9rem;
        }
        .welcome-section {
            text-align: left; /* Align text to the left */
            margin-top: 30px;
        }

        .welcome-section h1 {
            font-size: 2rem; 
            font-weight: bold; 
            color: #333;
            margin-left: 60px;
        }

        .welcome-section h1 span {
            color: #48705A; /* Different color for the user's name */
        }

    </style>
</head>
<body>
    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="home.php">
                <img src="images/Logo.jpg" alt="Minto Logo" class="me-2" style="width: 50px; height: 50px; border-radius: 50%; ">
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
    <section class="welcome-section">
    <h1>Welcome Back, <span><?php echo htmlspecialchars($user_name ?? 'User'); ?></span>!</h1>
</section>

    <!-- Quote Section -->
    <section class="quote-section">
    <div class="container">
            <div class="quote-box">
                <h6 id="quoteText" class="fst-italic text-secondary">
                    "It's not your salary that makes you rich, it's your spending habits."
                </h6>
                <small id="quoteAuthor">— Charles A. Jaffe</small>
            </div>
        </div>
    </section>

    <!-- Dashboard Summary -->
    <div class="container my-5 dashboard-summary">
        <!-- Financial Summary -->
        <div class="row g-4 mb-4">
            <div class="col-md-4">
                <div class="card card-income shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Income</h5>
                        <p id="totalIncome" class="display-6">₹<?php echo number_format($total_income); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-expense shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Total Expenses</h5>
                        <p id="totalExpense" class="display-6">₹<?php echo number_format($total_expense); ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-balance shadow-sm text-center">
                    <div class="card-body">
                        <h5 class="card-title">Balance</h5>
                        <p id="balance" class="display-6">₹<?php echo number_format($net_savings); ?></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-2 mb-3 text-center quick-links">
            <div class="col-md-4">
                <a href="income.php" class="btn btn-outline-success">View Income</a>
            </div>
            <div class="col-md-4">
                <a href="expenses.php" class="btn btn-outline-danger">View Expenses</a>
            </div>
            <div class="col-md-4">
                <a href="transaction-history.php" class="btn btn-outline-primary">View Transactions</a>
            </div>
        </div>
        <!-- Charts -->
        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title text-center">Spending Overview</h5>
                    <canvas id="spendingChart"></canvas>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card shadow-sm p-3">
                    <h5 class="card-title text-center">Weekly Income vs Expense Trends</h5>
                    <canvas id="financeChart"></canvas>
                </div>
            </div>
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
                        <li><a href="index.html">Features</a></li>
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
    <!-- Main Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initial data
            let income = <?php echo $total_income; ?>;
            let expense = <?php echo $total_expense; ?>;
            let balance = income - expense;

            // Update UI with initial data
            document.getElementById('totalIncome').textContent = '₹' + income.toLocaleString();
            document.getElementById('totalExpense').textContent = '₹' + expense.toLocaleString();
            document.getElementById('balance').textContent = '₹' + balance.toLocaleString();

            // Quote fetch using ZenQuotes API
            $.ajax({
                url: 'https://cors-anywhere.herokuapp.com/https://zenquotes.io/api/random',
                method: 'GET',
                success: function (data) {
                    console.log("API Response:", data); // Log the API response to check its structure
                    if (data && data[0] && data[0].q && data[0].a) {
                        // Update the quote text and author separately
                        $('#quoteText').text(`"${data[0].q}"`);
                        $('#quoteAuthor').text(`— ${data[0].a}`);
                    } else {
                        // Fallback quote in case of unexpected API response
                        $('#quoteText').text("“Wealth consists not in having great possessions, but in having few wants.”");
                        $('#quoteAuthor').text("— Epictetus");
                        console.error("Unexpected API response:", data);
                    }
                },
                error: function (xhr, status, error) {
                    // Fallback quote in case of API failure
                    $('#quoteText').text("“Wealth consists not in having great possessions, but in having few wants.”");
                    $('#quoteAuthor').text("— Epictetus");
                    console.error("Failed to fetch quotes from ZenQuotes API:", status, error);
                }
            });
            function fetchDataAndUpdateCharts() {
                fetch('get_transaction_data.php')
                    .then(response => response.json())
                    .then(data => {
                        if (data.finance) {
                            // Update finance chart
                            const financeData = data.finance;
                            financeChart.data.labels = financeData.labels || []; // || is fallback if data is missing
                            financeChart.data.datasets[0].data = financeData.income || [];
                            financeChart.data.datasets[1].data = financeData.expense || [];
                            financeChart.update();
                        } else {
                            console.error("Finance data is undefined:", data);
                        }

                        if (data.spending) {
                            // Update spending chart
                            const spendingData = data.spending;
                            spendingChart.data.labels = spendingData.categories || [];
                            spendingChart.data.datasets[0].data = spendingData.values || [];
                            spendingChart.update();
                        } else {
                            console.error("Spending data is undefined:", data);
                        }
                    })
                    .catch(error => console.error('Error fetching transaction data:', error));
            }

            // Initial data fetch and chart update
            fetchDataAndUpdateCharts();

            // Set interval to fetch data every 5 minutes (300000 milliseconds)
            setInterval(fetchDataAndUpdateCharts, 300000);

            // Finance Chart (Horizontal Grouped Bar Chart)
            const financeCtx = document.getElementById('financeChart').getContext('2d');
            const financeChart = new Chart(financeCtx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode(array_keys($past_7_days_income)); ?>,
                    datasets: [
                        {
                            label: 'Income',
                            data: <?php echo json_encode(array_values($past_7_days_income)); ?>,
                            backgroundColor: '#27ae60',
                            borderRadius: 10,
                            barPercentage: 0.5,
                            categoryPercentage: 0.5
                        },
                        {
                            label: 'Expenses',
                            data: <?php echo json_encode(array_values($past_7_days_expense)); ?>,
                            backgroundColor: '#ff6b6b',
                            borderRadius: 10,
                            barPercentage: 0.5,
                            categoryPercentage: 0.5
                        }
                    ]
                },
                options: {
                    indexAxis: 'y',
                    plugins: {
                        legend: { 
                            position: 'bottom',
                            labels: {
                                padding: 20
                            }
                        },
                        tooltip: {
                            enabled: true,
                            mode: 'index',
                            intersect: false,
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed.x !== null) {
                                        label += '₹' + context.parsed.x.toLocaleString();
                                    }
                                    return label;
                                }
                            }
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            formatter: function(value) {
                                return '₹' + (value || 0).toLocaleString();
                            },
                            color: '#333',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    scales: {
                        x: {
                            beginAtZero: true,
                            title: {
                                display: true,
                                text: 'Amount (₹)'
                            },
                            ticks: {
                                callback: function(value) {
                                    return '₹' + value.toLocaleString();
                                }
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Date'
                            }
                        }
                    }
                }
            });

            // Spending Chart (Doughnut Chart)
            const spendingCtx = document.getElementById('spendingChart').getContext('2d');
            const spendingChart = new Chart(spendingCtx, {
                type: 'doughnut',
                data: {
                    labels: <?php echo json_encode($spending_categories); ?>,
                    datasets: [{
                        data: <?php echo json_encode($spending_values); ?>,
                        backgroundColor: ['#6E9277', '#48705A', '#B3C2B2', '#A3D9A5', '#8BAA91', '#5A8F7B'],
                        borderColor: '#fff'
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { position: 'bottom' },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.parsed !== null) {
                                        label += '₹' + context.parsed.toLocaleString();
                                    }
                                    return label;
                                }
                            }
                        },
                        datalabels: {
                            anchor: 'center',
                            align: 'center',
                            formatter: function(value, context) {
                                return '₹' + value.toLocaleString();
                            },
                            color: '#fff',
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                }
            });

            // Function to update finance chart
            function updateFinanceChart(date, income, expense) {
                const dateIndex = financeChart.data.labels.indexOf(date);
                if (dateIndex !== -1) {
                    financeChart.data.datasets[0].data[dateIndex] += income;
                    financeChart.data.datasets[1].data[dateIndex] += expense;
                } else {
                    financeChart.data.labels.push(date);
                    financeChart.data.datasets[0].data.push(income);
                    financeChart.data.datasets[1].data.push(expense);
                }
                financeChart.update();
            }

            // Function to update spending chart
            function updateSpendingChart(category, amount) {
                const categoryIndex = spendingChart.data.labels.indexOf(category);
                if (categoryIndex !== -1) {
                    spendingChart.data.datasets[0].data[categoryIndex] += amount;
                } else {
                    spendingChart.data.labels.push(category);
                    spendingChart.data.datasets[0].data.push(amount);
                }
                spendingChart.update();
            }
        });
    </script>
</body>
</html>