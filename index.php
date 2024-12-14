<?php
$servername = "localhost";
$username = "web_user";
$password = "StrongPassword123";
$dbname = "web_db";

// Connect to MySQL
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Display visitor's IP and current time
$visitor_ip = $_SERVER['REMOTE_ADDR'];
$current_time = date("Y-m-d H:i:s");

echo "Hello! Your IP address is $visitor_ip and the current time is $current_time.";

$conn->close();
?>
