<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'blogs' => $this->blogs(),
        ]);
    }

    public function show(string $slug)
    {
        $blog = $this->blogs()->firstWhere('slug', $slug);

        abort_unless($blog, 404);

        return view('blog.show', [
            'blog' => $blog,
            'related' => $this->blogs()->where('slug', '!=', $slug)->take(3)->values(),
        ]);
    }

    private function blogs(): Collection
    {
        return collect(config('blogs'))
            ->sortByDesc('date')
            ->values();
    }
}
