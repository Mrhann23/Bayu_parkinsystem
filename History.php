<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking History - Bayu Parking System</title>
    <link rel="stylesheet" href="history.css">
</head>
<body>

<!-- Navigation Bar -->
<nav class="navbar">
    <div class="logo-container">
        <img src="image/logo1.png" alt="Logo">
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="Park.php">Parking</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="faq.php">FAQ</a></li>
        <li><a href="feedback.php">Feedback</a></li>
        <li><a href="login.php">Log Out</a></li>
    </ul>
</nav>

<!-- Hero Section -->
<div class="history-hero">
    <h1>Parking History</h1>
    <p>View your past parking transactions and bookings.</p>
</div>

<!-- History Section -->
<div class="history-container">
    <table class="history-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Location</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2024-02-20</td>
                <td>10:30 AM</td>
                <td>Block A - Slot 5</td>
                <td>Completed</td>
            </tr>
            <tr>
                <td>2024-02-18</td>
                <td>2:00 PM</td>
                <td>Block B - Slot 3</td>
                <td>Completed</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
</footer>

</body>
</html>
