<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SecondaryGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\SecondaryGenre::factory()->count(25)->create();
    }
}