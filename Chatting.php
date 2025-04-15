
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
    $message = $conn->real_escape_string($_POST['message']);
    $conn->query("INSERT INTO messages (user, message, created_at) VALUES ('$user', '$message', NOW())");

    // Reset typing status after sending
    $conn->query("UPDATE typing_status SET is_typing = 0 WHERE user = '$user'");
}

// Fetch chat messages
$messages = $conn->query("SELECT * FROM messages ORDER BY created_at ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Community Chat</title>
    <link rel="stylesheet" href="Chatting.css">
</head>
<body>
<!-- Video Background -->
<video autoplay muted loop id="bg-video">
    <source src="c3.mp4" type="video/mp4">
</video>

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
<!-- Chat Container -->
<div class="chat-container">
    <h1>Bayu Community Chat</h1>

    <div class="chat-box" id="chat-box">
        <?php while ($row = $messages->fetch_assoc()): ?>
            <div class="message <?= $row['user'] === ($_SESSION['username'] ?? '') ? 'sent' : 'received' ?>">
                <strong><?= htmlspecialchars($row['user']) ?>:</strong>
                <p><?= htmlspecialchars($row['message']) ?></p>
                <div class="timestamp"><?= date("h:i A", strtotime($row['created_at'])) ?></div>
            </div>
        <?php endwhile; ?>
        <div id="typing-indicator"></div>
    </div>

    <form action="" method="POST" class="chat-form">
        <input type="text" name="message" id="message-input" placeholder="Type a message..." autocomplete="off" required>
        <button type="submit">Send</button>
    </form>
</div>

<script src="Resident.js"></script>
<script>
    const chatBox = document.getElementById("chat-box");
    const inputBox = document.getElementById("message-input");
    const typingBox = document.getElementById("typing-indicator");

    // Auto-scroll to bottom on load
    window.onload = () => {
        chatBox.scrollTop = chatBox.scrollHeight;
    };

    // Typing animation AJAX
    let typingTimer;
    inputBox.addEventListener('input', () => {
        clearTimeout(typingTimer);
        updateTypingStatus(true);
        typingTimer = setTimeout(() => updateTypingStatus(false), 1000);
    });

    function updateTypingStatus(status) {
        fetch('update_typing.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            body: `typing=${status}`
        });
    }

    // Fetch who's typing every second
    function checkTyping() {
        fetch('fetch_typing.php')
            .then(res => res.text())
            .then(data => {
                typingBox.innerHTML = data;
                if (data) {
                    chatBox.scrollTop = chatBox.scrollHeight;
                }
            });
    }

    setInterval(checkTyping, 1000);
</script>
</body>
</html>
