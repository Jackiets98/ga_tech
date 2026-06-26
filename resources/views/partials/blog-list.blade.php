@if($blogs->count() > 3)
    @include('partials.blog-carousel', ['blogs' => $blogs])
@else
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach($blogs->take(3) as $i => $blog)
            @include('partials.blog-card', ['blog' => $blog, 'delay' => 'reveal-delay-' . min($i + 1, 3)])
        @endforeach
    </div>
@endif
