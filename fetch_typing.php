<?php
$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) die("Connection failed");

session_start();
$currentUser = $_SESSION['username'] ?? '';

$result = $conn->query("SELECT user FROM typing_status WHERE is_typing = 1 AND user != '$currentUser'");

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<em>" . htmlspecialchars($row['user']) . " is typing...</em>";
    }
}
?>
