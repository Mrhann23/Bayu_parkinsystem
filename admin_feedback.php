<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Delete feedback
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $conn->query("DELETE FROM feedback WHERE id = $id");
    header("Location: admin_feedback.php");
    exit();
}

// Update feedback response
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['response'])) {
    $id = intval($_POST['feedback_id']);
    $response = $conn->real_escape_string($_POST['response']);
    $conn->query("UPDATE feedback SET response='$response' WHERE id=$id");
    header("Location: admin_feedback.php");
    exit();
}

$feedbacks = $conn->query("SELECT * FROM feedback ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Feedback Management</title>
    <link rel="stylesheet" href="admin_feedback.css">
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
    <h1>Manage Feedback </h1>
<!-- Feedback List -->
<div class="container">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Rating</th>
                <th>Feedback</th>
                <th>Response</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $feedbacks->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= htmlspecialchars($row['email']) ?></td>
                <td><?= str_repeat("⭐", $row['rating']) ?></td>
                <td><?= htmlspecialchars($row['comments']) ?></td>
                <td>
                    <?php if ($row['response']): ?>
                        <?= htmlspecialchars($row['response']) ?>
                    <?php else: ?>
                        <form method="POST">
                            <input type="hidden" name="feedback_id" value="<?= $row['id'] ?>">
                            <textarea name="response" required></textarea>
                            <button type="submit">Respond</button>
                        </form>
                    <?php endif; ?>
                </td>
                <td>
                    <a href="?delete=<?= $row['id'] ?>" class="btn-delete" onclick="return confirm('Delete this feedback?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>
