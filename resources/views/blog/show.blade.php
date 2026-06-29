@extends('layouts.lca')

@section('title', $blog->title . ' — LCA Express Blog')

@section('content')
<article class="pt-8 pb-16 md:pt-12 md:pb-24">
    {{-- Header --}}
    <div class="relative bg-gradient-to-br from-lca-gray-900 via-lca-gray-800 to-lca-gray-700 pt-8 pb-12 md:pt-12 md:pb-16">
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-0 right-0 w-72 h-72 bg-lca-yellow rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-lca-gray-500 rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <a href="{{ route('blog.index') }}" class="inline-flex items-center gap-2 text-white/80 hover:text-white text-sm mb-6 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                Back to Blog
            </a>
            <span class="inline-block text-xs font-semibold text-lca-yellow bg-lca-yellow/20 px-3 py-1 rounded-full mb-3">{{ $blog->category }}</span>
            <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl font-bold text-white leading-tight max-w-4xl">{{ $blog->title }}</h1>
        </div>
    </div>

    {{-- Meta + Content --}}
    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-3xl mx-auto -mt-6">
            <div class="bg-white rounded-2xl shadow-lg border border-lca-gray-200 px-6 py-5 md:px-8 md:py-6 flex flex-wrap items-center gap-4 text-sm text-lca-gray-500 mb-8">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-full bg-lca-yellow-soft text-lca-gray-900 flex items-center justify-center font-bold text-xs">
                        {{ strtoupper(substr($blog->author, 0, 1)) }}
                    </div>
                    <span class="font-medium text-lca-gray-700">{{ $blog->author }}</span>
                </div>
                <span class="hidden sm:block text-lca-gray-300">|</span>
                <time
                    class="blog-time font-medium"
                    datetime="{{ $blog->published_at?->toIso8601String() }}"
                    data-published="{{ $blog->published_at?->toIso8601String() }}"
                ></time>
                <span class="hidden sm:block text-lca-gray-300">|</span>
                <span>{{ $blog->published_at?->format('F j, Y') }}</span>
            </div>

            <div class="blog-prose">
                {!! $blog->content !!}
            </div>

            <div class="mt-12 pt-8 border-t border-lca-gray-200">
                <a href="/#contact" class="btn-primary">Get a Freight Quote</a>
            </div>
        </div>
    </div>
</article>

@if($related->isNotEmpty())
<section class="py-16 bg-lca-yellow-soft/40 border-t border-lca-gray-200">
    <div class="container mx-auto px-4">
        <h2 class="text-2xl font-bold text-lca-gray-950 mb-8 text-center">Related Articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
            @foreach($related as $post)
                @include('partials.blog-card', ['blog' => $post])
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
