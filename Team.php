<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Team - Bayu Parking System</title>
    <link rel="stylesheet" href="Team.css">
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
    <div class="team-hero">
        <h1>Meet Our Team</h1>
        <p>Dedicated professionals ensuring smooth parking operations.</p>
    </div>

    <!-- Team Section -->
    <div class="team-container">
        <!-- Admin Staff -->
        <div class="team-category">
            <h2>Admin Staff</h2>
            <div class="team-row">
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/T2.jpg" alt="Admin">
                        </div>
                        <div class="team-member-back">
                            <h2>Aidel Abdullah</h2>
                            <p> Administrator</p>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/T1.jpg" alt="Support Team">
                        </div>
                        <div class="team-member-back">
                            <h2>Ahmad Anuar</h2>
                            <p>Head Adminitrator</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Guard Shift -->
        <div class="team-category">
            <h2>Guard Shift</h2>
            <div class="guard-row">
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/g1.jpg" alt="Guard Shift">
                        </div>
                        <div class="team-member-back">
                            <h2>Ahmad Razi</h2>
                            <p>Day Shift  Leader In-Charge</p>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/g3.webp" alt="Guard Shift">
                        </div>
                        <div class="team-member-back">
                            <h2>Ravi Kumar</h2>
                            <p>Day Shift Guard</p>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/g4.jpg" alt="Guard Shift">
                        </div>
                        <div class="team-member-back">
                            <h2>Ganaraja</h2>
                            <p>Night Shift Leader In-Charge</p>
                        </div>
                    </div>
                </div>
                <div class="team-member">
                    <div class="team-member-inner">
                        <div class="team-member-front">
                            <img src="image/g2.jpg" alt="Guard Shift">
                        </div>
                        <div class="team-member-back">
                            <h2>Ishwor Raj</h2>
                            <p>Night Shift Guard </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
    </footer>
</body>
</html>