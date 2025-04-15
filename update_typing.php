<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) die("Connection failed");

$user = $_SESSION['username'] ?? 'Guest';
$is_typing = isset($_POST['typing']) && $_POST['typing'] === 'true' ? 1 : 0;

$conn->query("INSERT INTO typing_status (user, is_typing) VALUES ('$user', $is_typing)
    ON DUPLICATE KEY UPDATE is_typing = $is_typing, updated_at = NOW();");
?>
