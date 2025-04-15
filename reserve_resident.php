<?php
include "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['block']) && isset($_GET['slot'])) {
    $block = $_GET['block'];
    $slot = (int) $_GET['slot'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reserve Parking</title>
</head>
<body>

<h2>Reserve Parking - Block <?php echo $block; ?>, Slot <?php echo $slot; ?></h2>

<form method="POST" action="save_reserve.php">
    <input type="hidden" name="block" value="<?php echo $block; ?>">
    <input type="hidden" name="slot" value="<?php echo $slot; ?>">

    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Plate Number:</label>
    <input type="text" name="plate" required><br>

    <label>Duration (Minutes):</label>
    <input type="number" name="duration" min="1" required><br>

    <button type="submit">Reserve</button>
</form>

</body>
</html>
