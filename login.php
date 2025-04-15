<?php
require_once "connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        if (empty($email) || empty($password)) {
            echo "<script>alert('All fields are required!'); window.location.href='index.php';</script>";
            exit();
        }

        $query = "SELECT id, username, password, role FROM users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();

        if ($stmt->num_rows == 1 && password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION["user_id"] = $id;
            $_SESSION["username"] = $username;
            $_SESSION["role"] = $role;

            if ($role == 0) {
                echo "<script>window.location.href='Admin.php';</script>";
            } else {
                echo "<script>window.location.href='Resident.php';</script>";
            }
        } else {
            echo "<script>alert('Invalid email or password!'); window.location.href='index.php';</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Register</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f4f4f4;
            overflow: hidden;
        }
        .video-container video {
            position: absolute;
            top: 0; left: 0;
            width: 100%; height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(50%);
        }
        .visitor-icon {
            position: absolute;
            top: 20px; right: 20px;
            font-size: 24px;
            background: rgba(255, 255, 255, 0.2);
            padding: 10px;
            border-radius: 50%;
            transition: 0.3s;
        }
        .visitor-icon:hover { background: rgba(255, 255, 255, 0.5); }
        .container {
            display: flex;
            width: 70%;
            height: 80%;
            border-radius: 10px;
            overflow: hidden;
            background-color: rgba(255, 255, 255, 0.9);
        }
        .left-box {
            width: 50%;
            position: relative;
            background-color: rgba(0, 0, 0, 0.89);
            color: white;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .slider {
            position: relative;
            overflow: hidden;
            height: 60%;
            width: 100%;
        }
        .slides {
            display: flex;
            transition: transform 1s ease;
        }  
        .slide {
            min-width: 100%;
        }
        .slide img {
            width: 100%;
            height: auto;
            max-height: 400px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
        }
        .quote {
            font-size: 22px;
            font-weight: bold;
            color: white;
            margin-top: 15px;
            text-align: center;
        }
        .right-box {
            width: 50%;
            overflow: hidden;
            position: relative;
        }
        .form-slider {
            display: flex;
            transition: transform 0.6s ease-in-out;
            width: 200%;
        }
        .form-slider.slide-left {
            transform: translateX(-50%);
        }
        .form-box {
            width: 50%;
            padding: 40px;
            background: rgba(255, 255, 255, 0.95);
            color: black;
            transition: all 0.4s ease;
            border-radius: 10px;
        }
        .form-box h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold;
            color: black;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 15px;
            background-color: white;
            color: black;
        }
        input::placeholder { color: #777; }
        button {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background: #222;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
        }
        button:hover { background: #444; }
        p { color: black; text-align: center; margin-top: 10px; }
        a {
            color: #084c95;
            text-decoration: none;
            font-weight: bold;
            cursor: pointer;
        }

        .slides {
    position: relative;
    height: 100%;
    width: 100%;
}

.slide {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    opacity: 0;
}

.slide.active {
    opacity: 1;
}

    </style>
</head>
<body>
    <div class="video-container">
        <video autoplay loop muted>
            <source src="login2.mp4" type="video/mp4">
        </video>
    </div>
    <div class="visitor-icon">
        <a href="Home.php" title="Visit as Guest">
            <i class="fas fa-user"></i>
        </a>
    </div>
    <div class="container">
        <div class="left-box">
            <div class="slider">
                <div class="slides">
                    <div class="slide active"><img src="image/l1.jpg"></div>
                    <div class="slide"><img src="image/l4.jpg"></div>
                    <div class="slide"><img src="image/l5.jpg"></div>
                </div>
            </div>
            <p class="quote">"Believe in yourself and all that you are."</p>
        </div>
        <div class="right-box">
            <div class="form-slider" id="formSlider">
                <div class="form-box" id="login-box">
                    <h2>Sign In</h2>
                    <form method="POST">
                        <input type="email" name="email" required placeholder="Email">
                        <input type="password" name="password" required placeholder="Password">
                        <button type="submit" name="login">Login</button>
                        <p>Don't have an account? <a onclick="toggleForm()">Sign Up</a></p>
                    </form>
                </div>
                <div class="form-box" id="register-box">
                    <h2>Sign Up</h2>
                    <form method="POST">
                        <input type="text" name="username" required placeholder="Full Name">
                        <input type="email" name="email" required placeholder="Email">
                        <input type="password" name="password" required placeholder="Password">
                        <input type="password" name="confirm_password" required placeholder="Confirm Password">
                        <button type="submit" name="register">Register</button>
                        <p>Already have an account? <a onclick="toggleForm()">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleForm() {
            document.getElementById('formSlider').classList.toggle('slide-left');
        }
    </script>

<script>
    let slideIndex = 0;
    const slides = document.querySelectorAll(".slide");

    function showSlides() {
        slides.forEach((slide, i) => {
            slide.style.opacity = "0";
            slide.style.transition = "opacity 1s ease";
        });
        slideIndex++;
        if (slideIndex > slides.length) slideIndex = 1;
        slides[slideIndex - 1].style.opacity = "1";
        setTimeout(showSlides, 3000); // Change slide every 3 seconds
    }

    window.addEventListener("DOMContentLoaded", showSlides);
</script>

</body>
</html>
