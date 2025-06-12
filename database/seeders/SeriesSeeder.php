<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Serie;
use App\Models\Season;
use App\Models\Episode;

class SeriesSeeder extends Seeder
{
    public function run(): void
    {
        $series = [
            ['nome' => 'Game of Thrones'],
            ['nome' => 'Breaking Bad'],
            ['nome' => 'Stranger Things'],
            ['nome' => 'The Witcher'],
            ['nome' => 'The Office'],
            ['nome' => 'Friends'],
            ['nome' => 'The Crown'],
            ['nome' => 'Black Mirror'],
            ['nome' => 'Narcos'],
            ['nome' => 'The Mandalorian'],
        ];

        foreach ($series as $serieData) {
            $serie = Serie::create($serieData);

            for ($seasonNumber = 1; $seasonNumber <= 5; $seasonNumber++) {
                $season = $serie->seasons()->create(['number' => $seasonNumber]);

                for ($episodeNumber = 1; $episodeNumber <= 10; $episodeNumber++) {
                    $season->episodes()->create(['number' => $episodeNumber]);
                }
            }
        }
    }
}
