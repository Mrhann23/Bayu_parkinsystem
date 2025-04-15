<?php 
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback - Bayu Parking System</title>
    <link rel="stylesheet" href="feedback.css">
    <style>
        body {
            background: url('image/bg7.jpg') no-repeat center center/cover;
            background-attachment: fixed;
        }
    </style>
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
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="login.php">Resident</a></li>
        </ul>
    </nav>

<!-- Hero Section -->
<div class="feedback-hero">
    <h1>We Value Your Feedback</h1>
    <p>Help us improve by sharing your thoughts.</p>
</div>

<!-- Feedback Form -->
<div class="feedback-container">
    <form action="submit_feedback.php" method="POST" class="feedback-form">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="rating">Rate Us:</label>
        <select id="rating" name="rating" required>
            <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
            <option value="4">⭐⭐⭐⭐ - Good</option>
            <option value="3">⭐⭐⭐ - Average</option>
            <option value="2">⭐⭐ - Poor</option>
            <option value="1">⭐ - Very Poor</option>
        </select>

        <label for="comments">Your Feedback:</label>
        <textarea id="comments" name="comments" rows="5" required></textarea>

        <button type="submit">Submit Feedback</button>
    </form>
</div>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
</footer>

</body>
</html>
