<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $resident_name = $conn->real_escape_string($_POST['resident_name']);
    $visitor_vehicle = $conn->real_escape_string($_POST['visitor_vehicle']);
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $block = $conn->real_escape_string($_POST['block']);
    $duration = intval($_POST['duration']);

    $conn->query("INSERT INTO reservations (resident_name, visitor_vehicle, house_no, block, duration) VALUES ('$resident_name', '$visitor_vehicle', '$house_no', '$block', '$duration')");
}

$reservations = $conn->query("SELECT * FROM reservations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bayu Condominium Parking Reservation</title>
    <link rel="stylesheet" href="Reserve.css">
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
        <br> 
        <br>
        <br> 
    <div class="form-container">
        <h1>RESIDENT PARKING USAGE </h1>
        <div class="form-header">
            <h2>Resident Guest Info</h2>
        </div>
        
        <form action="" method="POST" class="reservation-form">
            <input type="text" name="resident_name" placeholder="Your Name" required>
            <input type="text" name="visitor_vehicle" placeholder="Visitor Vehicle No." required>
            <input type="text" name="house_no" placeholder="House No." required>
            <select name="block" required>
                <option value="" disabled selected>Select Block</option>
                <option value="A">Block A</option>
                <option value="B">Block B</option>
                <option value="C">Block C</option>
            </select>
            <input type="number" name="duration" placeholder="Duration (hours)" required>
            <button type="submit">Inform Now</button>
        </form>
        
        <h3>Recent Info</h3>
        <div class="reservation-list">
            <?php while ($row = $reservations->fetch_assoc()): ?>
                <div class="reservation-item">
                    <strong><?= htmlspecialchars($row['resident_name']) ?></strong> - <?= htmlspecialchars($row['visitor_vehicle']) ?>
                    (House <?= htmlspecialchars($row['house_no']) ?>, Block <?= htmlspecialchars($row['block']) ?>)
                    - <?= htmlspecialchars($row['duration']) ?> hours
                </div>
            <?php endwhile; ?>
        </div>
    </div>


    <script src="Resident.js"></script>
</body>
</html>
