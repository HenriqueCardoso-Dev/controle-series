<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Serie;
use App\Services\SerieRemover;
use App\Services\SeriesGenerator;
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

    public function store(SeriesFormRequest $request, SeriesGenerator $generator)
    {
        $serie = $generator->builder($request->serieName, $request->qtdSeasons, $request->qtdChapters);

        if ($serie != null) {
            $request->session()->flash('successResponse', "A série {$serie->name} foi adicionada em sua lista");
        } else {
            $request->session()->flash('errorResponse', "Erro ao tentar adicionar uma nova série!");
        }

        return redirect()->route('series.index');
    }

    public function destroy(Request $request, SerieRemover $remover)
    {
        $serieName = $remover->remove($request->id);
        $request->session()->flash('successResponse', "Série {$serieName} removida com sucesso!");
        return redirect()->route('series.index');
    }
}
