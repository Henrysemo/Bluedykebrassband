document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    if (hamburger && navMenu) {
        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navMenu.classList.toggle('active');
        });

        document.querySelectorAll('.nav-menu a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            });
        });
    }

    document.querySelectorAll('.member-card').forEach(card => {
        const badge = card.querySelector('.member-badge');
        if (!badge) return;

        let icon = '';

        if (card.classList.contains('cornet-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M6 8h6a2 2 0 0 1 0 4H6" /><path d="M6 12h5a2 2 0 0 1 0 4H6" /><path d="M15 7v10" /><path d="M15 9c2 .5 3 1.5 3 3s-1 2.5-3 3" /></svg>';
        } else if (card.classList.contains('euphonium-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 7h5a3 3 0 0 1 0 6H7" /><path d="M7 7v6" /><path d="M14 9c1.2 0 2.2.8 2.5 2" /><path d="M14 13c1.2 0 2.2-.8 2.5-2" /></svg>';
        } else if (card.classList.contains('tuba-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 8h5a3 3 0 0 1 0 6H7" /><path d="M7 8v6" /><path d="M15 10h3" /><path d="M15 14h3" /></svg>';
        } else if (card.classList.contains('trombone-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 5h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H7" /><path d="M12 7h4" /><path d="M12 11h5" /><path d="M12 15h4" /></svg>';
        } else if (card.classList.contains('horn-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 8c0-2 1.5-3.5 3.5-3.5h1.5c2 0 3.5 1.5 3.5 3.5v2c0 2.2-1.8 4-4 4h-1.5c-1 0-1.9-.4-2.5-1.1" /><path d="M7 14c2 1 4.3 1.5 6.5 1.5" /></svg>';
        } else if (card.classList.contains('baritone-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M8 7h5a3 3 0 0 1 0 6H8" /><path d="M8 7v6" /><path d="M13 9h3" /><path d="M13 13h3" /></svg>';
        } else if (card.classList.contains('percussion-card')) {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><rect x="5" y="7" width="10" height="8" rx="2" /><circle cx="10" cy="11" r="3" /><path d="M10 4v3" /><path d="M10 14v5" /></svg>';
        } else {
            icon = '<svg viewBox="0 0 24 24" aria-hidden="true"><path d="M7 6h6" /><path d="M8 10h4" /><path d="M9 14h2" /></svg>';
        }

        badge.innerHTML = icon;
    });

    const year = document.getElementById('year');
    if (year) {
        year.textContent = new Date().getFullYear();
    }
});

const backToTop = document.querySelector(".back-to-top");

window.addEventListener("scroll", () => {

    if (window.scrollY > 500) {

        backToTop.classList.add("show");

    } else {

        backToTop.classList.remove("show");

    }

});
