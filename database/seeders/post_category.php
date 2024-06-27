<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\category;
use App\Models\Post;

class post_category extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $categories = category::all();

        // Attach roles to users
        foreach ($posts as $post) {
            // Attach one or more roles to each user
            $post->categories()->attach($categories->random(rand(1, 3))->pluck('id')->toArray());
        }
    }
}
