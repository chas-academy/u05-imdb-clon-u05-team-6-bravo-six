<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WatchlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Watchlist::factory()->count(25)->create();
    }
}
