<?php
session_start();

// Ensure only residents can access this page
if ($_SESSION['role'] != 1) {
    header("Location: Resident.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resident</title>
    <link rel="stylesheet" href="Resident.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

</head>
<body>

<!-- Navigation Bar -->
<header>
    <div class="navbar">
        <div class="logo">
            <img src="image/logo1.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="Resident.php">Home</a></li>
            <li><a href="About_resident.php">About</a></li>
            <li><a href="Contact.php">Contact us</a></li>
            <li class="dropdown">
                <a href="#">Services ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="Chatting.php">Community Page</a></li>
                    <li><a href="Event.php">Event Post</a></li>
                    <li><a href="Reserve.php">Reserve Page</a></li>
                    <li><a href="Gallery.php">Gallery Page</a></li>
                    <li><a href="Announcement_resident.php">Announce Page</a></li>
                    <li><a href="History.php">History Page</a></li>
                    
                </ul>
            </li>
            <li><a href="login.php">Log out </a></li>
        </ul>
        <button class="theme-switch" onclick="toggleTheme()">🌙</button>
    </div>
</header>

<!-- Hero Section with Video Background -->
<section class="hero">
    <video autoplay loop muted playsinline class="hero-video">
        <source src="v1.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="hero-overlay"></div>
    <div class="hero-content">
        <h1>Welcome To Bayu Parking System</h1>
        <p>Smart & Secure Parking for Bayu Residents & Visitors</p>
        <div class="buttons">
            <a href="team_resident.php" class="btn">Team</a>
        </div>
    </div>
</section>

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

<script src="Resident.js"></script>

<style>
.policies {
    background: #111;
    color: #fff;
    text-align: center;
    padding: 60px 20px;
}
.section-title {
    font-size: 32px;
    font-weight: bold;
    margin-bottom: 10px;
}
.section-subtitle {
    font-size: 18px;
    margin-bottom: 30px;
    color: #ccc;
}
.policy-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 20px;
    max-width: 900px;
    margin: auto;
}
.policy-box {
    background: #222;
    padding: 20px;
    border-radius: 10px;
    text-align: left;
    display: flex;
    align-items: center;
    gap: 15px;
}
.policy-box i {
    font-size: 28px;
    color: #ff4444;
}
.policy-box h3 {
    font-size: 20px;
    margin: 0;
}
.policy-box p {
    font-size: 16px;
    color: #bbb;
}
</style>

</body>
</html>
