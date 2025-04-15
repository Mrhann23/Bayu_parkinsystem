<?php
include 'connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM reservations WHERE id = $id";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    echo "<script>alert('Invalid request.'); window.location.href='manage_reservations.php';</script>";
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $resident_name = $_POST['resident_name'];
    $visitor_vehicle = $_POST['visitor_vehicle'];
    $house_no = $_POST['house_no'];
    $block = $_POST['block'];
    $duration = $_POST['duration'];

    $updateQuery = "UPDATE reservations SET 
                    resident_name='$resident_name', 
                    visitor_vehicle='$visitor_vehicle', 
                    house_no='$house_no', 
                    block='$block', 
                    duration='$duration' 
                    WHERE id=$id";

    if (mysqli_query($conn, $updateQuery)) {
        echo "<script>alert('Reservation updated successfully!'); window.location.href='manage_reservations.php';</script>";
    } else {
        echo "<script>alert('Error updating reservation.'); window.location.href='manage_reservations.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="main-content">
        <div class="header">Edit Reservation</div>

        <form method="POST" action="">
            <label>Resident Name:</label>
            <input type="text" name="resident_name" value="<?php echo $row['resident_name']; ?>" required>

            <label>Visitor Vehicle:</label>
            <input type="text" name="visitor_vehicle" value="<?php echo $row['visitor_vehicle']; ?>" required>

            <label>House No:</label>
            <input type="text" name="house_no" value="<?php echo $row['house_no']; ?>" required>

            <label>Block:</label>
            <input type="text" name="block" value="<?php echo $row['block']; ?>" required>

            <label>Duration:</label>
            <input type="number" name="duration" value="<?php echo $row['duration']; ?>" required>

            <button type="submit" class="btn btn-success">Update</button>
            <a href="manage_reservations.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

</body>
</html>
