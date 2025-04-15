<?php
session_start();

// Redirect to login if not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle new message
if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['message'])) {
    $user = $_SESSION['username'] ?? 'Guest';
    $message = htmlspecialchars($_POST['message']); // Prevent XSS
    $stmt = $conn->prepare("INSERT INTO messages (user, message, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $user, $message);
    $stmt->execute();
}

// Fetch chat messages
$messages = $conn->query("SELECT * FROM messages ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Community Chat</title>
    <link rel="stylesheet" href="community.css">
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
    <div class="header">
        <h2>Community Bayu</h2>
    </div>

    <div class="chat-box" id="chat-box">
        <?php while ($row = $messages->fetch_assoc()): ?>
            <div class="message <?= $row['user'] === ($_SESSION['username'] ?? '') ? 'sent' : 'received' ?>">
                <strong><?= htmlspecialchars($row['user']) ?>:</strong>
                <p><?= htmlspecialchars($row['message']) ?></p>
                <div class="timestamp"><?= date("h:i A", strtotime($row['created_at'])) ?></div>
            </div>
        <?php endwhile; ?>
    </div>

    <form action="" method="POST" class="chat-form">
        <input type="text" name="message" placeholder="Type a message..." required>
        <button type="submit">Send</button>
    </form>
</div>

<script>
    // Scroll to the bottom of the chat box when the page loads
    window.onload = function() {
        var chatBox = document.getElementById('chat-box');
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    // Scroll to the bottom after sending a message
    const form = document.querySelector('.chat-form');
    form.addEventListener('submit', function() {
        setTimeout(function() {
            var chatBox = document.getElementById('chat-box');
            chatBox.scrollTop = chatBox.scrollHeight;
        }, 100); // Slight delay to ensure the new message is added
    });
</script>

</body>
</html>
