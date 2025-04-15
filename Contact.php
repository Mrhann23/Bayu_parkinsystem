<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
$conn = new mysqli("localhost", "root", "", "bayu_parking");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Contact - Bayu Parking</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>

  <style>
  /* Default Theme - Light Mode */
:root {
    --bg-color: #f5f5f5;
    --text-color: #000000;
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

  /* General Body Styling */
  body {
    background-color: var(--bg-color);
    color: var(--text-color);
    font-family: 'Arial', sans-serif;
    background-image: url('image/bgab.jpg');
    background-size: cover;
    background-position: center;
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


  /* Content Styling */
  .content {
    padding: 120px 20px 50px;
    text-align: center;
    background-color: rgba(255, 255, 255, 0.12); /* Semi-transparent for content */
    border-radius: 20px;
  }

  .contact-box {
    display: flex;
    justify-content: center;
    gap: 30px;
    margin-bottom: 30px;
  }

  /* Info Section Styling */
  .info-section {
    background: var(--overlay);
    border-radius: 20px;
    padding: 30px;
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    width: 300px;
    transition: transform 0.3s ease;
    color: var(--text-color);
  }

  .info-section:hover {
    transform: translateY(-5px);
  }

  /* Map Section */
  .map-section {
    margin-top: 60px;
    padding: 40px 20px;
    text-align: center;
    background: rgba(255, 255, 255, 0.8); /* Semi-transparent background */
    border-radius: 20px;
  }

  .map-container {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    gap: 30px;
  }

  .map-card {
    background-color: rgba(0, 0, 0, 0.6);
    border-radius: 20px;
    padding: 20px;
    box-shadow: 0 12px 20px rgba(31, 38, 135, 0.15);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    width: 90%;
    max-width: 800px;
    transition: transform 0.3s ease-in-out;
  }

  .map-card:hover {
    transform: scale(1.05);
  }

  .map-wrapper {
    position: relative;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
    height: 0;
    overflow: hidden;
    max-width: 100%;
    border-radius: 15px;
  }

  .map-wrapper iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border-radius: 15px;
  }

  /* Feedback Form */
  .feedback-container {
    background: var(--overlay);
    padding: 20px;
    border-radius: 20px;
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
    backdrop-filter: blur(12px);
    -webkit-backdrop-filter: blur(12px);
    width: 100%;
    max-width: 600px;
    margin: 0 auto;
  }

  .feedback-form input, .feedback-form select, .feedback-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border-radius: 8px;
    border: 1px solid #ddd;
    background-color: #f9f9f9;
  }

  .feedback-form button {
    background-color: var(--btn-bg);
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 8px;
    cursor: pointer;
    width: 100%;
    margin-top: 10px;
  }

  .feedback-form button:hover {
    background-color: var(--btn-hover);
  }

</style>

  <script>
    new WOW().init();

    // Save theme state
    function toggleTheme() {
      document.body.classList.toggle("dark-mode");
      localStorage.setItem("theme", document.body.classList.contains("dark-mode") ? "dark" : "light");
    }

    // On load, restore theme
    window.onload = function () {
      if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
      }
    };
  </script>
</head>
<body>

<!-- Page Wrapper -->
<div id="contact-page">
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

  <section class="content wow fadeIn">
    <h1 class="wow fadeInDown">Let’s Connect</h1>

    <div class="contact-box">
      <div class="info-section wow fadeInLeft">
        <h2>Visit Us</h2>
        <p>Bayu @ Pandan Jaya</p>
        <p>Kuala Lumpur, Malaysia</p>
        <p>Building B, Level 3</p>
      </div>

      <div class="info-section wow fadeInUp">
        <h2>Admin Contact</h2>
        <p><i class="fa-solid fa-user"></i> Mr Alie Mohd</p>
        <p><i class="fa-solid fa-envelope"></i> Admin@bayuparking.com</p>
        <p><i class="fa-solid fa-phone"></i> +60 12-345 6789</p>
      </div>

      <div class="info-section wow fadeInRight">
        <h2>Support & Assistance</h2>
        <p>If you need assistance or have any questions, feel free to contact our support team. We're here to help.</p>
      </div>
    </div>

    <div class="feedback-container wow fadeInUp">
      <h2>Resident Feedback</h2>
      <form action="submit_feedback.php" method="POST" class="feedback-form">
        <input type="text" name="name" placeholder="Your Name" required />
        <input type="email" name="email" placeholder="Your Email" required />
        <select name="rating" required>
          <option value="">Rate Us</option>
          <option value="5">⭐⭐⭐⭐⭐ Excellent</option>
          <option value="4">⭐⭐⭐⭐ Good</option>
          <option value="3">⭐⭐⭐ Average</option>
          <option value="2">⭐⭐ Poor</option>
          <option value="1">⭐ Very Poor</option>
        </select>
        <textarea name="comments" rows="4" placeholder="Your Comments..." required></textarea>
        <button type="submit">Submit</button>
      </form>
    </div>

    <div class="map-section wow fadeInUp">
      <h2 class="wow fadeIn">Find Us</h2>
      <div class="map-container">
        <div class="map-card wow fadeInUp">
          <h3 class="map-title">Bayu Condominium</h3>
          <p class="map-description">Located at Bayu Pandan Jaya, Kuala Lumpur, Malaysia. Visit us for more information.</p>
          <div class="map-wrapper">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1460.5878555601522!2d101.74849712365722!3d3.135898989500781!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc44e478dfb8db%3A0x724232620e4b93a0!2sBayu%20Condominium!5e0!3m2!1sen!2smy!4v1676475433005!5m2!1sen!2smy" 
              width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>
        </div>
      </div>
    </div>

  </section>
</div>

</body>
</html>
