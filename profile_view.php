<?php
session_start();

// Handle image upload
if (isset($_POST['upload'])) {
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === 0) {
        $target_dir = "uploads/";
        $file_name = basename($_FILES["profile_pic"]["name"]);
        $target_file = $target_dir . $file_name;
        
        // Allow only image files
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = array("jpg", "jpeg", "png", "gif");
        
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file)) {
                $_SESSION['profile_pic'] = $target_file;
            } else {
                echo "<script>alert('File upload failed.');</script>";
            }
        } else {
            echo "<script>alert('Only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        }
    }
}

$profile_pic = isset($_SESSION['profile_pic']) ? $_SESSION['profile_pic'] : "default.png"; // Default profile picture
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
    <link rel="stylesheet" href="profile_view.css">
</head>
<body>
    <div class="profile-container">
        <h2>Admin Profile</h2>
        <div class="profile-pic">
            <img src="<?php echo $profile_pic; ?>" alt="Profile Picture">
        </div>
        <form action="" method="POST" enctype="multipart/form-data">
            <input type="file" name="profile_pic" accept="image/*" required>
            <button type="submit" name="upload">Upload</button>
        </form>
    </div>
</body>
</html>