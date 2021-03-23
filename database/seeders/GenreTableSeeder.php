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
            'Indie',
            'Thriller',
            'Horror',
            'Mystery',
            'Western',
            'Crime'
        ];
        foreach ($genres as $genre) {
            \App\Models\Genre::create([
                'name' => $genre
            ]);
        };
    }
}
