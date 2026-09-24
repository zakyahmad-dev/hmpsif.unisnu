document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle");

    // Terapkan tema yang tersimpan pada semua halaman.
    const savedTheme = localStorage.getItem("theme");
    const isDark = savedTheme === "dark";

    document.body.classList.toggle("dark-mode", isDark);
    updateThemeIcon(isDark);

    // Semua halaman memakai tombol dari navbar.php.
    themeToggle?.addEventListener("click", () => {
        const dark = document.body.classList.toggle("dark-mode");

        localStorage.setItem("theme", dark ? "dark" : "light");
        updateThemeIcon(dark);
    });

    function updateThemeIcon(dark) {
        if (!themeToggle) return;

        const icon = themeToggle.querySelector("i");

        if (icon) {
            icon.classList.toggle("fa-moon", !dark);
            icon.classList.toggle("fa-sun", dark);
        }

        themeToggle.setAttribute(
            "aria-label",
            dark ? "Aktifkan mode terang" : "Aktifkan mode gelap"
        );
        themeToggle.setAttribute(
            "title",
            dark ? "Mode terang" : "Mode gelap"
        );
    }

    const top = document.getElementById("backTop");

    window.addEventListener("scroll", () => {
        if (top) {
            top.style.display = window.scrollY > 400 ? "block" : "none";
        }
    });

    top?.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    document.querySelectorAll('a[href^="#"]').forEach((a) => {
        a.addEventListener("click", (e) => {
            const target = document.querySelector(a.getAttribute("href"));

            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth" });
            }
        });
    });

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) entry.target.classList.add("show");
            });
        },
        { threshold: 0.1 }
    );

    document.querySelectorAll(".fade-up").forEach((element) => {
        observer.observe(element);
    });

    document.querySelectorAll("[data-filter]").forEach((input) => {
        input.addEventListener("input", () => {
            const q = input.value.toLowerCase();

            document.querySelectorAll(".filter-item").forEach((card) => {
                card.style.display = card.innerText.toLowerCase().includes(q)
                    ? ""
                    : "none";
            });
        });
    });

    document.querySelectorAll(".toast-trigger").forEach((button) => {
        button.addEventListener("click", () => {
            const toastElement = document.getElementById("successToast");

            if (toastElement && window.bootstrap) {
                new bootstrap.Toast(toastElement).show();
            }
        });
    });

    const year = document.getElementById("year");

    if (year) {
        year.textContent = new Date().getFullYear();
    }
});
