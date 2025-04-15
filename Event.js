document.addEventListener("DOMContentLoaded", function () {
    const themeButton = document.querySelector(".theme-switch");
    const body = document.body;

    // Theme switching logic
    themeButton.addEventListener("click", function () {
        if (body.classList.contains("dark-theme")) {
            body.classList.remove("dark-theme");
            localStorage.setItem("theme", "light");
        } else {
            body.classList.add("dark-theme");
            localStorage.setItem("theme", "dark");
        }
    });

    // Retain theme on page reload
    if (localStorage.getItem("theme") === "dark") {
        body.classList.add("dark-theme");
    }

    // Dropdown delay effect
    const dropdowns = document.querySelectorAll(".dropdown");
    dropdowns.forEach((dropdown) => {
        let timeout;
        dropdown.addEventListener("mouseenter", function () {
            timeout = setTimeout(() => {
                this.querySelector(".dropdown-menu").style.display = "block";
            }, 300);
        });

        dropdown.addEventListener("mouseleave", function () {
            clearTimeout(timeout);
            this.querySelector(".dropdown-menu").style.display = "none";
        });
    });
});
