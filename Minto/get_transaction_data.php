<?php
include 'db_connect.php';

// Fetch transaction data for the chart
$sql = "SELECT date, SUM(CASE WHEN type = 'income' THEN amount ELSE -amount END) AS value FROM transactions GROUP BY date ORDER BY date ASC";
$result = $conn->query($sql);

$labels = [];
$values = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $labels[] = $row['date'];
        $values[] = $row['value'];
    }
}

$data = [
    'labels' => $labels,
    'values' => $values
];

echo json_encode($data);

$conn->close();
?>