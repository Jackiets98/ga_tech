<div class="blog-carousel" data-blog-carousel>
    <button type="button" class="blog-carousel-btn blog-carousel-prev" aria-label="Previous articles" disabled>
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
    </button>

    <div class="blog-carousel-viewport">
        <div class="blog-carousel-track">
            @foreach($blogs as $i => $blog)
                <div class="blog-carousel-slide">
                    @include('partials.blog-card', ['blog' => $blog, 'delay' => ''])
                </div>
            @endforeach
        </div>
    </div>

    <button type="button" class="blog-carousel-btn blog-carousel-next" aria-label="Next articles">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
    </button>

    <div class="blog-carousel-dots" role="tablist" aria-label="Blog slides"></div>
</div>
