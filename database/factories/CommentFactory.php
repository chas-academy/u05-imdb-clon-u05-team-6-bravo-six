<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $faker->text(), 
            'user_id' => App/Models/User ::inRandomOrder()->value('id'),
            'title_id' => App/Models/Title ::inRandomOrder()->value('id'),

        ];
    }
}
