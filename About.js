document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll(".scroll-section");

    window.addEventListener("scroll", () => {
        let scrollPos = window.scrollY;

        sections.forEach(section => {
            let sectionTop = section.offsetTop;
            let sectionHeight = section.clientHeight;

            if (scrollPos >= sectionTop - sectionHeight / 3) {
                document.querySelectorAll(".background").forEach(bg => {
                    bg.style.opacity = "0";
                });
                section.querySelector(".background").style.opacity = "1";
            }
        });
    });
});
