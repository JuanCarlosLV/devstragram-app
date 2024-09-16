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
        /* We defined what fields we want to test(Factory is for test). 
            In this case we're gonna test title, description, image and user_id of a post. We use Faker class to generate random data for these fields.
        */
        return [
            'title' => $this->faker->sentence(5),
            'description' => $this->faker->sentence(20),
            'image' => $this->faker->uuid() . '.jpg',
            'user_id' => $this->faker->randomElement([16,17,19]),
        ];
    }
}
