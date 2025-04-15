<?php
session_start();
include 'connection.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header("Location: login.php");
    exit();
}

// Fetch parking slots
$query = "SELECT * FROM parking_slots ORDER BY block, slot_number";
$result = mysqli_query($conn, $query);
$parking_spots = [];

while ($row = mysqli_fetch_assoc($result)) {
    $parking_spots[$row['block']][$row['slot_number']] = $row;
}

// Handle admin actions
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $slot_id = $_POST['selected_slot'];
    
    if (isset($_POST['bar_slot'])) {
        mysqli_query($conn, "UPDATE parking_slots SET barred = 1, occupied = 0 WHERE id = $slot_id");
    } elseif (isset($_POST['unbar_slot'])) {
        mysqli_query($conn, "UPDATE parking_slots SET barred = 0 WHERE id = $slot_id");
    } elseif (isset($_POST['occupy_slot'])) {
        mysqli_query($conn, "UPDATE parking_slots SET occupied = 1, name = 'Admin', plate = 'N/A', duration = 0 WHERE id = $slot_id");
    } elseif (isset($_POST['free_slot'])) {
        mysqli_query($conn, "UPDATE parking_slots SET occupied = 0, name = '', plate = '', duration = 0 WHERE id = $slot_id");
    }

    header("Location: admin_park.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin - Parking Control</title>
    <link rel="stylesheet" href="admin_park.css">
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
    <h1>Manage Parking</h1>
    <?php foreach ($parking_spots as $block => $spots): ?>
        <h3>Block <?php echo htmlspecialchars($block); ?></h3>
        <div class="parking-grid">
            <?php foreach ($spots as $spot => $data): ?>
                <form method="POST">
                    <input type="hidden" name="selected_slot" value="<?php echo $data['id']; ?>">
                    <div class="parking-spot <?php echo $data['barred'] ? 'barred' : ($data['occupied'] ? 'occupied' : 'available'); ?>">
                        <h4>Slot <?php echo htmlspecialchars($spot); ?></h4>
                        <?php if ($data['occupied']): ?>
                            <p><strong>Name:</strong> <?php echo htmlspecialchars($data['name']); ?></p>
                            <p><strong>Plate:</strong> <?php echo htmlspecialchars($data['plate']); ?></p>
                            <p><strong>Duration:</strong> <?php echo $data['duration']; ?> min</p>
                            <button type="submit" name="free_slot">Free Slot</button>
                        <?php else: ?>
                            <button type="submit" name="bar_slot">Bar</button>
                            <button type="submit" name="unbar_slot">Unbar</button>
                            <button type="submit" name="occupy_slot">Occupy</button>
                        <?php endif; ?>
                    </div>
                </form>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>