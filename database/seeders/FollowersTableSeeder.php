<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();

        foreach ($users as $user) {
            $numberOfFollowers = rand(1, 5);
            $followers = $users->random($numberOfFollowers);

            if($followers->contains($user)) {
                $followers->forget($followers->search($user));
            }

            $user->followings()->attach($followers);
        }
    }
}
