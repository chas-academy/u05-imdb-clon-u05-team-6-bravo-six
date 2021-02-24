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
        $genre = \App\Models\Genre::inRandomOrder()->first();
        return [
            "name" => $genre->name,
            'genre_id' => $genre->id,
            'title_id' => \App\Models\Title::inRandomOrder()->value('id'),
        ];
    }
}
