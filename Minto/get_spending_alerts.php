<?php
require_once 'db_connect.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    http_response_code(401);
    exit('Unauthorized');
}

$alerts = analyzeSpendingPatterns($conn, $_SESSION['user_id']);

header('Content-Type: application/json');
echo json_encode($alerts);

$conn->close();
?>