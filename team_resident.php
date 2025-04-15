<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - Bayu Parking System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="team_resident.css">
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
                    
                    
                </ul>
            </li>
            <li><a href="login.php">Log out </a></li>
        </ul>
        <button class="theme-switch" onclick="toggleTheme()">🌙</button>
    </div>
</header>
    
    <!-- Hero Section -->
    <div class="hero-section">
        <br>
        <br>    
        <h1>Meet Our Team</h1>
        <p>Passionate individuals dedicated to making Bayu Parking System better for you.</p>
    </div>

    <!-- Team Section -->
    <div class="container team-section py-5">
        <div class="row">
            <?php
            $team = [
                ["name" => "Mr Anuar", "role" => " Head Admin", "image" => "image/t1.jpg"],
                ["name" => "Mr Aidel Abdullah", "role" => "Admin", "image" => "image/t2.jpg"],
                ["name" => "Jessica", "role" => "Clerk", "image" => "image/t3.jpg"],
                ["name" => "Mohd Ali", "role" => "It technician", "image" => "image/t4.jpg"],
                ["name" => "Mrs Suraya", "role" => "Human Resources", "image" => "image/t5.jpg"]
            ];
            foreach ($team as $member) {
                echo '<div class="col-lg-6 d-flex align-items-center mb-4">
                        <img src="' . $member["image"] . '" alt="' . $member["name"] . '" class="team-img">
                        <div class="team-info">
                            <h4>' . $member["name"] . '</h4>
                            <p class="text-muted">' . $member["role"] . '</p>
                            <p>We are Bayu Pandan Jaya Management Team.</p>
                            <div class="social-links">
                                <a href="#">&#x1F426;</a>
                                <a href="#">&#x1F3F7;</a>
                                <a href="#">&#x1F4F7;</a>
                            </div>
                        </div>
                      </div>';
            }
            ?>
        </div>
    </div>

    <script src="Resident.js"></script>


</body>
</html>
