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
    public function addMovies($query)
    {
        $curl = curl_init('http://www.omdbapi.com/?apikey=3367eb14&s=' . $query);
        curl_setopt($curl, CURLOPT_POST, 0);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        $data = json_decode($response, true);
        foreach ($data['Search'] as $movie) {
            $detail_curl = curl_init('http://www.omdbapi.com/?apikey=3367eb14&i=' . $movie['imdbID']);
            curl_setopt($detail_curl, CURLOPT_POST, 0);
            curl_setopt($detail_curl, CURLOPT_RETURNTRANSFER, true);
            $detail_response = curl_exec($detail_curl);
            $detail_data = json_decode($detail_response, true);
            $title = \App\Models\Title::create([ //i hope the title remains
                'title' => $movie['Title'],
                'description' => trim($detail_data['Plot']) ?? "",
                'img_url' => $movie['Poster'],
                'genre_id' => \App\Models\Genre::inRandomOrder()->first()->id,
                'user_id' => 1
            ]);

            $genres = explode(',', $detail_data['Genre']);
            //

            foreach ($genres as $i => $inner_genre) {
                if (\App\Models\Genre::where('name', 'like',  "%" . trim($inner_genre) . "%")->count() === 0) {
                    $genre = \App\Models\Genre::create(['name' => trim($inner_genre)]);
                    if ($i !== 0) {
                        \App\Models\SecondaryGenre::create([
                            'name' => $genre->name,
                            'title_id' => $title->id,
                            'genre_id' => $genre->id
                        ]);
                    } else {
                        $title->genre_id = $genre->id;
                        $title->save();
                    }
                } else {
                    $genre = \App\Models\Genre::where('name', 'like', "%" . trim($inner_genre) . "%")->first();
                    if ($i !== 0) {
                        \App\Models\SecondaryGenre::create([
                            'name' => $genre->name,
                            'title_id' => $title->id,
                            'genre_id' => $genre->id
                        ]);
                    } else {
                        if ($i === 0) {
                            $title->genre_id = $genre->id;
                            $title->save();
                        }
                    }
                }
            };

            // $limit = rand(1, 4);
            // for ($i = 0; $i <  $limit; $i++) {
            //     $genre = \App\Models\Genre::inRandomOrder()->first();
            //     \App\Models\SecondaryGenre::create([
            //         'name' => $genre->name,
            //         'title_id' => $title->id,
            //         'genre_id' => $genre->id
            //     ]);
            // }
        }
    }
    public function run()
    {
        // \App\Models\Title::factory()->count(75)->create();
        // test

        $this->addMovies('harry');
        $this->addMovies('mom');
        $this->addMOvies('action');
        $this->addMOvies('marvel');
        $this->addMOvies('death');
        $this->addMOvies('blood');
    }
}
