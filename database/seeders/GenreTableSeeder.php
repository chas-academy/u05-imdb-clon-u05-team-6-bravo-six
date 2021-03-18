<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class GenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genres = [
            'Action',
            'Comedy',
            'Romance',
            'Fantasy',
            'Drama',
            'Science Fiction',
            'Indie',
            'Thriller',
            'Horror',
            'Mystery',
            'Western',
            'Crime'
        ];
        // \App\Models\Genre::factory()->count(25)->create();
        foreach ($genres as $genre) {
            \App\Models\Genre::create([
                'name' => $genre
            ]);
        };
    }
}
