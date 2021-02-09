<?php

namespace Database\Factories;

use App\Models\Title;
use Illuminate\Database\Eloquent\Factories\Factory;

class TitleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Title::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->streetName,
            'genre_id' => \App\Models\Genre::inRandomOrder()->value('id'), //PRIMARY GENRE
            'user_id' => \App\Models\User::inRandomOrder()->value('id'), //is this needed?
        ];
    }
}
