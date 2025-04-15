<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Bayu Parking System</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        /* Default Theme - Light Mode */
:root {
    --bg-color: #f5f5f5;
    --text-color: #333;
    --navbar-bg: #222;
    --navbar-text: white;
    --btn-bg: #ff6600;
    --btn-hover: #ff4500;
    --overlay: rgba(0, 0, 0, 0.6);
}

/* Dark Mode */
.dark-mode {
    --bg-color: #121212;
    --text-color: #fff;
    --navbar-bg: #000;
    --navbar-text: #f0f0f0;
    --btn-bg: #ff8800;
    --btn-hover: #ff6600;
    --overlay: rgba(0, 0, 0, 0.7);
}

/* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    background-color: var(--bg-color);
    color: var(--text-color);
}

/* Navbar */
.navbar {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--navbar-bg);
    padding: 15px 50px;
    position: fixed;
    width: 100%;
    top: 0;
    z-index: 100;
}

.logo img {
    width: 50px;
}

.nav-links {
    list-style: none;
    display: flex;
    gap: 20px;
}

.nav-links li {
    position: relative;
}

.nav-links a {
    text-decoration: none;
    color: var(--navbar-text);
    font-size: 16px;
    padding: 10px 15px;
    transition: all 0.3s ease;
}

.nav-links a:hover {
    background: rgba(255, 255, 255, 0.2);
    border-radius: 5px;
}

/* Dropdown */
.dropdown-menu {
    display: block;
    position: absolute;
    background: var(--navbar-bg);
    top: 50px;
    left: 0;
    width: 180px;
    border-radius: 5px;
    overflow: hidden;
    box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out, visibility 0.5s;
}

.dropdown:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-menu li {
    width: 100%;
}

.dropdown-menu a {
    color: var(--navbar-text);
    display: block;
    padding: 12px;
    transition: background 0.3s ease-in-out;
}

.dropdown-menu a:hover {
    background: var(--btn-bg);
    color: white;
}
/* Theme Toggle Button */
.theme-switch {
    background: none;
    border: none;
    font-size: 20px;
    cursor: pointer;
    color: var(--navbar-text);
}

        .hero-section {
            background: linear-gradient(135deg, #003366,rgb(0, 0, 0));
            color: white;
            text-align: center;
            padding: 100px 20px;
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 8px rgba(35, 35, 35, 0.3);
        }

        .hero-section p {
            font-size: 1.2rem;
            margin-top: 15px;
            opacity: 0.9;
        }

        .counter-box {
            padding: 20px;
            background-color:rgb(0, 0, 0);
            color: white;
            border-radius: 10px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }

        footer {
            text-align: center;
            padding: 20px;
            background-color: #007bff;
            color: white;
        }
    </style>
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
            <li><a href="login.php">Log out </a></li>
        </ul>
        <button class="theme-switch" onclick="toggleTheme()">🌙</button>
    </div>
</header>

<div class="hero-section" data-aos="fade-down">
    <h1>About Bayu Parking System</h1>
    <p>Smart, Secure, and Convenient Parking for Residents & Visitors</p>
</div>

<div class="container py-5">
    <div class="row align-items-center">
        <div class="col-lg-6" data-aos="fade-right">
            <img src="image/about.jpg" alt="About Us" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <h2 class="fw-bold">Who We Are</h2>
            <p class="text-muted">
            Bayu Parking System is a modern and efficient parking solution designed for the convenience of residents and visitors. Our goal is to provide a seamless and secure parking experience.
            </p>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-lg-6 order-lg-2" data-aos="fade-left">
            <img src="image/about2.jpg" alt="Smart Parking" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6 order-lg-1" data-aos="fade-right">
            <h2 class="fw-bold">Our Mission</h2>
            <p class="text-muted">
          To revolutionize parking management with technology-driven solutions that ensure security, efficiency, and user-friendly experiences.
            </p>
        </div>
    </div>
    <div class="row align-items-center mt-5">
        <div class="col-lg-6" data-aos="fade-up">
            <img src="image/about3.webp" alt="Customer Support" class="img-fluid rounded shadow">
        </div>
        <div class="col-lg-6" data-aos="fade-up">
            <h2 class="fw-bold">Why You Can Trust Us?</h2>
            <ul>
                <li>Secure and Reliable Parking System</li>
                <li>24/7 Customer Support</li>
                <li>Easy Booking System</li>
                <li>Highly Rated by Users</li>
            </ul>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="row text-center">
        <?php
        $stats = [
            ["icon" => "fa-user", "value" => 1000, "label" => "Residents"],
            ["icon" => "fa-people-group", "value" => 50, "label" => "Team"],
            ["icon" => "fa-car", "value" => 28, "label" => "Total Slots"],
            ["icon" => "fa-comments", "value" => 400, "label" => "Responses"]
        ];

        foreach ($stats as $stat) {
            echo '<div class="col-md-3" data-aos="zoom-in">
                    <div class="counter-box">
                        <div class="display-4"><i class="fas ' . $stat["icon"] . '"></i></div>
                        <h3 class="counter" data-target="' . $stat["value"] . '">0</h3>
                        <p>' . $stat["label"] . '</p>
                    </div>
                  </div>';
        }
        ?>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
<script>
    AOS.init({ duration: 1000, once: true });

    document.addEventListener("DOMContentLoaded", function () {
        let counters = document.querySelectorAll(".counter");
        counters.forEach(counter => {
            let start = 0;
            let end = parseInt(counter.getAttribute("data-target"));
            let speed = 50;
            let interval = setInterval(() => {
                start += Math.ceil(end / 50);
                counter.textContent = start;
                if (start >= end) {
                    counter.textContent = end;
                    clearInterval(interval);
                }
            }, speed);
        });
    });
</script>
<script src="Resident.js"></script>
</body>
</html>
