export function initBlogCarousel() {
    const carousels = document.querySelectorAll('[data-blog-carousel]');
    if (!carousels.length) return;

    carousels.forEach(carousel => setupCarousel(carousel));
}

function setupCarousel(carousel) {
    const track = carousel.querySelector('.blog-carousel-track');
    const slides = carousel.querySelectorAll('.blog-carousel-slide');
    const prevBtn = carousel.querySelector('.blog-carousel-prev');
    const nextBtn = carousel.querySelector('.blog-carousel-next');
    const dotsContainer = carousel.querySelector('.blog-carousel-dots');

    if (!track || slides.length <= 3) return;

    let currentIndex = 0;
    let visibleCount = getVisibleCount();
    let maxIndex = Math.max(0, slides.length - visibleCount);

    function getVisibleCount() {
        if (window.innerWidth >= 1024) return 3;
        if (window.innerWidth >= 768) return 2;
        return 1;
    }

    function buildDots() {
        if (!dotsContainer) return;
        dotsContainer.innerHTML = '';
        const pageCount = maxIndex + 1;

        for (let i = 0; i < pageCount; i++) {
            const dot = document.createElement('button');
            dot.type = 'button';
            dot.className = 'blog-carousel-dot' + (i === currentIndex ? ' active' : '');
            dot.setAttribute('aria-label', `Go to slide ${i + 1}`);
            dot.addEventListener('click', () => goTo(i));
            dotsContainer.appendChild(dot);
        }
    }

    function updateButtons() {
        prevBtn.disabled = currentIndex === 0;
        nextBtn.disabled = currentIndex >= maxIndex;
    }

    function updateDots() {
        dotsContainer?.querySelectorAll('.blog-carousel-dot').forEach((dot, i) => {
            dot.classList.toggle('active', i === currentIndex);
        });
    }

    function goTo(index) {
        currentIndex = Math.max(0, Math.min(index, maxIndex));
        const slideWidth = slides[0].offsetWidth;
        const gap = parseFloat(getComputedStyle(track).gap) || 0;
        track.style.transform = `translateX(-${currentIndex * (slideWidth + gap)}px)`;
        updateButtons();
        updateDots();
    }

    function refresh() {
        visibleCount = getVisibleCount();
        maxIndex = Math.max(0, slides.length - visibleCount);
        if (currentIndex > maxIndex) currentIndex = maxIndex;
        buildDots();
        goTo(currentIndex);
    }

    prevBtn?.addEventListener('click', () => goTo(currentIndex - 1));
    nextBtn?.addEventListener('click', () => goTo(currentIndex + 1));

    let touchStartX = 0;
    carousel.querySelector('.blog-carousel-viewport')?.addEventListener('touchstart', e => {
        touchStartX = e.touches[0].clientX;
    }, { passive: true });

    carousel.querySelector('.blog-carousel-viewport')?.addEventListener('touchend', e => {
        const diff = touchStartX - e.changedTouches[0].clientX;
        if (Math.abs(diff) > 50) {
            goTo(diff > 0 ? currentIndex + 1 : currentIndex - 1);
        }
    }, { passive: true });

    window.addEventListener('resize', refresh, { passive: true });

    refresh();
}
