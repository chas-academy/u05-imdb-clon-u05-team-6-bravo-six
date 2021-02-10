<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WatchlistItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\WatchlistItem::factory()->count(25)->create();
    }
}
