<?php
include 'connection.php';

$sort_by = $_GET['event'] ?? '';

$sql = "SELECT * FROM event_registrations";
if ($sort_by) {
    $stmt = $conn->prepare("SELECT * FROM event_registrations WHERE event_name = ?");
    $stmt->bind_param("s", $sort_by);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Event Registrations</title>
    <link rel="stylesheet" href="Admin_event.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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

    <br>
    <br>
    <br>
    <br>
    <br>
    <!-- Main Content -->
    <div class="admin-container">
        <h2>👥 Resident Event Registrations</h2>

        <form method="GET" class="filter-form">
            <label for="event">Filter by Event:</label>
            <input type="text" name="event" placeholder="e.g. Zumba Class" value="<?= htmlspecialchars($sort_by) ?>">
            <button type="submit">Filter</button>
        </form>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Persons</th>
                    <th>Block</th>
                    <th>Unit</th>
                    <th>Event</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td>
                    <td><?= $row['persons'] ?></td>
                    <td><?= htmlspecialchars($row['block']) ?></td>
                    <td><?= htmlspecialchars($row['unit']) ?></td>
                    <td><?= htmlspecialchars($row['event_name']) ?></td>
                    <td><?= $row['registered_at'] ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
