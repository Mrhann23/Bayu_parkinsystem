<?php
include "connection.php";

// Auto-bar expired slots
$now = date("Y-m-d H:i:s");
$updateQuery = "UPDATE parking_slots SET barred = 1, occupied = 0 WHERE end_time <= '$now' AND end_time IS NOT NULL";
mysqli_query($conn, $updateQuery);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $block = $_POST['block'];
    $slot = (int) $_POST['slot'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $plate = mysqli_real_escape_string($conn, $_POST['plate']);
    $duration = (int) $_POST['duration'];

    $end_time = date('Y-m-d H:i:s', strtotime("+$duration minutes"));

    $query = "UPDATE parking_slots SET 
                name = '$name', 
                plate = '$plate', 
                duration = $duration, 
                occupied = 1, 
                end_time = '$end_time' 
              WHERE block = '$block' AND slot_number = $slot";

    if (mysqli_query($conn, $query)) {
        echo "Reservation successful! Redirecting...";
        header("refresh:2;url=park_available.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

