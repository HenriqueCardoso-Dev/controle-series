<?php

namespace App\Services;

use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class SeriesGenerator
{
    public function builder(
        string $serieName,
        int $qtdSeasons,
        int $qtdChapters)
    {
        $serie = null;

        DB::transaction(function() use ($serieName, $qtdSeasons, $qtdChapters, &$serie) {
            $serie = Serie::create([
                'name' => $serieName,
            ]);

            for ($i = 1; $i <= $qtdSeasons; $i++) {
                $season = $serie->seasons()->create([
                    'season_number' => $i,
                ]);

                for ($j = 1; $j <= $qtdChapters; $j++) {
                    $season->chapters()->create([
                        'chapter_number' => $j,
                    ]);
                }
            }
        });

        return $serie;
    }
}
