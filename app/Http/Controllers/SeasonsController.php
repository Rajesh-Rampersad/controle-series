<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Serie $serie)
    {
        // Cargamos las temporadas con sus episodios de una vez (Eager Loading)
        $seasons = $serie->seasons()->with('episodes')->orderBy('number')->get();

        return view('seasons.index', [
            'seasons' => $seasons,
            'serie' => $serie

        ]);
    }

    public function create(Serie $serie)
    {
        return view('seasons.create', compact('serie'));
    }

    public function store(Request $request, Serie $serie)
    {
        $request->validate([
            'number' => 'required|integer|min:1',
        ]);

        $serie->seasons()->create(['number' => $request->number]);

        return redirect()->route('seasons.index', $serie->id)
            ->with('mensagem.sucesso', 'Temporada adicionada com sucesso.');
    }

    public function edit(Season $season)
    {
        return view('seasons.edit', compact('season'));
    }

    public function update(Request $request, Season $season)
    {
        $request->validate([
            'number' => 'required|integer|min:1',
        ]);

        $season->update(['number' => $request->number]);

        return back()->with('mensagem.sucesso', 'Temporada atualizada com sucesso.');
    }


    public function destroy(Season $season)
    {
        $season->delete();

        return back()->with('mensagem.sucesso', 'Temporada deletada com sucesso.');
    }
}
