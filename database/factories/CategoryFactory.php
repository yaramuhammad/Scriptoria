<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\category>
 */
class CategoryFactory extends Factory
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
    "download (2).jpeg",
    "download (3).jpeg",
    "download (46).jpeg",
    "download.jpeg"
        ];
        return [
            "title"=> $this->faker->unique()->word(),
            "description"=> implode(' ' , $this->faker->paragraphs(random_int(3,4))),
            'imagePath'=>'categories/'. $images[$this->faker->numberBetween(0,4)],

        ];
    }
}
