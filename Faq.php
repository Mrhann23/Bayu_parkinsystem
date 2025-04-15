<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Bayu Parking System</title>
    <link rel="stylesheet" href="faq.css">
  
    </head>
<body>
    <!-- Video Background -->
    <div class="video-container">
        <video autoplay muted loop id="bgVideo">
            <source src="bg1.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

     <!-- Navigation Bar -->
     <nav class="navbar">
        <div class="logo-container">
            <img src="image/logo1.png" alt="Logo">
       
        </div>
        <ul class="nav-links">
            <li><a href="home.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="Park.php">Parking</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="feedback.php">Feedback</a></li>
            <li><a href="login.php">Resident</a></li>
        </ul>
    </nav>

<!-- Hero Section -->
<div class="faq-hero">
    <h1>Frequently Asked Questions</h1>
    <p>Your questions, answered.</p>
</div>

<!-- FAQ Section -->
<div class="faq-container">

    <div class="faq-box">
        <button class="faq-question">What is Bayu Parking System? <span>+</span></button>
        <div class="faq-answer">
            <p>Bayu Parking System is a smart parking solution designed to provide a secure, reliable, and convenient parking experience for residents and visitors.</p>
        </div>
    </div>

    <div class="faq-box">
        <button class="faq-question">How do I book a parking spot? <span>+</span></button>
        <div class="faq-answer">
            <p>You can book a parking spot through our website by selecting your location, date, and time. Once booked, you will receive a confirmation email with details.</p>
        </div>
    </div>

    <div class="faq-box">
        <button class="faq-question">What payment methods are accepted? <span>+</span></button>
        <div class="faq-answer">
            <p>We accept credit/debit cards, online banking, and e-wallet payments for a seamless transaction experience.</p>
        </div>
    </div>

    <div class="faq-box">
        <button class="faq-question">Is my vehicle safe in your parking system? <span>+</span></button>
        <div class="faq-answer">
            <p>Yes! Our parking system is equipped with 24/7 surveillance cameras and security personnel to ensure the safety of all vehicles.</p>
        </div>
    </div>

</div>

<!-- Footer -->
<footer>
    &copy; <?php echo date("Y"); ?> Bayu Parking System. All rights reserved.
</footer>

<script>
    // FAQ Toggle Script
    document.querySelectorAll(".faq-question").forEach(button => {
        button.addEventListener("click", () => {
            const answer = button.nextElementSibling;
            const isActive = answer.style.display === "block";

            document.querySelectorAll(".faq-answer").forEach(a => a.style.display = "none");
            document.querySelectorAll(".faq-question span").forEach(s => s.textContent = "+");

            if (!isActive) {
                answer.style.display = "block";
                button.querySelector("span").textContent = "-";
            }
        });
    });
</script>

</body>
</html>
