let index = 0;
const slides = document.querySelectorAll(".slide");
const totalSlides = slides.length;
let autoSlide = setInterval(nextSlide, 5000); // Auto-slide every 5s

function showSlide(n) {
    slides.forEach((slide, i) => {
        slide.classList.remove("active");
    });
    slides[n].classList.add("active");
}

function nextSlide() {
    index = (index + 1) % totalSlides;
    showSlide(index);
}

function prevSlide() {
    index = (index - 1 + totalSlides) % totalSlides;
    showSlide(index);
}

// Pause auto-slide when user clicks manually
document.querySelector(".prev").addEventListener("click", () => {
    clearInterval(autoSlide);
    prevSlide();
    autoSlide = setInterval(nextSlide, 5000);
});

document.querySelector(".next").addEventListener("click", () => {
    clearInterval(autoSlide);
    nextSlide();
    autoSlide = setInterval(nextSlide, 5000);
});

showSlide(index);
