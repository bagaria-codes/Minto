<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST['date'];
    $time = $_POST['time'];
    $type = $_POST['type'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];

    // Validate inputs (basic validation)
    if (!empty($date) && !empty($time) && !empty($type) && !empty($category) && !empty($description) && !empty($amount)) {
        // Prepare and execute the SQL query
        $sql = "INSERT INTO transactions (date, time, type, category, description, amount) VALUES (?, ?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssd", $date, $time, $type, $category, $description, $amount);

        if ($stmt->execute()) {
            header("Location: transaction-history.php");
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