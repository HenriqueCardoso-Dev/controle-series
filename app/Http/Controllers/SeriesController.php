<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('name')->get();
        $responses = [
            "successResponse" => $request->session()->get('successResponse'),
            "errorResponse" => $request->session()->get('errorResponse')
        ];

        return view('series.index', compact(
            'series',
            'responses'
        ));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create([
            'name' => $request->serieName,
        ]);

        for ($i = 1; $i <= $request->qtdSeasons; $i++) {
            $season = $serie->seasons()->create([
                'season_number' => $i
            ]);

            for ($j = 1; $j <= $request->qtdChapters; $j++) {
                $season->chapters()->create([
                    'chapter_number' => $j
                ]);
            }
        }

        if ($serie != null) {
            $request->session()->flash('successResponse', "A série {$serie->name} foi adicionada em sua lista");
        } else {
            $request->session()->flash('errorResponse', "Erro ao tentar adicionar uma nova série!");
        }

        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        $request->session()->flash('successResponse', 'Série removida com sucesso!');
        return redirect()->route('series.index');
    }
}
