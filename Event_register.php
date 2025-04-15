<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $event_id = intval($_POST['event_id']);
    $name = $conn->real_escape_string($_POST['name']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $house_no = $conn->real_escape_string($_POST['house_no']);
    $per_person = intval($_POST['per_person']);

    $conn->query("INSERT INTO event_registrations (event_id, name, phone, house_no, per_person) VALUES ('$event_id', '$name', '$phone', '$house_no', '$per_person')");

    header("Location: Event.php");
    exit();
}

$event_id = $_GET['event_id'] ?? 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Join Event</title>
    <link rel="stylesheet" href="Event.css">
</head>
<body>
    <div class="form-container">
        <h1>Join Event</h1>
        <form action="event_register.php" method="POST">
            <input type="hidden" name="event_id" value="<?= htmlspecialchars($event_id) ?>">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <input type="text" name="house_no" placeholder="House No." required>
            <input type="number" name="per_person" placeholder="Number of People" required>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
