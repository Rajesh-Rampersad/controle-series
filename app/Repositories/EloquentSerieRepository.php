<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSerieRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Serie
    {


        return DB::transaction(function () use ($request) {
            // Criar série
            $serie = Serie::create([
                'nome' => $request->input('nome'),
            ]);

            // Criar temporadas com episódios
            for ($i = 1; $i <= $request->seasonsQty; $i++) {
                $season = $serie->seasons()->create([
                    'number' => $i
                ]);

                for ($j = 1; $j <= $request->episodesPerSeason; $j++) {
                    $season->episodes()->create([
                        'number' => $j
                    ]);
                }
            }
        });


        // Redirecionar com mensagem de sucesso
        return to_route('series.index')
            ->with('mensagem.sucesso', "Série '{$serie->nome}' cadastrada com sucesso.");
    }
}
