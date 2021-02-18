<?php

namespace Database\Factories;

use App\Models\Review;
use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Review::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(30),
            'body' => $this->faker->text($maxNbChars = 200),
            'rating' => $this->faker->numberBetween($min = 1, $max = 6),
            'user_id' => \App\Models\User::inRandomOrder()->value('id'),
            'title_id' => \App\Models\Title::inRandomOrder()->value('id')
        ];
    }
}
