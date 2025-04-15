<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM reservations WHERE id = $id";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Reservation deleted successfully!'); window.location.href='manage_reservations.php';</script>";
    } else {
        echo "<script>alert('Error deleting reservation.'); window.location.href='manage_reservations.php';</script>";
    }
} else {
    echo "<script>alert('Invalid request.'); window.location.href='manage_reservations.php';</script>";
}
?>
