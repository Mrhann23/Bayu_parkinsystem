<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$reservations = $conn->query("SELECT * FROM reservations ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Manage Reservations</title>
    <link rel="stylesheet" href="manage_reserve.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
 <!-- Sidebar -->
 <div class="sidebar">
        <div class="logo">
            <img src="image/logo1.png" alt="Admin Logo">
        </div>
        <h3>Users & Community</h3>
        <ul>
            <li><a href="admin.php"><i class="fa fa-tachometer-alt"></i> Dashboard</a></li>
            <li><a href="user.php"><i class="fas fa-users"></i> Users</a></li>
            <li><a href="community.php"><i class="fas fa-comments"></i> Community</a></li>
        </ul>
        <h3>Parking, Reserve & Feedback</h3>
        <ul>
            <li><a href="admin_park.php"><i class="fas fa-car"></i> Parking</a></li>
            <li><a href="manage_reserve.php"><i class="fas fa-calendar-check"></i> Reservations</a></li>
            <li><a href="admin_feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a></li>
            <li><a href="Admin_event.php"><i class="fas fa-calendar-day"></i> Events</a></li>
        </ul>
        <h3>Calendar & Log Out</h3>
        <ul>
            <li><a href="calendar.php"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
            <li><a href="announcement.php" class="active"><i class="fas fa-bullhorn"></i> Announcement</a></li>
            <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
        </ul>
    </div>

    <!-- Header -->
    <div class="admin-header">
        <div class="admin-profile">
            <img src="image/admin_profile.jpg" alt="Admin Profile">
            <div class="profile-dropdown">
                <a href="profile.php">View Profile</a>
                <a href="settings.php">Settings</a>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
    </div>

<!-- Main Content -->
<div class="main-content">
    <h1>Manage Parking Reservations</h1>
    
    <table>
        <thead>
            <tr>
                <th>Resident Name</th>
                <th>Vehicle No.</th>
                <th>House No.</th>
                <th>Block</th>
                <th>Duration (hours)</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $reservations->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['resident_name']) ?></td>
                <td><?= htmlspecialchars($row['visitor_vehicle']) ?></td>
                <td><?= htmlspecialchars($row['house_no']) ?></td>
                <td><?= htmlspecialchars($row['block']) ?></td>
                <td><?= htmlspecialchars($row['duration']) ?></td>
                <td>
                    <a href="delete_reserve.php?id=<?= $row['id'] ?>" class="btn-delete">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
