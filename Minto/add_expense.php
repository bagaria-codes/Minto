<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $time = $_POST['time'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    // Validate inputs
    if (empty($date) || empty($time) || empty($category) || empty($description) || empty($amount)) {
        die("All fields are required.");
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO transactions (date, time, type, category, description, amount) VALUES (?, ?, 'expense', ?, ?, ?)");
    $stmt->bind_param("ssssd", $date, $time, $category, $description, $amount);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: expenses.php"); // Redirect back to the expenses page
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>