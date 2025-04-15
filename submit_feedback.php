<?php
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $rating = intval($_POST['rating']);
    $comments = $conn->real_escape_string($_POST['comments']);

    $sql = "INSERT INTO feedback (name, email, rating, comments) VALUES ('$name', '$email', '$rating', '$comments')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully!'); window.location.href='feedback.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
