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
        \App\Models\User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'user_admin' => true
        ]);
        // \App\Models\User::factory(50)->create();
        // $this->call(GenreTableSeeder::class);
        $this->call(TitleTableSeeder::class);
        // $this->call(SecondaryGenreTableSeeder::class);
        // $this->call(ReviewTableSeeder::class);
        // $this->call(CommentTableSeeder::class);
        // $this->call(WatchlistSeeder::class);
        // $this->call(WatchlistItemSeeder::class);
    }
}
