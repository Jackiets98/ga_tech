import './bootstrap';
import { initBlogTimes } from './blog';
import { initBlogCarousel } from './blog-carousel';

document.addEventListener('DOMContentLoaded', () => {
    initMobileMenu();
    initSmoothScroll();
    initScrollReveal();
    initHeaderScroll();
    initActiveNav();
    initBackToTop();
    initStatCounters();
    initContactForm();
    initBlogTimes();
    initBlogCarousel();

    const heroCanvas = document.getElementById('hero-canvas');
    if (heroCanvas) {
        import('./hero-scene').then(({ initHeroScene }) => initHeroScene(heroCanvas));
    }
});

function initMobileMenu() {
    const btn = document.getElementById('mobile-menu-btn');
    const menu = document.getElementById('mobile-menu');
    const iconOpen = document.getElementById('menu-icon-open');
    const iconClose = document.getElementById('menu-icon-close');

    if (!btn || !menu) return;

    btn.addEventListener('click', () => {
        const isOpen = !menu.classList.contains('hidden');
        menu.classList.toggle('hidden');
        iconOpen?.classList.toggle('hidden', !isOpen);
        iconClose?.classList.toggle('hidden', isOpen);
        btn.setAttribute('aria-expanded', String(isOpen));
        document.body.style.overflow = isOpen ? '' : 'hidden';
    });

    menu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            menu.classList.add('hidden');
            iconOpen?.classList.remove('hidden');
            iconClose?.classList.add('hidden');
            btn.setAttribute('aria-expanded', 'false');
            document.body.style.overflow = '';
        });
    });
}

function initSmoothScroll() {
    document.querySelectorAll('a[href*="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href');
            if (!href || href === '#') return;

            let url;
            try {
                url = new URL(href, window.location.origin);
            } catch {
                return;
            }

            const hash = url.hash;
            if (!hash || hash === '#') return;

            if (url.pathname !== window.location.pathname) return;

            const target = document.querySelector(hash);
            if (!target) return;

            e.preventDefault();
            const headerOffset = 80;
            const top = target.getBoundingClientRect().top + window.scrollY - headerOffset;
            window.scrollTo({ top, behavior: 'smooth' });
        });
    });
}

function initScrollReveal() {
    const elements = document.querySelectorAll('.reveal');
    if (!elements.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.1, rootMargin: '0px 0px -40px 0px' }
    );

    elements.forEach(el => observer.observe(el));
}

function initHeaderScroll() {
    const header = document.getElementById('site-header');
    if (!header) return;

    const onScroll = () => {
        header.classList.toggle('scrolled', window.scrollY > 20);
    };

    window.addEventListener('scroll', onScroll, { passive: true });
    onScroll();
}

function initActiveNav() {
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link[data-section]');

    if (!sections.length || !navLinks.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    navLinks.forEach(link => {
                        link.classList.toggle('active', link.dataset.section === id);
                    });
                }
            });
        },
        { threshold: 0.3, rootMargin: '-80px 0px -50% 0px' }
    );

    sections.forEach(section => observer.observe(section));
}

function initBackToTop() {
    const btn = document.getElementById('back-to-top');
    if (!btn) return;

    window.addEventListener('scroll', () => {
        btn.classList.toggle('visible', window.scrollY > 400);
    }, { passive: true });

    btn.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });
}

function initStatCounters() {
    const counters = document.querySelectorAll('.stat-number[data-target]');
    if (!counters.length) return;

    const animateCounter = (el) => {
        const target = parseInt(el.dataset.target, 10);
        const duration = 1500;
        const start = performance.now();

        const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = Math.floor(eased * target);
            if (progress < 1) requestAnimationFrame(step);
            else el.textContent = target;
        };

        requestAnimationFrame(step);
    };

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.5 }
    );

    counters.forEach(counter => observer.observe(counter));
}

function initContactForm() {
    const form = document.getElementById('contact-form');
    const success = document.getElementById('form-success');
    if (!form) return;

    form.addEventListener('submit', (e) => {
        e.preventDefault();

        let valid = true;
        form.querySelectorAll('[required]').forEach(field => {
            const isValid = field.value.trim() !== '' &&
                (field.type !== 'email' || /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(field.value));
            field.classList.toggle('error', !isValid);
            if (!isValid) valid = false;
        });

        if (!valid) return;

        form.reset();
        success?.classList.remove('hidden');
        setTimeout(() => success?.classList.add('hidden'), 5000);
    });

    form.querySelectorAll('.form-input').forEach(input => {
        input.addEventListener('input', () => input.classList.remove('error'));
    });
}
