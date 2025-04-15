<?php
include 'connection.php';

$event_name = $_GET['event'] ?? 'Unknown';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $persons = $_POST['persons'];
    $block = $_POST['block'];
    $unit = $_POST['unit'];
    $event_name = $_POST['event_name'];

    $stmt = $conn->prepare("INSERT INTO event_registrations (name, phone, persons, block, unit, event_name) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssisss", $name, $phone, $persons, $block, $unit, $event_name);
    $stmt->execute();

    echo "<script>alert('Registration Successful!'); window.location.href='Event.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register for <?= htmlspecialchars($event_name) ?></title>
    <link rel="stylesheet" href="register_event.css">
</head>
<body>
    <div class="register-container">
        <h2>Register for: <?= htmlspecialchars($event_name) ?></h2>
        <form method="POST">
            <input type="hidden" name="event_name" value="<?= htmlspecialchars($event_name) ?>">
            <label>Full Name:</label>
            <input type="text" name="name" required>
            
            <label>Phone Number:</label>
            <input type="text" name="phone" required>
            
            <label>No. of Persons Joining:</label>
            <input type="number" name="persons" min="1" required>
            
            <label>Block:</label>
            <input type="text" name="block" required>
            
            <label>Unit No:</label>
            <input type="text" name="unit" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
