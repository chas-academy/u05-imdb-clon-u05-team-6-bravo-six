<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TitleTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}