<?php

namespace Database\Factories;

use App\Models\User;
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
        return [
            'en' => [
                'title' => fake()->title(),
                'description' => fake()->text(200),
            ],
            'ar' => [
                'title' => fake()->title(),
                'description' => fake()->text(200),
            ],
            'user_id' => User::query()->inRandomOrder()->first()->id ?? User::factory()->create()->id,
        ];
    }
}
