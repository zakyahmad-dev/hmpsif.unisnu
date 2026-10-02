document.addEventListener("DOMContentLoaded", () => {
    const themeToggle = document.getElementById("themeToggle");
    const themeIcons = document.querySelectorAll("[data-theme-icon]");

    let savedTheme = "light";
    try {
        savedTheme = localStorage.getItem("theme") || "light";
    } catch (error) {
        // Continue with the light theme when storage is unavailable.
    }

    const applyTheme = (dark) => {
        document.body.classList.toggle("dark-mode", dark);
        themeIcons.forEach((icon) => {
            icon.classList.toggle("d-none", icon.dataset.themeIcon === (dark ? "moon" : "sun"));
        });

        if (themeToggle) {
            themeToggle.setAttribute("aria-label", dark ? "Aktifkan mode terang" : "Aktifkan mode gelap");
            themeToggle.setAttribute("title", dark ? "Aktifkan mode terang" : "Aktifkan mode gelap");
            themeToggle.setAttribute("aria-pressed", dark ? "true" : "false");
        }
    };

    applyTheme(savedTheme === "dark");

    themeToggle?.addEventListener("click", () => {
        const dark = !document.body.classList.contains("dark-mode");
        applyTheme(dark);
        try {
            localStorage.setItem("theme", dark ? "dark" : "light");
        } catch (error) {
            // The current page still updates even when storage is unavailable.
        }
    });

    const backTop = document.getElementById("backTop");
    const updateBackTop = () => backTop?.classList.toggle("is-visible", window.scrollY > 420);
    updateBackTop();
    window.addEventListener("scroll", updateBackTop, { passive: true });

    backTop?.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    document.querySelectorAll('a[href^="#"]').forEach((link) => {
        link.addEventListener("click", (event) => {
            const id = link.getAttribute("href");
            if (!id || id === "#") return;

            const target = document.getElementById(id.slice(1));
            if (!target) return;

            event.preventDefault();
            target.scrollIntoView({ behavior: "smooth", block: "start" });
        });
    });

    const navigation = document.getElementById("mainNavigation");
    if (navigation && window.bootstrap) {
        navigation.querySelectorAll("a:not(.dropdown-toggle)").forEach((link) => {
            link.addEventListener("click", () => {
                if (window.innerWidth < 992 && navigation.classList.contains("show")) {
                    bootstrap.Collapse.getOrCreateInstance(navigation).hide();
                }
            });
        });
    }

    const animatedItems = document.querySelectorAll(".fade-up");
    if ("IntersectionObserver" in window && !window.matchMedia("(prefers-reduced-motion: reduce)").matches) {
        const observer = new IntersectionObserver((entries, currentObserver) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("show");
                    currentObserver.unobserve(entry.target);
                }
            });
        }, { threshold: 0.12 });
        animatedItems.forEach((element) => observer.observe(element));
    } else {
        animatedItems.forEach((element) => element.classList.add("show"));
    }

    document.querySelectorAll("[data-filter]").forEach((input) => {
        input.addEventListener("input", () => {
            const query = input.value.trim().toLowerCase();
            document.querySelectorAll(".filter-item").forEach((card) => {
                card.hidden = !card.innerText.toLowerCase().includes(query);
            });
        });
    });

    document.querySelectorAll(".toast-trigger").forEach((button) => {
        button.addEventListener("click", () => {
            const toastElement = document.getElementById("successToast");
            if (toastElement && window.bootstrap) {
                bootstrap.Toast.getOrCreateInstance(toastElement).show();
            }
        });
    });

    const lightboxImage = document.getElementById("lightboxImg");
    const lightboxCaption = document.getElementById("lightboxCaption");
    document.querySelectorAll("[data-gallery-image]").forEach((trigger) => {
        trigger.addEventListener("click", () => {
            const image = trigger.querySelector("img");
            if (!image || !lightboxImage) return;
            lightboxImage.src = image.currentSrc || image.src;
            lightboxImage.alt = image.alt;
            if (lightboxCaption) lightboxCaption.textContent = trigger.dataset.caption || image.alt;
        });
    });

    const year = document.getElementById("year");
    if (year) year.textContent = new Date().getFullYear();
});
