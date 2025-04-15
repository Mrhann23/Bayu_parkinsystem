<?php
session_start();
include('connection.php');

// Handle memo submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST["date"];
    $text = $_POST["text"];
    $color = $_POST["color"];

    $stmt = $conn->prepare("INSERT INTO calendar_memos (date, text, color) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $date, $text, $color);
    $stmt->execute();
    $stmt->close();
}

// Fetch existing memos
$memos = [];
$result = $conn->query("SELECT * FROM calendar_memos");
while ($row = $result->fetch_assoc()) {
    $memos[$row['date']][] = ["text" => $row['text'], "color" => $row['color']];
}

// Get current month & year
$month = date('m');
$year = date('Y');
$firstDay = date('w', strtotime("$year-$month-01"));
$daysInMonth = date('t', strtotime("$year-$month-01"));

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Calendar</title>
   
    <link rel="stylesheet" href="calendar.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
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
    <h1>Admin Calendar - <?php echo date('F Y'); ?></h1>

    <div class="calendar-container">
        <table class="calendar">
            <tr>
                <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
            </tr>
            <tr>
                <?php
                $dayCount = 0;
                for ($i = 0; $i < $firstDay; $i++) {
                    echo "<td></td>";
                    $dayCount++;
                }
                for ($day = 1; $day <= $daysInMonth; $day++) {
                    $date = "$year-$month-".str_pad($day, 2, '0', STR_PAD_LEFT);
                    echo "<td><div class='date-box'>$day";
                    if (isset($memos[$date])) {
                        foreach ($memos[$date] as $memo) {
                            echo "<div class='memo' style='background: {$memo['color']}'>{$memo['text']}</div>";
                        }
                    }
                    echo "</div></td>";
                    $dayCount++;
                    if ($dayCount % 7 == 0) echo "</tr><tr>";
                }
                while ($dayCount % 7 != 0) {
                    echo "<td></td>";
                    $dayCount++;
                }
                ?>
            </tr>
        </table>
    </div>

    <!-- Memo Form -->
    <form method="post" class="memo-form">
        <h2>Add Memo</h2>
        <input type="date" name="date" required>
        <input type="text" name="text" placeholder="Enter memo" required>
        <select name="color">
            <option value="#FFB6C1">Pink</option>
            <option value="#FFD700">Gold</option>
            <option value="#98FB98">Green</option>
            <option value="#ADD8E6">Blue</option>
            <option value="#FFA07A">Orange</option>
        </select>
        <button type="submit">Add Memo</button>
    </form>
</div>

</body>
</html>
