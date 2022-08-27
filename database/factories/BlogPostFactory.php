<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
        'title' => $this->faker->sentence(6),
        'content' => $this->faker->paragraph(5, true),
        'user_id' => $this->faker->randomDigit(),
        'created_at' => $this->faker->dateTimeBetween('-3 months'),
        ];
    }
}
