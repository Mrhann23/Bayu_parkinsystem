<?php
session_start();
require 'connection.php'; // Database connection file

// Ensure only admins can access this page
if (!isset($_SESSION['role']) || $_SESSION['role'] != 0) {
    header("Location: login.php");
    exit();
}

// Handle enable/disable requests (AJAX)
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['user_id']) && isset($_POST['status'])) {
    $user_id = $_POST['user_id'];
    $status = $_POST['status'];
    
    $update_query = "UPDATE users SET status = ? WHERE id = ?";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("si", $status, $user_id);
    $stmt->execute();
    
    echo json_encode(["success" => true]);
    exit();
}

// Fetch users
$query = "SELECT * FROM users";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Management</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="user.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
        <li><a href="reserve.php"><i class="fas fa-calendar-check"></i> Reservations</a></li>
        <li><a href="feedback.php"><i class="fas fa-comment-dots"></i> Feedback</a></li>
    </ul>
    <h3>Calendar & Log Out</h3>
    <ul>
        <li><a href="calendar.php" class="active"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
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
    <h1>Manage User</h1>
        <!-- User Table -->
        <div class="table-container">
            <table class="user-table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Registration Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['name']); ?></td>
                            <td><?php echo htmlspecialchars($row['email']); ?></td>
                            <td><?php echo $row['role'] == 0 ? 'Admin' : 'Resident'; ?></td>
                            <td><?php echo $row['registration_date']; ?></td>
                            <td class="status"><?php echo $row['status'] == 'active' ? 'Enabled' : 'Disabled'; ?></td>
                            <td>
                                <?php if ($row['status'] == 'active') { ?>
                                    <button class="disable btn btn-danger" data-id="<?php echo $row['id']; ?>">Disable</button>
                                <?php } else { ?>
                                    <button class="enable btn btn-success" data-id="<?php echo $row['id']; ?>">Enable</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
    $(document).ready(function () {
        $('.user-table button').click(function () {
            var userId = $(this).data('id');
            var newStatus = $(this).hasClass('disable') ? 'disabled' : 'active';
            var button = $(this);

            $.post("user.php", { user_id: userId, status: newStatus }, function (response) {
                var res = JSON.parse(response);
                if (res.success) {
                    if (newStatus === 'disabled') {
                        button.removeClass('disable btn-danger').addClass('enable btn-success').text('Enable');
                        button.closest('tr').find('.status').text('Disabled');
                    } else {
                        button.removeClass('enable btn-success').addClass('disable btn-danger').text('Disable');
                        button.closest('tr').find('.status').text('Enabled');
                    }
                }
            });
        });
    });
    </script>

</body>
</html>
