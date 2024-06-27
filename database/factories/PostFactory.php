<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images=[
            "download (1).jpeg",
            "download (10).jpeg",
            "download (11).jpeg",
            "download (12).jpeg",
            "download (13).jpeg",
            "download (14).jpeg",
            "download (15).jpeg",
            "download (16).jpeg",
            "download (17).jpeg",
            "download (18).jpeg",
            "download (19).jpeg",
            "download (2).jpeg",
            "download (20).jpeg",
            "download (21).jpeg",
            "download (22).jpeg",
            "download (23).jpeg",
            "download (24).jpeg",
            "download (25).jpeg",
            "download (26).jpeg",
            "download (27).jpeg",
            "download (28).jpeg",
            "download (29).jpeg",
            "download (3).jpeg",
            "download (30).jpeg",
            "download (31).jpeg",
            "download (32).jpeg",
            "download (33).jpeg",
            "download (34).jpeg",
            "download (35).jpeg",
            "download (36).jpeg",
            "download (37).jpeg",
            "download (38).jpeg",
            "download (39).jpeg",
            "download (4).jpeg",
            "download (40).jpeg",
            "download (41).jpeg",
            "download (42).jpeg",
            "download (43).jpeg",
            "download (44).jpeg",
            "download (45).jpeg",
            "download (5).jpeg",
            "download (6).jpeg",
            "download (7).jpeg",
            "download (8).jpeg",
            "download (9).jpeg",
            "download.jpeg",
            "images (1).jpeg",
            "images (2).jpeg",
            "images (3).jpeg",
            "images.jpeg",
            "pngwing.com.jpeg"
        ];
        return [
            "title"=> $this->faker->sentence(6),
            "body"=> $this->faker->paragraphs(random_int(25,35)),
            "user_id"=>$this->faker->numberBetween(1,9),
            'imagePath'=> 'posts/'. $images[$this->faker->unique()->numberBetween(0,50)],
            'created_at' => $this->faker->dateTimeBetween('-1 year','now'),
        ];
    }
}
