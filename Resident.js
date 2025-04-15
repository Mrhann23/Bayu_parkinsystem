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
