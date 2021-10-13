<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\{Serie, Season, Chapter};

class SerieRemover
{
    public function remove(int $SerieId) : string
    {
        $serieName = '';

        DB::transaction(function () use ($SerieId, &$serieName) {
            $serie = Serie::find($SerieId);
            $serieName = $serie->name;

            $serie->seasons->each(function (Season $season) {
                $season->chapters->each(function (Chapter $chapter) {
                    $chapter->delete();
                });

                $season->delete();
            });
            $serie->delete();
        });

        return $serieName;
    }
}
