<?php
include 'db_connect.php';

// Fetch income data for the chart
$query = "
    SELECT 
        DATE(date) AS date, 
        SUM(amount) AS total_income 
    FROM 
        transactions 
    WHERE 
        type = 'income' 
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
        $values[] = $row['total_income'];
    }
}

echo json_encode([
    'labels' => $labels,
    'values' => $values
]);
?>