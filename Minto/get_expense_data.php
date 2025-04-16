<?php
include 'db_connect.php';

// Fetch expense data for the chart
$query = "
    SELECT 
        DATE(date) AS date, 
        SUM(amount) AS total_expense 
    FROM 
        transactions 
    WHERE 
        type = 'expense' 
    GROUP BY 
        DATE(date) 
    ORDER BY 
        date ASC
";
$result = $conn->query($query);

$labels = [];
$values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['date'];
        $values[] = $row['total_expense'];
    }
}

echo json_encode([
    'labels' => $labels,
    'values' => $values
]);
?>