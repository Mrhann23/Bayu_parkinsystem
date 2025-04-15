<?php
include 'connection.php';

$sql = "SELECT * FROM announcements ORDER BY created_at DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Resident Announcements</title>
    <link rel="stylesheet" href="announcement_resident.css">
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

<br>
<br>
<br>
<div class="container">
    <h1>📢 Announcements for Residents</h1>
    <h3>Existing Announcements</h3>

    <div class="grid-board">
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="announcement-card">
                <h4><?= htmlspecialchars($row['title']) ?></h4>
                <p><?= nl2br(htmlspecialchars($row['content'])) ?></p>

                <?php if (!empty($row['image'])): ?>
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="Announcement Image">
                <?php endif; ?>

                <div class="date">
                    🕒 <?= date("F j, Y, g:i a", strtotime($row['created_at'])) ?>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</div>

<script src="Resident.js"></script>
</body>
</html>
