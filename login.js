// Function to toggle between login and register forms
function toggleForm() {
    const loginBox = document.getElementById('login-box');
    const registerBox = document.getElementById('register-box');

    if (loginBox.classList.contains('hidden')) {
        loginBox.classList.remove('hidden');
        registerBox.classList.add('hidden');
    } else {
        loginBox.classList.add('hidden');
        registerBox.classList.remove('hidden');
    }
}

// Image Slider functionality (auto slide)
let currentSlideIndex = 0;

function changeSlide() {
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;
    const slidesContainer = document.querySelector('.slides');

    // Remove the "active" class from the current slide
    slides[currentSlideIndex].classList.remove('active');

    // Increment the slide index, and loop back to 0 if it exceeds total slides
    currentSlideIndex = (currentSlideIndex + 1) % totalSlides;

    // Add the "active" class to the next slide
    slides[currentSlideIndex].classList.add('active');

    // Move the slides container to show the new active slide
    slidesContainer.style.transform = `translateX(-${currentSlideIndex * 100}%)`;
}

// Change the slide every 3 seconds
setInterval(changeSlide, 3000);

// Initialize the first slide to be active
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.slide');
    slides[currentSlideIndex].classList.add('active');
});
