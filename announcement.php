<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete request
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM announcements WHERE id = $id");
    header("Location: announcement.php");
    exit();
}

// Handle form submission (insert or update)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $content = $_POST["content"];
    $imagePath = NULL;

    // Image Upload Handling
    if (!empty($_FILES['image']['name'])) {
        $targetDir = "uploads/";
        $imagePath = $targetDir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $imagePath);
    }

    if (isset($_POST["announcement_id"]) && !empty($_POST["announcement_id"])) {
        // Update existing announcement
        $id = $_POST["announcement_id"];
        $query = "UPDATE announcements SET title = ?, content = ?, image = ? WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssi", $title, $content, $imagePath, $id);
    } else {
        // Insert new announcement
        $query = "INSERT INTO announcements (title, content, image) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sss", $title, $content, $imagePath);
    }

    $stmt->execute();
    $stmt->close();
    header("Location: announcement.php");
    exit();
}

// Fetch announcements
$result = $conn->query("SELECT * FROM announcements ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Announcements</title>
    <link rel="stylesheet" href="announcement.css">
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

<!-- Announcement Content -->
<main class="main-content">
    <div class="announcement-container">
        <h2>Manage Announcements</h2>
        <form method="POST" enctype="multipart/form-data">
            <input type="hidden" name="announcement_id" id="announcement_id">
            <input type="text" name="title" id="title" placeholder="Title" required>
            <textarea name="content" id="content" rows="4" placeholder="Write your announcement..." required></textarea>
            <input type="file" name="image" id="image">
            <button type="submit">Submit</button>
        </form>

        <h3>Existing Announcements</h3>
        <?php while ($row = $result->fetch_assoc()): ?>
            <div class="announcement-card">
                <h4><?= htmlspecialchars($row['title']) ?></h4>
                <p><?= htmlspecialchars($row['content']) ?></p>
                <?php if (!empty($row['image'])): ?>
                    <img src="<?= htmlspecialchars($row['image']) ?>" alt="Announcement Image">
                <?php endif; ?>
                <div class="buttons">
                    <a href="announcement.php?delete=<?= $row['id'] ?>" class="delete-btn">Delete</a>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
</main>
</body>
</html>
