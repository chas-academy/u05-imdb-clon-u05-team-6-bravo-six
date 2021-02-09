<?php

namespace Database\Factories;

use App\Models\SecondaryGenre;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecondaryGenreFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SecondaryGenre::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            'genre_id' => \App\Models\Genre::inRandomOrder()->value('id'),
            'title_id' => \App\Models\Title::inRandomOrder()->value('id'),
        ];
    }
}
