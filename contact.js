document.addEventListener("DOMContentLoaded", function () {
    let countdown = 5;
    let countdownElement = document.getElementById("countdown");
    let explosionContainer = document.getElementById("explosion-container");
    let contactPage = document.getElementById("contact-page");

    let countdownInterval = setInterval(() => {
        countdown--;
        countdownElement.innerText = countdown;

        if (countdown === 0) {
            clearInterval(countdownInterval);
            explosionEffect();
        }
    }, 1000);

    function explosionEffect() {
        explosionContainer.style.animation = "explode 1s forwards";
        setTimeout(() => {
            explosionContainer.style.display = "none";
            contactPage.classList.remove("hidden");
            new WOW().init();
        }, 1000);
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.querySelector(".theme-switch");

    // Load saved theme from local storage
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        themeToggle.textContent = "☀️";
    }

    themeToggle.addEventListener("click", function () {
        document.body.classList.toggle("dark-mode");
        
        // Save theme preference
        if (document.body.classList.contains("dark-mode")) {
            localStorage.setItem("theme", "dark");
            themeToggle.textContent = "☀️";
        } else {
            localStorage.setItem("theme", "light");
            themeToggle.textContent = "🌙";
        }
    });
});
