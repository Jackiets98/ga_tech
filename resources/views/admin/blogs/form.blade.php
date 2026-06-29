@extends('layouts.admin')

@section('title', $blog->exists ? 'Edit Post' : 'New Post')

@section('content')
<div class="mb-8">
    <a href="{{ route('admin.blogs.index') }}" class="text-sm text-lca-gray-600 hover:text-lca-gray-950 transition-colors">← Back to posts</a>
    <h1 class="text-2xl font-bold text-lca-gray-950 mt-2">{{ $blog->exists ? 'Edit Post' : 'New Post' }}</h1>
</div>

<form
    method="POST"
    action="{{ $blog->exists ? route('admin.blogs.update', $blog) : route('admin.blogs.store') }}"
    class="bg-white rounded-2xl border border-lca-gray-200 shadow-sm p-6 md:p-8 space-y-6"
>
    @csrf
    @if($blog->exists)
        @method('PUT')
    @endif

    <div>
        <label for="title" class="admin-label">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $blog->title) }}" class="admin-input" required>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <label for="category" class="admin-label">Category</label>
            <input type="text" id="category" name="category" value="{{ old('category', $blog->category) }}" list="categories" class="admin-input" required>
            <datalist id="categories">
                <option value="Company News">
                <option value="Shipping Guide">
                <option value="Operations">
                <option value="Announcements">
            </datalist>
        </div>
        <div>
            <label for="author" class="admin-label">Author</label>
            <input type="text" id="author" name="author" value="{{ old('author', $blog->author) }}" class="admin-input" required>
        </div>
    </div>

    <div>
        <label for="excerpt" class="admin-label">Excerpt <span class="text-lca-gray-500 font-normal">(shown on blog cards, max 500 chars)</span></label>
        <textarea id="excerpt" name="excerpt" rows="3" class="admin-input resize-none" maxlength="500" required>{{ old('excerpt', $blog->excerpt) }}</textarea>
    </div>

    <div>
        <label for="content" class="admin-label">Content <span class="text-lca-gray-500 font-normal">(HTML allowed: &lt;p&gt;, &lt;h3&gt;, &lt;ul&gt;, &lt;li&gt;, &lt;strong&gt;, &lt;a&gt;)</span></label>
        <textarea id="content" name="content" rows="14" class="admin-input font-mono text-sm" required>{{ old('content', $blog->content) }}</textarea>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-end">
        <div>
            <label for="published_at" class="admin-label">Publish date</label>
            <input
                type="datetime-local"
                id="published_at"
                name="published_at"
                value="{{ old('published_at', $blog->published_at?->format('Y-m-d\TH:i') ?? now()->format('Y-m-d\TH:i')) }}"
                class="admin-input"
            >
        </div>
        <label class="flex items-center gap-3 px-4 py-3 rounded-xl border border-lca-gray-200 bg-lca-yellow-soft/30 cursor-pointer">
            <input type="checkbox" name="is_published" value="1" class="rounded border-lca-gray-300" @checked(old('is_published', $blog->is_published))>
            <span class="text-sm font-medium">Publish this post</span>
        </label>
    </div>

    <div class="flex flex-col sm:flex-row gap-3 pt-2">
        <button type="submit" class="btn-primary">{{ $blog->exists ? 'Update Post' : 'Create Post' }}</button>
        <a href="{{ route('admin.blogs.index') }}" class="btn-outline text-center">Cancel</a>
    </div>
</form>
@endsection
