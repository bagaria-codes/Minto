<?php
$servername = "localhost";
$username = "root"; // Update if needed
$password = ""; // Update if needed
$dbname = "minto_finance"; // Ensure this matches your database name// Default password for XAMPP/WAMP
// $dbname = "minto_finance";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>