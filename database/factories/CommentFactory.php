<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */


    public function definition()
    {
        return [
            'content' => $this->faker->text,
            'blog_post_id' => 5,
            'created_at' => $this->faker->dateTimeBetween('-3 months'),
        ];
    }
}
