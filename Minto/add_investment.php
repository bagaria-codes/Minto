<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $date = $_POST['date'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $amount = $_POST['amount'];
    $returns = $_POST['returns']; // ✅ Added returns

    // Validate inputs (basic validation)
    if (!empty($date) && !empty($type) && !empty($description) && !empty($amount) && !empty($returns)) {
        // Prepare and execute the SQL query
        $sql = "INSERT INTO investments (date, type, description, amount, returns) VALUES (?, ?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssdd", $date, $type, $description, $amount, $returns); // ✅ Bound returns

        if ($stmt->execute()) {
            header("Location: investment-tracker.php");
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
