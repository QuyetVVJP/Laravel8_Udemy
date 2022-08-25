<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return $this->afterCreating(function(Author $author){
            // TODO
        })
        ->afterMaking(function(Author $author){
            // TODO
        });
    }

}
