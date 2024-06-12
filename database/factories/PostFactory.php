<?php

namespace Database\Factories;

use App\Enums\PostStatusEnum;
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
            'slug' => $this->faker->unique()->slug,
            'title' => $this->faker->sentence,
            'excerpt' => $this->faker->text(512),
            'content' => $this->faker->paragraphs(3, true),
            'status' => $this->faker->randomElement(PostStatusEnum::getValues()),
        ];
    }
}
