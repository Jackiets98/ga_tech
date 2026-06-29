<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'blogs' => Blog::latestPublished()->get(),
        ]);
    }

    public function show(string $slug)
    {
        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        return view('blog.show', [
            'blog' => $blog,
            'related' => Blog::latestPublished()
                ->where('slug', '!=', $slug)
                ->take(3)
                ->get(),
        ]);
    }
}
