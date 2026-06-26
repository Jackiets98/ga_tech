export function initBlogTimes() {
    const elements = document.querySelectorAll('.blog-time[data-published]');
    if (!elements.length) return;

    function formatRelativeTime(isoDate) {
        const published = new Date(isoDate);
        const now = new Date();
        const diffMs = now - published;
        const diffSec = Math.floor(diffMs / 1000);
        const diffMin = Math.floor(diffSec / 60);
        const diffHour = Math.floor(diffMin / 60);
        const diffDay = Math.floor(diffHour / 24);
        const diffWeek = Math.floor(diffDay / 7);
        const diffMonth = Math.floor(diffDay / 30);

        if (diffSec < 60) return 'Just now';
        if (diffMin < 60) return `${diffMin} minute${diffMin !== 1 ? 's' : ''} ago`;
        if (diffHour < 24) return `${diffHour} hour${diffHour !== 1 ? 's' : ''} ago`;
        if (diffDay < 7) return `${diffDay} day${diffDay !== 1 ? 's' : ''} ago`;
        if (diffWeek < 5) return `${diffWeek} week${diffWeek !== 1 ? 's' : ''} ago`;
        if (diffMonth < 12) return `${diffMonth} month${diffMonth !== 1 ? 's' : ''} ago`;

        return published.toLocaleDateString('en-MY', {
            year: 'numeric',
            month: 'short',
            day: 'numeric',
        });
    }

    function update() {
        elements.forEach(el => {
            const iso = el.dataset.published;
            if (iso) el.textContent = formatRelativeTime(iso);
        });
    }

    update();
    setInterval(update, 60_000);
}
