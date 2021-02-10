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
        \App\Models\User::factory(10)->create();
        $this->call(GenreTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        $this->call(SecondaryGenreTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        $this->call(CommentTableSeeder::class);
        $this->call(WatchlistSeeder::class);
        $this->call(WatchlistItemSeeder::class);
    }
}
