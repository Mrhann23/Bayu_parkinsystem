<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parking Blocks</title>
    <link rel="stylesheet" href="parking.css">
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
    <div class="parking-hero">
        <h1>Select Your Parking Block</h1>
    </div>

    <!-- Parking Block Selection -->
    <div class="parking-container">
        <div class="parking-block">
            <a href="park_avalaible.php?block=A">
                <img src="image/block A.jpg" alt="Block A">
                <span>Block A</span>
            </a>
        </div>

        <div class="parking-block">
            <a href="park_avalaible.php?block=B">
                <img src="image/block b.jpg" alt="Block B">
                <span>Block B</span>
            </a>
        </div>

        <div class="parking-block">
            <a href="park_avalaible.php?block=C">
                <img src="image/block c.jpg" alt="Block C">
                <span>Block C</span>
            </a>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
    </footer>
</body>
</html>