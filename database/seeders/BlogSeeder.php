<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        foreach (config('blogs') as $post) {
            Blog::updateOrCreate(
                ['slug' => $post['slug']],
                [
                    'title' => $post['title'],
                    'excerpt' => $post['excerpt'],
                    'content' => $post['content'],
                    'category' => $post['category'],
                    'author' => $post['author'],
                    'published_at' => $post['date'],
                    'is_published' => true,
                ]
            );
        }
    }
}
