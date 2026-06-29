@extends('layouts.lca')

@section('title', 'Blog — LCA Express')

@section('content')
<section class="pt-12 pb-16 md:pt-16 md:pb-24 bg-lca-yellow-soft/40">
    <div class="container mx-auto px-4">
        <div class="max-w-2xl mx-auto text-center mb-12">
            <span class="section-tag">Latest News</span>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-slate-900 mb-4">Blog</h1>
            <p class="text-slate-600">Company updates, shipping guides, and logistics insights from the LCA Express team.</p>
        </div>

        @include('partials.blog-list', ['blogs' => $blogs])
    </div>
</section>
@endsection
