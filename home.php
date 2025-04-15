<?php
// Start session to access user data
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Bayu Parking System</title>
</head>
<body>
    <!-- Video Background -->
    <div class="video-container">
        <video autoplay muted loop id="bgVideo">
            <source src="bg2.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

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

    <!-- Main Content -->
    <div class="content">
        <h1>Welcome to Bayu Parking System</h1>
        <p>"Smart & Secure Parking for Bayu Residents & Visitors."</p>
        <a href="Team.php" class="cta-button">Our Team</a>
    </div>

    <!-- Gallery Section -->
    <div class="featured-grid">
        <div class="item"><video autoplay muted loop><source src="v1.mp4" type="video/mp4"></video></div>
        <div class="item"><video autoplay muted loop><source src="v2.mp4" type="video/mp4"></video></div>
        <div class="item"><video autoplay muted loop><source src="v3.mp4" type="video/mp4"></video></div>
    </div>

    <!-- Policies Section -->
<section class="policies">
    <h2 class="section-title">Policies</h2>
    <p class="section-subtitle">Please adhere to our community guidelines for a peaceful and enjoyable living experience.</p>
    
    <div class="policy-container">
        <div class="policy-box">
            <i class="fa fa-user-shield"></i>
            <h3>Visitor Regulations</h3>
            <p>All visitors must register at the security checkpoint before entering the premises.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-car"></i>
            <h3>Parking Rules</h3>
            <p>Residents must park in designated areas. Visitor parking is limited and requires prior approval.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-dumbbell"></i>
            <h3>Facility Usage</h3>
            <p>All common facilities (gym, pool, etc.) are available from 7 AM to 10 PM.</p>
        </div>
        <div class="policy-box">
            <i class="fas fa-volume-mute"></i>
            <h3>Noise Control</h3>
            <p>To maintain harmony, no loud music or disturbances between 10 PM and 7 AM.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-trash"></i>
            <h3>Waste Management</h3>
            <p>Dispose of trash properly in designated waste collection areas.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-cat"></i> <!-- Cat icon for Pet Policy -->
            <h3>Pet Policy</h3>
            <p>Pets must be leashed in public areas, and owners must clean up after them.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-smoking-ban"></i>
            <h3>Smoking Policy</h3>
            <p>Smoking is strictly prohibited in common areas, including lobbies and hallways.</p>
        </div>
        <div class="policy-box">
            <i class="fa fa-users"></i>
            <h3>Community Respect</h3>
            <p>All residents must be respectful towards neighbors and staff. Any form of harassment is not tolerated.</p>
        </div>
    </div>
</section>
    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
    </footer>
</body>
</html>
