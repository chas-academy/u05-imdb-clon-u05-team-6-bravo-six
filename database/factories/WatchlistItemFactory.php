<?php

namespace Database\Factories;

use App\Models\WatchlistItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class WatchlistItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WatchlistItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title_id' => \App\Models\Genre::inRandomOrder()->value('id'),
            'watchlist_id' => \App\Models\Watchlist::inRandomOrder()->value('id')
        ];
    }
}
