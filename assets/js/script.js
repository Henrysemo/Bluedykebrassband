document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');
    const navOverlay = document.querySelector('.nav-overlay');
    const navClose = document.querySelector('.nav-close');

    if (hamburger && navMenu && navOverlay) {
        const closeNavigation = () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
            navOverlay.classList.remove('active');
            document.body.classList.remove('nav-open');
            hamburger.setAttribute('aria-expanded', 'false');
        };

        const openNavigation = () => {
            hamburger.classList.add('active');
            navMenu.classList.add('active');
            navOverlay.classList.add('active');
            document.body.classList.add('nav-open');
            hamburger.setAttribute('aria-expanded', 'true');
        };

        hamburger.addEventListener('click', () => {
            if (navMenu.classList.contains('active')) {
                closeNavigation();
            } else {
                openNavigation();
            }
        });

        navOverlay.addEventListener('click', closeNavigation);
        navClose?.addEventListener('click', closeNavigation);

        document.querySelectorAll('.nav-section-link').forEach(link => {
            link.addEventListener('click', event => {
                const target = document.querySelector(link.getAttribute('href'));
                if (!target) return;

                event.preventDefault();
                closeNavigation();
                target.scrollIntoView({ behavior: 'smooth', block: 'start' });
                window.history.replaceState(null, '', link.getAttribute('href'));
            });
        });

        document.addEventListener('keydown', event => {
            if (event.key === 'Escape') closeNavigation();
        });
    }

    document.querySelectorAll('.developer-heart').forEach(heart => {
        heart.addEventListener('click', () => {
            const isActive = heart.classList.toggle('active');
            heart.setAttribute('aria-pressed', String(isActive));
        });
    });

    document.querySelectorAll('.copy-button').forEach(button => {
        button.addEventListener('click', async () => {
            const target = document.getElementById(button.dataset.copyTarget);
            if (!target || target.textContent.includes('X')) return;

            if (!navigator.clipboard) return;

            await navigator.clipboard.writeText(target.textContent.trim());
            button.innerHTML = '<i class="fas fa-check"></i>';
            button.setAttribute('aria-label', 'M-Pesa number copied');
            window.setTimeout(() => {
                button.innerHTML = '<i class="fas fa-copy"></i>';
                button.setAttribute('aria-label', 'Copy M-Pesa number');
            }, 1800);
        });
    });

    const donationForm = document.getElementById('donation-form');
    const donationStatus = document.getElementById('donation-status');

    if (donationForm && donationStatus) {
        donationForm.addEventListener('submit', async event => {
            event.preventDefault();
            const submitButton = donationForm.querySelector('button[type="submit"]');
            const formData = new FormData(donationForm);

            donationStatus.className = 'donation-status';
            donationStatus.textContent = 'Connecting to M-Pesa...';
            submitButton.disabled = true;

            try {
                const response = await fetch('mpesa.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({
                        amount: formData.get('amount'),
                        phone: formData.get('phone')
                    })
                });
                const result = await response.json();

                donationStatus.className = `donation-status ${result.success ? 'success' : 'error'}`;
                donationStatus.textContent = result.message || 'We could not start the payment. Please try again.';
                if (result.success) donationForm.reset();
            } catch (error) {
                donationStatus.className = 'donation-status error';
                donationStatus.textContent = 'The payment service is temporarily unavailable. Please try again.';
            } finally {
                submitButton.disabled = false;
            }
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
