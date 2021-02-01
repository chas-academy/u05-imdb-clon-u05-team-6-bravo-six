<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TitleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Title::factory()->count(25)->create();
    }
}
