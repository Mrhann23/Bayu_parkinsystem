<?php
$uploadDir = "uploads/";

if (!file_exists($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $uploadDir . $fileName;

    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedTypes = ["jpg", "jpeg", "png", "gif"];

    if (in_array($fileType, $allowedTypes)) {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
            echo "<script>alert('Image uploaded successfully!');</script>";
        } else {
            echo "<script>alert('Error uploading image.');</script>";
        }
    } else {
        echo "<script>alert('Invalid file type. Only JPG, PNG, and GIF allowed.');</script>";
    }
}

$images = glob($uploadDir . "*.{jpg,jpeg,png,gif}", GLOB_BRACE);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>
    <link rel="stylesheet" href="Gallery.css">
</head>
<body>

<!-- Navigation Bar -->
<header>
    <div class="navbar">
        <div class="logo">
            <img src="image/logo1.png" alt="Logo">
        </div>
        <ul class="nav-links">
            <li><a href="Resident.php">Home</a></li>
            <li><a href="About_resident.php">About</a></li>
            <li><a href="Contact.php">Contact us</a></li>
            <li class="dropdown">
                <a href="#">Services ▼</a>
                <ul class="dropdown-menu">
                    <li><a href="Chatting.php">Community Page</a></li>
                    <li><a href="Event.php">Event Post</a></li>
                    <li><a href="Reserve.php">Reserve Page</a></li>
                    <li><a href="Gallery.php">Gallery Page</a></li>
                    <li><a href="Announcement_resident.php">Announce Page</a></li>
                </ul>
            </li>
            <li><a href="login.php">Log out</a></li>
        </ul>
        <button class="theme-switch" onclick="toggleTheme()">🌙</button>
    </div>
</header>

<br><br><br><br><br><br>

<h1 style="text-align: center;">📷 Image Gallery</h1>

<!-- Upload Form -->
<form action="" method="POST" enctype="multipart/form-data" style="text-align: center; margin: 20px;">
    <input type="file" name="image" required>
    <button type="submit">Upload Image</button>
</form>

<!-- Gallery Grid -->
<div class="gallery">
    <?php foreach ($images as $image): ?>
        <div class="gallery-item">
            <img src="<?php echo $image; ?>" alt="Gallery Image">
            <a href="<?php echo $image; ?>" download class="download-btn">⬇ Download</a>
        </div>
    <?php endforeach; ?>
</div>

<script src="Resident.js"></script>
</body>
</html>
