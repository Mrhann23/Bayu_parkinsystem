<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM reservations WHERE id = $id");
}

header("Location: manage_reserve.php");
exit();
?>
