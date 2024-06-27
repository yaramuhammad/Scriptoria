<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->count(9)->create();
        category::factory()->count(5)->create();
        Post::factory()->count(51)->create();
        Comment::factory()->count(100)->create();

        $this->call(FollowersTableSeeder::class);
        $this->call(post_category::class);
        $this->call(UserPreferencesSeeder::class);
    }
}
