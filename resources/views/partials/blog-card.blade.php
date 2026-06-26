<article class="blog-card{{ !empty($delay) ? ' reveal ' . $delay : '' }}">
    <a href="{{ route('blog.show', $blog['slug']) }}" class="block group h-full">
        <div class="p-6">
            <div class="flex items-center justify-between gap-3 mb-3">
                <span class="text-xs font-semibold text-orange-600 bg-orange-50 px-2.5 py-0.5 rounded-full">{{ $blog['category'] }}</span>
                @if(\Carbon\Carbon::parse($blog['date'])->gt(now()->subDays(14)))
                    <span class="blog-badge-inline">New</span>
                @endif
            </div>
            <time
                class="blog-time block text-xs text-slate-500 font-medium mb-2"
                datetime="{{ $blog['date'] }}"
                data-published="{{ $blog['date'] }}"
            ></time>
            <h3 class="text-lg font-bold text-slate-900 mb-2 group-hover:text-orange-600 transition-colors">{{ $blog['title'] }}</h3>
            <p class="text-slate-600 text-sm leading-relaxed mb-5 line-clamp-3">{{ $blog['excerpt'] }}</p>
            <span class="inline-flex items-center gap-1 text-orange-600 font-semibold text-sm group-hover:gap-2 transition-all">
                Read More
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </span>
        </div>
    </a>
</article>
