<?php

namespace Database\Seeders;

use App\Models\category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserPreferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $categories = category::all();

        foreach ($users as $user) {
            $user->preferences()->attach($categories->random(rand(1,3))->pluck("id")->toArray());
        }
    }
}
