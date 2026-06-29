@extends('layouts.admin')

@section('title', 'Blog Posts')

@section('content')
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
    <div>
        <h1 class="text-2xl font-bold text-lca-gray-950">Blog Posts</h1>
        <p class="text-sm text-lca-gray-600 mt-1">Create and manage articles shown on your website.</p>
    </div>
    <a href="{{ route('admin.blogs.create') }}" class="btn-primary">+ New Post</a>
</div>

@if($blogs->isEmpty())
    <div class="bg-white rounded-2xl border border-lca-gray-200 p-12 text-center">
        <p class="text-lca-gray-600 mb-4">No blog posts yet.</p>
        <a href="{{ route('admin.blogs.create') }}" class="btn-primary">Create your first post</a>
    </div>
@else
    <div class="bg-white rounded-2xl border border-lca-gray-200 overflow-hidden shadow-sm">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-lca-gray-900 text-white">
                    <tr>
                        <th class="text-left px-4 py-3 font-semibold">Title</th>
                        <th class="text-left px-4 py-3 font-semibold hidden md:table-cell">Category</th>
                        <th class="text-left px-4 py-3 font-semibold hidden sm:table-cell">Status</th>
                        <th class="text-left px-4 py-3 font-semibold hidden lg:table-cell">Published</th>
                        <th class="text-right px-4 py-3 font-semibold">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-lca-gray-200">
                    @foreach($blogs as $post)
                    <tr class="hover:bg-lca-yellow-soft/30 transition-colors">
                        <td class="px-4 py-4">
                            <div class="font-semibold text-lca-gray-950">{{ $post->title }}</div>
                            <div class="text-xs text-lca-gray-500 mt-0.5">{{ $post->author }}</div>
                        </td>
                        <td class="px-4 py-4 hidden md:table-cell">
                            <span class="text-xs font-semibold bg-lca-yellow-soft px-2 py-0.5 rounded-full">{{ $post->category }}</span>
                        </td>
                        <td class="px-4 py-4 hidden sm:table-cell">
                            @if($post->is_published && $post->published_at?->lte(now()))
                                <span class="text-xs font-semibold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">Published</span>
                            @else
                                <span class="text-xs font-semibold text-lca-gray-600 bg-lca-gray-200 px-2 py-0.5 rounded-full">Draft</span>
                            @endif
                        </td>
                        <td class="px-4 py-4 hidden lg:table-cell text-lca-gray-600">
                            {{ $post->published_at?->format('M j, Y') ?? '—' }}
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center justify-end gap-2">
                                @if($post->is_published)
                                <a href="{{ route('blog.show', $post->slug) }}" target="_blank" class="admin-link">View</a>
                                @endif
                                <a href="{{ route('admin.blogs.edit', $post) }}" class="admin-link">Edit</a>
                                <form method="POST" action="{{ route('admin.blogs.destroy', $post) }}" onsubmit="return confirm('Delete this post?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="admin-link-danger">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
