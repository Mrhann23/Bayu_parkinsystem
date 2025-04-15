<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="Admin.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> <!-- Chart.js Library -->
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

    <h3>Calendar & Announcement</h3>
    <ul>
        <li><a href="calendar.php"><i class="fas fa-calendar-alt"></i> Calendar</a></li>
        <li><a href="announcement.php" class="active"><i class="fas fa-bullhorn"></i> Announcement</a></li>
        <li><a href="login.php"><i class="fas fa-sign-out-alt"></i> Log Out</a></li>
    </ul>
</div>

<!-- Admin Header -->
<div class="admin-header">
    <div class="admin-profile">
        <img src="image/u1.jpg" alt="Admin Profile">
        <div class="profile-dropdown">
            <a href="profile_view.php">View Profile</a>
            <a href="settings.php">Settings</a>
            <a href="logout.php">Log Out</a>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main-content">
    <h1>Welcome, Admin</h1>
    
    <!-- Dashboard Cards -->
    <div class="cards">
        <div class="card">
            <h2>Total Users</h2>
            <p>150</p>
        </div>
        <div class="card">
            <h2>Reservations</h2>
            <p>78</p>
        </div>
        <div class="card">
            <h2>Feedbacks</h2>
            <p>45</p>
        </div>
    </div>

    <!-- Chart Grid -->
    <div class="chart-grid">
        <div class="chart-container">
            <h3>Parking Usage</h3>
            <canvas id="parkingChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Feedback Trends</h3>
            <canvas id="feedbackChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>Reservations Analysis</h3>
            <canvas id="reservationChart"></canvas>
        </div>
        <div class="chart-container">
            <h3>User Activity</h3>
            <canvas id="userActivityChart"></canvas>
        </div>
    </div>
</div>

<script>
    // Parking Usage Chart
    var ctx1 = document.getElementById('parkingChart').getContext('2d');
    var parkingChart = new Chart(ctx1, {
        type: 'bar',
        data: {
            labels: ['Block A', 'Block B', 'Block C'],
            datasets: [{
                label: 'Parking Slots Occupied',
                data: [8, 6, 10],
                backgroundColor: ['#FF5733', '#33FF57', '#3357FF'],
                borderWidth: 1
            }]
        }
    });

    // Feedback Trends Chart
    var ctx2 = document.getElementById('feedbackChart').getContext('2d');
    var feedbackChart = new Chart(ctx2, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
            datasets: [{
                label: 'Positive Feedback',
                data: [30, 40, 35, 50, 60, 70],
                borderColor: '#8A2BE2',
                backgroundColor: 'rgba(138, 43, 226, 0.2)',
                fill: true
            }]
        }
    });

    // Reservations Analysis Chart
    var ctx3 = document.getElementById('reservationChart').getContext('2d');
    var reservationChart = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: ['Morning', 'Afternoon', 'Evening', 'Night'],
            datasets: [{
                data: [25, 35, 20, 15],
                backgroundColor: ['#FFB833', '#33AFFF', '#FF3385', '#85FF33']
            }]
        }
    });

    // User Activity Chart
    var ctx4 = document.getElementById('userActivityChart').getContext('2d');
    var userActivityChart = new Chart(ctx4, {
        type: 'radar',
        data: {
            labels: ['Logins', 'Reservations', 'Cancellations', 'Feedbacks', 'Profile Updates'],
            datasets: [{
                label: 'Activity Level',
                data: [80, 50, 20, 30, 40],
                borderColor: '#00FFFF',
                backgroundColor: 'rgba(0, 255, 255, 0.2)',
                fill: true
            }]
        }
    });
</script>

</body>
</html>
