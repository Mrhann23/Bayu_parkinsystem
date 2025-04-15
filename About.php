<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bayu Parking System</title>
    <link rel="stylesheet" href="about.css">
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
<div class="hero-section">
    <h1>About Bayu Parking System</h1>
    <p>Smart, Secure, and Convenient Parking for Residents & Visitors</p>
</div>

<!-- About Content Section -->
<div class="about-container">

    <div class="about-box">
        <div class="about-image">
            <img src="image/about.jpg" alt="Parking System">
        </div>
        <div class="about-text">
            <h2>Who We Are</h2>
            <p>Bayu Parking System is a modern and efficient parking solution designed for the convenience of residents and visitors. Our goal is to provide a seamless and secure parking experience.</p>
        </div>
    </div>

    <div class="about-box reverse">
        <div class="about-text">
            <h2>Our Mission</h2>
            <p>To revolutionize parking management with technology-driven solutions that ensure security, efficiency, and user-friendly experiences.</p>
        </div>
        <div class="about-image">
            <img src="image/about2.jpg" alt="Smart Parking">
        </div>
    </div>

    <div class="about-box">
        <div class="about-image">
            <img src="image/about3.webp" alt="Customer Support">
        </div>
        <div class="about-text">
            <h2>Why You Can Trust Us?</h2>
            <ul>
                <li>Secure and Reliable Parking System</li>
                <li>24/7 Customer Support</li>
                <li>Easy to Booking</li>
                <li>Have a higher rating feedback</li>
            </ul>
        </div>
    </div>

</div>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
</footer>

</body>
</html>
