<?php
include "connection.php";
date_default_timezone_set('Asia/Kuala_Lumpur'); // Set timezone to Malaysia

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $block = $_POST['block'];
    $slot = $_POST['slot'];

    $current_time = date("Y-m-d H:i:s"); // Current Malaysia time
    $query = "SELECT end_time FROM parking_slots WHERE block='$block' AND slot_number='$slot'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        echo "Debug: Current Time = $current_time, End Time = " . $row['end_time'] . "<br>";

        if ($row['end_time'] <= $current_time) {
            $updateQuery = "UPDATE parking_slots SET occupied=0, barred=1 WHERE block='$block' AND slot_number='$slot'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "barred";
            } else {
                echo "error";
            }
        } else {
            echo "not_expired";
        }
    } else {
        echo "error_fetching_time";
    }
    exit();
}
?>
