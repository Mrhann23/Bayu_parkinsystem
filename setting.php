<?php
    session_start();
 // Ensure only residents can access this page
if ($_SESSION['role'] != 0) {
    header("Location: Admin.php");
    exit();

}
    require_once "connection.php";
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Handle settings update
        $site_title = $_POST['site_title'];
        $parking_limit = intval($_POST['parking_limit']);
        
        $query = "UPDATE settings SET site_title = ?, parking_limit = ? WHERE id = 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $site_title, $parking_limit);
        
        if ($stmt->execute()) {
            $message = "Settings updated successfully.";
        } else {
            $message = "Error updating settings.";
        }
        $stmt->close();
    }
    
    // Fetch current settings
    $query = "SELECT * FROM settings WHERE id = 0";
    $result = $conn->query($query);
    $settings = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Settings</title>
    <link rel="stylesheet" href="Admin.css">
</head>
<body>
    <div class="sidebar">
        <ul>
            <li><a href="admin_dashboard.php">Dashboard</a></li>
            <li><a href="user_management.php">Users Details</a></li>
            <li><a href="approve_parking.php">Approve Park</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li class="active"><a href="setting.php">Settings</a></li>
            <li><a href="logout.php">Log Out</a></li>
        </ul>
    </div>
    <div class="main-content">
        <h2>Admin Settings</h2>
        
        <?php if(isset($message)) echo "<p class='message'>$message</p>"; ?>
        
        <form method="POST">
            <label for="site_title">Site Title:</label>
            <input type="text" id="site_title" name="site_title" value="<?php echo htmlspecialchars($settings['site_title']); ?>" required>
            
            <label for="parking_limit">Parking Limit per User:</label>
            <input type="number" id="parking_limit" name="parking_limit" value="<?php echo $settings['parking_limit']; ?>" required>
            
            <button type="submit">Update Settings</button>
        </form>
    </div>
</body>
</html>
