<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "bayu_parking";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

$conn->query("SET GLOBAL max_allowed_packet=16777216");

?>
